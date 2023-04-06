@if ($message = Session::get('success'))
<div class="bg-green-600 px-4 py-3 text-white">
    <p class="text-center text-sm font-medium">
        {{ $message }}
    </p>
  </div>
@endif

        <x-app-layout >
            <section class="bg-white">
                <div class=" mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="title">
                    <p class="mb-4 text-4xl font-bold text-gray-800">
                    Reseñas de tu negocio
                    </p>

                </div>

                <div class="mt-8 grid grid-cols-1 gap-x-16 gap-y-12 lg:grid-cols-2" >
                    @foreach($reviews as $review)
                        <blockquote >
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex font-bold text-yellow-300">
                                {{ $review->score }} / 10
                            </div>
                        </header>
                            <small>Comentario del cliente:</small>
                            <p class="mt-2 text-gray-700 capital">
                                {{ $review->comments}}
                            </p>

                            <footer class="my-4 ">
                                <p class="capital text-xs text-gray-500">{{ $review->date}}</p>
                            </footer>

                            {{-- <a id="idb" data-toggle="modal" href="#addBookDialog" data-id="ISBN564541" class="">
                                Contestar
                            </a> --}}

                            @if($review->reply)
                            <small>Respuesta del negocio:</small>
                            <p>{{ $review->reply }}</p>
                            @else
                            <a data-toggle="modal" data-id="{{$review->id}}" title="Add this item" class="open-AddBookDialog mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="#addBookDialog">
                                Contestar</a>
                                @endif


                        </blockquote>
                    @endforeach

                    {{ $reviews->links() }}


                </div>



                </div>
                @if(count($reviews) == 0)
                    <div >
                        <h2 class="text-center my-10 text-gray-600 font-bold text-3xl py-24" >No hay reseñas.</h2>
                    </div>
                @endif

                {{-- <div class="title">
                <p class="mb-4 text-2xl  ml-8  font-bold text-gray-800">
                    Recomendaciones en las reseñas
                </p>
                </div> --}}

            </section>


            <div id="ass" class="modal hide hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <form action="{{route('reviews.store')}}"  method="POST">
                    @csrf
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
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Contestar Reseña</h3>
                                <p>Recuerda no enviar comentarios agresivos, porque puedes ser bloqueado por la plataforma de forma permantente.</p>


                                <div class="mt-2 w-full">
                                <textarea required="true" placeholder="Ingresa tu comentario" name="reply" class="w-full  bg-gray-100">

                                </textarea>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="reviewId" value=""/>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Contestar</button>
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

    $("#closebutton").on('click',()=> {
        $('#ass').addClass('hidden')
    });





</script>
