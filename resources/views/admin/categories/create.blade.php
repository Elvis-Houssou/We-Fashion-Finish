@extends('admin.layouts')
@section('content crud')
<br><br>
    <div class="container">
        <form action=" {{route('storeCategory')}} " method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 form-floating">
                <input type="text" class="form-control" placeholder="Name input"  id="name" name="name">
                <label for="floatingInput">Entrez une catégorie</label>
            </div>

            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <div>
                <input type="submit" class="btn btn-primary" value="Soumettre">
            </div>
        </form>
    </div>
@endsection
