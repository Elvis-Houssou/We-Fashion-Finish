@extends('users.layouts')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-4 ">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="400px" src="{{url('images/'.$product->images) }}" alt="">
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h1>{{ $product->name }}</h1>
                            <div class="card_area d-flex align-items-center">
                                <h3 style="margin-right: 30px">{{ $product->price }} XOF</h3>
                                <h3 class="btn btn-dark">{{ $product->state }}</h3>
                                <br>
                            </div>
                            <h5>Description :</h5>
                            <p>{{ $product->description }}</p>
                            <div class="product_count">
                                <label for="qty">Taille:</label>
                                <select name="size" id="" maxlength="12" class="input-text qty">
                                    <option value="">Choisis la taille</option>
                                    @php
                                        $fill = $product->size;
                                        $new = explode(',', $fill)

                                    @endphp
                                    @foreach ($new as $news)
                                    <option value="M">{{$news}}</option>

                                    @endforeach
                                    {{-- <option value="L">L</option> --}}
                                    {{-- <option value="XL">XL</option> --}}
                                    {{-- @foreach ($product as $products)
                                        <option value=" {{$products->sizes}} ">{{$products->sizes->name}} </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <br>
                            <div class="card_area d-flex align-items-center">

                                <a href="{{route('solde')}}"><button type="submit" class="btn btn-dark">Acheter</button></a>
                            </div>
                            {{-- <form action=" {{ ('/panier/ajouter') }} " method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value=" {{ $article->id }} ">
                                <br>
                                <div class="card_area d-flex align-items-center">
                                <button type="submit" class="btn btn-dark">Ajouter au panier</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <br>
                        <h5>Réference de l'article : </h5>
                        <p>{{ $product->reference }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </div>
</div>

@endsection
