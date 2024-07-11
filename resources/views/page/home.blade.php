@extends('welcome')
@section('content')
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <!-- <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div> -->
                                <div class="col-sm-12">
                                    <img src="{{('public/frontend/images/banner2.jpg')}}" class="girl img-responsive" alt="" />
                                   <!--  <img src="{{('public/frontend/images/pricing.png')}}"  class="pricing" alt="" /> -->
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-12">
                                    <img src="{{('public/frontend/images/banner1.png')}}" class="girl img-responsive" alt="" />
                                   <!--  <img src="{{('public/frontend/images/pricing.png')}}"  class="pricing" alt="" /> -->
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-12">
                                    <img src="{{('public/frontend/images/banner1.png')}}" class="girl img-responsive" alt="" />
                                   <!--  <img src="{{('public/frontend/images/pricing.png')}}"  class="pricing" alt="" /> -->
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 padding-right">
                    
                   <div class="features_items">
                        <h2 class="title text-center">Sản phẩm mới</h2>
                        @foreach($all_product as $key => $product)
                       
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                        <form>
                                            @csrf   
                                            <input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_gia}}" class="cart_product_gia_{{$product->product_id}}">
                                            <input type="hidden" name="" value="1" class="cart_product_soluong_{{$product->product_id}}">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                            <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{number_format(floatval ($product->product_gia))}} VNĐ</h2>
                                            <p>{{$product->product_name}}</p>
                                            </a>
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-danger fa fa-shopping-cart tgh"> Thêm giỏ hàng</a>
                                        </form>
                                        </div>                                      
                                </div>
                            </div>
                        </div>   
                        @endforeach                   
                    </div><!--features_items-->
                    
                    <div class="features_items">
                        <h2 class="title text-center">Lap top đồ họa</h2>
                        @foreach($all_product as $key => $product)
                       
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                        <form>
                                            @csrf   
                                            <input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" name="" value="{{$product->product_gia}}" class="cart_product_gia_{{$product->product_id}}">
                                            <input type="hidden" name="" value="1" class="cart_product_soluong_{{$product->product_id}}">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                            <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{number_format(floatval ($product->product_gia))}} VNĐ</h2>
                                            <p>{{$product->product_name}}</p>
                                            </a>
                                            <!-- <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button> -->
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-danger fa fa-shopping-cart tgh"> Thêm giỏ hàng</a>
                                        </form>
                                        </div>                                      
                                </div>
                            </div>
                        </div>   
                        @endforeach                   
                    </div><!--features_items-->
                   
                    
                </div>
            </div>
        </div>
    </section>
    
      @endsection