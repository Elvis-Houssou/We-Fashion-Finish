@extends('users.layouts')
@section('content')

    <div class="album py-5 bg-light">
        <div class="container">

            <div >
                <h5 class="text-end">Resultat : {{ $products->count() }}</h5><br>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($products as $product )

                <div class="col">

                    <div class="card shadow-sm">
                        @if ($product->category_id == 1)
                            <img class="bd-placeholder-img card-img-top" src="{{asset('storage/images/hommes/'.$product->images) }}" alt="" width="100%" height="400px">
                        @else
                            <img class="bd-placeholder-img card-img-top" src="{{asset('storage/images/femmes/'.$product->images) }}" alt="" width="100%" height="400px">

                        @endif
                        <a href="{{route('show', $product->id)}}" class="nav-link">
                            <div class="card-body">
                                <h2 class="card-text"> {{$product->name}} </h2>
                                <div class="d-flex justify-content-between align-items-center">

                                    <small class="text-muted">{{$product->price}} XOF</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

            </div><br>

            <div class="d-flex flex-row-reverse">
                {{ $products->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>

@endsection
