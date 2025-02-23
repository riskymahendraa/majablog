@extends('layouts.app')

@section('title', 'MajaBlog')

@section('content')

    <body>
        <div class="container mx-auto">
            <x-navbar />
            <div class="container max-w-md md:max-w-7xl my-5 mx-auto px-4 sm:px-6 lg:px-14">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-xl md:text-3xl font-bold text-slate-800">
                            All Blogs
                        </h1>
                    </div>
                    @if (Auth::check())
                        <div class="flex justify-end items-center">
                            <button id="openModal"
                                class="text-white text-sm md:text-base bg-blue-400 hover:bg-blue-600 transition-all hover:ease-in hover:duration-200 rounded-lg p-2">
                                Create a new post</>
                            </button>
                        </div>
                        <div id="modalOverlay"
                            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                            <!-- Modal Content -->
                            <div class="bg-white rounded-lg shadow-lg md:w-1/3 w-2/3">
                                <div class="flex justify-between items-center p-4 border-b">
                                    <h2 class="text-lg font-semibold">Create a new post</h2>
                                    <button id="closeModal"
                                        class="text-white bg-red-500 px-2 py-1 rounded hover:text-gray-900">&times;</button>
                                </div>
                                <div class="p-4">
                                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="title" class="block mb-1 text-sm font-medium">Title</label>
                                            <input type="text" name="title" id="title" required
                                                placeholder="Type your title here"
                                                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                                            @error('title')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">Thumbnail (JPG/PNG)</label>
                                            <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                                required accept="image/*">
                                        </div>
                                        <div class="mb-4">
                                            <label for="content" class="block text-sm mb-1 font-medium">Content</label>
                                            <textarea placeholder="Type your content here" name="content" id="content" rows="5" required
                                                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                                            @error('content')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="px-4 py-2 bg-blue-400 hover:bg-blue-600 transition-all hover:ease-in hover:duration-200 rounded-lg text-white">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if ($errors->any())
                    <div class="bg-red-100 w-1/2 mx-auto text-red-700 p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div
                        class="bg-green-100 border mx-auto my-2 text-center w-1/2 border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif
                <div class=" my-5 grid md:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div class="max-w-sm w-full mx-auto shadow-lg rounded-lg overflow-hidden">
                            <!-- Thumbnail -->
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->thumbnail) }}"
                                alt="" />

                            <!-- Card Content -->
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <h3 class="font-bold text-gray-800">{{ $post->title }}</h3>
                                    <div class="text-xs my-1 text-gray-600"> {{ $post->user->name }} |
                                        {{ $post->created_at->diffForHumans() }} </div>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">
                                    {{ $post->content }}
                                </p>
                                <div class=" my-4 flex justify-end items-center">
                                    <button><a href="{{ route('posts.show', $post->slug) }}"
                                            class="text-white mx-2 bg-blue-400 rounded-lg hover:bg-blue-600 hover:duration-200 hover:ease-in py-1 px-2">Read
                                            More</a></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            const openModal = document.getElementById('openModal');
            const closeModal = document.getElementById('closeModal');
            const modalOverlay = document.getElementById('modalOverlay');

            openModal.addEventListener('click', () => {
                modalOverlay.classList.remove('hidden');
            });

            closeModal.addEventListener('click', () => {
                modalOverlay.classList.add('hidden');
            });

            window.addEventListener('click', (e) => {
                if (e.target === modalOverlay) {
                    modalOverlay.classList.add('hidden');
                }
            });

            @if ($errors->any() || session('success'))
                document.getElementById('modal').classList.remove('hidden');
            @endif
        </script>
    @endsection
</body>

</html>
