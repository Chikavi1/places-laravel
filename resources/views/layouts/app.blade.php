<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Radi Pets Places</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
        rel="stylesheet"
      />

      <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="px-4 py-12 mx-auto max-w-7xl mt-12">
                <div class="grid grid-cols-2 gap-10 mb-3 md:grid-cols-3 lg:grid-cols-11 lg:gap-20">
                  <div class="col-span-3">
                    <a href="#" title="Hellonext Home Page" class="flex items-center">

                    </a>
                    <p class="my-4 text-2xl leading-normal text-gray-600 dark:text-white">
                    Radi Pets
                    </p>
                  </div>

                  <nav class="col-span-2 md:col-span-1 lg:col-span-3">
                    <p class="mb-3 text-xs font-semibold tracking-wider text-gray-400 uppercase">Legal</p>
                    <a class="flex mb-3 text-sm font-medium text-gray-800 dark:text-white transition md:mb-2 hover:text-purple-800" href="https://radi.pet/terms">Términos y condiciones</a>
                    <a class="flex mb-3 text-sm font-medium text-gray-800 dark:text-white transition md:mb-2 hover:text-purple-800" href="https://radi.pet/privacy"> Politicas de privacidad</a>
                     </nav>

                  <nav class="col-span-1 md:col-span-1 lg:col-span-3">
                    <p class="mb-3 text-xs font-semibold tracking-wider text-gray-400 uppercase">Compañia</p>
                    <a class="flex mb-3 text-sm font-medium text-gray-800 dark:text-white transition md:mb-2 hover:text-purple-800" href="https://radi.pet/">Acerca de Radi Pets</a>
                     </nav>
                </div>
                <div class="flex flex-col items-start justify-between pt-10 mt-10   md:flex-row md:items-center">
                  <p class="mb-2 text-xs text-left text-gray-600 dark:text-white md:mb-0">Hecho en México</p>
                  <p class="mb-0 text-xs text-left text-gray-600 dark:text-white md:mb-0">Copyright &copy; 2023 Radi Pets</p>
                </div>
              </footer>




    </body>

    </html>
