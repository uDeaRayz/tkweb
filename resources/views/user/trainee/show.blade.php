@extends('layouts.main')
@section('title', 'นักศึกษาฝึกงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user"></i> ข้อมูลของ </h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{url('/staff')}}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    &nbsp; &nbsp;
    <a href="" class="btn btn-info"><i class="fas fa-calendar-day"></i> {{ __('ข้อมูลการลา') }}</a>
    &nbsp; &nbsp;
    <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> {{ __('แก้ไข') }}</a>
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        <div class="row">
            <div class="col-md">
                <img src="{{ asset('img/user.png') }}" class="img-show">
            </div>
            <div class="col-md">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="title">รหัส</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">111111</td>
                        </tr>
                        <tr>
                            <td class="title">ชื่อ-สกุล</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">นางสาวสุภาวดี  เพ็งจันทร์</td>
                        </tr>
                        <tr>
                            <td class="title">ตำแหน่ง</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">ผู้ช่วยโปรแกรมเมอร์</td>
                        </tr>
                        <tr>
                            <td class="title">เบอร์โทร</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">096-0030344</td>
                        </tr>
                        <tr>
                            <td class="title">Email</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">supavadee112@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="title">ID Line</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">.rayz</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 {{-- ข้อมูลการลา --}}
 <div class="row justify-content-center show-data">
        <div class="col-md-10 card form-staff">
            <p style="color:black; font-size: 20px; margin-bottom:3px;">
                {{ __('ข้อมูลการลา') }}
            </p>
            <hr>
            <div class="row form-staff-margin">
                <div class="col-md card" style="padding: 20px; margin:5px">
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-2">
                            <label for="leave_id" style="font-weight:600;">{{ __('ประเภท') }}</label>
                        </div>
                        <div class="col-md">
                            <input type="text" name="leave_id" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                            <div class="col-md-4">
                                <label for="leave_id" style="font-weight:600;">{{ __('จำนวน (วัน/ปี)') }}</label>
                            </div>
                        <div class="col-md">
                            <input type="text" name="leave_id" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md card" style="padding: 20px; margin:5px">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="leave_id" style="font-weight:600;">{{ __('ประเภท') }}</label>
                        </div>
                        <div class="col-md">
                            <input type="text" name="leave_id" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="leave_id" style="font-weight:600;">{{ __('จำนวน (วัน/ปี)') }}</label>
                        </div>
                        <div class="col-md">
                            <input type="text" name="leave_id" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

@endsection

@section('script')
<script>

</script>
@endsection