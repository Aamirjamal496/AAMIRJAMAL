@extends('layouts.app')
@section('title','About US')
@section('content')
<!-- About Section -->
<section id="about" class="py-20 px-4 relative overflow-hidden">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
        @foreach($users as $user)
        <!-- Image -->
        <div data-aos="fade-right" class="relative">
            <div class="relative inset-0 bg-gradient-to-r from-purple-500 to-pink-500 blur-3xl opacity-20 rounded-full"></div>

            <img src="{{asset('storage/'.$user->image)}}"
                class=" z-10 rounded-3xl shadow-2xl border border-purple-500/20 h-96" alt='{{$user->name}}'>

            <div class="absolute  -bottom-6 -right-6 bg-gradient-to-r from-purple-600 to-pink-600 p-6 rounded-2xl shadow-2xl">
                <h3 class="text-3xl font-bold">1</h3>
                <p class="text-sm text-gray-200">Years Experience</p>
            </div>
        </div>

        <!-- Content -->
        <div data-aos="fade-left" class="space-y-8">
            <div>
                <p class="text-purple-400 font-semibold uppercase tracking-widest mb-3">
                    About Me
                </p>

                <h2 class="text-5xl font-black leading-tight">
                    {{$user->profession}}
                </h2>
            </div>

            <p class="text-gray-300 text-lg leading-relaxed">
                {{$user->about}}
            </p>

            <div class="grid grid-cols-2 gap-6">

                <div class="bg-white/5 backdrop-blur-lg p-6 rounded-2xl border border-white/10">
                    <i class="fa-solid fa-code text-3xl text-purple-400 mb-4"></i>
                    <h4 class="font-bold text-xl mb-2">Frontend</h4>
                    <p class="text-gray-400 text-sm">
                        Tailwind, Bootstrap, JavaScript, Laravel Blade, React
                    </p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-6 rounded-2xl border border-white/10">
                    <i class="fa-solid fa-server text-3xl text-pink-400 mb-4"></i>
                    <h4 class="font-bold text-xl mb-2">Backend</h4>
                    <p class="text-gray-400 text-sm">
                        Laravel, APIs, MySQL
                    </p>
                </div>

            </div>

            <a href="/contact"
                class="inline-block px-8 py-4 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold hover:scale-105 transition duration-300">
                Hire Me
            </a>
        </div>
        @endforeach

    </div>
</section>
@endsection