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
                    {{-- <img class="bd-placeholder-img card-img-top" width="100%" height="225" src=" {{ $product->images}} " alt=""> --}}


                        <img class="bd-placeholder-img card-img-top" width="100%" height="400px" src="{{url('images/'.$product->images) }}" alt="">

                        <a href="{{route('show', $product->id)}}">
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
