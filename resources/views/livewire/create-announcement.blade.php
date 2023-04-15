<div class="">
    <div class="row text-center">
        <div>
            <h1 class="sfondoVerde">Ciao {{ auth()->user()->name }} <br>Inserisci qui il tuo annuncio</h1>
        </div>
    </div>


    @if(session()->has('message'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
        {{ session('message') }}
    </div>

    @endif

    <form wire:submit.prevent="store">
        @csrf

        <div class="row g-3 mt-3">
            <div class="col-12">
                <label for="title" type="text" class="form-control">Titolo
                    <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                </label>
                @error('title')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12 ">
                <label for="body" type="text" class="form-control">Descrizione
                    <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror"></textarea>
                </label>
                @error('body')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12">
                <label for="price" type="text" class="form-control ">Prezzo
                    <input wire:model="price" type="number"  class="form-control @error('price') is-invalid @enderror">
                </label>
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <aside class="row g-3 mt-3 ">
            <div class="col-4">
                <select wire:model.defer="category" id="category"  class="form-control form-control @error('category') is-invalid @enderror ">
                    <option value="">Scegli la categoria</option>
                    @foreach ($categories as $category  )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @error('category')
                    {{ $message }}
                    @enderror
                    @endforeach
                </select>

            </div>
        </aside>

        <div class="row g-3 mt-1">
            <div class="col-12 ">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>


        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>

    </form>

</div>
