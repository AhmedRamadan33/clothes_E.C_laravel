@extends('layouts.HomeApp')

@section('content')
    <!-- //////////////////////////// -->
    <section class="contact mb-5">
        <div class="contact_info text-center mb-5">
            <h2>Category </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- /////// -->
    <section class="Category trending mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="category_desc">
                        <div class=" justify-content-center">
                            <select>
                                <option value="">Category</option>
                                <option value="">Category1</option>
                                <option value="">Category2</option>
                                <option value="">Category3</option>
                                <option value="">Category4</option>
                            </select>
                        </div>
                        <div class=" justify-content-center">
                            <select>
                                <option value="">Type</option>
                                <option value="">Type1</option>
                                <option value="">Type2</option>
                                <option value="">Type3</option>
                                <option value="">Type4</option>
                            </select>
                        </div>
                        <div class=" justify-content-center">
                            <select>
                                <option value="">Size</option>
                                <option value="">XXL</option>
                                <option value="">XL</option>
                                <option value="">LG</option>
                                <option value="">M</option>
                                <option value="">SM</option>

                            </select>
                        </div>
                        <div class=" justify-content-center">
                            <select>
                                <option value="">Color</option>
                                <option value="">Red</option>
                                <option value="">Green</option>
                                <option value="">Blue</option>
                                <option value="">skyblue</option>
                            </select>
                        </div>
                        <h6>Filter by Pricee</h6>
                        <form>
                            <div class="form-group">
                                <input type="range" class="form-control-range" id="formControlRange">
                            </div>
                        </form>
                        <h6>Filter by Genres</h6>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                History
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Horror - Thriller
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Love Stories
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Science Fiction
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Biography
                            </label>
                        </div>

                        <h6 class="mt-3">Filter by Brand</h6>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Green Publications
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Anondo Publications
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Rinku Publications
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Sheba Publications
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Red Publications
                            </label>
                        </div>

                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="item">
                                <div class="sora">
                                    <div class="icon">
                                        <a href="{{route('prodShow',$item->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                        <i class="fa-solid fa-heart"></i>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <img src="{{asset('files/'.$item->image)}}" alt="" />
                                </div>
                                <h3><a href="{{route('prodShow',$item->id)}}">{{$item->name}}</a></h3>
                                <h6 class="description">{{$item->description}}</h6>
                                <span>{{$item->discount_price}}<span>{{$item->price}}</span></span>
                            </div>
                        </div>
                        @endforeach
           
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
