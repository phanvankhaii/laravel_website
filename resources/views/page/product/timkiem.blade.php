@extends('welcome')
@section('content')
    
    
    <section>
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 padding-right">
                    
                   <div class="features_items">
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                        @foreach($timkiem_sanpham as $key => $product)
                       
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
                                            <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                                        </form>
                                        </div>                                      
                                </div>
                            </div>
                        </div>   
                        @endforeach                   
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </section>
    
        @endsection