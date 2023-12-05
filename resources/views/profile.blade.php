<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $user->name }}</title>

  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">
  <div class="relative min-h-screen text-gray-800">

    <div class="max-w-6xl mx-auto p-8">

      <div class="flex flex-col gap-5 my-10 p-10 shadow-xl">
        <div class="flex gap-4">
          <img src="{{ $user->image->url }}" alt="{{ $user->name }}" class="rounded-full w-[90px] h-[90px]">
          <div class="flex flex-col gap-3">
            <h1 class="text-3xl font-semibold">{{ $user->name }}</h1>
            <h3 class="text-xl">{{ $user->email }}</h3>
          </div>
        </div>
        <div class="flex flex-col justify-start">
          <p class="text-md"><strong>Instagram:</strong> {{ $user->profile->instagram }}</p>
          <p class="text-md"><strong>GitHub:</strong> {{ $user->profile->github }}</p>
          <p class="text-md"><strong>Web:</strong> {{ $user->profile->web }}</p>
        </div>
        <div class="flex flex-col justify-start">
          <p class="text-md"><strong>País:</strong> {{ $user->location->country }}</p>
          <p class="text-md"><strong>Nivel:</strong>
            @if ($user->level)
              <a href="{{ route('level', $user->level->id) }}" class="text-blue-500 font-semibold">
                {{ $user->level->name }}
              </a>
            @else
              ---
            @endif
          </p>

          <hr class="my-5">

          <p class="text-md"><strong>Grupos:</strong>
            @forelse ($user->groups as $group)
              <span class=" mx-1 py-1 px-3 bg-blue-500 text-white rounded-xl">{{ $group->name }}</span>
            @empty
              <em>No pertenece a ningún grupo</em>
            @endforelse
          </p>

          <hr class="my-5">

          <h3 class="text-2xl font-semibold mb-5">Posts</h3>
          <div class="flex flex-wrap gap-7">
            @foreach ($posts as $post)
              <div class="flex gap-5 w-[48%] border border-gray-300 rounded-lg">
                <div class="w-4/12">
                  <img src="{{ $post->image->url }}" alt="">
                </div>
                <div class="w-8/12">
                  <h5 class="text-xl">{{ $post->name }}</h5>
                  <h6 class="text-gray-400">
                    {{ $post->category->name }} | {{ $post->comments_count }}
                    {{ Str::plural('comentario', $post->comments_count) }}
                  </h6>
                  <p class="text-[10px] mt-1 flex flex-wrap gap-[6px]">
                    @foreach ($post->tags as $tag)
                      <span class="py-1 px-2 bg-gray-200 rounded-lg">#{{ $tag->name }}</span>
                    @endforeach
                  </p>
                </div>
              </div>
            @endforeach
          </div>

          <h3 class="text-2xl font-semibold mb-5 mt-7">Videos</h3>
          <div class="flex flex-wrap gap-7">
            @foreach ($videos as $video)
              <div class="flex gap-5 w-[48%] border border-gray-300 rounded-lg">
                <div class="w-4/12">
                  <img src="{{ $video->image->url }}" alt="" class="object-center object-cover">
                </div>
                <div class="w-8/12 py-2">
                  <h5 class="text-xl">{{ $video->name }}</h5>
                  <h6 class="text-gray-400">
                    {{ $video->category->name }} | {{ $video->comments_count }}
                    {{ Str::plural('comentario', $video->comments_count) }}
                  </h6>
                  <p class="text-xs mt-1 flex flex-wrap gap-[6px]">
                    @foreach ($video->tags as $tag)
                      <span class="py-1 px-2 bg-gray-200 rounded-lg">#{{ $tag->name }}</span>
                    @endforeach
                  </p>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>
</body>

</html>
