@extends('admin.layouts')
@section('content crud')
<br><br>
    <div class="container">
        <form action=" {{route('updateProduct',$product)}} " method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 form-floating">
                <input type="text" class="form-control" placeholder="Name input" value="{{ $product->name }}"  id="name" name="name">
                <label for="floatingInput">Name</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Description input" id="description" name="description" style="height: 100px">{{ $product->description }}</textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3 form-floating">
                <input type="number" class="form-control" placeholder="Price input" value="{{ $product->price }}"  id="price" name="price">
                <label for="floatingInput">Prix</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Reference input" id="reference" name="reference" style="height: 100px">{{ $product->reference }}</textarea>
                <label for="floatingTextarea">Réference</label>
            </div>

            {{-- checkBox size --}}
            <label for="">Tailles</label>
            <div class="mb-3 d-flex">
                <div class="form-check " style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="S" id="S" {{ in_array('S', explode(',', $product->size)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                      S
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="M" id="M" {{ in_array('M', explode(',', $product->size)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        M
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="L" id="L" {{ in_array('L', explode(',', $product->size)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        L
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="XS" id="XS" {{ in_array('XS', explode(',', $product->size)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        XS
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="XL" id="XL" {{ in_array('XL', explode(',', $product->size)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        XL
                    </label>
                </div>

            </div>

            <div class="mb-3">
                <select name="visibility" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option name="state" value="Publié" {{$product->visibility == "Publié" ? 'selected' : "" }}>Publié</option>
                    <option name="state" value="Non publié" {{$product->visibility == "Non publié" ? 'selected' : "" }}>Non publié</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="state" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    {{-- <option selected>{{ $product->state }}</option> --}}
                    {{-- @foreach ($product as $products)
                        <option value=" {{$categorie->id}}" {{ $categorie->id == $product->category_id ? 'selected' : "" }}>{{$categorie->name}} </option>
                    @endforeach --}}
                    <option name="state" value="En solde" {{$product->state == "En solde" ? 'selected' : "" }}>En solde</option>
                    <option name="state" value="Standard" {{$product->state == "Standard" ? 'selected' : "" }}>Standard</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    {{-- <option selected>Catégorie</option> --}}
                    @foreach ($categories as $categorie)
                        <option value=" {{$categorie->id}}" {{ $categorie->id == $product->category_id ? 'selected' : "" }}>{{$categorie->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formFileLg" class="form-label">Image du produit</label>
                <div class="mb-3 d-flex align-items-center">
                    <div>
                    <input class="form-control form-control-lg" type="file" name="images" accept="image/png, image/jpeg">
                    <input type="hidden" name="old_image" value="{{ $product->images }}">
                    {{-- </div>
                    <label for="formFileLg" class="form-label">
                        @if ($product->category_id == 1)
                            <img class="bd-placeholder-img card-img-top" width="100%" height="200px" src="{{url('images/hommes/'.$product->images) }}" alt="">
                        @else
                            <img class="bd-placeholder-img card-img-top" width="100%" height="200px" src="{{url('images/femmes/'.$product->images) }}" alt="">

                        @endif
                    </label> --}}
                </div>


            </div>

            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <div>
                <input type="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
    </div>
@endsection
