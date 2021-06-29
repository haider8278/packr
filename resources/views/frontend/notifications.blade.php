@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <style>
        .post{
            cursor: pointer;
        }
    </style>
    <main role="main" class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-2 text-center-mob">
                <div class="sticky-top">
                </div>
            </div>
            <div id="news-area" class="col-md-7 border-left border-right">
                <div class="row mb-3">
                    <div class="col-md-12 border-bottom">
                        <h4>
                            <span>Notifications</span>
                            <a class="float-right text-primary">
                                <i class="far fa-bell"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="container mt-2">
                        <div class="mt-3 mb-5">
                            @if($notifications->count() > 0)
                            @foreach ($notifications as $n)
                            <div class="row border pt-2 pb-2 post">
                                <button data-id="{{$n->id}}" data-model="notification" data-action="delete" data-route="{{route('frontend.likes')}}" class="btn btn-outline rounded likes">X</button>
                                <div class="col-md-11">
                                    <h6 class="dropleft">
                                        @if ($n->type == 'message')
                                        <a href="{{url('/').'/'.$n->link}}" class="btn btn-primary rounded float-right">Go to Chat</a>
                                        You have new message: <strong>{{$n->notification}}</strong> <br>Sent by : <strong>{{$n->owner->first_name}}</strong>
                                        @elseif ($n->type == 'group_invitation')
                                        <a href="{{route('frontend.group.groups.show',$n->group)}}" class="btn btn-primary rounded float-right">Visit</a>
                                        <strong>{{$n->notification}}</strong> <br>Sent by : <strong>{{$n->owner->first_name}}</strong>
                                        @elseif ($n->type == 'group_notification')
                                        <strong>{{$n->notification}}</strong> <br>Sent by : <strong>{{$n->owner->first_name}}</strong>
                                        @else
                                        <strong>{{$n->notification}}</strong> <br>Sent by : <strong>{{$n->owner->first_name}}</strong>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No new notifications</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="modal fade" id="findPeople" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">New Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
