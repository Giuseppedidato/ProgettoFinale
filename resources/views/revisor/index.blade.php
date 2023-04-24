<x-layout>
    <x-navBarRevisor>

    </x-navBarRevisor>
    <div class="container sfondoVerde shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-2">
                <h1 class="display-4 text-center">
                    {{ $announcement_to_check ? 'Gli annunci da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
        {{ session('message') }}
    </div>

    @endif

    @if ($announcement_to_check)
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        @if ($announcement_to_check->images)
                            <div class="carousel-inner">
                                @foreach ($announcement_to_check->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(250, 250) }}" class="card-img-top"
                                            alt="Immagine Articolo">
                                        <div class="row d-flex justify-content-between mt-3">
                                            <div class="col-md-6">
                                                <h5 class="tc-accent">Revisione Immagini</h5>
                                                <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                                                <p>Satira: <span class="{{ $image->spoof }} "></span></p>
                                                <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                                                <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                                                <p>Contenuto Ammiccante: <span class="{{ $image->racy }}"></span></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="tc-accent">Tags: </h5>
                                                <div class="p-2">
                                                    @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                            <p class="d-inline">{{ $label }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://picsum.photos/1000" class="card-img-top"
                                        alt="Immagine Articolo">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/1000" class="card-img-top"
                                        alt="Immagine Articolo">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/1000" class="card-img-top"
                                        alt="Immagine Articolo">
                                </div>
                            </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="bi bi-chevron-left" style="font-size: 3rem; color: #0d6efd;" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="bi bi-chevron-right" style="font-size: 3rem; color: #0d6efd;" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-7 h-75 ms-3 mb-5 border shadow rounded">
                    <h1 class="text-center">{{ $announcement_to_check->title }}</h1>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('categoryShow', ['category' => $announcement_to_check->category]) }}"
                                class="shadow btn btn-primary">{{ $announcement_to_check->category->name }}</a>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                            <h5 class="card-text fs-4">Prezzo: {{ $announcement_to_check->price }} €</h5>
                        </div>
                    </div>
                    <hr>
                    <h5>Descrizione: </h5>
                    <p class="card-text">{{ $announcement_to_check->body }}</p>
                    <hr id="hr-show">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-md-12 text-center">
                                <h5>Articolo inserito da
                                    <em>{{ $announcement_to_check->user->name ?? '' }}</em>
                                </h5>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <p>Pubblicato il:
                                    {{ $announcement_to_check->created_at->format('d/m/Y') }} </p>
                            </div>
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
    @endif

</x-layout>

