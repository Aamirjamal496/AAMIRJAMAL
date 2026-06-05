@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center justify-center pt-10 px-4 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60"></div>
        <div class="absolute top-0 left-0 w-full h-full particles"></div>
    </div>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center z-10">
        <!-- Hero Content -->
        @foreach($users as $user)
        <div data-aos="fade-right" class="space-y-8">
            <div class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 rounded-full text-sm font-semibold">
                Welcome to My Portfolio
            </div>
            <h1 class="text-4xl md:text-6xl font-black bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent leading-tight">
                Hi, I'm <span class="text-transparent bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text">{{$user->name}}</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-lg leading-relaxed">
                {{$user->profession}}
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="/projects" class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl font-semibold text-lg shadow-2xl hover:shadow-purple-500/25 transform hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-purple-700 to-pink-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                    <span class="relative z-10">View My Work</span>
                </a>
                <a href="/contact" class="px-8 py-4 border-2 border-purple-500/50 rounded-2xl font-semibold text-lg hover:bg-purple-500/20 backdrop-blur-sm transition-all duration-300 hover:border-purple-400">
                    Get In Touch
                </a>
            </div>
        </div>

        <!-- Hero Image -->
        <div data-aos="fade-left" data-aos-delay="200" class="relative">
            <div class="relative z-20">
                <img src="{{asset('storage/'.$user->image)}}"
                    alt="Profile"
                    class="w-60 h-60 md:w-72 md:h-72 object-cover rounded-3xl shadow-2xl border-4 border-purple-500/30 mx-auto">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl animate-pulse"></div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 px-4 bg-black/50">
    <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8 text-center">
        <div data-aos="fade-up" data-aos-delay="100">
            <div class="text-4xl font-bold text-purple-400 mb-2" data-target="50">0</div>
            <div class="text-gray-400">Projects</div>
        </div>
        <div data-aos="fade-up" data-aos-delay="200">
            <div class="text-4xl font-bold text-pink-400 mb-2" data-target="3">0</div>
            <div class="text-gray-400">Years Exp</div>
        </div>
        <div data-aos="fade-up" data-aos-delay="300">
            <div class="text-4xl font-bold text-blue-400 mb-2" data-target="100">0</div>
            <div class="text-gray-400">Happy Clients</div>
        </div>
        <div data-aos="fade-up" data-aos-delay="400">
            <div class="text-4xl font-bold text-green-400 mb-2" data-target="10">0</div>
            <div class="text-gray-400">Awards</div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Animate stats
    function animateStats() {
        const stats = document.querySelectorAll('[data-target]');
        stats.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-target'));
            const increment = target / 100;
            let current = 0;

            const updateStat = () => {
                if (current < target) {
                    current += increment;
                    stat.textContent = Math.floor(current);
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = target;
                }
            };
            updateStat();
        });
    }

    // Intersection Observer for stats animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                observer.unobserve(entry.target);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const statsSection = document.querySelector('.py-16');
        if (statsSection) observer.observe(statsSection);
    });
</script>
@endpush