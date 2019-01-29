@extends('layouts.main')
@section('title', 'รายงานบันทึกการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกการลา') }}</h2>
@endsection

@section('content')

<div class="d-flex justify-content-center mb-3">
    <div class="p-2">
        <label for="leave_id" style="font-weight:600;">{{ __('แสดงข้อมูลจาก') }}</label>
    </div>
    <div class="p-2">
        <select class="form-control" id="leave_id" name="leave_id">
            <option>{{ __('ประเภทการลาทั้งหมด') }}</option>
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
                <th class="text-center">ประเภทการลา</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">วันที่ลา</th>
                <th class="text-center">จำนวนวันลา</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">ลาป่วย</td>
                <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                <td class="text-center">2-01-2562</td>
                <td class="text-center">1</td>
                <td class="text-center">ไปหาหมอ</td>
                <td class="text-center">อนุมัติ</td>
                <td class="text-center">-</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function{

        });
    </script>
@endsection
