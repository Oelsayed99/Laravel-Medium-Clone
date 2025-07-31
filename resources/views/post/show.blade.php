<x-app-layout>


    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>
                {{-- User Avatar --}}
                <div class="flex gap-4">
                 <x-user-avatar :user="$post->user" />
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="text-md font-semibold text-gray-800">
                                {{ $post->user->name }}
                            </h3>
                            &middot;
                            <a class="text-emerald-600 " href="#">
                                Follow
                            </a>
                        </div>
                        <div class="flex gap-2 text-gray-500 text-sm">
                            {{ $post->readTime() }} min Read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>
                <x-clap-button :post="$post" />
                {{-- Content Section --}}
                <div class="mt-8">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}"
                        class="w-full h-96 object-cover rounded-lg">
                    <div class="mt-4">
                        {!! $post->content !!}
                    </div>
                </div>
                {{-- Category Section --}}
                <div class="mt-8 ">
                    <div class="flex gap-2">
                        <span class="px-4 py-2 bg-gray-200 rounded-xl">{{ $post->category->name }}</span>
                    </div>
                </div>
                <x-clap-button :post="$post" />
            </div>
        </div>
    </div>
</x-app-layout>
