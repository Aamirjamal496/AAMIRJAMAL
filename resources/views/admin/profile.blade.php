@extends("admin.dashboard")
<!-- @section("title","Profile") -->
@section("Elements")
<!-- Profile -->
<div class="tab-content active-content" id="profile">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-lg">

        <div class="flex flex-col md:flex-row gap-10 items-center">
            <form action="/edit-pass" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT" />

                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400"
                        class="w-40 h-40 rounded-2xl object-cover border-4 border-purple-500/30">

                    <button class="absolute bottom-2 right-2 w-12 h-12 rounded-2xl bg-purple-600">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                </div>

                <div class="flex-1 w-full">

                    <h2 class="text-3xl font-black mb-8">
                        Update Profile
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        <input type="text"
                            placeholder="Full Name"
                            class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                        <input type="email"
                            placeholder="Email Address"
                            class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                        <input type="text"
                            placeholder="Profession"
                            class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                        <input type="text"
                            placeholder="Phone Number"
                            class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                    </div>

                    <textarea rows="5"
                        placeholder="About Yourself"
                        class="w-full mt-6 px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500"></textarea>



                    <input type="password"
                        placeholder="New Password"
                        class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                    <input type="password"
                        placeholder="Confirm Password"
                        class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">


                    <button
                        class="mt-6 px-8 py-4 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold">
                        Save Changes
                    </button>

                </div>
            </form>
        </div>

    </div>

</div>
@endsection