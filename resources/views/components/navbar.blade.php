<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-14">
        <div class="flex justify-between items-center my-2 h-12">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-slate-800">MajaBlog</a>
            </div>

            <!-- Menu for Large Screens -->
            @if (Auth::check())
                <div class="hidden md:flex space-x-3">
                    <a href="/" class="text-slate-600 p-2 hover:text-blue-400">All Blogs</a>
                    <a href="/posts" class="text-slate-600 p-2 hover:text-blue-400">My Blogs</a>
                    <a href="#" class="text-slate-600 p-2 hover:text-blue-400">{{ Auth::user()->name }}</a>
                    <form class="my-auto" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="bg-blue-400 hover:bg-blue-600 px-1 py-1 text-white rounded transition duration-200"
                            type="submit">Logout</button>
                    </form>
                </div>
            @else
                <div class="hidden md:flex space-x-3">
                    <a href="#" class="text-slate-600 p-2 hover:text-blue-400">All Blogs</a>
                    <a href="/posts" class="text-slate-600 p-2 hover:text-blue-400">My Blogs</a>
                    <a class="my-auto" href="/login"> <button
                            class="bg-blue-400 hover:bg-blue-600 text-white items-center py-1 px-1 rounded transition duration-200">Login</button>
                    </a>
                    <a class="my-auto" href="/register"> <button
                            class="bg-blue-400 hover:bg-blue-600 text-white items-center py-1 px-1 rounded transition duration-200">Register</button>
                    </a>
                </div>
            @endif

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                @if (auth()->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="bg-blue-500 hover:bg-blue-700 mx-2 text-white items-center mt-4 py-1 px-2 rounded transition duration-200"
                            type="submit">Logout</button>
                    </form>
                @else
                    <div>
                        <button> <a href="/login"> <button
                                    class="bg-blue-500 mx-1 hover:bg-blue-700 text-white py-1 px-2 rounded transition duration-200">Login</button>
                            </a>
                    </div>
                    <div>
                        <button> <a href="/register"> <button
                                    class="bg-blue-500 mx-1 hover:bg-blue-700 text-white py-1 px-2 rounded transition duration-200">Register</button>
                            </a>
                    </div>
                @endif
                <button id="menu-toggle" class="text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <a href="#" class="block px-4 py-2 text-slate-600 hover:bg-gray-100 hover:text-blue-400">All Blogs</a>
        <a href="#" class="block px-4 py-2 text-slate-600 hover:bg-gray-100 hover:text-blue-400">My Blogs</a>
        <a href="#" class="block px-4 py-2 text-slate-600 hover:bg-gray-100 hover:text-blue-400">Profile</a>
    </div>
</nav>

<!-- Mobile Menu Toggle Script -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
