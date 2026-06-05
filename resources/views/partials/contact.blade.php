@extends('layouts.app')
@section('title','contact')
@section('content');
<!-- Contact Section -->
<section id="contact" class="py-20 px-4">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">

        <!-- Left -->
        <div>
            <p class="text-purple-400 uppercase tracking-widest font-semibold mb-4">
                Contact
            </p>

            <h2 class="text-5xl font-black mb-8">
                Let's Work Together
            </h2>

            <p class="text-gray-400 text-lg leading-relaxed mb-10">
                Feel free to contact me for freelance projects, full-time roles or collaboration opportunities.
            </p>

            <div class="space-y-6">

                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-purple-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-envelope text-purple-400"></i>
                    </div>

                    <div>
                        <p class="text-gray-400">Email</p>
                        <h4 class="font-semibold">amirjamal@dev.com</h4>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-pink-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-phone text-pink-400"></i>
                    </div>

                    <div>
                        <p class="text-gray-400">Phone</p>
                        <h4 class="font-semibold">+92 300 0000000</h4>
                    </div>
                </div>

            </div>
        </div>

        <!-- Form -->
        <div class="bg-white/5 border border-white/10 rounded-3xl p-10 backdrop-blur-lg">
            @if(session()->has("success"))
            @endif
            <form action='/send-message' class="space-y-6" method='POST'>
                @csrf
                <div>
                    <input type="text" name='name'
                        placeholder="Your Name"
                        class="w-full px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">
                </div>

                <div>
                    <input type="email" name='email'
                        placeholder="Your Email"
                        class="w-full px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500">
                </div>

                <div>
                    <textarea rows="5" name='message'
                        placeholder="Your Message"
                        class="w-full px-6 py-4 rounded-2xl bg-black/30 border border-white/10 focus:outline-none focus:border-purple-500"></textarea>
                </div>

                <button
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 font-semibold hover:scale-[1.02] transition duration-300">
                    Send Message
                </button>

            </form>

        </div>

    </div>
</section>
@endsection