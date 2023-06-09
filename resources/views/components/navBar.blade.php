<header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand me-4 " href="/"><em>Presto.it</em></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('ui.registrati') }}</a>
                    </li>
                    <li class="nav-item spazio ">
                        <a class="nav-link text-white me-5" href="{{ route('login') }}">{{ __('ui.accedi') }}</a>
                    </li>

                    @else
                </li>
                <li class="nav-item me-3 ">
                    <a class="nav-link text-white" href="{{ route('announcements.create') }}">{{ __('ui.Inserisci_Annuncio') }}</a>
                </li>

                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">xxx </a></li>
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    <li><hr class="dropdown-divider"><p class=" "></p> </li>
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    <li><a class="dropdown-item" href="/logout" onclick="event.
                        preventDefault();getElementById('form-logout').submit();">Logout</a></li>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>



                @if(Auth::user()->is_revisor)
                <div>
                    <div>
                        <div>
                            <li class="nav-item ">
                                <a href="{{ route('revisor.index') }}" class="nav-link btn btn-dark me-4 text-white bordi  " aria-current="page">
                                    <em >{{ __('ui.areaRevisore') }}</em>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
                @endif

                @endguest

                <li class="nav-item dropdown  ">
                    <button class="btn btn-outline-light " id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categorie') }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark ">
                        @foreach ($categories as $category )
                        <li><a class="dropdown-item" href="{{ route ('categoryShow', compact('category')) }}" >{{$category->name }}</a></li>

                        @endforeach
                    </ul>
                </li>
                <form class="d-flex d-inline " action="{{ route('announcements.search') }}" method="GET">
                    <input class="form-control larghezza " type="search" placeholder="Search" aria-label="Search" name="searched">
                    <button class="btn btn-outline-light me-5" type="submit">🔍</button>
                </form>



                <li class="nav-item  ">
                    <a class="nav-link active " aria-current="page" href="{{ route('announcements.index') }}">{{ __('ui.annunci') }}</a>
                </li>

                <li class="nav-item  ">
                    <a class="nav-link active " aria-current="page" href="#"><img src="" alt=""><i class="bi bi-cart-dash"> </i>  {{ __('ui.carrello') }}</a>
                </li>


                <li class="nav-item dropdown  ">
                    <a class="nav-link dropdown-toggle text-white text-center" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Set language
                </a>
                <ul class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                    <li class="nav-item mt-2 "><center><x-_locale lang="it" nation='it' /></center></li>
                    <li class="nav-item mt-2 "><center><x-_locale lang="en" nation='gb' /></center></li>
                    <li><hr class="dropdown-divider"><p class=" "></p> </li>
                    <li class="nav-item mt-2 "><center><x-_locale lang="de" nation='de' /></center></li>
                    <li class="nav-item mt-2 "><center><x-_locale lang="es" nation='es' /></center></li>
                    </ul>
                </li>







            </div>
        </div>
    </nav>
</header>







