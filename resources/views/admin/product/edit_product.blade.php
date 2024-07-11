@extends('admin_layout')        //  làm cái ưu tiên hiện sản phẩm lên đầu
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <?php
                            $massage = Session::get('message');
                            if($massage){
                                echo '<span class="text-alert">'.$massage.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_gia" class="form-control" id="exampleInputEmail1" value="{{$pro->product_gia}}">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" name="product_soluong" class="form-control" id="exampleInputEmail1" value="{{$pro->product_soluong}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" height="100" width="100">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hệ điều hành</label>
                                    <input type="text" name="product_hdh" class="form-control" id="exampleInputEmail1" value="{{$pro->product_hdh}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">CPU</label>
                                    <input type="text" name="product_CPU" class="form-control" id="exampleInputEmail1" value="{{$pro->product_CPU}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">GPU</label>
                                    <input type="text" name="product_GPU" class="form-control" id="exampleInputEmail1" value="{{$pro->product_GPU}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAM</label>
                                    <input type="text" name="product_RAM" class="form-control" id="exampleInputEmail1" value="{{$pro->product_RAM}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ROM</label>
                                    <input type="text" name="product_ROM" class="form-control" id="exampleInputEmail1" value="{{$pro->product_ROM}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" name="product_manhinh" class="form-control" id="exampleInputEmail1" value="{{$pro->product_manhinh}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Camera</label>
                                    <input type="text" name="product_camera" class="form-control" id="exampleInputEmail1" value="{{$pro->product_camera}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cổng giao tiếp</label>
                                    <input type="text" name="product_conggiaotiep" class="form-control" id="exampleInputEmail1" value="{{$pro->product_conggiaotiep}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cổng xuất</label>
                                    <input type="text" name="product_congxuat" class="form-control" id="exampleInputEmail1" value="{{$pro->product_congxuat}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">PIN</label>
                                    <input type="text" name="product_pin" class="form-control" id="exampleInputEmail1" value="{{$pro->product_pin}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bluetooth</label>
                                    <input type="text" name="product_bluetooth" class="form-control" id="exampleInputEmail1" value="{{$pro->product_bluetooth}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">WIFI</label>
                                    <input type="text" name="product_WIFI" class="form-control" id="exampleInputEmail1" value="{{$pro->product_WIFI}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cổng LAN</label>
                                    <input type="text" name="product_LAN" class="form-control" id="exampleInputEmail1" value="{{$pro->product_LAN}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bảo mật</label>
                                    <input type="text" name="product_baomat" class="form-control" id="exampleInputEmail1" value="{{$pro->product_baomat}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Âm thanh</label>
                                    <input type="text" name="product_amthanh" class="form-control" id="exampleInputEmail1" value="{{$pro->product_amthanh}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Led bàn phím</label>
                                    <input type="text" name="product_ledbanphim" class="form-control" id="exampleInputEmail1" value="{{$pro->product_ledbanphim}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" name="product_kichthuoc" class="form-control" id="exampleInputEmail1" value="{{$pro->product_kichthuoc}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khối lượng</label>
                                    <input type="text" name="product_khoiluong" class="form-control" id="exampleInputEmail1" value="{{$pro->product_khoiluong}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bảo hành</label>
                                    <input type="text" name="product_baohanh" class="form-control" id="exampleInputEmail1" value="{{$pro->product_baohanh}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hãng sản xuất</label>
                                    <input type="text" name="product_hang" class="form-control" id="exampleInputEmail1" value="{{$pro->product_hang}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" style="resize: none;" rows="5" name="product_mota" id="ckeditor1" placeholder="Mô tả danh mục">{{$pro->product_mota}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_cate">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                           @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_brand">
                                        @foreach($brand_product as $key => $brand)
                                        @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="product_status">
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="update_product" class="btn btn-info">CẬP NHẬT SẢN PHẨM</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection