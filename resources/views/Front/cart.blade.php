@extends('Layouts.frontLayout')
@section('content')

<section class="page-title-area"  style="background-image: url(/{{(isset($data['settings']['breadcrumbImage']))?$data['settings']['breadcrumbImage']:''}})" >
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>{{trans('langFront.cart')}}</h2>
<ul>
<li><a href="{{route('Front.index')}}">{{trans('langFront.home')}}</a></li>
<li>{{trans('langFront.cart')}}</li>
</ul>
</div>
</div>
</div>
</div>
</section>




<section class="cart-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">
<form>
<div class="cart-table table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">{{trans('langFront.image')}}</th>
<th scope="col">{{trans('langFront.product')}}</th>
<th scope="col">{{trans('langFront.unit_price')}}</th>
<th scope="col">{{trans('langFront.count')}}</th>
<th scope="col">{{trans('langFront.total_price')}}</th>
</tr>
</thead>
<tbody id="setinco_editCart">
  @php $totalPrice=0; @endphp
               @if(Auth::id())
            @foreach($data['order']->Cart as $order)
                @php
                    $price=$order->price_off *$order->number ;
                    $totalPrice=$order->price_off*$order->number+$totalPrice;
                @endphp

<tr>
 <td class="product-thumbnail">
<a href="#">
<img src="/{{$order->product->image}}" alt="{{$order->product->title}}">
</a>
</td>
<td class="product-name">
<a href="#">{{$order->product->title}}</a>
</td>
<td class="product-price">
<span class="unit-amount">{{number_format($order->price_off)}} {{trans('langFront.toman')}}</span>
</td>
<td class="product-quantity">
<div class="input-counter">
<span class="minus-btn" onclick="updateCart({{$order->product_id}},0)"><i class="fas fa-minus"></i></span>
<input type="text" min="1" value="{{$order->number}}">
<span class="plus-btn" onclick="updateCart({{$order->product_id}},1)"><i class="fas fa-plus" ></i></span>
</div>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">{{number_format($price)}} {{trans('langFront.toman')}}</span>
<a href="{{route('Front.carts.deleteCart',$order['product_id'])}}" class="remove"><i class="far fa-trash-alt"></i></a>
</td>
</tr>
    @endforeach
        @else
        @foreach($data['order'] as $order)
            @php
            $price=$order['price_off']*$order['number'] ;
            $totalPrice=$order['price_off']*$order['number']+$totalPrice;
            @endphp
                <tr>
 <td class="product-thumbnail">
<a href="#">
<img src="/{{$order['image']}}" alt="{{$order['title']}}">
</a>
</td>
<td class="product-name">
<a href="#">{{$order['title']}}</a>
</td>
<td class="product-price">
<span class="unit-amount">{{number_format($order['price_off'])}} {{trans('langFront.toman')}}</span>
</td>
<td class="product-quantity">
<div class="input-counter">
<span class="minus-btn" onclick="updateCart({{$order['product_id']}},0)" ><i class="fas fa-minus"></i></span>
<input type="text" min="1" value="{{$order['number']}}">
<span class="plus-btn" onclick="updateCart({{$order['product_id']}},1)" ><i class="fas fa-plus"></i></span>
</div>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">{{number_format($price)}} {{trans('langFront.toman')}}</span>
<a href="{{route('Front.carts.deleteCart',$order['product_id'])}}"  class="remove"><i class="far fa-trash-alt"></i></a>
</td>
</tr>
@endforeach
@endif

</tbody>
</table>
</div>

<div class="cart-totals">
<h3>{{trans('langFront.the_amount_payable')}} :</h3>
<ul>
 <li id="sumtotal">{{trans('langFront.total_sum')}}: <span>{{number_format($totalPrice)}} {{trans('langFront.toman')}}</span></li>
<li id="paymentPrice" >{{trans('langFront.the_amount_payable')}} : <span><b>{{number_format($totalPrice)}}</b> {{trans('langFront.toman')}}</span></li>
</ul>
      @if(Auth::id())
          <a href="{{route('Front.carts.shipping')}}"
             class="btn btn-primary">{{trans('langFront.checkout')}}<i class="flaticon-left-chevron"></i> </a>
      @else
          <a href="{{route('login')}}"
             class="btn btn-primary">{{trans('langFront.register_and')}}{{trans('langFront.checkout')}} <i class="flaticon-left-chevron"></i></a>
      @endif
</div>
</form>
</div>
</div>
</div>
</section>

@endsection
