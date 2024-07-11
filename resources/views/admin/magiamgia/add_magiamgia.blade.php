@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mã giảm giá
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
                                <form role="form" action="{{URL::to('/add-mgg')}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" name="name_mgg" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text" name="code_mgg" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng mã</label>
                                    <input type="text" name="soluong_mgg" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng giảm của mã</label>
                                    <select class="form-control input-sm m-bot15" name="tinhnang_mgg">
                                            <option value="0">-----chọn-----</option>
                                            <option value="1">giảm theo phần trăm</option>
                                            <option value="2">giảm theo số tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc số tiền giảm của mã</label>
                                    <input type="text" name="tiengiam_mgg" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian</label>
                                    <input type="text" name="time_mgg" class="form-control" id="exampleInputEmail1">
                                </div>
                                
                                <button type="submit" name="add_magiamgia" class="btn btn-info">THÊM MÃ</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection