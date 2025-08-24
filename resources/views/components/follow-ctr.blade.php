@props(['user'])

<div {{ $attributes }} x-data="{
    following: {{ auth()->check() && $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: 1,
    follow() {
        axios.post('/follow/{{ $user->id }}')
            .then(res => {
                this.following = !this.following
                this.followersCount = res.data.followersCount
            })
            .catch(err => {
                console.log(err)
            })
    }
}" class=" border-l px-8">
    {{ $slot }}
</div>