@extends('layouts.main')
@section('title', 'นักศึกษาฝึกงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-users"></i> นักศึกษาฝึกงาน</h2>
@endsection

@section('content')
<div class="d-flex flex-row-reverse add-btn">
    <a href="{{ url('/trainee/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('เพิ่มนักศึกษาฝึกงาน') }}</a>
</div>
<div class="table-responsive-md">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th class="text-center">ลำดับที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center">เบอร์โทร</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">LINE</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>นางสาวสุภาวดี เพ็งจันทร์</td>
                <td>ผู้ช่วยโปรแกรมเมอร์</td>
                <td>0960030344</td>
                <td>supavadee112@gmail.com</td>
                <td>.rayz</td>
                <td class="text-center">
                    <a href="{{ url('trainee') }}" class="btn btn-info" data-toggle="view" title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                    <a href="{{ url('trainee') }}" class="btn btn-warning" data-toggle="edit" title="แก้ไขข้อมูล"><i class="fas fa-pencil-alt"></i></a>
                    <a href="" class="btn btn-danger" data-toggle="del" title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
        $('[data-toggle="edit"]').tooltip();
        $('[data-toggle="del"]').tooltip();
    });
</script>
@endsection