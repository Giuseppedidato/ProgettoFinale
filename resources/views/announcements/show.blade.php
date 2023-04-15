<x-layout>

@if($announcement ->is_accepted ?? '' && Auth::user()->is_revisor ?? '' )
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
                <div class="border border-dark  mt-3 ">
                    <h5 class="card-title ">Titolo: {{ $announcement->title }}</h5>
                    <p class="card-text mt-3  ">Descrizione: {{ $announcement->body }}</p>
                    <p class="card-text mt-3  ">Prezzo: {{ $announcement->price }}</p>
                    <p>Categoria: {{$announcement->category->name}}</p>
                    <p class="card-footer ">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                    <p><em class="fw-bolder " style="color:black"> Autore: {{ $announcement->user->name ?? '' }}</em></p>

                </div>

              </div>
        </div>
    </div>
</div>

@else
<div class="container sfondoVerde">
    <div class="row">
        <div class="col-12 text-light">
            <h1 class="display-2">Questo annuncio è in fase di revisione non puo essere visualizato senza approvazione</h1>
        </div>
    </div>
</div>
@if (Auth::user()->is_revisor ?? '')
<div class="container mt-5">
    <div class="row">
        <div class="text-center">
           <p><em style=""><h3>Ciao {{ Auth::user()->name }}</h3></em></p>
           <P><em>Questo annuncio deve essera ancora approvato</em></P>
            <a href="{{ route('revisor.index') }}" class="btn btn-success text-light my-3"><em>
                Da Approvare </em><span class="rounded-pill bg-danger  ">{{ App\Models\Announcement::toBeRevisionedCount() }}
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </div>
    </div>
</div>
@else
<div class="container mt-5">
    <div class="row">
        <div class="text-center">
            <em style=""><h3>  Vuoi lavorare con noi?</h3></em><br>
            <a href="{{ route('become.revisor') }}" class="btn btn-warning text-light my-3"><em>
                Diventa revisore</em>
            </a>
        </div>
    </div>
</div>
@endif

@endif
</x-layout>

