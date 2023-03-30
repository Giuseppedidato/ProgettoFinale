<nav class="navbar navbar-expand-lg bg-body-tertiary " style="background-color:white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('announcements.index') }}">Tutti gli annunci</a>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn btn-warning dropdown-toggle" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Categorie
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ($categories as $category )
                        <li><a class="dropdown-item" href="{{ route ('categoryShow', compact('category')) }}" >{{$category->name }}</a></li>

                        @endforeach
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <button class="btn btn-warning dropdown-toggle" id="usersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Autori
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ($users as $user )
                        <li><a class="dropdown-item" href="{{ route ('userShow', compact('user')) }}" >{{$user->name }}</a></li>

                        @endforeach
                    </ul>
                  </li>


                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                </li>



                @else
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('announcements.create') }}">Inserisci Annuncio</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Inserisci </a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"><p class=" "></p> </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout" onclick="event.
                    preventDefault();getElementById('form-logout').submit();">Logout</a></li>
                    <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>

            @endguest
        </ul>
    </div>
    <form class="d-flex " role="search">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>

    </form>

</div>

</nav>



