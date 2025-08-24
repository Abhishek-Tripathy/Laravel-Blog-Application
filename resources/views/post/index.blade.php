<x-app-layout>
    <div class="py-3">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
                    <x-category-tabs>
                        No Categories Found
                    </x-category-tabs>
                </div>
            </div>
            <div class="mt-5">
                <div class="p-3">
                    @forelse ($posts as $post)
                     <x-post-item :post="$post" />
                    @empty
                        <div>
                            <p class="text-gray-500 text-center py-16 ">No Posts Yet</p>
                        </div>
                    @endforelse
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>