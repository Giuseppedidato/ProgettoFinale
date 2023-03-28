<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5">Accedi</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Accedi</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>


</x-layout>
