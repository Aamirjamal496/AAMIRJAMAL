@extends('layouts.app')
@section('title','Skills')
@section('content')
<!-- Skills Section -->
<section id="skills" class="py-20 px-4 bg-black/40">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-20" data-aos="fade-up">
            <p class="text-purple-400 uppercase tracking-widest font-semibold mb-4">
                My Skills
            </p>

            <h2 class="text-5xl font-black">
                Technologies I Use
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-10">
            @foreach($skills as $skill)
            <!-- Left -->
            <div class="space-y-6">

                <div>
                    <div class="flex justify-between mb-2">
                        <span>{{$skill->name}}</span>
                        <span>{{$skill->percentage}}</span>
                    </div>

                     <div class="h-3 bg-gray-700 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"
                            data-width="{{$skill->percentage}}%"></div>
                    </div>
                </div>

                <!-- <div>
                    <div class="flex justify-between mb-2">
                        <span>JavaScript</span>
                        <span>90%</span>
                    </div>

                    <div class="h-3 bg-gray-700 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"
                            data-width="90%"></div>
                    </div>
                </div> -->

                <!-- <div>
                    <div class="flex justify-between mb-2">
                        <span>React JS</span>
                        <span>85%</span>
                    </div>

                    <div class="h-3 bg-gray-700 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full"
                            data-width="85%"></div>
                    </div>
                </div> -->

            </div>

            <!-- Right -->
            <div class="grid grid-cols-2 gap-6">

                <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300">
                    <i class="fa-brands {{$skill->iconclass}} text-5xl text-red-500 mb-4"></i>
                    <h4 class="font-bold text-xl">{{$skill->name}}</h4>
                </div>

                <!-- <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300">
                    <i class="fa-brands fa-react text-5xl text-cyan-400 mb-4"></i>
                    <h4 class="font-bold text-xl">React</h4>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300">
                    <i class="fa-brands fa-js text-5xl text-yellow-400 mb-4"></i>
                    <h4 class="font-bold text-xl">JavaScript</h4>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300">
                    <i class="fa-solid fa-database text-5xl text-purple-400 mb-4"></i>
                    <h4 class="font-bold text-xl">MySQL</h4>
                </div> -->

            </div>
            @endforeach
        </div>

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