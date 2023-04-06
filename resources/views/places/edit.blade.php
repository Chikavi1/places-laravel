<x-app-layout>
    @if(Auth::user()->id === $place->id_user)
        <form action="{{ url('places/update') }}" method="POST" enctype="multipart/form-data"  class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
            @method('PATCH')
            @csrf
            <div class="container max-w-screen-lg mx-auto">
                <div>
                    <h2 class="font-semibold text-xl text-gray-600">Edita tu Lugar</h2>
                    <p class="text-gray-500 ">Edita la información con honestidad.</p>
                    <p class="text-gray-500 mb-6">* Campos obligatorios</p>

                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Información Basica del negocio</p>
                                <p>Por favor, rellene todos los campos.</p>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="title">Nombre del negocio *</label>
                                        <input type="text" name="title" id="title" required class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$place->title}}" />
                                    </div>

                                    @if($place->image)
                                        <div class="md:col-span-5">

                                            <img id="pic"
                                                class="rounded-lg w-72 mx-auto"
                                                src="{{$place->image}}"
                                                style="object-fit: cover;"
                                                alt="imagen 2">

                                            <p class="text-center my-4">Cambiar</p>

                                        </div>


                                    @else
                                        <div class="md:col-span-5">
                                            <label for="image">Imagen *</label>
                                            <input
                                            oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                            type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" required name="image" id="image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa imagen" />
                                        </div>

                                    @endif



                                    <div class="md:col-span-3">
                                        <label for="address">Tipo de Lugar *</label>
                                        <select
                                            required
                                            value="{{$place->place}}"
                                            placeholder="Selecciona una opción"
                                            name="place" id="place"
                                            class="h-10 border mt-1 rounded w-full bg-gray-50">
                                            <option value="1">
                                                Restaurante
                                            </option>
                                            <option value="2">
                                                Hotel
                                            </option>
                                        </select>

                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="city">Tipo *</label>
                                        <select
                                            value="{{$place->type}}"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" name="type">

                                                <option  value="1001">
                                                    Cafe
                                                </option>
                                                <option   value="1002">
                                                    Bar
                                                </option>
                                                <option   value="1003">
                                                    Con temática
                                                </option>
                                                <option   value="1004">
                                                    Comida rápida
                                                </option>
                                                <option   value="1005">
                                                    Casual
                                                </option>
                                                <option   value="1006">
                                                    Autor
                                                </option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="city">Celular *</label>
                                        <input
                                        type="text"
                                        value="{{$place->cellphone}}"
                                        id="name-with-label"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        name="cellphone"
                                        placeholder="Celular"/>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="name-with-label" >
                                        Descripción
                                        </label> <br>
                                        <textarea
                                        class="h-24 border mt-1 rounded px-4 w-full	 bg-gray-50"
                                        id="description"
                                        placeholder="Ingresa descripción"
                                        name="description"  >
                                        {!! trim($place->description) !!}
                                    </textarea>
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div id="divschedule" class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Horarios </p>
                        <p>Ingresa los horarios de tu negocio.</p>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="my-4">
                            <label class="font-bold">
                            Lunes
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="monday_start"
                                value="{{$schedule[0]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="monday_end"
                                value="{{$schedule[0]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>


                        <div class="my-4">
                            <label class="font-bold">
                            Martes
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="tuesday_start"
                                value="{{$schedule[1]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="tuesday_end"
                                value="{{$schedule[1]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label class="font-bold">
                            Miercoles
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="wednesday_start"
                                value="{{$schedule[2]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="wednesday_end"
                                value="{{$schedule[2]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label class="font-bold" >
                            Jueves
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="thursday_start"
                                value="{{$schedule[3]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="thursday_end"
                                value="{{$schedule[3]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label class="font-bold">
                            Viernes
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="friday_start"
                                value="{{$schedule[4]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="friday_end"
                                value="{{$schedule[4]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label class="font-bold">
                            Sábado
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="saturday_start"
                                value="{{$schedule[5]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="saturday_end"
                                value="{{$schedule[5]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <label class="font-bold" >
                            Domingo
                            </label>
                            <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Inicio
                                </label>
                                <input
                                name="sunday_start"
                                value="{{$schedule[6]["start"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            <div class="col-span-6">
                                <label for="name-with-label" class="text-gray-700">
                                Final
                                </label>
                                <input
                                name="sunday_end"
                                value="{{$schedule[6]["end"]}}"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="time"
                            >
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded shadow-lg p-4 px-24md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Dirección *</p>
                            <p>Por favor, ingresa la dirección de tu negocio.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                            <div class="md:col-span-3">
                                <label for="address">Address</label>
                                <input
                                value="{{$place->address}}"
                                type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="city">City</label>
                                <input type="text"
                                value="{{$place->city}}"
                                name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                            </div>

                            {{-- <div class="md:col-span-2">
                                <label for="country">Country / region</label>
                                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                <input name="country" id="country" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </button>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label for="state">State / province</label>
                                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                <input name="state" id="state" placeholder="State" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </button>
                                </div>
                            </div>

                            <div class="md:col-span-1">
                                <label for="zipcode">Zipcode</label>
                                <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
                            </div> --}}




                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                    </div>

                    <div class="container max-w-screen-lg mx-auto">
                        <div class="px-6 md:px-0">

                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                            <p class="font-medium text-lg">Beneficios</p>
                            <p>Por favor, rellene todos los campos.</p>
                            </div>

                            <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                                <div class="md:col-span-3">
                                <label for="food_pets">¿Comida especial para mascotas?</label>
                                <select
                                    value="{{$place->food_pets}}"
                                    required
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    name="food_pets">

                                    <option value="1">
                                        Sí
                                    </option>
                                    <option value="0">
                                        No
                                    </option>
                                </select>

                                </div>

                                <div class="md:col-span-3">
                                    <label for="parking">Estacionamiento</label>
                                    <select
                                    value="{{$place->parking}}"
                                    name="parking" id="parking"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">

                                    <option value="1">
                                        Sí
                                    </option>
                                    <option value="0">
                                        No
                                    </option>
                            </select>
                                </div>

                                <div class="md:col-span-3">
                                    <label for="payment_methods">Pagos con tarjeta</label>
                                    <select
                                        value="{{$place->payment_methods}}"
                                        name="payment_methods" id="payment_methods"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">

                                        <option value="1">
                                            Sí
                                        </option>
                                        <option value="0">
                                            No
                                        </option>
                                    </select>
                                </div>

                                    <div class="md:col-span-3">
                                    <label for="payments_card">Metodos de Pago</label>
                                    <input
                                    value="{{$place->payments_card}}"
                                    type="text"
                                    name="payments_card" id="payments_card"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="md:col-span-3">
                                    <label for="wifi">Wifi</label>
                                    <select
                                        value="{{$place->wifi}}"
                                        name="wifi" id="wifi"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">

                                        <option value="1">
                                            Sí
                                        </option>
                                        <option value="0">
                                            No
                                        </option>
                                    </select>
                                </div>

                                    <div class="md:col-span-3">
                                    <label for="public">Tipo de publico</label>
                                    <select
                                        name="public"
                                        value="{{$place->public}}"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">

                                        <option value="1">
                                            Familiar
                                        </option>
                                        <option value="2">
                                            Amigos
                                        </option>
                                        <option value="3">
                                        Grupos
                                    </option>
                                    </select>
                                </div>

                                <div class="md:col-span-3">
                                    <label for="enviroment">Cuenta con terraza?</label>
                                    <select
                                    value="{{$place->enviroment}}"
                                    name="enviroment" class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">

                                    <option value="1">
                                        Con terraza
                                    </option>
                                    <option value="0">
                                        Sin Terraza
                                    </option>
                                </select>
                                </div>

                                    <div class="md:col-span-3">
                                    <label for="accessibility">Es accesible para personas con silla de ruedas?</label>
                                    <select
                                    value="{{$place->accessibility}}"
                                    name="accessibility" id="accessibility" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">

                                <option value="1">
                                    Sí cuenta con espacios habilitados
                                </option>
                                <option value="0">
                                    No cuenta con espacios habilitados
                                </option>
                                </select>
                                </div>
                            </div>





                            </div>
                        </div>
                        </div>

                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                <div class="text-gray-600">
                                <p class="font-medium text-lg">Social</p>
                                <p>Por favor, rellene todos los campos.</p>
                                </div>

                                <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                    <label for="facebook_url">Facebook</label>
                                    <input
                                    value="{{$place->facebook_url}}"
                                    type="text" name="facebook_url" id="facebook" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"   placeholder="Ingresa Facebook" />
                                    </div>

                                    <div class="md:col-span-5">
                                    <label for="instagram">Instagram</label>
                                    <input
                                    value="{{$place->instagram_url}}"
                                    type="text" name="instagram_url" id="instagram" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresa Instagram" />
                                    </div>

                                        <div  class="menusection md:col-span-5">



                                                <img id="pic2"
                                                src="{{$place->menu}}"
                                                style="max-height:13em;min-height:13em;object-fit: cover;"
                                                alt="imagen 2">

                                        </div>

                                        <div class="menusection md:col-span-3">
                                            <label for="menu">Cover del menú</label>
                                            <input
                                            oninput="pic2.src=window.URL.createObjectURL(this.files[0])"
                                            value="{{$place->menu}}"
                                            type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp"
                                            name="menu" id="menu" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa cover del menú" />
                                        </div>

                                        <div class="menusection md:col-span-2">
                                            <label for="pdf_menu">URL del menú</label>
                                            <input type="url"
                                            name="pdf_menu"
                                            id="pdf_menu"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{$place->pdf_menu}}" placeholder="URL del menú" />
                                        </div>
                                </div>

                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-12 mt-4">

                                    <div class="md:col-span-12">
                                        <label for="name-with-label" >
                                            Reglas de convivencia
                                        </label>
                                        <textarea
                                        class="h-24 border mt-1 rounded px-4 w-full bg-gray-50"
                                        id="notes"
                                        placeholder="Ingresa descripción"
                                        name="notes" rows="15" cols="40">

                                        </textarea>
                                    </div>
                                    </div>



                                </div>


                            </div>

                                <div class="grid grid-cols-12">
                                    <div class="md:col-span-4 text-left">
                                        <div class="inline-flex items-start">

                                            <a data-toggle="modal" href="#addBookDialog" class="open-AddBookDialog bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>

                                    <div class="md:col-span-8 text-right">
                                        <div class="inline-flex items-end">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                                                Actualizar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div>
                            <input type="hidden" value="{{ $hash }}" name="id" id="">
                        </div>
        </form>
    @else
        <h2 class="text-center text-3xl my-24 py-24 dark:text-white">No tienes permisos para editar esta página.</h2>
    @endif


    <div id="ass" class="modal hide hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <form action="{{route('places.destroy',$hash)}}"  method="POST">
            @csrf
            @method('delete')
            <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">¿Estás seguro?</h3>
                        <p>Al eliminarlo no podras volver a publicarlo .</p>
                    </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Eliminar</button>
                    <a id="closebutton" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</a>
                </div>
                </div>
            </div>
            </div>
        </form>
    </div>


</x-app-layout>

<script>
    $(document).on("click", ".open-AddBookDialog", function () {
             var myBookId = $(this).data('id');
            console.log(myBookId);
            $(".modal-body #reviewId").val( myBookId );
            $('#ass').removeClass('hidden')

        });


    $("#place").on('change',(e) => {
        if(e.target.value == 2){
            $("#divschedule").addClass('hidden');
            $(".menusection").addClass('hidden');
        }else{
            $("#divschedule").removeClass('hidden');
            $(".menusection").removeClass('hidden');
        }
    });

    $("#closebutton").on('click',()=> {
        $('#ass').addClass('hidden')
    });
</script>
