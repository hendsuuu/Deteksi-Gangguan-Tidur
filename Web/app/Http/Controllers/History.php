<?php

namespace App\Http\Controllers;

use App\Models\History as ModelsHistory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class History extends Controller
{
    public function index()
    {
        $histories = ModelsHistory::latest()->paginate(10);
        return view('riwayat', compact('histories'));
    }

    public function show($id)
    {
        $history = ModelsHistory::findOrFail($id);
        return view('history.show', compact('history'));
    }

    public function download($id)
    {
        $history = ModelsHistory::findOrFail($id);

        $pdf = Pdf::loadView('pdf', compact('history'));

        return $pdf->stream('history-preview.pdf');
        // return $pdf->download('history-' . $history->id . '.pdf');
    }
    public function detail($id)
    {
        $history = ModelsHistory::findOrFail($id); // Ambil data berdasarkan ID
        return response()->json($history); // Kembalikan sebagai JSON
    }
    public function preview($id)
    {
        $history = ModelsHistory::findOrFail($id); // Ambil data history berdasarkan ID

        // Load view PDF dengan data history
        $pdf = Pdf::loadView('history.pdf', compact('history'));

        // Menampilkan PDF sebagai preview di browser
        return $pdf->stream('history-preview.pdf');
    }

    public function destroy($id)
    {
        $history = ModelsHistory::findOrFail($id);
        $history->delete();

        return redirect()->route('history.index')->with('success', 'Data berhasil dihapus.');
    }
    //
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'age' => 'required|integer',
            'sleep_duration' => 'required|numeric',
            'physical_activity_level' => 'required|integer',
            'heart_rate' => 'required|integer',
            'daily_steps' => 'required|integer',
            'sistolik' => 'required|integer',
            'diastolik' => 'required|integer',
            'gender' => 'required|string',
            'occupation' => 'required|string',
            'bmi_category' => 'required|string',
            'quality_of_sleep' => 'required|integer',
            'stress_level' => 'required|integer',
        ]);

        // Data yang akan dikirim ke API Flask
        $features = [
            (int) $request->age,
            (float) $request->sleep_duration,
            (int)$request->physical_activity_level,
            (int)$request->heart_rate,
            (int)$request->daily_steps,
            (int)$request->sistolik,
            (int)$request->diastolik,
            $request->gender,
            $request->occupation,
            $request->bmi_category,
            (int)$request->quality_of_sleep,
            (int)$request->stress_level
        ];
        // dd([
        //     'features' => $features
        // ]);
        // Kirim data ke API Flask
        try {
            $response = Http::post('http://127.0.0.1:5000/predict', [
                'features' => $features
            ]);

            if ($response->successful()) {
                $result = $response->json();
                // dd($result);
                $prediction = $result['categories']; // Ambil kategori prediksi pertama
                $bmi = $result['bmi']; // Ambil kategori prediksi pertama
                $gender = $result['gender']; // Ambil kategori prediksi pertama
                $occupation = $result['occupation']; // Ambil kategori prediksi pertama
                $confidence = $result['confidences']; // Ambil keyakinan prediksi pertama
            } else {
                return response()->json([
                    'message' => 'Prediction API error',
                    'error' => $response->body()
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Unable to connect to Prediction API',
                'error' => $e->getMessage()
            ], 500);
        }

        // Simpan data ke database
        $history =new ModelsHistory();
        $history->age = $request->age;
        $history->sleep_duration = $request->sleep_duration;
        $history->physical_activity_level = $request->physical_activity_level;
        $history->heart_rate = $request->heart_rate;
        $history->daily_steps = $request->daily_steps;
        $history->sistolik = $request->sistolik;
        $history->diastolik = $request->diastolik;
        $history->gender = $gender;
        $history->occupation = $occupation;
        $history->bmi_category = $bmi;
        $history->quality_of_sleep = $request->quality_of_sleep;
        $history->stress_level = $request->stress_level;
        $history->sleep_disorder = $prediction; // Tambahkan kolom keyakinan
        $history->save();

        return redirect()->back()->with([
            'prediction' => $prediction,
            // 'confidence' => $confidence
        ]);
    }
}
