<x-layout>

    <div class="container text-center ">
        <div class="sfondoVerde mt-3">
            <h1 class="sfondoVerde">Presto.it</h1>
            <p class="h2 my-2 fw-bold">Ecco i nostri annunci</p>
        </div>


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
                        <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary shadow">Dettaglio</a>
                        <a href="#" class="btn sfondoVerde ">Categoria: {{ $announcement->category->name }}</a>
                        <br
                        <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}<br>
                            Autore :{{ $announcement->user->name ?? '' }}</p>

                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <div class="pagination justify-content-center ">
                    {{ $announcements->links() }}
        </div>

    </div>

    </x-layout>
