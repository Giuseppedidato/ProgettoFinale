<x-layout>

    <div class="container text-center ">

        <div class="row col-12 mt-3 sfondoVerde" style=".sfondoVerde">
             <h1 class="">Presto.it</h1>
            <p class="h2 my-2 fw-bold">Esplora la categoria: {{ $category->name  }}</p>
        </div>
        @if(session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>

        @endif

        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3 mt-3">
            @forelse($category->announcements->where('is_accepted', true)->sortByDesc('created_at') as $announcement)
            <div class="col-12 col-md-4 my-4 ">
                <div class="p-3"></div>
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 " alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <h3 class="card-text">{{$announcement->body}}</h3>
                        <p class="card-text">{{$announcement->price}}</p>
                        <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary">Dettaglio</a>

                        <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}<br>
                            Autore :{{ $announcement->user->name ?? '' }}</p>

                    </div>
                </div>
            </div>
            @empty

            <div class="card">
                <h5 class="card-header">Ciao   {{ auth()->user()->name ?? 'Non sei ancora registrato cosa aspetti'}} </h5>
                <div class="card-body">
                  <h5 class="card-title">Non sono presenti articoli per la categoria selezionata</h5>
                  <p class="card-text">Ne vuoi pubblicare uno?</p>
                  <div class="d-inline">
                    <a href="{{ route('announcements.create') }}" class="btn btn-success">Inserisci Annuncio</a>
                  </div>

                </div>
              </div>


            @endforelse ($category->$announcements as $announcement)




        </div>

    </div>

    </x-layout>
