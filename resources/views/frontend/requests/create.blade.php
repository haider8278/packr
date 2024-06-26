@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Create Request-Offer-Shipping')

@section('content')
<?php
$countries = '{"Afghanistan":"Afghanistan","Albania":"Albania","Algeria":"Algeria","Andorra":"Andorra","Angola":"Angola","Anguilla":"Anguilla","Antigua & Barbuda":"Antigua & Barbuda","Argentina":"Argentina","Armenia":"Armenia","Aruba":"Aruba","Australia":"Australia","Austria":"Austria","Azerbaijan":"Azerbaijan","Bahamas":"Bahamas","Bahrain":"Bahrain","Bangladesh":"Bangladesh","Barbados":"Barbados","Belarus":"Belarus","Belgium":"Belgium","Belize":"Belize","Benin":"Benin","Bermuda":"Bermuda","Bhutan":"Bhutan","Bolivia":"Bolivia","Bosnia & Herzegovina":"Bosnia & Herzegovina","Botswana":"Botswana","Brazil":"Brazil","British Virgin Islands":"British Virgin Islands","Brunei":"Brunei","Bulgaria":"Bulgaria","Burkina Faso":"Burkina Faso","Burundi":"Burundi","Cambodia":"Cambodia","Cameroon":"Cameroon","Cape Verde":"Cape Verde","Cayman Islands":"Cayman Islands","Chad":"Chad","Chile":"Chile","China":"China","Colombia":"Colombia","Congo":"Congo","Cook Islands":"Cook Islands","Costa Rica":"Costa Rica","Cote D Ivoire":"Cote D Ivoire","Croatia":"Croatia","Cruise Ship":"Cruise Ship","Cuba":"Cuba","Cyprus":"Cyprus","Czech Republic":"Czech Republic","Denmark":"Denmark","Djibouti":"Djibouti","Dominica":"Dominica","Dominican Republic":"Dominican Republic","Ecuador":"Ecuador","Egypt":"Egypt","El Salvador":"El Salvador","Equatorial Guinea":"Equatorial Guinea","Estonia":"Estonia","Ethiopia":"Ethiopia","Falkland Islands":"Falkland Islands","Faroe Islands":"Faroe Islands","Fiji":"Fiji","Finland":"Finland","France":"France","French Polynesia":"French Polynesia","French West Indies":"French West Indies","Gabon":"Gabon","Gambia":"Gambia","Georgia":"Georgia","Germany":"Germany","Ghana":"Ghana","Gibraltar":"Gibraltar","Greece":"Greece","Greenland":"Greenland","Grenada":"Grenada","Guam":"Guam","Guatemala":"Guatemala","Guernsey":"Guernsey","Guinea":"Guinea","Guinea Bissau":"Guinea Bissau","Guyana":"Guyana","Haiti":"Haiti","Honduras":"Honduras","Hong Kong":"Hong Kong","Hungary":"Hungary","Iceland":"Iceland","India":"India","Indonesia":"Indonesia","Iran":"Iran","Iraq":"Iraq","Ireland":"Ireland","Isle of Man":"Isle of Man","Israel":"Israel","Italy":"Italy","Jamaica":"Jamaica","Japan":"Japan","Jersey":"Jersey","Jordan":"Jordan","Kazakhstan":"Kazakhstan","Kenya":"Kenya","Kuwait":"Kuwait","Kyrgyz Republic":"Kyrgyz Republic","Laos":"Laos","Latvia":"Latvia","Lebanon":"Lebanon","Lesotho":"Lesotho","Liberia":"Liberia","Libya":"Libya","Liechtenstein":"Liechtenstein","Lithuania":"Lithuania","Luxembourg":"Luxembourg","Macau":"Macau","Macedonia":"Macedonia","Madagascar":"Madagascar","Malawi":"Malawi","Malaysia":"Malaysia","Maldives":"Maldives","Mali":"Mali","Malta":"Malta","Mauritania":"Mauritania","Mauritius":"Mauritius","Mexico":"Mexico","Moldova":"Moldova","Monaco":"Monaco","Mongolia":"Mongolia","Montenegro":"Montenegro","Montserrat":"Montserrat","Morocco":"Morocco","Mozambique":"Mozambique","Namibia":"Namibia","Nepal":"Nepal","Netherlands":"Netherlands","Netherlands Antilles":"Netherlands Antilles","New Caledonia":"New Caledonia","New Zealand":"New Zealand","Nicaragua":"Nicaragua","Niger":"Niger","Nigeria":"Nigeria","Norway":"Norway","Oman":"Oman","Pakistan":"Pakistan","Palestine":"Palestine","Panama":"Panama","Papua New Guinea":"Papua New Guinea","Paraguay":"Paraguay","Peru":"Peru","Philippines":"Philippines","Poland":"Poland","Portugal":"Portugal","Puerto Rico":"Puerto Rico","Qatar":"Qatar","Reunion":"Reunion","Romania":"Romania","Russia":"Russia","Rwanda":"Rwanda","Saint Pierre & Miquelon":"Saint Pierre & Miquelon","Samoa":"Samoa","San Marino":"San Marino","Satellite":"Satellite","Saudi Arabia":"Saudi Arabia","Senegal":"Senegal","Serbia":"Serbia","Seychelles":"Seychelles","Sierra Leone":"Sierra Leone","Singapore":"Singapore","Slovakia":"Slovakia","Slovenia":"Slovenia","South Africa":"South Africa","South Korea":"South Korea","Spain":"Spain","Sri Lanka":"Sri Lanka","St Kitts & Nevis":"St Kitts & Nevis","St Lucia":"St Lucia","St Vincent":"St Vincent","St. Lucia":"St. Lucia","Sudan":"Sudan","Suriname":"Suriname","Swaziland":"Swaziland","Sweden":"Sweden","Switzerland":"Switzerland","Syria":"Syria","Taiwan":"Taiwan","Tajikistan":"Tajikistan","Tanzania":"Tanzania","Thailand":"Thailand","Timor LEste":"Timor LEste","Togo":"Togo","Tonga":"Tonga","Trinidad & Tobago":"Trinidad & Tobago","Tunisia":"Tunisia","Turkey":"Turkey","Turkmenistan":"Turkmenistan","Turks & Caicos":"Turks & Caicos","Uganda":"Uganda","Ukraine":"Ukraine","United States of America":"United States of America","United Arab Emirates":"United Arab Emirates","United Kingdom":"United Kingdom","Uruguay":"Uruguay","Uzbekistan":"Uzbekistan","Venezuela":"Venezuela","Vietnam":"Vietnam","Virgin Islands (US)":"Virgin Islands (US)","Yemen":"Yemen","Zambia":"Zambia","Zimbabwe":"Zimbabwe"}';

$countries = json_decode($countries,true);
?>
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">ADD {{strtoupper($_GET['type'])}}</h3>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            {{ Form::open(['route' => 'frontend.requests.store', 'class' => 'form-horizontal m-auto', 'role' => 'form', 'method' => 'post', 'files' => true]) }}
                    <div class="col">
                        <div class="col-md-12">
                            @include('includes.partials.messages')
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('title', 'Title', ['class' => 'from-control-label required']) }}

                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.title'), 'required' => 'required']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->

                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('source', 'Travel From', ['class' => 'from-control-label required']) }}
                                {{ Form::select('source', $countries, null,['class' => 'form-control', 'placeholder' => 'Travel From']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('destination', 'Travel To', ['class' => 'from-control-label required']) }}
                                {{ Form::select('destination', $countries, null,['class' => 'form-control', 'placeholder' => 'Travel To']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('product_link', 'Product Link', ['class' => 'from-control-label required']) }}

                                {{ Form::text('product_link', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.product_link'), 'required' => 'required']) }}
                                <small class="text-muted">Product link where you want to purchase</small>

                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('type', trans('validation.attributes.backend.access.posts.type'), ['class' => 'from-control-label required']) }}
                                {{ Form::select('type', ['request'=>'I want space','travel'=>'I have space','shipping'=>'I offer Shipping','particular'=>'I offer Particular'], isset($_GET['type']) ? $_GET['type'] : '',['class' => 'form-control', 'placeholder' => 'Select Type']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->

                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('details', trans('validation.attributes.backend.access.posts.description'), ['class' => 'from-control-label required']) }}
                                {{ Form::textarea('details', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.description')]) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->

                        <div class="form-group row">
                            {{form_submit('Create','btn-1 shadow1 bgscheme  style3 m-auto')}}
                        </div>
                    </div>
                    <!--col-->
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush