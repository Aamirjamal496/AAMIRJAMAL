@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="min-h-screen pt-16 px-3 lg:px-5">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-12" data-aos="fade-down">
            <h1 class="text-3xl md:text-4xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-4">
                Portfolio Dashboard
            </h1>

            <p class="text-gray-400 text-lg">
                Manage your portfolio website content
            </p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-14">

            <div class="bg-white/5 border border-purple-500/20 rounded-2xl p-8 backdrop-blur-lg hover:-translate-y-2 transition duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-3xl md:text-3xl font-black text-purple-400">12</h3>
                        <p class="text-gray-400 mt-2">Skills</p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-purple-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-code text-2xl text-purple-400"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 border border-pink-500/20 rounded-2xl p-8 backdrop-blur-lg hover:-translate-y-2 transition duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-3xl md:text-4xl font-black text-pink-400">8</h3>
                        <p class="text-gray-400 mt-2">Projects</p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-pink-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-diagram-project text-2xl text-pink-400"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 border border-blue-500/20 rounded-2xl p-8 backdrop-blur-lg hover:-translate-y-2 transition duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-3xl md:text-4xl font-black text-blue-400">3</h3>
                        <p class="text-gray-400 mt-2">Experience</p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-blue-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-briefcase text-2xl text-blue-400"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 border border-green-500/20 rounded-2xl p-8 backdrop-blur-lg hover:-translate-y-2 transition duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-3xl  md:text-4xl font-black text-green-400">15</h3>
                        <p class="text-gray-400 mt-2">Messages</p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-green-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-envelope text-2xl text-green-400"></i>
                    </div>
                </div>
            </div>

        </div>
        <!-- Mobile Menu Button -->
        <div class="lg:hidden mb-6">

            <button id="menuBtn"
                class="w-12 h-12 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center">

                <i class="fa-solid fa-bars text-white"></i>

            </button>

        </div>

        <!-- Dashboard Tabs -->
        <div class="flex gap-6 relative">

            <!-- Sidebar -->
            <!-- Sidebar -->
            <div id="sidebar"
                class="fixed lg:static top-0 left-[-100%] lg:left-0 z-50 w-72 lg:w-64 h-screen lg:h-auto navbg lg:bg-white/5 border-r lg:border border-white/10 rounded-none lg:rounded-2xl p-5 backdrop-blur-xl transition-all duration-300 overflow-y-auto">

                <!-- Close Button Mobile -->
                <div class="flex justify-between items-center mb-8 lg:hidden">

                    <h2 class="text-2xl font-bold">
                        Dashboard
                    </h2>

                    <button id="closeSidebar"
                        class="w-10 h-10 rounded-xl bg-red-500/20">

                        <i class="fa-solid fa-xmark text-red-400"></i>

                    </button>

                </div>

                <ul class="space-y-2">

                    <li>
                        <a href="/dashboard/profile" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 {{request()->routeIs('/dashboard/profile')?'active-tab':''}}">

                            <i class="fa-solid fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/skills" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition {{request()->routeIs('/dashboard/skills')?'active-tab':''}}">
                            <i class="fa-solid fa-code"></i>
                            <span>Skills</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/projects" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition {{request()->routeIs('/dashboard/projects')?'active-tab':''}}">
                            <i class="fa-solid fa-diagram-project"></i>
                            <span>Projects</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/experience" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition {{request()->routeIs('/dashboard/experience')?'active-tab':''}}">

                            <i class="fa-solid fa-briefcase"></i>
                            <span>Experience</span>

                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/messages" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition {{request()->routeIs('/dashboard/messages')?'active-tab':''}}">

                            <i class="fa-solid fa-envelope"></i>
                            <span>Messages</span>

                        </a>
                    </li>

                    <!-- <li>
            <a href="/dashboard/settings" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition {{request()->routeIs('/dashboard/settings')?'active-tab':''}}">

                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>

            </a>
        </li> -->

                </ul>

            </div>

            <!-- Content -->
            <div class="flex-1 w-full">

                @yield("Elements")
                <!-- Dashboard Modals -->



            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
    // Tabs
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {

        btn.addEventListener('click', () => {

            const target = btn.dataset.tab;

            tabBtns.forEach(button => {

                button.classList.remove(
                    'bg-gradient-to-r',
                    'from-purple-600',
                    'to-pink-600'
                );

            });

            btn.classList.add(
                'bg-gradient-to-r',
                'from-purple-600',
                'to-pink-600',
            );

            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            document.getElementById(target).classList.remove('hidden');

            // Auto close sidebar on mobile
            if (window.innerWidth < 1024) {
                sidebar.style.left = '-100%';
            }

        });

    });

    // Sidebar
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.style.left = '0';
    });

    closeSidebar.addEventListener('click', () => {
        sidebar.style.left = '-100%';
    });

    function openModal(id) {

        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');

    }

    function closeModal(id) {

        document.getElementById(id).classList.add('hidden');
        document.getElementById(id).classList.remove('flex');

    }
</script>

@endpush