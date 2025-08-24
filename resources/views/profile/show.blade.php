<x-app-layout>
   <div class="py-12 bg-gray-50 min-h-screen">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white shadow sm:rounded-lg p-6">
            <div class="flex flex-col lg:flex-row gap-8">
               
               <!-- Left: Posts Section (3/4) -->
               <div class="w-full lg:w-3/4 lg:order-1 order-2">
                  <h1 class="text-3xl font-bold mb-6 border-b pb-4">{{ $user->name }}'s Posts</h1>
                  @forelse ($posts as $p)
                     <x-post-item :post="$p" />
                  @empty
                     <div class="text-center text-gray-400 py-16">No Posts Found</div>
                  @endforelse
               </div>
               
               <!-- Right: Profile Section (1/4) -->
               <div class="w-full lg:w-1/4 lg:order-2 order-1">
                  <x-follow-ctr :user="$user">
                     <div
                     class="flex flex-col items-center justify-center text-center space-y-4 border rounded-lg p-6 shadow-md">
                        <x-user-avatar :user="$user" size="w-20 h-20" />
                        
                        <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
                        <p class="text-gray-500 text-sm">
                           {{-- <span x-text="followersCount"></span>  --}}
                           <span x-text="followersCount" ></span> followers
                        </p>
                        <p class="text-gray-500 text-sm">
                           {{ $user->following()->count() }} followings
                        </p>
                        <p class="text-gray-700 text-sm">{{ $user->bio }}</p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                           <button 
                              @click="follow()" 
                              class="rounded-full px-4 py-1 text-sm text-white transition-all duration-200"
                              x-text="following ? 'Unfollow' : 'Follow'"
                              :class="following ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700'">
                           </button>
                        @endif
                     </div>
                  </x-follow-ctr>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
