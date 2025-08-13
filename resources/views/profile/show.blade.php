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

                    <x-follow-ctr :user="$user" >
                        <x-user-avatar :user="$user" size="w-32 h-32" />
                        <h3 class="text-2xl font-semibold mt-4">{{ $user->name }}</h3>
                        <p class="text-gray-400 mt-2"><span x-text="followersCount"></span> Followers</p>
                        <p class="text-gray-600 mt-2">{{ $user->bio }}</p>
                        @if (auth()->check() && auth()->user()->id !== $user->id)
                            <button @click="follow()" class="px-4 py-2 b text-white rounded-full"
                                x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700'">

                            </button>
                        @endif

                    </x-follow-ctr>

                </div>
            </div>
        </div>
</x-app-layout>
