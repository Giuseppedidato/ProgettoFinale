<x-layout>

    <div class="container text-center ">
        <div class="sfondoVerde mt-3">
            <h1 class="sfondoVerde">Presto.it</h1>
            <p class="h2 my-2 fw-bold">Ecco i nostri annunci</p>
        </div>
        @if(session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>

        @endif

        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
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

            <div class="pagination justify-content-center mt-5">
                {{ $announcements->links() }}

            </div>


        </div>

    </div>

    </x-layout>
