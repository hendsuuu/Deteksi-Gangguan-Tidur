<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white">
    <header class="bg-[#4426CEBF] fixed top-0 w-full text-white py-4" style="z-index: 1000;">
        <div class="container mx-auto flex justify-start items-center px-4">
            <div class="logo w-2/4 flex items-center gap-2">
                <img src="{{asset('image/Group.png')}}" class="w-[20px] h-[20px]" alt="Sleepguard">
                <h1 class="text-xl font-semibold">SleepGuard</h1>
            </div>
            <nav>
                <ul class="flex w-2/4 justify-center items-center space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-200">Home</a></li>
                    <li><a href="{{ route('deteksi') }}" class="hover:text-gray-200">Deteksi</a></li>
                    <li><a href="{{ route('education') }}" class="hover:text-gray-200">Edukasi</a></li>
                    <li><a href="{{ route('history.index') }}" class="hover:text-gray-200">Riwayat</a></li>
                    <li><a href="{{ route('bantuan') }}" class="hover:text-gray-200">Bantuan</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
</body>
</html>