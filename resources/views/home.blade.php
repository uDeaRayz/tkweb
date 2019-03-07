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
<br>
<br>
<div>
    <h5><b>ข้อมูลบันทึกเวลาทำงาน ณ วันที่ {{ dateFullnow() }}</b></h5>
</div>
<br>
<br>
@if (count($atten) === 0)
<div class="text-center">
    <span style="font-size:18pt; font-weight:700;">{{ __('ไม่พบข้อมูล') }}</span>
</div>
@else
<div class="table-responsive-md">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">เวลาเข้างาน</th>
                <th class="text-center">เวลาออกงาน</th>
                <th class="text-center">จำนวนชั่วโมง</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atten as $key => $attendance)
            <tr>
                <td class="text-center">{{ $key +1 }}</td>
                <td class="text-center">
                    @if($attendance->prename == 1)
                    {{ "นาย" }}
                    @endif
                    @if($attendance->prename == 2)
                    {{ "นาง" }}
                    @endif
                    @if($attendance->prename == 3)
                    {{ "นางสาว" }}
                    @endif
                    {{ $attendance->fname }} {{ $attendance->lname }}
                </td>
                <td class="text-center">{{ $attendance->time_in }}</td>
                <td class="text-center">{{ $attendance->time_out }}</td>
                <td class="text-center">{{ $attendance->atten_total/60 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection

@section('script')

@endsection