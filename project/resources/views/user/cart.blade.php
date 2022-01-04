@extends('user.user_layout')
@section('content')
<main>
    <div class="container">
        <div style="padding: 10px 0">
            <form data-url="{{ route('user.cart_store') }}" class="check_out" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="your_cart">
                    <div class="col-info-add">
                        <h1 class="text-center" style="padding-top : 10px">Thông tin khách hàng</h1>
                        <div class="form-row-add">
                            <div class="col-add col-name">
                                <label class="form-label" for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Họ Tên">
                            </div>
                            <div class="col-add col-num">
                                <label class="form-label" for="phone">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" placeholder="Điện Thoại">
                            </div>
                            <div class="col-add col-email">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="col-add col-text">
                                <label class="form-label" for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" placeholder="Địa chỉ">
                            </div>

                        </div>
                    </div>
                    <div data-url="{{ route('user.delete_cart') }}" class="cus_cart">
                        <h1 class="text-center" style="padding-top : 10px">Chi tiết giỏ hàng</h1>
                        @if (session()->exists('cart'))
                        <table class="table update_cart_url" data-url="{{ route('user.update_cart') }}">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Ảnh </th>
                                <th scope="col" class="text-center">Sản phẩm</th>
                                <th scope="col"  style="width: 50px" class="text-center">Số lượng</th>
                                <th scope="col" class="text-center">Giá</th>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ( $cart as $id => $item )
                                @php
                                    $total += $item['price'] * $item['quantity']
                                @endphp
                                    <tr style="border-bottom: 1px solid #ccc;">
                                        <td class="image text-center" style="width : 20%">
                                            <img width="100%" src="{{ url($item['image']) }}" alt="{{$item['image'] }}">
                                        </td>
                                        <td class="text-center">{{ $item['name'] }}</td>
                                        <td class="text-center">
                                            <input style="width: 50px;" type="number" value="{{ $item['quantity'] }}" class="quantity" min="1">
                                        </td>
                                        <td class="text-center">{{ number_format($item['price'] * $item['quantity']) }} VND</td>
                                        <td class="d-flex" style="border:none">
                                            
                                            <a href="" data-id="{{ $id }}" class=" cart_update">Cập nhật</a>
                                            <a href="" data-id="{{ $id }}" class="btn btn-danger cart_delete">Xoá</a>
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                            <tfoot>
                                <tr class="total-cart">
                                    <td  class="text-center"><b>TỔNG TIỀN</b></td>
                                    <td colspan="3" class="text-center" ><b>{{ number_format($total) }} VND</b></td>
                                    <td colspan="1" class="" >
                                        <a href="" class="btn btn-warning check_out_btn"><b>Thanh toán</b></a>
                                    </td>
        
                                </tr>
                            </tfoot>
                        </table>
                        @else 
                            <div class=" text-center">
                                <img width: 60%; src="{{ URL::asset('user/img/emptycart.png'); }}" alt="">
                            </div>              
        
                        @endif
                    </div>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection