@extends('welcome')
@section('content')

<!--features_items-->
<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">  <!-- $cate->category_id truyeenf id -->
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    
                        <div class="brands_products">
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"><!-- (50) --></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    
                   <div class="features_items">
                        @foreach($category_name as $key => $name)
                        <h2 class="title text-center">{{$name->category_name}}</h2>
                        @endforeach
                        @foreach($category_by_id as $key => $product)
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <div class="col-sm-4">
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

                                <!-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>   
                        </a> 
                        @endforeach                   
                    </div>
                </div>
            </div>
        </div>
    </section>
                     
@endsection







                    
