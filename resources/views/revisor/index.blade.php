<x-layout>
<x-navBarRevisor>
    
</x-navBarRevisor>
    <div class="container sfondoVerde mt-3">
        <div class="row">
            <div class="col-12 text-light">
                <h1 class="display-2">{{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare': 'Non ci sono annunci da
                    revisionare'}}
                </h1>

            </div>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
        {{ session('message') }}
    </div>

    @endif
    @if($announcement_to_check)
    <div class="container  ">
        <div class="row justify-content-center">
            <div class="col-7 ">
                <div id="showCarousel" class="carousel slide  mt-3">
                    <div class="carousel-inner border border-success">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/100" class="d-block w-100  " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/100" class="d-block w-100  " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/100" class="d-block w-100  " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="border border-dark  mt-5 ">
                        <h5 class="card-title  ">Titolo: {{ $announcement_to_check->title }}</h5>
                        <p class="card-text mt-3">Descrizione: {{ $announcement_to_check->body }}</p>
                        <p class="card-text mt-3 ">Prezzo: {{ $announcement_to_check->price }}</p>
                        <a href="{{ route('categoryShow', ['category'=>$announcement_to_check->category->name]) }}"></a>
                        <p class="card-footer mt-3 ">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}<br>Autore:
                            <em class="">
                                {{ $announcement_to_check->user->name ?? '' }}
                            </em>

                        </p>

                        <div class="container text-center border border-dark">
                            <div class="row  ">
                                <div class="col border-end border-dark">
                                    <form action="{{ route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])
                                    }}"method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-primary p-2 g-col-6 mb-4 mt-4" type="submit">Accetta articolo</button>
                                </form>
                            </div>

                            <div class="col">
                                <form action="{{ route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])
                                }}"method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger p-2 g-col-6 mb-4 mt-4" type="submit">Rifiuta articolo</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endif


            </x-layout>

