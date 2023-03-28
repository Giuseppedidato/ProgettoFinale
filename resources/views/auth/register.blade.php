<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5">Registrati</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf


                    <div class="row g-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name" >
                                @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>


                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" >
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" >
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="password_confirmation">Conferma Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            @error('password_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Registrati</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-layout>
