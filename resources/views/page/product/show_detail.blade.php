@extends('welcome')
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">   
                @foreach($product_detail as $key =>$value) 
                    <div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />

							<form action="{{URL::to('/save-cart')}}" method="POST">
								@csrf
								<span>
									<span style="color: red">{{number_format(floatval ($value->product_gia))}} VNĐ</span>
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" value="1" /><br>	
									<input name="productid_hidden" type="hidden" value="{{$value->product_id}}" /><br>
								
								<button type="submit" class="btn btn-danger ">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
								</button>
								</span>
							</form>

								<p><b>Số lượng sản phẩm:</b> {{$value->product_soluong}}</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					

<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Cấu hình</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết</a></li>
								<!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								
								   <h2>Cấu hình sản phẩm</h2>
								   <table class="table table-bordered table-striped table-responsive-stack"  id="tableOne">
								      <thead class="thead-dark">
								        <!--  <tr>
								            <th>Name</th>
								            <th>Color</th>
								         </tr> -->
								      </thead>
								      <tbody>
								         <tr>
								            <td>Hãng sản xuất</td>
								            <td>{{$value->product_hang}}</td>
								         </tr>
								         <tr>
								            <td>Tên sản phẩm</td>
								            <td>{{$value->product_name}}</td>
								         </tr>
								         <tr>
								            <td>Bộ sử lý (CPU)</td>
								            <td>{{$value->product_CPU}}</td>
								         </tr>
								         <tr>
								            <td>GPU</td>
								            <td>{{$value->product_GPU}}</td>
								         </tr>
								         <tr>
								            <td>RAM</td>
								            <td>{{$value->product_RAM}}</td>
								         </tr>
								         <tr>
								            <td>ROM</td>
								            <td>{{$value->product_ROM}}</td>
								         </tr>
								         <tr>
								            <td>Hệ điều hành</td>
								            <td>{{$value->product_hdh}}</td>
								         </tr>
								         <tr>
								            <td>Màn hình</td>
								            <td>{{$value->product_manhinh}}</td>
								         </tr>
								         <tr>
								            <td>Camera</td>
								            <td>{{$value->product_camera}}</td>
								         </tr>
								         <tr>
								            <td>Cổng giao tiếp</td>
								            <td>{{$value->product_conggiaotiep}}</td>
								         </tr>
								         <tr>
								            <td>PIN</td>
								            <td>{{$value->product_pin}}</td>
								         </tr>
								         <tr>
								            <td>Bluetooth</td>
								            <td>{{$value->product_bluetooth}}</td>
								         </tr>
								         <tr>
								            <td>WIFI</td>
								            <td>{{$value->product_WIFI}}</td>
								         </tr>
								         <tr>
								            <td>LAN</td>
								            <td>{{$value->product_LAN}}</td>
								         </tr>
								         <tr>
								            <td>Bảo mật</td>
								            <td>{{$value->product_baomat}}</td>
								         </tr>
								         <tr>
								            <td>Âm thanh</td>
								            <td>{{$value->product_amthanh}}</td>
								         </tr>
								         <tr>
								            <td>Led bàn phím</td>
								            <td>{{$value->product_ledbanphim}}</td>
								         </tr>
								         <tr>
								            <td>Kích thước</td>
								            <td>{{$value->product_kichthuoc}}</td>
								         </tr>
								         <tr>
								            <td>Khối lượng</td>
								            <td>{{$value->product_khoiluong}}</td>
								         </tr>
								         <tr>
								            <td>Bảo hành</td>
								            <td>{{$value->product_baohanh}}</td>
								         </tr>
								      </tbody>
								   </table>
								    <!-- <div class="show-more">
        								<a href="#">Show more</a>
        								<style type="text/css">
        									.show-more {
    											padding: 10px 0;
    											text-align: center;
											}
        								</style>
    								</div> -->
							</div>

							<!-- chi tiết sản phẩm -->
							<div class="tab-pane fade " id="companyprofile"  >
								<p id="ckeditor">{{$value->product_mota}}</p>
								<!-- <p>{!!$value->product_mota!!}</p> -->  <!-- hiển thị các kiểu, kí tự văn bản... -->
									
							</div>
							
							
							<!-- đánh giá -->
							<div class="tab-pane fade " id="reviews" >
								<div class="col-sm-12">
									
									<form action="#">
										<span>
											<input type="text" placeholder="Nhập tên của bạn"/>
											<input type="email" placeholder="Nhập địa chỉ email"/>
										</span>
										<textarea name="" placeholder="Để lại ý kiến của bạn tại đây" ></textarea>
										<b></b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Gửi
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					@endforeach


<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm tương tự</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($relation as $key => $tuongtu)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to('public/upload/product/'.$tuongtu->product_image)}}" alt="" />
													<h2>{{number_format(floatval ($tuongtu->product_gia))}} VNĐ</h2>
													<p>{{$tuongtu->product_name}}</p>
													<!-- <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button> -->
													<a href="{{URL::to('/chi-tiet-san-pham/'.$tuongtu->product_id)}}" class="btn btn-danger fa fa-shopping-cart tgh"> Thêm giỏ hàng</a>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>
                    
                </div>
            </div>
        </div>
    </section>

      @endsection
             
