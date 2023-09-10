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


<section class="checkout-area ptb-100">
<div class="container">

<form>
<div class="row">
<div class="col-lg-6 col-md-12">
<div class="billing-details">
<h3 class="title">{{trans('langFront.select_the_addresspayment_and_final_confirmation')}}</h3>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>{{trans('langFront.select_the_address')}} <span class="required">*</span></label>

<div class="select-box">
<select class="form-control" onchange="setAddress(this.value)">
<option value="0"   >انتخاب کنید</option>
 @foreach($data['address'] as $address)
    @if($address->id==$data['address_id'])
<option value="{{$address->id}}" selected  >{{$address->receiver}}-{{$address->postal_code}}</option>
  @else
<option value="{{$address->id}}">{{$address->receiver}}-{{$address->postal_code}}</option>
 @endif
 @endforeach

</select>
</div>
</div>
</div>

<div class="col-lg-12 col-md-12">
<div class="order-details">
<div class="payment-box">
<div class="payment-method">
@php $flageDispatch=0; @endphp
 @php $flageShipment=0; @endphp
@foreach($data['Shipments'] as $shipment)
  @if($data['shipment_id'] == $shipment->id)
  @php
  $flageShipment++;
  $inputChecked='checked';
  @endphp
  @else
  @php $inputChecked=''; @endphp
  @endif
<p>
<input type="radio" name="shipment+{{$shipment->id}}" id="{{$shipment->id}}+{{$data['city_id']}}"  value="{{$shipment->id}}+{{$data['city_id']}}" onclick="shipment(this.value)" {{$inputChecked}}  >
<label for="{{$shipment->id}}+{{$data['city_id']}}">{{$shipment->title}}</label>
</p>
@endforeach
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="col-lg-6 col-md-12">
<div class="order-details">
<h3 class="title">{{trans('langFront.method_selection')}}{{trans('langFront.the_payment')}}</h3>
<div class="order-table table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">{{trans('langFront.product')}}</th>
<th scope="col">{{trans('langFront.total_price')}}</th>
</tr>
</thead>
<tbody>
@foreach($data['Cart'] as $Cart)
<tr>
<td class="product-name">
<a href="#">{{$Cart->product->title}}</a>
</td>
<td class="product-total">
<span class="subtotal-amount">{{number_format($Cart->price_off*$Cart->number)}} {{trans('langFront.toman')}}</span>
</td>
</tr>
@endforeach
<tr>
<td class="order-subtotal">
<span>{{trans('langFront.total_sum')}}:</span>
</td>
<td class="order-subtotal-price">
<span class="order-subtotal-amount">{{number_format($data['sumPrice'])}} {{trans('langFront.toman')}}</span>
</td>
</tr>
<tr>
<td class="order-shipping">
<span>{{trans('langFront.shipping_cost')}}</span>
</td>
<td class="shipping-price">
  @if( $data['sumShipment']==0)
      <span> {{trans('langFront.the_cost_of_sending_this_order')}} {{trans('langFront.free')}} {{trans('langFront.is')}}</span>
    @else
    <span>{{number_format($data['sumShipment'])}} {{trans('langFront.toman')}} </span>
    @endif
</td>
</tr>
<tr>
<td class="total-price">
<span>{{trans('langFront.the_amount_payable')}} :</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">{{number_format($data['sumShipment']+$data['sumPrice'])}} {{trans('langFront.toman')}}</span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="payment-box">
<div class="payment-method">

      @if($data['PaymentOffline']==1 and $data['enable_on_site_payment']==1 )
        <p>
       <input type="radio" name="payType" id="payType"  value="1"   onclick="privacyCheck()" >
       <label for="payType">{{trans('langFront.the_payment')}} {{trans('langFront.in_place')}}</label>
       </p>
     @endif
      @if($data['idpay_active']==1)
        <p>
       <input type="radio" name="payType" id="payType"  value="2"   onclick="privacyCheck()" >
       <label for="payType">{{trans('langFront.the_payment')}} {{trans('langFront.idpay')}}</label>
       </p>
       @endif

     @if($data['zarrinpal_active']==1)

        <p>
       <input type="radio" name="payType" id="payType"  value="3"  onclick="privacyCheck()"  >
       <label for="payType">{{trans('langFront.the_payment')}} {{trans('langFront.zarrinpal')}}</label>
       </p>
      @endif
</div>
@if($data['address_id']!=0 and $data['shipment_id']!=0)
     <div  id="paymentType">
      <a href=""  class="btn btn-primary order-btn">{{trans('langFront.final_confirmation_of_the_order')}}</a>
     </div>
@endif
</div>
</div>
</div>
</div>
</form>
</div>
</section>

@endsection
