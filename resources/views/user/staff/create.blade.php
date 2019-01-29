@extends('layouts.main')
@section('title', 'เพิ่มพนักงาน')

@section('subtitle')
    <h2 class=" text-primary"><i class="fas fa-user-plus"></i> เพิ่มพนักงาน </h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{url('/staff')}}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center show-data">
        <div class="col-md-10 card form-staff">
            <p style="color:black; font-size: 20px; margin-bottom:3px;">
                {{ __('ข้อมูลทั่วไป') }}
            </p>
            <hr>
            <div class="row form-staff-margin">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('คำนำหน้า') }}</p>
                </div>
                <div class="col-md">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename1" name="prename" value="นาย">
                        <label class="custom-control-label" for="prename1">{{ __('นาย') }}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename2" name="prename" value="นาง">
                        <label class="custom-control-label" for="prename2">{{ __('นาง') }}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename3" name="prename" value="นางสาว">
                        <label class="custom-control-label" for="prename3">{{ __('นางสาว') }}</label>
                    </div>
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-1">
                    <p class="text-dark">{{ __('ชื่อ') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="fname" class="form-control">
                </div>
                <div class="col-md-1">
                    <p class="text-dark">{{ __('สกุล') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="lname" class="form-control">
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('ตำแหน่ง') }}</p>
                </div>
                <div class="col-md">
                    <select class="custom-select" name="position">
                        <option selected>Custom Select Menu</option>
                        <option value="volvo">Volvo</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <p class="text-dark">{{ __('เบอร์โทร') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('ID Line') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="line" class="form-control">
                </div>
                <div class="col-md-2">
                    <p class="text-dark">{{ __('Email') }}</p>
                </div>
                <div class="col-md">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('รูปภาพ') }}</p>
                </div>
                <div class="col-md">
                    <input type="file" name="img" class="form-control">
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-3">
                    <p class="text-dark">{{ __('Password') }}</p>
                </div>
                <div class="col-md-5">
                    <input type="password" id="password" name="line" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p class="text-dark">{{ __('Confirm Password') }}</p>
                </div>
                <div class="col-md-5">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control">
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

    
    
    <input type="hidden" name="status" value="2">
    <input type="hidden" name="level" value="2">
    <div class="text-center form-staff-margin" style="margin-bottom:30px;">
        <button class="btn btn-primary">{{ __('บันทึก') }}</button>
        <a href="{{ url('/staff') }}" class="btn btn-warning">{{ __('ยกเลิก') }}</a>
    </div>
</form>
@endsection

@section('script')
    <script>

    </script>
@endsection