@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $post->title)

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">{{$post->title}}</h3>
            </div>
        </div>
    </div>
</div>

<div id="section-blogdetail1">
    <div class="container">
        <div class="row">
            <!-- Contents -->
            <div class="contents col-sm-12 col-md-12 col-lg-8">
                <h2>{{$post->title}}</h2>
                <h4>by {{$post->owner->first_name}} | Created: {{$post->created_at->diffForHumans()}}</h4>
                <?php echo $post->details;?>
                <!-- Share -->
                <div class="share row">
                    <div class="social-links col-md-12">
                        <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#"><i class="fab fa-google-plus fa-lg"></i></a>
                    </div>
                </div>
                <!-- /.Share -->
                <!-- Author -->
                <div class="author">
                    <div class="img-author">
                        <img class="img-fluid" src="{{$post->owner->picture}}" alt="{{$post->owner->first_name}}">
                    </div>
                    <div class="detail">
                        <h3>{{$post->owner->first_name}}</h3>
                        <p>{{$post->owner->bio}}</p>
                    </div>
                </div>
                <!-- /.Author -->
            </div>
                <!-- /.Contents -->
            <!-- Siderbar -->
            <div class="sidebar col-sm-12 col-md-12 col-lg-4 text-center">
                {{html()->form('POST',route('frontend.chats.store'))->open()}}
                    @if(auth()->check())
                    <input type="hidden" name="user1" value="{{auth()->user()->id}}">
                    <input type="hidden" name="user2" value="{{$post->owner->id}}">
                    <input type="hidden" name="isAjax" value="false">
                    {{form_submit("Let's have a chat",'btn-1 shadow1 style3 bgscheme')}}
                    @else
                    <a href="{{route('frontend.auth.login')}}" class="btn-1 shadow1 style3 bgscheme">Let's have a chat</a>
                    @endif
                {{html()->form()->close()}}

                {{-- {{html()->form('POST',route('frontend.offer.new'))->open()}} --}}
                    @if(auth()->check())
                    <a href="javascript:;" class="btn-1 shadow1 style3 bgscheme" data-toggle="modal" data-target="#create_offer">Make an Offer</a>
                    @else
                    <a href="{{route('frontend.auth.login')}}" class="btn-1 shadow1 style3 bgscheme">Login to Make an Offer</a>
                    @endif
                {{-- {{html()->form()->close()}} --}}
            </div>
            <!-- /.Siderbar -->
        </div>
    </div>
</div>
@endsection
@if(auth()->check())
<div class="modal fade" id="create_offer" tabindex="-1" role="dialog" aria-labelledby="create_offerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{html()->form('POST',route('frontend.payment-paypal'))->open()}}
            <div class="modal-header">
                <h5 class="modal-title" id="create_offerLabel">Make an Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="price" class="col-form-label">Offering Price:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Fee:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" name="fee" value="100" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="details" class="col-form-label">Details:</label>
                    <textarea class="form-control" id="details" name="details"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="request_to" value="{{$post->owner->id}}">
                <input type="hidden" name="offer_by" value="{{auth()->user()->id}}">
                <input type="hidden" name="request_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            {{html()->form()->close()}}
        </div>
    </div>
</div>
@endif
@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush