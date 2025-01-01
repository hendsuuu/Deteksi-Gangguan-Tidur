@extends('layouts.app')
@section('content')
    <main class="container h-screen mx-auto px-[100px] gap-[50px] flex flex-col justify-center items-center lg:flex-row justify-center items-center">
        <!-- Text Section -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <h2 class="text-purple-600 text-lg font-medium">Halo, selamat datang di SleepGuard.</h2>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mt-4">Tidur nyenyak adalah kunci kesehatan yang optimal</h1>
            <p class="text-gray-600 mt-4">Mulailah perjalanan anda menuju tidur yang lebih baik.</p>
            <div class="button flex justify-start mt-6">
                <a href="#" class="flex w-50 gap-3 mt-6 px-6 py-3 bg-purple-600 text-white font-medium rounded-full shadow-md hover:bg-purple-700 transition"><span><img src="{{asset('image/arrow.png')}}" alt=""></span>Get Started</a>
            </div>
        </div>
        <!-- Image Section -->
        <div class="w-1/2  lg:w-1/2 mt-8 lg:mt-0">
            <img src="{{asset('image/hero.png')}}" alt="Tidur Nyenyak" class="w-full max-w-md mx-auto lg:mx-0">
        </div>

        
    </main>
@endsection