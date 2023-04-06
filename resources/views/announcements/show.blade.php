<x-layout>

<div class="container sfondoVerde">
    <div class="row">
        <div class="col-12 text-light">
            <h1 class="display-2">Annuncio: {{ $announcement->title }}</h1>
        </div>
    </div>
</div>
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
                <div class="border border-success sfondoVerde mt-3 ">
                    <h5 class="card-title  ">Titolo: {{ $announcement->title }}</h5>
                    <p class="card-text ">Descrizione: {{ $announcement->body }}</p>
                    <p class="card-text ">Prezzo: {{ $announcement->price }}</p>
                    <a href="{{ route('categoryShow', ['category'=>$announcement->category->name]) }}"></a>
                    <p class="card-footer ">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}
                        Autore {{ $announcement->user->name ?? '' }}
                    </p>
                </div>

              </div>
        </div>
    </div>
</div>
</x-layout>

