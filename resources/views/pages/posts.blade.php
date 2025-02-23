@extends('layouts.app')

@section('title', 'My Blogs')

@section('content')

    <body>
        <div class="container mx-auto">
            <x-navbar />
            <div class="container max-w-md md:max-w-7xl my-5 mx-auto px-4 sm:px-6 lg:px-14">
                <h1 class="text-3xl font-bold text-slate-800">
                    My Blogs
                </h1>
                <div class="flex justify-end items-center">
                    <button id="openModal"
                        class="text-white bg-blue-400 hover:bg-blue-600 transition-all hover:ease-in hover:duration-200 rounded-lg p-2">
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
                                        accept="image/*">
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="block text-sm mb-1 font-medium">Content</label>
                                    <textarea placeholder="Type your content here" name="content" id="content" rows="5"
                                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                                    @error('title')
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
                @if (session('success'))
                    <div
                        class="bg-green-100 border mx-auto my-2 text-center w-1/2 border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif
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
            </script>
        @endsection
</body>

</html>
