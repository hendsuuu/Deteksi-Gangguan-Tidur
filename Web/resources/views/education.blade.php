@extends('layouts.app')
@section('content')
    <div class="w-full p-[100px]">
        <!-- Section Title -->
        <h1 class="text-lg font-semibold text-gray-800 mb-6">Education</h1>
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Beberapa Artikel untuk anda:</h1>
        
        <!-- Articles Grid -->
        <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-red-300">
                <img src="{{asset('image/card.png')}}" alt="Image 1" class="w-full h-36 object-cover">
                <div class="p-4">
                    <h2 class="text-sm text-gray-600 mb-2">Halodoc</h2>
                    <p class="text-lg font-bold text-black mb-1">Penurunan kesehatan akibat tidur yang salah</p>
                    <p class="text-sm text-gray-500">
                        Pola tidur yang tidak teratur atau berkualitas buruk dapat membawa dampak serius bagi kesehatan fisik dan mental.
                    </p>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-red-300">
                <img src="{{asset('image/card (1).png')}}" alt="Image 2" class="w-full h-36 object-cover">
                <div class="p-4">
                    <h2 class="text-sm text-gray-600 mb-2">SATUSEHAT</h2>
                    <p class="text-lg font-bold text-black mb-1">Bahaya Insomnia</p>
                    <p class="text-sm text-gray-500">
                        Insomnia dapat memiliki berbagai dampak negatif pada kesehatan fisik dan mental seseorang.
                    </p>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-red-300">
                <img src="{{asset('image/card (2).png')}}" alt="Image 3" class="w-full h-36 object-cover">
                <div class="p-4">
                    <h2 class="text-sm text-gray-600 mb-2">Alodokter</h2>
                    <p class="text-lg font-bold text-black mb-1">Mengapa Susah Tidur?</p>
                    <p class="text-sm text-gray-500">
                        Susah tidur atau insomnia adalah masalah umum yang dapat disebabkan oleh berbagai faktor.
                    </p>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-red-300">
                <img src="{{asset('image/card (3).png')}}" alt="Image 4" class="w-full h-36 object-cover">
                <div class="p-4">
                    <h2 class="text-sm text-gray-600 mb-2">KlikDokter</h2>
                    <p class="text-lg font-bold text-black mb-1">Tips Tidur Lebih Tepat</p>
                    <p class="text-sm text-gray-500">
                        Tidur tepat waktu memiliki peran vital dalam menjaga kesehatan tubuh dan kesejahteraan mental.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
