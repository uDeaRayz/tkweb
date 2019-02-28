@extends('layouts.main')
@section('title', 'Dash board')

@section('subtitle')
    <div class="row">
        <div class="col-md " style="margin:20px;">
            <div class="row">
                <div class="col-md-4 text-center bg-info">
                    <img src="{{ asset('img/team.png') }}" style="width:60px;">
                </div>
                <div class="col-md bg-white text-center dashbord-title ">
                    <h4>{{ __('Staff') }}</h4>
                    <h5>{{ $staff }} {{ __('คน') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md " style="margin:20px;">
            <div class="row">
                <div class="col-md-4 text-center bg-warning">
                    <img src="{{ asset('img/team.png') }}" style="width:60px;">
                </div>
                <div class="col-md bg-white text-center dashbord-title">
                    <h4>{{ __('Trainee') }}</h4>
                    <h5>{{ $trainee }} {{ __('คน') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md " style="margin:20px;">
            <div class="row">
                <div class="col-md-4 text-center bg-danger">
                    <img src="{{ asset('img/calendar.png') }}" style="width:60px;">
                </div>
                <div class="col-md bg-white text-center dashbord-title">
                    <h4>{{ __('การลารออนุมัติ') }}</h4>
                    <h5>{{ $data }} {{ __('รายการ') }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div>
        {!! QrCode::size(250)->generate($trainee) !!}
    </div>
@endsection

@section('script')

@endsection
