@extends('admin.layouts')
@section('content crud')
<br><br>
    <div class="container">
        <form action=" {{route('storeProduct')}} " method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" placeholder="Name input"  id="name" name="name">
                <label for="floatingInput">Name</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Description input" id="description" name="description" style="height: 100px"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3 form-floating">
                <input type="number" class="form-control" placeholder="Price input"  id="price" name="price">
                <label for="floatingInput">Prix</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Reference input" id="reference" name="reference" style="height: 100px"></textarea>
                <label for="floatingTextarea">Réference</label>
            </div>

            {{-- checkBox size --}}
            <label for="">Tailles</label>
            <div class="mb-3 d-flex">
                <div class="form-check " style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="S" id="S">
                    <label class="form-check-label" for="flexCheckDefault">
                      S
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="M" id="M">
                    <label class="form-check-label" for="flexCheckChecked">
                        M
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="L" id="L">
                    <label class="form-check-label" for="flexCheckChecked">
                        L
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="XS" id="XS">
                    <label class="form-check-label" for="flexCheckChecked">
                        XS
                    </label>
                </div>
                <div class="form-check" style="padding: 20px;">
                    <input class="form-check-input" type="checkbox" name="size[]" value="XL" id="XL">
                    <label class="form-check-label" for="flexCheckChecked">
                        XL
                    </label>
                </div>

            </div>

            <div class="mb-3">
                <select name="visibility" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Visibilité</option>
                    <option name="visibility" value="Publié">Publié</option>
                    <option name="visibility" value="Non publié">Non publié</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="state" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Etat</option>
                    <option name="state" value="En solde">En solde</option>
                    <option name="state" value="Standard">Standard</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Catégorie</option>
                    @foreach ($categories as $categorie)
                        <option value=" {{$categorie->id}} ">{{$categorie->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formFileLg" class="form-label">Image du produit</label>
                <input class="form-control form-control-lg" type="file" name="images" accept="image/png, image/jpeg">
            </div>

            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <div>
                <input type="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
    </div>
@endsection
