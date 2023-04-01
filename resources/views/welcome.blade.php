<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Radi Pets Places</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body class="antialiased">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresa</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrate</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
              <div class="flex flex-col mb-16 sm:text-center sm:mb-0">
                <a href="/" class="mb-6 sm:mx-auto">
                  <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                    <svg class="w-10 h-10 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                      <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                    </svg>
                  </div>
                </a>
                <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                  <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">

                      <span class="relative">The</span>
                    </span>
                    quick, brown fox jumps over a lazy dog
                  </h2>
                  <p class="text-base text-gray-700 md:text-lg">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque ipsa quae.
                  </p>
                </div>
                <div>
                  <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white bg-green-800 transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                  >
                    Ingresa
                  </a>
                </div>
              </div>
            </div>
          </div>


          <div class="grid-cols-12 grid">
            <div class="col-span-12  p-4 lg:col-span-7 lg:p-20">
             <h2>ase</h2>


            </div>
            <div class="col-span-12 lg:inline-block lg:col-span-5 h-64  md:h-full">
              <img class="h-64 md:h-full w-full object-cover" src="https://radi-images.s3.us-west-1.amazonaws.com/radi-places.webp" alt="image sticker radi pets">
            </div>
          </div>

          <section class="px-4 py-20 mx-auto max-w-7xl lg:px-12" >
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-y-10 lg:gap-y-32 gap-x-10 lg:gap-x-24">
              <div>
                <h2 class="mb-3 text-3xl font-extrabold leading-tight tracking-tight text-center text-black sm:text-left md:text-4xl">Requisitos para ser parte</h2>
                <p class="mb-6 text-lg text-center text-gray-600 sm:text-left md:text-xl">Conoce los requisitos para ser parte de Radi pets, por el momento recibimos solicitudes de restaurantes, hoteles, y lugares públicos.</p>
              </div>
              <div class="flex flex-col flex-grow space-y-5">
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Tu negocio debe de aparecer en Google Maps.</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Contar con teléfono.</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Contar con una imagen de la fachada del negocio.</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Cuenta de Facebook o Instagram (opcional).</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Descripción de tu negocio en menos de 250 caracteres.</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Tener tus horarios establecidos (Restaurantes).</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Agregar Menú en PDF (Restaurantes, opcional).</p>
                </div>
                <div class="flex items-start">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="flex-none w-5 h-5 mt-1 mr-2 text-primary">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="text-lg text-gray-700">Agregar información sobre:</p>
                </div>
                <div class="flex items-start">
                  <p class="text-lg text-gray-700 ml-8">Métodos de pago. (Restaurantes)</p>
                </div>
                <div class="flex items-start">
                  <p class="text-lg text-gray-700 ml-8">Si cuentan con estacionamiento y wifi.</p>
                </div>
                <div class="flex items-start">
                  <p class="text-lg text-gray-700 ml-8">Lugar acondicionado para personas con silla de ruedas. </p>
                </div>

                <div class="flex items-start">
                  <p class="text-lg text-gray-700 ml-8">Público dirigido y temática (Restaurantes).</p>
                </div>

              </div>
            </div>
          </section>


        </body>
</html>
