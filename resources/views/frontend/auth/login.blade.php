@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Login</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container mt-5">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        @include('includes.partials.messages')
    {{ html()->form('POST', route('frontend.auth.login.post'))->class('form-signin')->open() }}
        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.email'))->for('login')->class('form-control-placeholder') }}
            {{ html()->text('login')->class('form-control')          ->attribute('maxlength', 191)->required() }}
        </div>
        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.password'))->for('password')->class('form-control-placeholder') }}
            {{ html()->password('password')
                ->class('form-control')
                ->required() }}
        </div>
        @if(config('access.captcha.login'))
            <div class="form-row">
                <div class="form-group">
                    @captcha
                    {{ html()->hidden('captcha_status', 'true') }}
                </div><!--col-->
            </div><!--row-->
        @endif
        <p  class="text-center">
        <button type="submit" class="btn-1 shadow1 style3 bgscheme">Login</button>
        </p>
        <p class="text-center">
            <a href="{{ route('frontend.auth.password.reset') }}">Forgot Password?</a>&nbsp;. <a href="{{ route('frontend.auth.register') }}">Signup for <span
                class="badge">ShipEarn</span> </a>
        </p>
        {{ html()->form()->close() }}
        <div class="row">
            <div class="col">
                <div class="text-center">
                    @include('frontend.auth.includes.socialite')
                </div>
            </div><!--col-->
        </div><!--row-->
    </div>
    <div class="col-md-3"></div>
</div>
</main>

@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
