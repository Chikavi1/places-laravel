<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold">¡Hola {{ Auth::user()->name}}!</h2>
                    <p>Descubre nuestras recomendaciones</p>

                <div class="grid grid-cols-12 gap-4 my-12">
                    <div class="col-span-12 px-2 md:col-span-4">
                        <div
                        class="block rounded-xl border border-gray-800 bg-gray-900 p-4 shadow-xl sm:p-6 lg:p-8"
                        href=""
                        >

                        <h3 class="mt-3 text-lg font-bold text-white sm:text-xl">
                            Comparte el link de tu negocio
                        </h3>
                        <br>
                        <p class="mt-4 text-sm text-gray-300">
                            ¡Dale un impulso a tu negocio hoy mismo! Comparte el enlace y llega a más personas en cuestión de segundos,para que conozcan tu lugar pet friendly.
                        </p>
                    </div>

                    </div>

                    <div class="col-span-12 px-2 md:col-span-4">
                        <div
                        class="block rounded-xl border border-gray-800 bg-gray-900 p-4 shadow-xl sm:p-6 lg:p-8"
                        href=""
                        >

                        <h3 class="mt-3 text-lg font-bold text-white sm:text-xl">
                            Responde a los comentarios de la gente
                        </h3>

                        <p class="mt-4 text-sm text-gray-300">
                            No hay nada más importante que mantenerse conectado con la comunidad. ¡Respondiendo a sus comentarios demuestras que estas activo y listos para escuchar sus ideas y sugerencias!
                        </p>
                    </div>

                    </div>

                    <div class="col-span-12 px-2 md:col-span-4">
                        <div
                        class="block rounded-xl border border-gray-800 bg-gray-900 p-4 shadow-xl sm:p-6 lg:p-8"
                        href=""
                        >

                        <h3 class="mt-3 text-lg font-bold text-white sm:text-xl">
                            Agrega una imagen llamativa y la mayor información posible
                        </h3>

                        <p class="mt-4 text-sm text-gray-300">
                            Una imagen vale más que mil palabras, por eso agregar una imagen llamativa, mientras más información agregues, el usuario pasara más tiempo en el perfil de tu negocio.                        </p>
                    </div>

                    </div>

                </div>
        </div>
    </div>
</div>
    </div>
</x-app-layout>
