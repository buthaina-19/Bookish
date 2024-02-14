<x-app-layout>
@section('hero')
    <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            Welcome to<span class="text-blue-800">&#9621; BOOKISH</span>

        </h1>
        <p class="text-gray-500 text-lg mt-1">All about Books &#9829;</p>
        <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block" href="http://127.0.0.1:8000/posts">Start
            Reading</a>
    </div>
@endsection

<div class="mb-10 w-full">
    <div class="mb-16">
        <h2 class="mt-16 mb-5 text-3xl text-blue-800 font-bold">Featured Posts</h2>
        <div class="w-full">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($featuredPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-blue-700 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>
    <hr>

    <h2 class="mt-16 mb-5 text-3xl text-blue-800 font-bold">Latest Posts</h2>
    <div class="w-full mb-5">
        <div class="grid grid-cols-3 gap-10 w-full">
            @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post"  />
            @endforeach
        </div>
    </div>

    <a class="mt-10 block text-center text-lg text-blue-800 font-semibold" href="http://127.0.0.1:8000/blog">More
        Posts</a>

</div>
</x-app-layout>


{{-- book icon <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
  </svg> --}}
