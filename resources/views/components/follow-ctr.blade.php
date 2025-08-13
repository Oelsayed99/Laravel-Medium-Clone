@props(['user'])

<div {{$attributes}} x-data="{
    following: {{ auth()->check() && $user->isFollowingBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: {{ $user->followers->count() }},
    follow() {
        
        axios.post('/follow/{{ $user->id }}').then(response => {
            this.following = !this.following;
            this.followersCount = response.data.followersCount;
        }).catch(error => {
            console.error(error);
            alert('An error occurred while trying to follow/unfollow.');
        });
    }
}" class="w-[320px] border-l px-8">
    {{ $slot }}
</div>
