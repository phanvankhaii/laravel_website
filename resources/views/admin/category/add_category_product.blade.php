@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea class="form-control" style="resize: none;" rows="5" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="category_product_status">
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">THÊM DANH MỤC</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection