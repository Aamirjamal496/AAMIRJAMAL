@extends("admin.dashboard")
@section("title","Settings")
@section("Elements")
<!-- Settings -->
<div class="tab-content " id="settings">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-lg h-140">

        <form action="{{url('/edit-pass/'.)}}" method="post">
            <h2 class="text-3xl font-black mb-10">
                Settings
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <input type="password"
                    placeholder="New Password"
                    class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

                <input type="password"
                    placeholder="Confirm Password"
                    class="px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">

            </div>

            <button
                class="mt-8 px-8 py-4 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600">
                Update Settings
            </button>
        </form>

    </div>

</div>
@endsection