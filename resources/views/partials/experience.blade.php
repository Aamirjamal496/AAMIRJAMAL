@extends('layouts.app')
@section('title','Experience')
@section('content')
<!-- Experience Section -->
<section id="experience" class="py-20 px-4">
    <div class="max-w-6xl mx-auto">

        <div class="text-center mb-20">
            <p class="text-purple-400 uppercase tracking-widest font-semibold mb-4">
                Experience
            </p>

            <h2 class="text-5xl font-black">
                Work Journey
            </h2>
        </div>

        <div class="space-y-10">
            @foreach($experiences as $experience)
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-3xl">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <h3 class="text-2xl font-bold">{{$experience->title}}</h3>
                        <p class="text-purple-400">{{$experience->company_name}}</p>
                    </div>

                    <span class="px-5 py-2 bg-purple-500/20 rounded-full text-sm">
                        {{$experience->starting_date}} - {{$experience->completion_date}}
                    </span>
                </div>

                <p class="text-gray-400 mt-6 leading-relaxed">
                    {{$experience->responsibilities}}
                </p>
            </div>
            @endforeach

            <!-- <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-3xl">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <h3 class="text-2xl font-bold">Frontend Developer</h3>
                        <p class="text-pink-400">Software House</p>
                    </div>

                    <span class="px-5 py-2 bg-pink-500/20 rounded-full text-sm">
                        2023 - 2024
                    </span>
                </div>

                <p class="text-gray-400 mt-6 leading-relaxed">
                    Designed interactive UI layouts and improved website performance with responsive and animated frontend components.
                </p>
            </div> -->

        </div>

    </div>
</section>
@endsection