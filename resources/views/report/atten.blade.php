@extends('layouts.main')
@section('title', 'รายงานบันทึกเวลางาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกเวลางาน') }}</h2>
@endsection

@section('content')

<div class="d-flex justify-content-center mb-3">
    <div class="p-2">
        <label for="user_type" style="font-weight:600;">{{ __('วันที่เริ่มต้น') }}</label>
    </div>
    <div class="p-2">
        <input class="form-control" type="date" name="date-start" id="date-start">
    </div>
    <div class="p-2">
        <label for="user_type" style="font-weight:600;">{{ __('วันที่สิ้นสุด') }}</label>
    </div>
    <div class="p-2">
        <input class="form-control" type="date" name="date-end" id="date-end" >
    </div>
    <div class="p-2">
        <button class="btn btn-primary"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
    </div>
    <div class="p-2">
        <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</button>
    </div>
</div>
<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">เวลาเข้า</th>
                <th class="text-center">เวลาออก</th>
                <th class="text-center">เวลาทำงาน</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1-01-2562</td>
                <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                <td class="text-center">09.00</td>
                <td class="text-center">17.00</td>
                <td class="text-center">8</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('script')
   
@endsection
