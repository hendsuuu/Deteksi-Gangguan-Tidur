@extends('layouts.app')
@section('content')
    <div class="container mt-[50px] mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">History</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Hasil</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $history)
                <tr class="bg-white text-black font-semibold border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $history->sleep_disorder }}</td>
                    <td class="px-6 py-4">{{ $history->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <button data-modal-target="detail-modal{{$history->id}}" data-modal-toggle="detail-modal{{$history->id}}" type="button" class="text-black bg-[#FFF0BB] hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Lihat</button>
                        <a target="_blank" href="{{ route('history.download', $history->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Download</a>
                        <form action="{{ route('history.destroy', $history->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-modal-target="delete-modal{{$history->id}}" data-modal-toggle="delete-modal{{$history->id}}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            <div id="delete-modal{{$history->id}}" tabindex="-1" aria-hidden="true" class="hidden h-screen bg-black bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Konfirmasi Hapus
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal{{$history->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <p>Apakah Anda yakin ingin menghapus riwayat ini?</p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="delete-modal{{$history->id}}">
                                            Batal
                                        </button>
                                        <button type="submit" class="ml-2 py-2.5 px-5 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- Delete Modal -->
                        
                            {{-- <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button> --}}
                        </form>
                    </td>
                </tr>
                <!-- Modal -->
                <div id="detail-modal{{$history->id}}" tabindex="-1" aria-hidden="true" class="hidden h-screen bg-black bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Detail Riwayat Prediksi
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-modal{{$history->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="flex items-center justify-between p-4 md:p-5 space-x-4">
                                <!-- Bagian Kiri -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p><strong>Tanggal:</strong> <span class="text-black">{{ $history->created_at->format('d/m/Y') }}</span></p>
                                    <p><strong>Gangguan Tidur:</strong> <span class="text-black">{{ $history->sleep_disorder }}</span></p>
                                    <p><strong>Usia:</strong> <span class="text-black">{{ $history->age }}</span></p>
                                    <p><strong>Durasi Tidur:</strong> <span class="text-black">{{ $history->sleep_duration }}</span> jam</p>
                                    <p><strong>Level Aktivitas Fisik:</strong> <span class="text-black">{{ $history->physical_activity_level }}</span></p>
                                    <p><strong>Detak Jantung:</strong> <span class="text-black">{{ $history->heart_rate }}</span> bpm</p>
                                    <p><strong>Langkah Harian:</strong> <span class="text-black">{{ $history->daily_steps }}</span> langkah</p>
                                </div>

                                <!-- Bagian Kanan -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p><strong>Sistolik:</strong> <span class="text-black">{{ $history->sistolik }}</span> mmHg</p>
                                    <p><strong>Diastolik:</strong> <span class="text-black">{{ $history->diastolik }}</span> mmHg</p>
                                    <p><strong>Jenis Kelamin:</strong> <span class="text-black">{{ $history->gender }}</span></p>
                                    <p><strong>Pekerjaan:</strong> <span class="text-black">{{ $history->occupation }}</span></p>
                                    <p><strong>Kategori BMI:</strong> <span class="text-black">{{ $history->bmi_category }}</span></p>
                                    <p><strong>Kualitas Tidur:</strong> <span class="text-black">{{ $history->quality_of_sleep }}</span></p>
                                    <p><strong>Level Stres:</strong> <span class="text-black">{{ $history->stress_level }}</span></p>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="detail-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $histories->links() }}
    </div>
</div>


<!-- Main modal -->



    
@endsection