@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'My-Orders')

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">My Orders</h3>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Request To</th>
                        <th>Offer By</th>
                        <th>Price</th>
                        <th>Fee</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->post->title}}</td>
                        <td>{{$order->post->source}}</td>
                        <td>{{$order->post->destination}}</td>
                        <td>{{$order->requestTo->first_name}}</td>
                        <td>{{$order->offerBy->first_name}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->fee}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            {{html()->form('POST',route('frontend.chats.store'))->open()}}
                                <input type="hidden" name="user1" value="{{$order->request_to}}">
                                <input type="hidden" name="user2" value="{{$order->offer_by}}">
                                <input type="hidden" name="isAjax" value="false">
                                {{form_submit("Chat",'btn-1 shadow1 style3 bgscheme')}}
                            {{html()->form()->close()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Item -->

            
            
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush