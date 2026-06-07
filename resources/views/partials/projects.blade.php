@extends('layouts.app')
@section('title','projects')
@section('content')
<!-- Projects Section -->
<section id="projects" class="py-20 px-4 bg-black/40">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-20">
            <p class="text-purple-400 uppercase tracking-widest font-semibold mb-4">
                Portfolio
            </p>

            <h2 class="text-5xl font-black">
                Featured Projects
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach($projects as $project)
            <!-- Project Card -->
            <div class="bg-white/5 rounded-3xl overflow-hidden border border-white/10 backdrop-blur-lg group">

                <!-- Carousel -->
                <div class="relative overflow-hidden">

                    <div class="project-carousel flex transition-transform duration-500">
                        @foreach($project->projectimages as $image)
                        <img src="{{asset('storage/'.$image->images)}}"
                            class="w-full h-72 object-cover flex-shrink-0">
                        @endforeach

                    </div>

                    <button class="prev absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 w-10 h-10 rounded-full">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>

                    <button class="next absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 w-10 h-10 rounded-full">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>

                </div>

                <!-- Content -->
                <div class="p-8 space-y-5">
                    <h3 class="text-3xl font-bold">
                        {{$project->project_name}}
                    </h3>

                    <p class="text-gray-400 leading-relaxed">
                        {{$project->description}}
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <span class="px-4 py-2 rounded-full bg-purple-500/20 text-sm">{{$project->technologies}}</span>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

    </div>

    </div>
</section>
@endsection
@push('scripts')
<script>
    // Project Carousel
    document.querySelectorAll('.project-carousel').forEach(carousel => {

        let index = 0;

        const images = carousel.querySelectorAll('img');

        const prevBtn = carousel.parentElement.querySelector('.prev');
        const nextBtn = carousel.parentElement.querySelector('.next');

        function updateCarousel() {
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        nextBtn.addEventListener('click', () => {
            index = (index + 1) % images.length;
            updateCarousel();
        });

        prevBtn.addEventListener('click', () => {
            index = (index - 1 + images.length) % images.length;
            updateCarousel();
        });

    });
</script>
@endpush