@if ($message = Session::get('success'))
<div class="bg-green-600 px-4 py-3 text-white">
    <p class="text-center text-sm font-medium">
        {{ $message }}
    </p>
  </div>
@endif

@if ($message = Session::get('error'))
<div class="bg-red-600 px-4 py-3 text-white">
    <p class="text-center text-sm font-medium">
        {{ $message }}
    </p>
  </div>
@endif



<x-app-layout>
    <div class="px-2 md:px-16">

        <div class="px-4 md:px-16 lg:px-36">
            <a class="inline-flex w-auto  px-8 py-2 mt-8 btn bg-green-800 text-white rounded-lg" href="/places/create">
                Crear
              </a>

              @if(count($places) != 0)
                <div class="grid gap-4 grid-cols-12 mt-12 ">
                    @foreach ($places as $place)
                    <div class="col-span-12 md:col-span-6 lg:col-span-4 ">
                        <article class="overflow-hidden mb-12   rounded-lg shadow transition hover:shadow-lg">

                            <img
                            alt="Office"
                            src="{{$place->image}}"
                            class="h-56 w-full object-cover"
                            />

                            <div class=" dark:bg-gray-800  bg-white p-4 sm:p-6">
                                @if($place->status == 1)
                                    <small class="text-green-700 font-bold">Disponible</small>
                                @elseif($place->status == 2)
                                    <small class="text-gray-700 font-bold">Pendiente</small>
                                @else
                                    <small class="text-red-700 font-bold">Eliminado</small>
                                @endif
                            <time datetime="2022-10-10" class="block text-xs text-gray-500">
                                {{$place->createdAt}}
                            </time>
                            <a href="{{ route('places.show', $place->setHiddenId($place->id)) }}">
                                <h3 class="mt-0.5 text-lg text-blue-400 font-bold ">
                                    {{$place->title}}
                                </h3>
                            </a>

                            <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3">

                                {{$place->address}}
                            </p>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
              @else
                <h2 class="text-center font-bold text-2xl my-12 dark:text-white py-24">No tienes lugares agregados</h2>
              @endif
        </div>
    </div>



</x-app-layout>
