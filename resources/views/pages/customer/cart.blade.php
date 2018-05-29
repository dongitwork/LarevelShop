@extends('templates.master')
@section('content')
<h3>Giỏ hàng của bạn</h3>
<div class="cart">
	<div class="col-md-12">
        {{Form::open()}}
		<table class="table table-striped">
  			<thead>
                <tr class="menu">
                    <th class="col-md-2">Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $totalPrice = 0;
            ?>
            @if(session()->has('Product'))
                @foreach(session()->get('Product') as $item)
                    <tr>
                        <td style="vertical-align: middle">
                            <a href="{{$item['ProductURL']}}"><img src="{{ asset('/images/product/'.$item['Image'].'') }}" alt="" ></a>
                        </td>
                        <td style="vertical-align: middle" class="name"><a href="{{$item['ProductURL']}}">{{$item['ProductName']}}</a></td>
                        <td style="vertical-align: middle">{{$item['Price']}}</td>
                        <td style="vertical-align: middle">
                            <select name="quantity[]" class="form-control" style="width: 80px;">
                                @for($i = 1; $i <= $item['Quantity']; $i++)
                                <option value="{{$i}}" {{$i == $item['QuantityPurchased'] ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                            <input type="hidden" name="ProductPublishId[]" value="{{$item['ProductPublishId']}}">
                            {{--{{Form::selectRange('QuantityPurchased','1',$item['Quantity'],['value' => $item['QuantityPurchased'], 'style' => 'width:100px;'])}}--}}
                            {{-- <input type="number" name="quantity" min="1" max="{{$item['Quantity']}}" value="{{$item['QuantityPurchased']}}">--}}
                        </td>
                        <?php
                            $totalPrice = $totalPrice + $item['PriceWithoutFormat']*$item['QuantityPurchased'];
                        ?>
                        <td style="vertical-align: middle">{{number_format(round($item['PriceWithoutFormat']*$item['QuantityPurchased']),0, ',', ',')}}</td>
                        <td style="vertical-align: middle"><a href="{{URL::route('remove.shopping.cart.item',$item['ProductPublishId'])}}"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                @endforeach
            </tbody>
		</table>
        @else
            <div><p>Giỏ hàng của bạn đang trống</p></div>
        @endif
        <div class="cart-tong">
            <div class="cart-tong-tt">
                <p>Tổng cộng: <span>{{number_format(round($totalPrice),0, ',', ',')}} VNĐ</span></p>
                <p>Phí vận chuyển: <span>miễn phí</span></p>
            </div>
            <p class="tongtien">Tổng thanh toán:<span>  {{number_format(round($totalPrice),0, ',', ',')}} VND</span></p>
        </div>
		<div class="btn-group col-md-5 col-md-offset-7" role="group">
        		<a href="{{URL::to('/')}}" class="btn btn-primary">TIẾP TỤC MUA</a>
            @if(!Session::get('Product') == null)
                <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                <button name="update" type="submit" class="btn btn-danger" value="Update">CẬP NHẬT GIỎ HÀNG</button>
                <button name="redirect" type="submit" class="btn btn-success" value="Redirect">THANH TOÁN</button>
        		{{--<a href="{{URL::to('/payment',$totalPrice)}}" class="btn btn-success">THANH TOÁN</a>--}}
            @else
                <button class="btn btn-danger" disabled>CẬP NHẬT GIỎ HÀNG</button>
                <a class="btn btn-success" disabled>THANH TOÁN</a>
            @endif
        </div>
        {{Form::close()}}
	</div>
</div>
@stop