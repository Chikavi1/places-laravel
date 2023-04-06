@if ($message = Session::get('success'))
<div class="bg-green-600 px-4 py-3 text-white">
    <p class="text-center text-sm font-medium">
        {{ $message }}
    </p>
  </div>
@endif

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
{{-- <style>
    .capital:first-letter {text-transform: uppercase}
</style> --}}

<x-app-layout >

    <div id="modalShare" class="hidden min-h-screen bg-gray-800  items-center justify-center">
        <!--MODAL ITEM-->
        <div class="bg-gray-100 w-full mx-4 p-4 rounded-xl md:w-1/2 lg:w-1/3">
          <!--MODAL HEADER-->
          <div
            class="flex justify-between items center border-b border-gray-200 py-3"
          >
            <div class="flex items-center justify-center">
              <p class="text-xl font-bold text-gray-800">Comparte tu perfil</p>
            </div>

            <div
                id="closeModal"
              class="bg-gray-300 hover:bg-gray-500 cursor-pointer hover:text-gray-300 font-sans text-gray-500 w-8 h-8 flex items-center justify-center rounded-full"
            >
              x
            </div>
          </div>

          <!--MODAL BODY-->
          <div class="my-4">
            <p>Genera más clientes al compartir tu perfil en las redes sociales.</p>
            <p class="text-sm">Copia este link</p>
            <div class="border-2 border-gray-200 flex justify-between items-center mt-4 py-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-gray-500 ml-2"
              >
                <path
                  d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"
                ></path>
                <path
                  d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"
                ></path>
              </svg>

                <p id="p1"  class="w-full outline-none bg-transparent">
                https://radi.pet/place/{{$hash}}
              </p>
              <button id="copyButton"  onclick="copyToClipboard('#p1')" class="bg-indigo-500 text-white rounded text-sm py-2 px-5 mr-2 hover:bg-indigo-600">
                  Copiar
              </button>
            </div>
          </div>
        </div>
      </div>

        <div class="md:px-16 bg-white">
            @if(Auth::user()->id === $place->id_user && $place->status == 1 )
                <div class="flex items-center mt-4 md:ml-12 px-4 py-4 gap-x-3">

                    <a href="/places/{{$hash}}/edit" class="flex items-center justify-center w-1/3 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                        <span>Editar</span>
                    </a>
                    <a href="/places/reviews/{{$hash}}" class="flex items-center justify-center w-1/3 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-yellow-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-yellow-600 dark:hover:bg-green-500 dark:bg-green-600">
                        <span>Reseñas</span>
                    </a>
                    <a id="sharebutton" class="flex items-center justify-center w-1/3 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-green-500 dark:bg-green-600">
                        <span>Compartir</span>
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-12 gap-2 md:px-12 rounded-lg" >
            <div class="col-span-12 lg:col-span-5">
                <img class="w-full object-cover lg:mt-4 md:rounded-lg" src="{{$place->image}}">
            </div>
            <div class="col-span-12 lg:col-span-5 md:ml-6 ">
                <div style="padding: 1.5em;">
                <h2 class="text-2xl mt-6 md:mt-4 lg:mt-4">{{$place->title}} <i *ngIf="verified" class="fa-regular fa-circle-check text-green-600"></i> </h2>
                <p class="mb-2"><i class="fa-solid fa-location-dot text-blue-600" ></i>{{$place->city}}  </p>
                @if($place->place == 1)
                <small >Restaurant</small>
                @elseif($place->place == 2)
                <small >Hoteles</small>
                @else
                <small>Lugar Público</small>
                @endif

                <div class="mt-4">
                    @if($place->facebook_url)
                        <a *ngIf="facebook_url" href="{{$place->facebook_url}}" target="_blank">
                            <i class="fa-brands fa-facebook text-2xl" style="color:#3b5998;"></i>
                        </a>
                    @endif
                    @if($place->instagram_url)
                        <a *ngIf="instagram_url" href="{{$place->instagram_url}}" target="_blank">
                        <i class="fa-brands fa-instagram text-2xl ml-2" style="color:#F56040;"></i>
                        </a>
                    @endif
                </div>

                @if($place->instagram_url)
                    <div *ngIf="food_pets" class="md:hidden  px-4 w-48 py-2 mt-4 text-sm rounded-full text-indigo-500 border border-indigo-500  ">
                        <i class="fa-solid fa-bone"></i> Comida para mascota
                    </div>
                @endif


                <div class="card bg-base-100 shadow-md p-4 mt-4 md:mt-2 md:p-2 lg:mt-4 lg:p-4">
                <div class="card-body">
                    <h2 class="card-title" class="text-xl font-bold text-orange-500 mt-4">Informacion importante</h2>
                    @if($place->notes)
                        <p >{{$place->notes}}</p>
                    @else
                        <p *ngIf="!notes">
                            @if($place->place == 1)
                            <span >Recuerda que cada usuario se hace responsable del cuidado de su mascota.</span>
                            @elseif($place->place == 2)
                            <span >Recuerda que cada Hotel puede tener costos extras por el tamaño de la mascota, recomendamos marcar para consultar los precios.</span>
                            @else
                            <span >Recuerda que es importante trae collar,correa y una bolsas para sus desechos.</span>
                            @endif
                        </p>
                    @endif

                </div>
                </div>

                <div class="grid grid-cols-12 gap-2 my-8 ">
                <div class="col-span-10 bg-black">
                    <a href="{{$place->google_link}}" target="_blank">
                    <p class="text-white p-2 text-center">
                        <i class="fa-brands fa-google"></i> Maps
                    </p>
                    </a>
                </div>
                <div class="col-span-2 bg-purple-800 text-center text-white p-1" >
                    <a href="tel:{{$place->cellphone}}">
                    <i class="fa-solid fa-phone p-2"></i>
                    </a>
                </div>
                </div>
                </div>
            </div>

            </div>

    <div class="px-6 md:mt-14">


    <div class="grid grid-cols-12 gap-2 md:pl-6 ">
        <div class="col-span-12 md:col-span-5 py-8  px-4">
        <h2 class="text-2xl font-bold mt-2">Descripción</h2>
        @if($place->description)
            <p  class="p-4 capital"> {{$place->description}}  </p>
        @else
            <p *ngIf="!description"  class="p-4">No cuenta con una descripción</p>
        @endif

        </div>
        <div class="col-span-12 md:col-span-5 py-8  px-4">
        <h2 class="text-2xl font-bold mt-2">Horarios</h2>

        @if($place->place == 2)
            <h2  class="p-4">No aplican Horarios</h2>
        @else
            <table class="w-full p-4" >
                <tbody>
                <tr>
                    <td>Lunes</td>
                    @if($schedule[0]["start"] != '00:00' && $schedule[0]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[0]["start"]}}  – {{$schedule[0]["end"]}}
                        </td>
                    @elseif($schedule[0]["start"] == '00:00' && $schedule[0]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[0]["start"] == '00:01' && $schedule[0]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Martes</td>
                    @if($schedule[1]["start"] != '00:00' && $schedule[1]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[1]["start"]}}  – {{$schedule[1]["end"]}}
                        </td>
                    @elseif($schedule[1]["start"] == '00:00' && $schedule[1]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[1]["start"] == '00:01' && $schedule[1]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Miercoles</td>
                    @if($schedule[2]["start"] != '00:00' && $schedule[2]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[2]["start"]}}  – {{$schedule[2]["end"]}}
                        </td>
                    @elseif($schedule[2]["start"] == '00:00' && $schedule[2]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[2]["start"] == '00:01' && $schedule[2]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Jueves</td>
                    @if($schedule[3]["start"] != '00:00' && $schedule[3]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[3]["start"]}}  – {{$schedule[3]["end"]}}
                        </td>
                    @elseif($schedule[3]["start"] == '00:00' && $schedule[3]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[3]["start"] == '00:01' && $schedule[3]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Viernes</td>
                    @if($schedule[4]["start"] != '00:00' && $schedule[4]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[4]["start"]}}  – {{$schedule[4]["end"]}}
                        </td>
                    @elseif($schedule[4]["start"] == '00:00' && $schedule[4]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[4]["start"] == '00:01' && $schedule[4]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Sabado</td>
                    @if($schedule[5]["start"] != '00:00' && $schedule[5]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[5]["start"]}}  – {{$schedule[5]["end"]}}
                        </td>
                    @elseif($schedule[5]["start"] == '00:00' && $schedule[5]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[5]["start"] == '00:01' && $schedule[5]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                <tr>
                    <td>Domingo</td>
                    @if($schedule[6]["start"] != '00:00' && $schedule[6]["end"] != '00:00')
                        <td class="text-right" >
                            {{$schedule[6]["start"]}}  – {{$schedule[6]["end"]}}
                        </td>
                    @elseif($schedule[6]["start"] == '00:00' && $schedule[6]["end"] == '00:00')
                        <td class="text-right" >
                            Descanso
                        </td>
                    @elseif($schedule[6]["start"] == '00:01' && $schedule[6]["end"] == '00:00')
                        <span class="text-right">
                            Siempre abierto
                        </span>
                    @endif
                </tr>
                </tbody>
            </table>
            @endif



        </div>

    </div>

    @if($place->pdf_menu && $place->menu)
        <a target="_blank" href="{{$place->pdf_menu}}">
            <div class="grid grid-cols-12 p-4 rounded-xl shadow-md" >
                <div class=" col-span-12  lg:col-span-4 md:ml-6" >
                <img  class="max-h-72 mx-auto rounded-xl" src="{{$place->menu}}" alt="menu">
                </div>
                <div class="col-span-12 lg:col-span-4 ml-6">
                <h2 class="text-2xl font-bold mt-6">Menú</h2>
                <p><i class="fa-solid fa-circle-info mt-2"></i> Haz clic en la imagen para ver el menú.</p>
                <p class="font-bold">Ver Menú</p>
                </div>
            </div>
        </a>
        @else
        <div class="text-red-600 text-center font-bold text-2xl my-12">
            <h1>


                <svg class="h-6 mx-auto w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </h1>
            <h2>No cuentas con Menú</h2>
        </div>
        @endif

    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-12  md:ml-8 py-10">
        <div class="p-8 shadow-lg rounded-xl h-full" style="background-color: #030284;color:#fbfcf5;">
            <h3 class="text-xl font-bold pb-4">Más Informacion sobre {{$place->title}}</h3>

            <div class="grid grid-cols-2">
            <div class="col-span-2 md:col-span-1">
                @if($place->payments_card)
                    <p *ngIf="payments_card"> <i class="fa-solid fa-check text-green-500"></i> Aceptan pagos con tarjeta</p>
                @endif
                <p class="pl-6">
                    @if($place->payments_card)
                        @if($place->methods == 4)
                            <i  class="fa-brands fa-cc-mastercard text-2xl px-1"></i>
                        @elseif($place->methods == 4)
                            <i  class="fa-brands fa-cc-visa text-2xl px-1"></i>
                        @else
                            <i class="fa-brands fa-cc-amex text-2xl px-1"></i>
                        @endif
                    @endif
                </p>
                @if($place->parking)
                <p class="py-2"><i class="fa-solid fa-check text-green-500"></i>Cuenta con estacionamiento</p>
                @else
                    <p class="py-2"><i class="fa-solid "></i>No cuenta con estacionamiento</p>
                @endif
                @if($place->wifi)
                    <p class="py-2"><i class="fa-solid fa-check text-green-500"></i> Wifi gratis</p>
                @else
                    <p class="py-2"><i class="fa-solid "></i>No tiene Wifi</p>
                @endif
            </div>
            @if($place->place != 3)
                <div class="col-span-2 md:col-span-1">
                    @if($place->public == 1)
                        <p class="py-2" ><i class="fa-solid fa-check text-green-500"></i> Para ir en Familia</p>
                    @elseif($place->public == 2)
                        <p class="py-2" ><i class="fa-solid fa-check text-green-500"></i> Para ir con Amigos</p>
                    @else
                        <p class="py-2" ><i class="fa-solid fa-check text-green-500"></i> Para ir en Grupos</p>
                    @endif

                    @if($place->accessibility)
                        <p class="py-2"><i class="fa-solid fa-check text-green-500"></i> Acceso para silla de ruedas</p>
                    @else
                        <p class="py-2"><i class="fa-solid fa-check text-green-500"></i> No tiene acceso para silla de ruedas</p>
                    @endif

                    @if($place->enviroment)
                        <p class="py-2" ><i class="fa-solid fa-check text-green-500"></i> Con Terraza</p>
                    @else
                        <p class="py-2" ><i class="fa-solid fa-check text-green-500"></i> Sin Terraza</p>
                    @endif
                </div>
                @endif
            </div>
        </div>
        </div>
    </div>


        <div class="md:ml-6">
            <h2 class="text-xl font-bold sm:text-2xl mb-6">Ubicación</h2>
            <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12  lg:col-span-6">

                <div id="mapa" class="w-full h-64 my-12 rounded-lg">

                </div>

            </div>

            <div class="col-span-12 lg:col-span-5 my-12 md:ml-6">
                <p class="font-bold text-2xl mt-4">Dirección</p>
                <p class="text-gray-600">{{$place->address}}</p>
                <a href="{{$place->address}}" target="_blank" class="text-purple-800 font-bold mb-16">Ver en maps</a>
            </div>
            </div>
        </div>

        </div>

        </div>
    </div>



</x-app-layout>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>



<script>



  function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $("#modalShare").addClass('hidden');

}

$("#closeModal").on('click',()=> {
    $("#modalShare").addClass('hidden');
    });


$("#sharebutton").on('click',()=> {
        $('#modalShare').removeClass('hidden')
        $('#modalShare').addClass('flex max-h-full')

    });


    var latitude = 20.638836149063938;
var longitude = -103.31647158992037;

var map = L.map('mapa').setView([latitude, longitude], 15);

L.tileLayer('https://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
}).addTo(map);
</script>
