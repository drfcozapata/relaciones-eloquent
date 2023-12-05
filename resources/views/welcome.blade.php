<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">
  <div class="relative flex justify-center items-center min-h-screen text-gray-800">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">

      <h1 class="text-[100px] text-center">Eloquent: Relaciones</h1>

      <div class="mt-16">
        <div class="flex gap-20 justify-center text-lg">

          @foreach ($users as $user)
            <a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</body>

</html>
