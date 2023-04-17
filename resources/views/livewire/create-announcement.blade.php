<div class="container">
    <div class=" col-12">
        <div>
            <h1 class="sfondoVerde">Ciao {{ auth()->user()->name }} <br>Inserisci qui il tuo annuncio</h1>
        </div>
    </div>


    @if(session()->has('message'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
        {{ session('message') }}
    </div>

    @endif

    <form wire:submit.prevent="store" enctype="multipart/form-data">
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
                <label for="temporary_images">Image</label>
                <input  type="file" name="images" wire:model="temporary_images" multiple class ="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                @error('temporary_images.*')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

        </div>

        @if(!empty($images))

        <div class="row g-3 mt-1">
            <div class="col-12">
                <h4 mt-2>Anteprima immagini</h4>
                <div  class="row border border-4 border-info rounded shadow py-4">
                    @foreach ($images as $Key =>$image)
                    <div class="col my-3">
                        <div class="img-preview mx-auto shadow rounded " style="background-image: url({{ $image->temporaryUrl() }})">
                        </div>
                        <button type="button" class="btn btn-danger text-center mt-2 mx-auto rounded-pill " wire:click="removeImage({{ $Key }})" >Cancella</button>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>



        @endif


        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary rounded-pill">Salva</button>
        </div>

    </form>

</div>
