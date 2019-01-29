@extends('layouts.main')
@section('title', 'รายงานบุคลากร')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบุคลากร') }}</h2>
@endsection

@section('content')

<div class="d-flex justify-content-center mb-3">
    <div class="p-2">
        <label for="user_type" style="font-weight:600;">{{ __('แสดงข้อมูลจาก') }}</label>
    </div>
    <div class="p-2">
        <select class="form-control" id="user_type" name="user_type">
            <option>{{ __('เลือกทั้งหมด') }}</option>
            <option>{{ __('พนักงาน') }}</option>
            <option>{{ __('นักศึกษาฝึกงาน') }}</option>
            <option>{{ __('ผู้ดูแลระบบ') }}</option>
        </select>
    </div>
    <div class="p-2">
        <button class="btn btn-primary"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
    </div>
    <div class="p-2">
        <button class="btn btn-success"><i class="fas fa-print"></i> {{ __('พิมพ์') }}</button>
    </div>
    <div class="p-2">
        <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</button>
    </div>
  </div>
<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">รหัส</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">เบอร์โทร</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">LINE ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">616001</td>
                <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                <td class="text-center">ผู้ช่วยโปรแกรมเมอร์</td>
                <td class="text-center">นักศึกษาฝึกงาน</td>
                <td class="text-center">0960030344</td>
                <td class="text-center">supavadee112@gmail.com</td>
                <td class="text-center">.rayz</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('script')
    
@endsection
