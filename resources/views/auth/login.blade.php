<x-layout>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-6 mx-auto border border-dark">
                <h1 class="mb-5 mt-5 text-center">Accedi</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row g-3 justify-content-center ">

                        <div class="col-7">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-7">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                        </div>
                        <div class="row mt-3 mb-5 text-center">
                            <div class="">
                                <button class="btn btn-primary " type="submit">Accedi</button>
                            </div>


                        </div>

                    </div>


                </div>


            </form>

        </div>

    </div>
    <div class="container text-center ">
        <div class="row mt-5">
            <div class="col-6 mx-auto">
                <p><em>Sei nuovo su Presto ?
                    <br></em></p>
                <form action="{{ route('register') }}">
                    <div class=" text-center">
                        <button class="btn btn-primary " type="" method="POST" >Crea il tuo account Presto</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layout>
