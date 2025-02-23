@extends ('layouts.app')

@section('title', 'MajaBlog')

@section('content')
    <div>
        <div class="container mx-auto">
            <x-navbar />
            {{-- <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Thumbnail -->
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-64 object-cover">

                <!-- Konten -->
                <div class="p-6">
                    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
                    <p class="mt-4">{{ $post->content }}</p>
                </div>
            </div> --}}
            <div>
                <div class="">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full md:h-96 object-cover">
                </div>
                <div>
                    <h1>
                        {{ $post->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
