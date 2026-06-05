<nav class="fixed w-full z-40 navbg backdrop-blur-md border-b border-purple-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    AAMIR JAMAL
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">Home</a>
                <a href="/about" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">About</a>
                <a href="/skills" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">Skills</a>
                <a href="/projects" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">Projects</a>
                <a href="/experience" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">Experience</a>
                <a href="/contact" class="nav-link text-sm font-medium hover:text-purple-400 transition-all duration-300">Contact</a>
            </div>

            <!-- Admin Panel Toggle -->
            @auth
            <div class="flex items-center space-x-4">
                <div x-data="{ open: false }" @click.outside="open = false" class="relative">
                    <button @click="open = !open" class="p-2 rounded-lg hover:bg-purple-600/50 transition-all duration-200">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                    <div x-show="open" x-transition class="absolute right-0 mt-2 w-64 bg-black/95 border border-purple-500/50 rounded-xl shadow-2xl p-4 z-50">
                        <h3 class="font-bold mb-4 text-purple-400">Admin Panel</h3>
                        <a href="/dashboard/profile" class="block w-full text-left px-4 py-2 hover:bg-purple-600/50 rounded-lg mb-2">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                        <a href="/dashboard/skills" class="block w-full text-left px-4 py-2 hover:bg-purple-600/50 rounded-lg mb-2">
                            <i class="fas fa-star mr-2"></i>Manage Skills
                        </a>
                        <a href="/dashboard/projects" class="block w-full text-left px-4 py-2 hover:bg-purple-600/50 rounded-lg mb-2">
                            <i class="fas fa-project-diagram mr-2"></i>Manage Projects
                        </a>
                        <a href="/dashboard/experience" class="block w-full text-left px-4 py-2 hover:bg-purple-600/50 rounded-lg">
                            <i class="fas fa-briefcase mr-2"></i>Manage Experience
                        </a>
                    </div>
                </div>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-2 rounded-lg hover:bg-red-600/50 transition-all duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
            @endauth

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" onclick="myFunction()" class="p-2 rounded-lg hover:bg-purple-600/50">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden navbg border-t border-purple-500/30">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">Home</a>
            <a href="/about" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">About</a>
            <a href="/skills" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">Skills</a>
            <a href="/projects" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">Projects</a>
            <a href="/experience" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">Experience</a>
            <a href="/contact" class="block px-3 py-2 text-base font-medium hover:bg-purple-600/50 rounded-lg">Contact</a>
        </div>
    </div>
</nav>
<style>
    .navbg {
        background: #8a2be229;
    }
</style>
<script>
    function myFunction() {
        var x = document.getElementById("mobile-menu");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>