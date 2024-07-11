@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thương hiệu sản phẩm
    </div>

    <div class="table-responsive">
                        <?php
                            $massage = Session::get('message');
                            if($massage){
                                echo '<span class="text-alert">'.$massage.'</span>';
                                Session::put('message',null);
                            }
                        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <!-- <input type="checkbox"><i></i> -->
              </label>
            </th>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng mã</th>
            <th>Điều kiện giảm</th>
            <th>Số giảm</th>
            <th>Thời gian</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($mgg as $key =>$magiamgia)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $magiamgia->name_mgg}}</td>
            <td>{{ $magiamgia->code_mgg}}</td>
            <td>{{ $magiamgia->soluong_mgg}}</td>
          
            <td><span class="text-ellipsis">
              <?php
                if($magiamgia->tinhnang_mgg==1){
                   ?>
                  giảm theo %
                  <?php
                }else{
                  ?>
                  giảm theo tiền
                  <?php
                }
             ?>
            </span></td>
            <td><span class="text-ellipsis">
              <?php
                if($magiamgia->tinhnang_mgg==1){
                   ?>
                  giảm {{$magiamgia->tiengiam_mgg}} %
                  <?php
                }else{
                  ?>
                  giảm {{number_format(floatval ($magiamgia->tiengiam_mgg))}} VNĐ
                  <?php
                }
             ?>
            </span></td>
              <td>{{ $magiamgia->time_mgg}}</td>
            <td>
              
              <a onclick="return confirm('Bạn có chắc là muốn xóa mã này không ???')" href="{{URL::to('/delete-magiamgia/'.$magiamgia->id_mgg)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer> -->
  </div>
</div>
@endsection