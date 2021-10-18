@extends('layouts.frontend.frontend')
@section('frontend')
    <!-- Page Title area start -->
    <div class="page-tile-area py-3">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area End -->
    <!-- product details start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-tab-area">
                        <div class="tab-content tab-img">

                            <div class="tab-pane fade show active" id="img1" role="tabpane">
                                <img class="img-fluid"
                                    src="{{ asset('uploads/productImage') }}/{{ $productDetails->product_image }}"
                                    alt="">
                            </div>


                        </div>
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#img1" role="tab">
                                    <img class="img-fluid" src="img/pro-det-tab-img/1.jpg" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#img2" role="tab">
                                    <img class="img-fluid" src="img/pro-det-tab-img/2.jpg" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#img3" role="tab">
                                    <img class="img-fluid" src="img/pro-det-tab-img/3.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- product-details -->

                    <div class="product-details">
                        <h2>{{ $productDetails->name }}</h2>
                        <div class="rating-pro">
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <span>3 Reating(s) | Add Your Reating(s)</span>
                        </div>
                        <p>{{ $productDetails->product_info }}</p>
                        <div class="price-pro">
                            <span>$ {{ $productDetails->price }}</span>
                        </div>
                        <hr>
                    </div>


                    <!-- product-details End -->
                    <!-- options-area start -->
                    <div class="options-area">
                        <div class="title">
                            <h3>Options</h3>
                        </div>

                        <form action="#">
                            <label for="">Size <span>*</span></label>
                            <select name="" id="">
                                <option value="#">- Please select - </option>
                                <option value="1">option 1</option>
                                <option value="1">option 2</option>
                                <option value="1">option 3</option>
                                <option value="1">option 4</option>
                                <option value="1">option 5</option>
                            </select>
                            <label for="">color <span>*</span></label>
                            <select name="" id="">
                                <option value="#">- Please select - </option>
                                <option value="1">option 1</option>
                                <option value="1">option 2</option>
                                <option value="1">option 3</option>
                                <option value="1">option 4</option>
                                <option value="1">option 5</option>
                            </select>
                            <span class="required">Repuired Fiields *</span>
                        </form>
                        <form action="{{ route('cart.add') }}" method="POST" class="cart-and-action">
                            @csrf
                            <div class="quanty clearfix mb-5">
                                <input type="hidden" name="pro_id" value="{{ $productDetails->id }}">
                                <label class="float-left" for="">quantity</label>
                                <div class="float-left">
                                    <input type="number" name="product_quantity" id="" value="1" min="1">
                                </div>
                            </div>
                            <div class="cart-pro ">
                                <button class="btn btn-success">Add to cart</button>
                            </div>
                        </form>
                    </div>
                    <!-- options-area End -->
                    <div class="cart-and-action clearfix">
                        <div class="product-action-pro">
                            <a href="#"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="share-icon">
                        <img src="img/social-icon.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product info start -->
    <div class="product-info-area pt-5">
        <div class="container">
            <ul class="nav " role="tablist">
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#description" role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#customer-review" role="tab">Customer Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#product-tags" role="tab">Product Tags</a>
                </li>
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane fade " id="description" role="tabpanel">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It
                        has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                        release of Letraset sheets containing Lorem Ipsum passages.</p>
                </div>
                <div class="tab-pane fade" id="customer-review" role="tabpanel">
                    <div class="more-info">
                        <p>color</p> <span>Yellow</span>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="product-tags" role="tabpanel">
                    <div class="product-tags">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Customer Reviews</p>
                                <p>The_Blue_Sky</p>
                                <div class="rating clearfix">
                                    <p>Price</p>
                                    <div class="star">
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <span> <i class="fas far fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="rating clearfix">
                                    <p>Value</p>
                                    <div class="star">
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <span> <i class="fas far fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="rating clearfix">
                                    <p>Quality</p>
                                    <div class="star">
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <span> <i class="fas far fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="rating-bottom">
                                    <p>The_Blue_Sky </p>
                                    <p> Review by The_Blue_Sky </p>
                                    <p> Posted on 3/26/16 </p>
                                </div>

                            </div><!-- col-5 end -->
                            <div class="col-md-6">
                                <div class="customer-rating">
                                    <p>You're reviewing:</p>
                                    <p>Gobi HeatTec® Tee</p>

                                    <form action="#">
                                        <div class="form-group row">
                                            <label class="col-md-3" for="my-input">Yout rating <span>*</span></label>
                                            <div class="col-md-9">
                                                <div class="rating clearfix">
                                                    <p>Price</p>
                                                    <div class="star">
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <span> <i class="fas far fa-star"></i></span>
                                                    </div>
                                                </div>
                                                <div class="rating clearfix">
                                                    <p>Value</p>
                                                    <div class="star">
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <span> <i class="fas far fa-star"></i></span>
                                                    </div>
                                                </div>
                                                <div class="rating clearfix">
                                                    <p>Quality</p>
                                                    <div class="star">
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <i class="fas far fa-star"></i>
                                                        <span> <i class="fas far fa-star"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3" for="my-input">Nickname <span>*</span></label>
                                            <input class="col-md-9 " type="text">
                                            <span class="massage">This field is required</span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3" for="my-input">Summary <span>*</span></label>
                                            <input class="col-md-9 " type="text">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3" for="my-input">Review <span>*</span></label>
                                            <textarea class="col-md-9 " rows="1"></textarea>

                                        </div>
                                        <button type="submit">Submit review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product info end -->

    <!-- related-product-area start -->
    <div class="related-product-area mb-5">
        <div class="container">
            <div class="related-product pt-5 mt-5">

                <h3>Related Products</h3>
                <!--owl-carousel start-->
                @if (count($relatedProducts) > 0)
                    <div class="product-active owl-carousel nav-style">
                        <!--Single product start-->
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{ route('product.details', $relatedProduct->id) }}"> <img
                                            src="{{ asset('uploads/productImage') }}/{{ $relatedProduct->product_image }}"
                                            alt=""></a>
                                    <div class="product-action">
                                        <a href="#"><i class="far fa-eye"></i></a>
                                        <a href="#"><i class="fas fa-balance-scale"></i></a>
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a
                                            href="{{ route('product.details', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
                                    </h3>
                                    <div class="rating">
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                        <i class="fas far fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <span>${{ $relatedProduct->price }}</span>

                                    </div>
                                    <div class="cart-btn">
                                        <a href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!--Single product End-->

                    </div>
                @else
                    <span>No related products to show</span>
                @endif

                <!--owl-carousel end-->
            </div>
        </div>
    </div>
    <!-- related-product-area end -->
    <!-- found other products area start -->
    <div class="related-product-area">
        <div class="container">
            <div class="related-product  ">

                <h3>We found other products you might like!</h3>
                <!--owl-carousel start-->
                <div class="product-active owl-carousel nav-style">
                    <!--Single product start-->
                    @foreach ($otherProducts as $otherProduct)
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="{{ route('product.details', $otherProduct->id) }}"> <img
                                        src="{{ asset('uploads/productImage') }}/{{ $otherProduct->product_image }}"
                                        alt=""></a>

                                <div class="product-action">
                                    <a href="#"><i class="far fa-eye"></i></a>
                                    <a href="#"><i class="fas fa-balance-scale"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a
                                        href="{{ route('product.details', $otherProduct->id) }}">{{ $otherProduct->name }}</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas far fa-star"></i>
                                    <i class="fas far fa-star"></i>
                                    <i class="fas far fa-star"></i>
                                    <i class="fas far fa-star"></i>
                                    <i class="fas far fa-star"></i>
                                </div>
                                <div class="price">
                                    <span>{{ $otherProduct->price }}</span>

                                </div>
                                <div class="cart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!--Single product End-->

                    <!--Single product End-->
                </div>
                <!--owl-carousel end-->
            </div>
        </div>
    </div>

@endsection
