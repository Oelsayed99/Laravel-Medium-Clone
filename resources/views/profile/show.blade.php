<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl ">{{ $user->name }}</h1>
                        <div class="mt-8">
                             @forelse ($posts as $p)
                                <x-post-item :post="$p" />
                            @empty
                                <div>
                                    <p class="text-gray-900 text-center py-16">No posts found</p>
                                </div>
                            @endforelse
                        </div>  
                    </div>

                    <div class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="w-32 h-32" />
                        <h3 class="text-2xl font-semibold mt-4">{{ $user->name }}</h3>
                        <p class="text-gray-400 mt-2">26k Followers</p>
                        <p class="text-gray-600 mt-2">{{ $user->bio }}</p>
                        
                        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                            Follow
                        </button>
                    </div>

                </div>
        </div>
    </div>
</x-app-layout>
