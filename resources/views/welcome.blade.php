<x-layout>

    <div class="container text-center  ">

        @if(session()->has('access.denied'))
        <div class="flex flex-row justify-center my-2 alert alert-danger">
            {{ session('access.denied') }}
        </div>

        @endif
        @if(session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>

        @endif

        <div class="row ">
            <div  class="col-12  coloresfondonero" >
                <img src="https://picsum.photos/30" alt="">
                <span class="textwhite">Impara e risparmi se scegli AulabSchool. Sconto promo Fino al 03 aprile. Non perderti l'offerta cosa apetti?  📞03001245451</span>
            </div>
            <header class="container  header-title d-inline">
                <div class="row ">
                    <div class="col-6 text-center ">
                        <h3 class="header1 "> Comincia a guadagnare <br>
                            Dai al tuo usato una seconda occasione:<br>
                            vendi quello che non usi più, <br>
                            <span class="">PRESTO.</span></h3><br>
                            <h4>Carica qui il tuo annuncio cosa aspetti</h4><br>
                            <a href="{{ route('announcements.create') }}" class="btn btn-primary">
                                Inserisci Annuncio</a>

                            </div>
                            <div class="col-6 d-inline text-end">
                                <figure class="">
                                    <div class="">
                                        <img src="https://picsum.photos/500" class="" alt="" style="">
                                    </div>


                                </figure>

                            </div>
                        </div>


                </div>
             </header>


                <div>

                </div>
                <section class="text-center mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class=" ">
                                <h1 class=""> <strong>{{ __('ui.titoloWelcome') }}</strong> </h1>
                                <p class="h2 my-2 fw-bold"></p>
                            </div>
                        </div>
                    </div>

                </section>






                <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                    @foreach ($announcements as $announcement)

                    <div class="col-12 col-md-4 my-4 ">
                        <div class="p-3"></div>
                        <div class="card shadow" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top p-3 " alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <h3 class="card-text">{{$announcement->body}}</h3>
                                <p class="card-text">{{$announcement->price}}</p>

                                <div class="grid gap-0 row-gap-3">
                                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary p-2 g-col-6 ">Dettaglio</a>
                                    <a href="{{ route ('categoryShow', ($announcement->category)) }}" class="btn sfondoVerde p-2 g-col-6">Categoria: {{ $announcement->category->name }}</a>
                                </div>
                                <br
                                <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}<br>
                                    Autore :{{ $announcement->user->name ?? '' }}</p>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </x-layout>
