@extends('layouts.app')
@section('content')
    <div class="w-full h-screen mt-[100px] flex justify-start gap-[200px] items-center bg-white rounded-lg ">
        <div class="form w-2/3 h-full px-[100px]">
            <h1 class="text-2xl font-bold text-left mb-6">Deteksi Gangguan Tidur</h1>
            <form action="{{ route('deteksi.process') }}" method="POST" class="grid grid-cols-2 gap-4">
                @csrf
                <!-- Masukan Umur -->
                <div>
                    <div>
                        <label for="umur" class="block text-sm font-medium text-gray-700">Masukan Umur:</label>
                        <input type="number" id="umur" name="age" placeholder="Masukkan Umur" class="mt-1 p-5 mb-[20px] block w-50 h-8 border-black border-2 rounded-md shadow-sm focus:ring-black-500 focus:border-black-500">
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Pilih Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="gender" class="mt-1 text-black block block w-[225px] h-[43px] mb-[20px] rounded-md border-black border-2 border-black-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Masukan Pekerjaan:</label>
                        {{-- <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500"> --}}
                        <select id="pekerjaan" name="occupation" class="mt-1 block block w-[225px] h-[43px] mb-[20px] rounded-md border-black border-2 border-black-300 shadow-sm">
                            <option value="Software Engineer">Software Engineer</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Sales Representative">Sales Representative</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Scientist">Scientist</option>
                            <option value="Lawyer">Lawyer</option>
                            <option value="Salesperson">Salesperson</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
                    <div>
                        <label for="bmi" class="block text-sm font-medium text-gray-700">Kategori BMI:</label>
                        {{-- <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500"> --}}
                        <select id="bmi" name="bmi_category" class="mt-1 block block w-[225px] h-[43px] mb-[20px] rounded-md border-black border-2 border-black-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="Overweight">Overweight</option>
                            <option value="Normal">Normal</option>
                            <option value="Obese">Obese</option>
                            <option value="Normal Weight">Normal Weight</option>
                        </select>
                    </div>
                    <div>
                        <label for="tingkat_stress" class="block text-sm font-medium text-gray-700">Masukan Tingkat Stress (0-10):</label>
                        <input type="number" placeholder="(0-10)" id="tingkat_stress" name="stress_level" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="detak_jantung" class="block text-sm font-medium text-gray-700">Masukan Detak Jantung:</label>
                        <input type="text" placeholder="Masukkan Detak Jantung" id="detak_jantung" name="heart_rate" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                </div>
                <div>
                    <div>
                        <label for="durasi_tidur" class="block text-sm font-medium text-gray-700">Masukan Durasi Tidur (Jam):</label>
                        <input type="number" placeholder="Masukkan Durasi Tidur" step="0.1" id="durasi_tidur" name="sleep_duration" class="mt-1 border-black border-2 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Masukan Kualitas Tidur -->
                    <div>
                        <label for="kualitas_tidur" class="block text-sm font-medium text-gray-700">Masukan Kualitas Tidur (1-10):</label>
                        <input type="number" placeholder="(1-10)" id="kualitas_tidur" name="quality_of_sleep" class="mt-1 block p-5 block w-50 h-8 mb-[20px] border-black border-2 rounded-md border-black-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Masukan Kualitas Tidur -->
                    <div>
                        <label for="langkah_harian" class="block text-sm font-medium text-gray-700">Masukan Langkah Harian:</label>
                        <input type="number" placeholder="contoh: 10000" id="langkah_harian" name="daily_steps" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Masukan Tingkat Aktivitas -->
                    <div>
                        <label for="tingkat_aktivitas" class="block text-sm font-medium text-gray-700">Masukan Tingkat Aktivitas (0-100):</label>
                        <input type="number" placeholder="(0-100)" id="tingkat_aktivitas" name="physical_activity_level" class="mt-1 block p-5 block w-50 h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    
                    <div class="flex w-[100]">
                        <div>
                            <label for="detak_jantung" class="block text-sm font-medium text-gray-700">Masukan Tekanan Darah (Sistolik):</label>
                            <input type="number" placeholder="" id="detak_jantung" name="sistolik" class="mt-1 block p-5 block w-[100px] h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="detak_jantung" class="block text-sm font-medium text-gray-700">Masukan Tekanan Darah (Diastolik):</label>
                            <input type="number" placeholder="" id="detak_jantung" name="diastolik" class="mt-1 block p-5 block w-[100px] h-8 mb-[20px] rounded-md border-black border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Masukan Detak Jantung -->
                    
                    <div class="flex w-[100] gap-5">
                        <!-- Tombol Submit -->
                        <div class="">
                            <button type="submit" class="bg-white-500 text-black mt-1  border-[#FF0004] border-2 px-4 py-2 rounded-md shadow-md hover:bg-red-600">Predict</button>
                        </div>
                        {{-- @if(session('prediction')) --}}
                        <div class="alert text-bold alert-success">
                            <p>Prediksi: {{ session('prediction') }}</p>
                            {{-- <p>Keyakinan: {{ session('confidence') }}</p> --}}
                        </div>
                        {{-- @endif --}}

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="analysis w-1/2 h-full mb-[200px] mr-[100px] flex justify-center items-center">
            {{-- <h1 class="text-2xl font-bold mb-6">Analisis Gejala :</h1> --}}
            <div>
                <h1 class="text-2xl font-bold mb-4">Analisis Gejala :</h1>
                <ul class="list-disc ml-6 text-gray-800">
                    @if (session('prediction') == 'Insomnia')
                        <li>Kualitas Tidur: Kualitas tidur sangat rendah, dengan rata-rata di bawah 4 dari skala 1-9.</li>
                        <li>Tingkat Stres: Tingkat stres rata-rata tinggi, sekitar 7.8 dari skala 1-8, menunjukkan tingkat stres berat.</li>
                    @elseif (session('prediction') == 'Normal')
                        <li>Kualitas Tidur: Secara keseluruhan, kualitas tidur cukup baik, dengan rata-rata 7.3 dari skala 1-9.</li>
                        <li>Tingkat Stres: Tingkat stres rata-rata adalah 5.38 dari skala 1-8, menunjukkan tingkat stres sedang.</li>
                    @elseif (session('prediction') == 'Sleep Apnea')
                        <li>Kualitas Tidur: Kualitas tidur terganggu karena gangguan pernapasan, dengan rata-rata 5.0 dari skala 1-9.</li>
                        <li>Tingkat Stres: Tingkat stres cenderung meningkat akibat kurangnya kualitas tidur yang optimal.</li>
                    @else
                        <li>Tidak ada data analisis tersedia.</li>
                    @endif
                </ul>

                <h1 class="text-2xl font-bold mt-6 mb-4">Solusi :</h1>
                <ul class="list-disc ml-6 text-gray-800">
                    @if (session('prediction') == 'Insomnia')
                        <li>Pastikan untuk menjaga rutinitas tidur yang konsisten, seperti tidur dan bangun di jam yang sama setiap hari.</li>
                        <li>Hindari konsumsi kafein atau alkohol sebelum tidur.</li>
                        <li>Cobalah teknik relaksasi seperti meditasi atau pernapasan dalam sebelum tidur.</li>
                    @elseif (session('prediction') == 'Normal')
                        <li>Anda sudah memiliki pola tidur yang baik. Pertahankan rutinitas tidur yang konsisten.</li>
                        <li>Lakukan aktivitas fisik secara teratur untuk menjaga kualitas tidur tetap baik.</li>
                        <li>Kelola stres dengan aktivitas relaksasi atau olahraga ringan.</li>
                    @elseif (session('prediction') == 'Sleep Apnea')
                        <li>Konsultasikan dengan dokter atau spesialis tidur untuk mendapatkan evaluasi lebih lanjut.</li>
                        <li>Pertimbangkan untuk menggunakan alat bantu tidur seperti CPAP jika direkomendasikan oleh dokter.</li>
                        <li>Jaga berat badan sehat dan hindari tidur terlentang untuk mengurangi gejala sleep apnea.</li>
                    @else
                        <li>Tidak ada solusi yang tersedia.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    
@endsection