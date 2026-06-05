@extends("admin.dashboard")
@section("title","Skills")
@section("Elements")
<!-- Skills -->
<!-- Add Skill Modal -->
@if(session()->has("success"))
@endif
<div id="skillModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50 px-4">

    <div class="w-full max-w-lg bg-slate-900 border border-white/10 rounded-2xl p-6 relative">

        <button onclick="closeModal('skillModal')"
            class="absolute top-4 right-4 w-10 h-10 rounded-xl bg-red-500/20">

            <i class="fa-solid fa-xmark text-red-400"></i>

        </button>

        <h2 class="text-2xl font-bold mb-8">
            Add New Skill
        </h2>

        <form action="/Addskill" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="text-sm text-gray-300 block mb-2">
                    Skill Name
                </label>

                <input type="text" name="skillname"
                    placeholder="Laravel"
                    class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">
            </div>

            <div>
                <label class="text-sm text-gray-300 block mb-2">
                    Skill Percentage
                </label>

                <input type="range" min="0" max="100" name="skillproficiency"
                    class="w-full accent-purple-500">
            </div>

            <div>
                <label class="text-sm text-gray-300 block mb-2">
                    Icon Class
                </label>

                <input type="text" name="iconclass"
                    placeholder="fa-brands fa-laravel"
                    class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">
            </div>

            <button
                class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold">
                Save Skill
            </button>

        </form>

    </div>

</div>

<div class="tab-content" id="skills">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-lg">

        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-black">
                Skills
            </h2>

            <button onclick="openModal('skillModal')" class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600">
                Add Skill
            </button>

        </div>

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($skills as $skill)
            <div class="bg-black/30 border border-white/10 rounded-2xl p-6 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-xl">{{$skill->name}}</h3>
                    <p class="text-gray-400">{{$skill->percentage}}%</p>
                </div>

                <div class="flex gap-3">
                    <button onclick="openModal('EditskillModal')" class="w-10 h-10 rounded-xl bg-blue-500/20">
                        <i class="fa-solid fa-pen text-blue-400"></i>
                    </button>
                    <form action="{{url('/delete-skill/'.$skill->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button onclick="confirm('Are You Sure To Delete This Skill')" class="w-10 h-10 rounded-xl bg-red-500/20">
                            <i class="fa-solid fa-trash text-red-400"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Edit Skill Modal -->
            <div id="EditskillModal"
                class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50 px-4">

                <div class="w-full max-w-lg bg-slate-900 border border-white/10 rounded-2xl p-6 relative">

                    <button onclick="closeModal('skillModal')"
                        class="absolute top-4 right-4 w-10 h-10 rounded-xl bg-red-500/20">

                        <i class="fa-solid fa-xmark text-red-400"></i>

                    </button>

                    <h2 class="text-2xl font-bold mb-8">
                        Edit Skill
                    </h2>

                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="text-sm text-gray-300 block mb-2">
                                Skill Name
                            </label>

                            <input type="text" name="skillname"
                                placeholder="Laravel"
                                class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">{{$skill->name}}</inpug>
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 block mb-2">
                                Skill Percentage
                            </label>

                            <input type="range" min="0" max="100" name="skillproficiency"
                                class="w-full accent-purple-500">{{$skill->percentage}}</input>
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 block mb-2">
                                Icon Class
                            </label>

                            <input type="text" name="iconclass"
                                placeholder="fa-brands fa-laravel"
                                class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">{{$skill->iconclass}}</input>
                        </div>

                        <button
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold">
                            Update Skill
                        </button>

                    </form>

                </div>

            </div>
            @endforeach

            <!-- <div class="bg-black/30 border border-white/10 rounded-2xl p-6 flex justify-between items-center">
                                <div>
                                    <h3 class="font-bold text-xl">React JS</h3>
                                    <p class="text-gray-400">90%</p>
                                </div>

                                <div class="flex gap-3">
                                    <button class="w-10 h-10 rounded-xl bg-blue-500/20">
                                        <i class="fa-solid fa-pen text-blue-400"></i>
                                    </button>

                                    <button class="w-10 h-10 rounded-xl bg-red-500/20">
                                        <i class="fa-solid fa-trash text-red-400"></i>
                                    </button>
                                </div>
                            </div> -->
        </div>

    </div>

</div>
@endsection