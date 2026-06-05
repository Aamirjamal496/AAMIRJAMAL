@extends("admin.dashboard")
@section("title","Experience")
@section("Elements")
<!-- Experience -->
 <!-- Experience Modal -->
  @if(session()->has('success'))
  @endif
  @if(session()->has('failed'))
  @endif
                <div id="experienceModal"
                    class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50 px-4">

                    <div class="w-full max-w-2xl bg-slate-900 border border-white/10 rounded-2xl p-6 relative">

                        <button onclick="closeModal('experienceModal')"
                            class="absolute top-4 right-4 w-10 h-10 rounded-xl bg-red-500/20">

                            <i class="fa-solid fa-xmark text-red-400"></i>

                        </button>

                        <h2 class="text-3xl font-bold mb-8">
                            Add Experience
                        </h2>

                        <form action='/add-experience' class="space-y-5" method='POST'>
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <label class="text-sm text-gray-300 block mb-2">
                                        Job Title
                                    </label>

                                    <input type="text" name='Title'
                                        placeholder="Full Stack Developer"
                                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10">
                                </div>

                                <div>
                                    <label class="text-sm text-gray-300 block mb-2">
                                        Company Name
                                    </label>

                                    <input type="text" name='CompanyName'
                                        placeholder="Software House"
                                        class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10">
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <input type="date" name='startdate'
                                    class="px-5 py-3 rounded-xl bg-black/30 border border-white/10">

                                <input type="date" name='enddate'
                                    class="px-5 py-3 rounded-xl bg-black/30 border border-white/10">

                            </div>

                            <textarea rows="5" name='responsibilities'
                                placeholder="Describe your responsibilities..."
                                class="w-full px-5 py-3 rounded-xl bg-black/30 border border-white/10"></textarea>

                            <button
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 font-semibold">
                                Save Experience
                            </button>

                        </form>

                    </div>

                </div>
                <div class="tab-content" id="experience">

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-lg">

                        <div class="flex justify-between items-center mb-10">
                            <h2 class="text-3xl font-black">
                                Experience
                            </h2>

                            <button onclick="openModal('experienceModal')"
                                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600">
                                Add Experience
                            </button>
                        </div>

                        <div class="space-y-6">
                            @foreach($experiences as $experience)
                            <div class="bg-black/30 border border-white/10 rounded-2xl p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold">
                                            {{$experience->title}}
                                        </h3>

                                        <p class="text-purple-400">
                                            {{$experience->company_name}}
                                        </p>
                                    </div>

                                    <div class="flex gap-3">
                                        <button class="w-10 h-10 rounded-xl bg-blue-500/20">
                                            <i class="fa-solid fa-pen text-blue-400"></i>
                                        </button>
                                        
                                        <form action="{{url('/delete-experience/'.$experience->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" valur='DELETE'/>
                                            <button class="w-10 h-10 rounded-xl bg-red-500/20">
                                                <i class="fa-solid fa-trash text-red-400"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <p class="text-gray-400">
                                    {{$experience->responsibilities}}
                                </p>
                            </div>
                            @endforeach

                        </div>

                    </div>

                </div>
@endsection