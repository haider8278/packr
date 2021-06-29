@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
@include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.auth.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','enctype'=>'multipart/form-data','files'=>true]) }}

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.users.management')
                    <small class="text-muted">@lang('labels.backend.access.users.create')</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <hr>



        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ Form::label('first_name', __('validation.attributes.backend.access.users.first_name'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.first_name'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('username', __('validation.attributes.backend.access.users.username'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.username'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('email', __('validation.attributes.backend.access.users.email'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('password', __('validation.attributes.backend.access.users.password'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.password'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                    <div class="col-md-10">
                        {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                    ->required() }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('dob', __('validation.attributes.backend.access.users.dob'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::date('dob',null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.dob'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('country', __('validation.attributes.backend.access.users.country'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('country',null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.country'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('profile_photo', __('validation.attributes.backend.access.users.profile_photo'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-6">
                        {{ Form::file('profile_photo', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.profile_photo')]) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::checkbox('status', '1', true) }}
                    </div>
                </div>
                <!--form control-->

                <div class="form-group row">
                    {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::checkbox('confirmed', '1', true) }}
                    </div>
                </div>
                <!--form control-->



                @if(! config('access.users.requires_approval'))
                <div class="form-group row">
                    <label class="col-md-2 control-label">{{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br />
                        <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                    </label>

                    <div class="col-md-10">
                        {{ Form::checkbox('confirmation_email', '1') }}
                    </div>
                    <!--col-lg-1-->
                </div>
                <!--form control-->
                @endif

                <div class="form-group row">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-8">
                        @if (count($roles) > 0)
                        @foreach($roles as $role)
                        <label for="role-{{$role->id}}" class="control">
                            <input type="radio" value="{{$role->id}}" name="assignees_roles[]" {{ $role->id == 3 ? 'checked' : '' }} id="role-{{$role->id}}" class="get-role-for-permissions" /> &nbsp;&nbsp;{!! $role->name !!}
                        </label>
                        <!--permission list-->
                        @endforeach
                        @else
                        {{ trans('labels.backend.access.users.no_roles') }}
                        @endif
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row d-none">
                    {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10 search-permission">
                        <div id="available-permissions">
                            <div>
                                <input type="text" class="form-control search-button" placeholder="Search..." />
                            </div>
                            <div class="get-available-permissions">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--card-body-->

    @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.auth.user.index' ])
</div>
<!--card-->
{{ Form::close() }}
@endsection

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Users.edit.selectors.getPremissionURL = "{{ route('admin.get.permission') }}";
        FTX.Users.edit.init("create");
    });
</script>
@endsection