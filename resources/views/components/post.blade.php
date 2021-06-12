@props(['post' => $post])


<div class="mb-2 bg-white text-black rounded-lg p-4 w-full sm:w-4/5 ">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold text-xl">{{ $post->user->name }}</a> <span class="text-grey-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <div class="border-b border-gray-500 w-5/6"></div>
    <p class="mb-2">{{ $post->body }}</p>
    {{-- @if ($post->ownedBy(auth()->user())) --}}
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post" class="pt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500 mt-2">Supprimer mon commentaire</button>
            </form>
        @endcan
    {{-- @endif --}}

    <div class="flex item-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">J'aime</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Je n'aime plus</button>
                </form>
            @endif
        @endauth

        <span class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-blue-700 rounded">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>