@extends("admin.dashboard")
@section("title","Projects")

@section("Elements")

<!-- Project Modal -->
<div id="projectModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50 px-4 py-10 overflow-y-auto">

    <div class="w-full max-w-3xl bg-slate-900 border border-white/10 rounded-2xl p-6 relative">

        <button onclick="closeModal('projectModal')"
            class="absolute top-4 right-4 w-10 h-10 rounded-xl bg-red-500/20 hover:bg-red-500/30 transition">
            <i class="fa-solid fa-xmark text-red-400"></i>
        </button>

        <h2 class="text-2xl md:text-3xl font-bold mb-8">
            Add New Project
        </h2>

        <form action="/add-project"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-gray-300 block mb-2">
                        Project Name
                    </label>

                    <input type="text"
                        name="Pname"
                        placeholder="Portfolio Website"
                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-pink-500">
                </div>

                <div>
                    <label class="text-sm text-gray-300 block mb-2">
                        Project Link
                    </label>

                    <input type="text"
                        name="Plink"
                        placeholder="https://"
                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-pink-500">
                </div>

            </div>

            <div>
                <label class="text-sm text-gray-300 block mb-2">
                    Project Description
                </label>

                <textarea rows="4"
                    name="Pdescription"
                    placeholder="Project description..."
                    class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-pink-500"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-gray-300 block mb-2">
                        Technologies
                    </label>

                    <input type="text"
                        name="Ptechnologies"
                        placeholder="Laravel, Tailwind CSS, MySQL"
                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-pink-500">
                </div>

                <div>
                    <label class="text-sm text-gray-300 block mb-2">
                        Upload Images
                    </label>

                    <input type="file"
                        name="images[]"
                        multiple
                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10">
                </div>

            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-pink-600 to-orange-600 font-semibold hover:opacity-90 transition">
                Save Project
            </button>

        </form>

    </div>
</div>

<!-- Projects Section -->
<div class="tab-content" id="projects">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-4 md:p-6 backdrop-blur-lg h-150">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <h2 class="text-2xl md:text-3xl font-black">
                Projects
            </h2>

            <button onclick="openModal('projectModal')"
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-pink-600 to-orange-600 hover:opacity-90 transition">
                Add Project
            </button>

        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">

            @foreach($projects as $project)

            <div
                class="bg-black/30 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-lg flex flex-col hover:border-pink-500/40 hover:-translate-y-1 transition-all duration-300">

                <!-- Image Carousel -->
                <div class="relative overflow-hidden">

                    <div class="project-carousel flex transition-transform duration-500">

                        @foreach($project->projectimages as $image)
                        <img
                            src="{{ asset('storage/'.$image->images) }}"
                            alt="{{ $project->project_name }}"
                            class="w-full h-52 object-cover flex-shrink-0">
                        @endforeach

                    </div>

                    @if(count($project->projectimages) > 1)

                    <button
                        class="prev absolute left-2 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-black/80 transition w-8 h-8 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-angle-left text-sm"></i>
                    </button>

                    <button
                        class="next absolute right-2 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-black/80 transition w-8 h-8 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-angle-right text-sm"></i>
                    </button>

                    @endif

                </div>

                <!-- Content -->
                <div class="p-5 flex flex-col flex-grow">

                    <div class="flex justify-between items-start gap-3 mb-3">

                        <h3 class="text-lg font-bold line-clamp-1">
                            {{ $project->project_name }}
                        </h3>

                        <div class="flex gap-2 shrink-0">

                            <!-- Edit Button -->
                            <!-- <button
                                class="w-9 h-9 rounded-lg bg-blue-500/20 hover:bg-blue-500/30 transition flex items-center justify-center">
                                <i class="fa-solid fa-pen text-blue-400"></i>
                            </button> -->

                            <!-- Delete Button -->
                            <form action="{{ url('/delete-project/'.$project->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="confirm('Are you sure you want to delete this project?')"
                                    class="w-9 h-9 rounded-lg bg-red-500/20 hover:bg-red-500/30 transition flex items-center justify-center">
                                    <i class="fa-solid fa-trash text-red-400"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                    <!-- Description -->
                    <p class="text-gray-400 text-sm leading-relaxed flex-grow line-clamp-4">
                        {{ $project->description }}
                    </p>

                    <!-- Technologies -->
                    @if(!empty($project->technologies))
                    <div class="mt-4">
                        <span class="text-xs text-pink-400">
                            {{ $project->technologies }}
                        </span>
                    </div>
                    @endif

                    <!-- Project Link -->
                    @if(!empty($project->project_link))
                    <div class="mt-4">

                        <a href="{{ $project->project_link }}"
                            target="_blank"
                            class="block text-center py-2.5 rounded-xl bg-gradient-to-r from-pink-600 to-orange-600 font-medium hover:opacity-90 transition">

                            View Project

                        </a>

                    </div>
                    @endif

                </div>

            </div>

            @endforeach

        </div>

        <!-- Empty State -->
        @if(count($projects) == 0)

        <div class="text-center py-16">

            <i class="fa-solid fa-folder-open text-5xl text-gray-500 mb-4"></i>

            <h3 class="text-xl font-semibold mb-2">
                No Projects Found
            </h3>

            <p class="text-gray-400">
                Click "Add Project" to create your first project.
            </p>

        </div>

        @endif

    </div>

</div>

@endsection