@extends('layouts.app')
@section('title','Skills')
@section('content')
<!-- Skills Section -->
<section id="skills" class="py-50 px-4 bg-black/40">
    <div class="max-w-7xl mx-auto">

        <!-- Heading -->
        <div class="text-center mb-16" data-aos="fade-up">
            <p class="text-purple-400 uppercase tracking-[0.3em] font-semibold mb-4">
                My Skills
            </p>

            <h2 class="text-4xl md:text-5xl font-black">
                Technologies I Use
            </h2>

            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
                Technologies, frameworks and tools I use to build modern web applications.
            </p>
        </div>

        @if(count($skills) < 1)

            <div class="text-center">
            <span class="text-red-500">
                No Skills Found
            </span>
    </div>

    @else

    <!-- Skills Cloud -->
    <div class="flex flex-wrap justify-center gap-3 md:gap-4">

        @foreach($skills as $skill)

        <div
            class="group flex items-center gap-3 px-4 py-2.5 rounded-full bg-white/5 border border-white/10 hover:border-purple-500/40 hover:bg-purple-500/10 transition-all duration-300">

            <i class="fa-brands {{$skill->iconclass}} text-sm md:text-base "></i>

            <span class="text-sm md:text-base font-medium">
                {{$skill->name}}
            </span>

        </div>

        @endforeach

    </div>

    @endif

    </div>
</section>
@endsection
@push('scripts')
// Skills Animation
const skillBars = document.querySelectorAll('.skill-bar');

const skillsObserver = new IntersectionObserver((entries) => {
entries.forEach(entry => {
if(entry.isIntersecting){
const bars = entry.target.querySelectorAll('.skill-bar');

bars.forEach(bar => {
bar.style.width = bar.dataset.width;
});
}
});
});

const skillsSection = document.querySelector('#skills');

if(skillsSection){
skillsObserver.observe(skillsSection);
}

@endpush