<x-app-layout>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <form enctype='multipart/form-data' action="{{route('places.store')}}" method="POST" class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        @csrf
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Crear Lugar</h2>
                <p class="text-gray-500 ">Contesta la información con honestidad.</p>
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
                                    <input type="text" placeholder="Ingresa el nombre de tu negocio" name="title" id="title" required class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                </div>

                                <div class="md:col-span-5">

                                    <div id="uploadimage" '>

                                        <div class="card-body">
                                              <div id="image_demo" class="mx-auto w-96 h-72"></div>
                                              <div id="uploaded_image" style="width:350px; margin-top:30px;"></div>
                                        </div>

                                        {{-- <div class="card-footer text-muted">
                                          <button class="crop_image">Crop & Upload Image</button>
                                        </div> --}}

                                      </div>
                                </div>

                                <div class="md:col-span-5">
                                    <label for="image">Imagen *</label>
                                    <input
                                    type="hidden"
                                    required
                                    name="base"
                                    id="base"
                                     />

                                    <input
                                    oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                    type="file"
                                    accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" r
                                    required
                                    name="image"
                                    id="upload_image"
                                    class="min-h-10 max-h-10 h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa imagen" />
                                </div>

                                <div class="md:col-span-3">
                                    <label for="address">Tipo de Lugar *</label>
                                    <select
                                        required
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
                                    <div id="typerest" >

                                    <label for="type">Tipo *</label>
                                    <select
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
                                <div  id="typehost" class="hidden">
                                    <label for="city">Tipo *</label>

                                    <select
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" name="type">
                                        <option value="2001">
                                            Privado
                                        </option>
                                        <option  value="2002">
                                            Casa
                                        </option>
                                        <option  value="2003">
                                            Hostal
                                        </option>
                                    </select>

                                </div>
                                </div>

                                <div class="md:col-span-5">
                                    <label for="cellphone">Celular *</label>
                                    <input
                                    type="text"
                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                    id="cellphone"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    name="cellphone"
                                    required
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
                                    name="description" rows="15" cols="40">

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
                    <p class="font-medium text-lg">Horarios *</p>
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
                            required
                            value="08:00"
                            name="monday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="monday_end"
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
                            required
                            value="08:00"
                            name="tuesday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="tuesday_end"
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
                            required
                            value="08:00"
                            name="wednesday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="wednesday_end"
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
                            required
                            value="08:00"
                            name="thursday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="thursday_end"
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
                            required
                            value="08:00"
                            name="friday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="friday_end"
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
                            required
                            value="08:00"
                            value="18:00"
                            name="saturday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="saturday_end"
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
                            required
                            value="08:00"
                            name="sunday_start"
                            class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            type="time"
                        >
                        </div>
                        <div class="col-span-6">
                            <label for="name-with-label" class="text-gray-700">
                            Final
                            </label>
                            <input
                            required
                            value="18:00"
                            name="sunday_end"
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
                        <p>Por favor, desliza el pin en el mapa para buscar la dirección.</p>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">


                        <div class="md:col-span-3">
                            <label for="address">Dirección Completa *</label>
                            <input required type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Dirección (calle con número, colonia, CP, ciudad, estado)" />
                        </div>

                        <div class="md:col-span-2">
                            <label for="city">Ciudad *</label>
                            <input required type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa ciudad" />
                        </div>

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
                            <label for="food_pets">¿Comida especial para mascotas? *</label>
                            <select
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
                                <label for="parking">Estacionamiento *</label>
                                <select
                                required
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
                                <label for="payment_methods">Pagos con tarjeta *</label>
                                <select
                                    required
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
                                <label for="payments_card">Metodos de Pago *</label>
                                <input type="text" name="payments_card" id="payments_card" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                            </div>

                            <div class="md:col-span-3">
                                <label for="wifi">Wifi</label>
                                <select
                                    required
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
                                <label for="public">Tipo de publico *</label>
                                <select
                                    name="public"
                                    required
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
                                <label for="enviroment">Cuenta con terraza? *</label>
                                <select
                                required
                                name="enviroment"
                                class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
                                <option value="1">
                                    Con terraza
                                </option>
                                <option value="0">
                                    Sin Terraza
                                </option>
                              </select>
                            </div>

                                <div class="md:col-span-3">
                                <label for="accessibility">Es accesible para personas con silla de ruedas? *</label>
                                <select
                                required
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
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook_url" id="facebook" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""   placeholder="Ingresa Facebook" />
                                </div>

                                <div class="md:col-span-5">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram_url" id="instagram" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa Instagram" />
                                </div>

                                    <div  class="menusection md:col-span-5">


                                            <img id="pic2"
                                            src="https://radi-images.s3.us-west-1.amazonaws.com/places/Instagram+Post+Mariposa+Belleza+Interior+Lila+y+Rosa.png"
                                            class="mx-auto h-96 w-72"
                                            alt="imagen 2">

                                    </div>

                                    <div class="menusection md:col-span-3">
                                        <label for="menu">Cover del menú</label>
                                        <input
                                        oninput="pic2.src=window.URL.createObjectURL(this.files[0])"
                                        type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp"
                                        name="menu" id="menu" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Ingresa cover del menú" />
                                    </div>

                                    <div class="menusection md:col-span-2">
                                        <label for="pdf_menu">URL del menú</label>
                                        <input type="text" name="pdf_menu" id="pdf_menu" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="URL del menú" />
                                    </div>
                            </div>

                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-12 mt-4">

                                <div class="md:col-span-12">
                                    <label for="name-with-label" >
                                        Reglas de convivencia
                                    </label>
                                    <textarea
                                    class="h-24 border mt-1 rounded px-4 w-11/12 bg-gray-50"
                                    id="notes"
                                    placeholder="Ingresa reglas de convivencia"
                                    name="notes" rows="15" cols="40">

                                    </textarea>
                                </div>
                                </div>


                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button id="send" class="bg-blue-500 my-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>




                    </div>
    </form>
</x-app-layout>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/gh/BossBele/cropzee@latest/dist/cropzee.js" defer></script>


<script>


$(document).ready(function(){

    var w = $("#image_demo").width();
    var h = $("#image_demo").height();

    $image_crop = $('#image_demo').croppie({
       enableExif: true,
       viewport: {
        width: w-10, height: h-20,
         type:'square' //circle
       },
       boundary:{
        width: w, height: h
       }
     });
     $('#upload_image').on('change', function(){
       var reader = new FileReader();
       reader.onload = function (event) {
         $image_crop.croppie('bind', {
           url: event.target.result
         })
       }

        reader.readAsDataURL(this.files[0]);
            $('#uploadimage').show();
        });

     $('#send').click(function(event){
       $image_crop.croppie('result', {
         type: 'canvas',
         size: 'viewport'
       }).then(function(response){
            $("#base").val(response);
            console.log(response);
       })
     });

   });

    $("#place").on('change',(e) => {
        if(e.target.value == 2){
            // es hotel
            $("#typehost").removeClass('hidden');
            $("#typerest").addClass('hidden');


            $("#divschedule").addClass('hidden');
            $(".menusection").addClass('hidden');
        }else{
            // es restaurante

            $("#typerest").removeClass('hidden');
            $("#typehost").addClass('hidden');


            $("#divschedule").removeClass('hidden');
            $(".menusection").removeClass('hidden');
        }
    });



</script>
