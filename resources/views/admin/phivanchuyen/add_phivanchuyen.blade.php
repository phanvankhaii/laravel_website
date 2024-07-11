@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm phí vận chuyển
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
                                <form>
                                    @csrf
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Tỉnh Thành Phố</label>
                                    <select class="form-control input-sm m-bot15 choose tinhthanh" name="tinhthanh" id="tinhthanh">
                                            <option value="">-----Chọn Tỉnh Thành Phố-----</option>
                                        @foreach($tinhthanh as $key =>$th)
                                            <option value="{{$th->matp}}">{{$th->name_tinhthanh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Quận Huyện</label>
                                    <select class="form-control input-sm m-bot15 choose quanhuyen" name="quanhuyen" id="quanhuyen">
                                            <option value="">-----Chọn Quận Huyện-----</option>           
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Xã Phường</label>
                                    <select class="form-control input-sm m-bot15 xaphuong" name="xaphuong" id="xaphuong">
                                            <option value="">-----Chọn Xã Phường-----</option>  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phí vận chuyển</label>
                                    <input type="text" name="phivanchuyen" class="form-control phiship" id="exampleInputEmail1" >
                                </div>

                                <button type="button" name="add_phivanchuyen" class="btn btn-info add_phivanchuyen">THÊM PHÍ VẬN CHUYỂN</button>
                            </form>
                            </div>
                            <br>

                            <div id="load_phivanchuyen">

                                
                            </div>

                        </div>
                    </section>

            </div>
@endsection