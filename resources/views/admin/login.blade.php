@extends('layouts.app')
@section('title','Login')
@section('content')

<div class="min-h-screen flex items-center justify-center px-4 py-10 overflow-hidden relative bg-purple-600/30">
    @if(session()->has("success"))

    @elseif(session()->has("failed"))
    @endif

    <!-- Background Glow -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-purple-600/20 blur-3xl rounded-full">
    </div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-600/20 blur-3xl rounded-full"></div>

    <!-- Login Card -->
    <div
        class="relative w-full max-w-md bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl p-6 md:p-8 shadow-2xl">

        <!-- Logo -->
        <div class="text-center mb-8">

            <div
                class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center shadow-xl mb-5">

                <i class="fa-solid fa-user-shield text-3xl text-white"></i>

            </div>

            <h1
                class="text-3xl md:text-4xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-3">

                Admin Login

            </h1>

            <p class="text-gray-400 text-sm md:text-base">
                Login to manage your portfolio dashboard
            </p>
            @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                <div>
                    <span class="text-red">{{$error}}</span>
                </div>
                @endforeach
            </div>
            @endif

        </div>

        <!-- Form -->
        <form action='/login' class="space-y-5" method="POST">
            @csrf
            <!-- Email -->
            <div>

                <label class="text-sm text-gray-400 mb-2 block">
                    Email Address
                </label>

                <div
                    class="flex items-center gap-3 bg-black/20 border border-white/10 rounded-2xl px-4 focus-within:border-purple-500 transition">

                    <i class="fa-solid fa-envelope text-purple-400"></i>

                    <input type="email" name='email'
                        placeholder="Enter your email"
                        class="w-full bg-transparent py-3 outline-none text-white placeholder-gray-500">

                </div>

            </div>

            <!-- Password -->
            <div>

                <label class="text-sm text-gray-400 mb-2 block">
                    Password
                </label>

                <div
                    class="flex items-center gap-3 bg-black/20 border border-white/10 rounded-2xl px-4 focus-within:border-purple-500 transition">

                    <i class="fa-solid fa-lock text-pink-400"></i>

                    <input type="password" name='password'
                        placeholder="Enter your password"
                        class="w-full bg-transparent py-3 outline-none text-white placeholder-gray-500">

                    <button type="button" id="togglePassword">

                        <i class="fa-solid fa-eye text-gray-400"></i>

                    </button>

                </div>

            </div>

            <!-- Remember -->
            <!-- <div class="flex items-center justify-between text-sm">

                <label class="flex items-center gap-2 text-gray-400 cursor-pointer">

                    <input type="checkbox"
                        class="accent-purple-500 w-4 h-4">

                    Remember Me

                </label>

                <a href="#"
                    class="text-purple-400 hover:text-purple-300 transition">

                    Forgot Password?

                </a>

            </div> -->

            <!-- Login Button -->
            <button
                class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold text-white hover:scale-[1.02] active:scale-100 transition-all duration-300 shadow-xl hover:shadow-purple-500/20">

                Login

            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center gap-4 my-7">

            <div class="flex-1 h-px bg-white/10"></div>

            <span class="text-gray-500 text-sm">
                Secure Admin Panel
            </span>

            <div class="flex-1 h-px bg-white/10"></div>

        </div>

        <!-- Footer -->
        <div class="text-center">

            <p class="text-gray-500 text-sm">
                Portfolio Management System
            </p>

        </div>

    </div>

</div>


@endsection
@push('scripts')
<script>
    <!-- Scripts 
    -->
    const
    togglePassword
    =
    document.getElementById('togglePassword');
    const
    passwordInput
    =
    document.querySelector('input[type=\"password\"]');
    togglePassword.addEventListener('click',
    ()
    =>
    {
    if
    (passwordInput.type
    ===
    'password')
    {
    passwordInput.type
    =
    'text';
    togglePassword.innerHTML
    =
    '
<i class=\"fa-solid fa-eye-slash text-gray-400\"></i>';

} else {

passwordInput.type = 'password';
togglePassword.innerHTML =
'<i class=\"fa-solid fa-eye text-gray-400\"></i>';

}

});
</script>

@endpush