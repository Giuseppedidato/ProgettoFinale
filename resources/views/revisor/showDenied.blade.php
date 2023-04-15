<x-layout>

    <x-navBarRevisor>

    </x-navBarRevisor>
    @if(session()->has('message'))
    <div class="flex flex-row justify-center my-2 mt-2 alert alert-success text-center">
        {{ session('message') }}
    </div>

    @endif
    <div class="container-fluid text-center mt-5 ">
        <div class="row">
            <div class="col">
                <h3>Articoli Rifiutati</h3>
            </div>
            <table class="table table-striped-columns text-center border border-dark mt-5">
                <thead >

                    <tr>
                        <th class="border border-dark ">Data creazione</th>
                        <th class="border border-dark ">Titolo Articolo</th>
                        <th class="border border-dark">Descrizione Articolo</th>
                        <th class="border border-dark">Prezzo articolo</th>

                        <th class="border border-dark">Modifica articolo</th>


                    </tr>
                </thead>
                <tbody>




    @foreach ($announcement_to_Denied as $announcement)
    <tr>
        <td class="border border-dark "> {{ $announcement ->created_at}}</td>
        <td class="border border-dark "> {{ $announcement->title}}</td>
        <td class="border border-dark"> {{ $announcement->body}}</td>
        <td class="border border-dark"> {{ $announcement ->price}}</td>
        <div class="container">
            <div class="">
                <div class="">
                    <td class="border border-dark">
                        <form action="{{ route('revisor.accept_announcement', ['announcement'=>$announcement])
                        }}"method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-primary " type="submit">Approva</button>
                    </form>
                    </td>
                </div>

     </tr>




            </div>

        </div>

    @endforeach



                </tbody>
            </table>

        </div>
    </div>

    <div class="container-fluid text-center mt-5">
        <div class="row">
            <div class="col">

                    <td class="text-center border border-dark">
                        <button  class="btn btn-sm" >
                            <a href="#" class="btn btn-primary">fai qualcosa O CAVALI </a>
                        </button>

                        <td class="text-center border border-dark">
                            <button  class="btn btn-sm" >
                                <a href="#" class="btn btn-primary">fai qualcosa O CAVALI </a>
                            </button>

            </div>
        </div>
    </div>


    </x-layout>
