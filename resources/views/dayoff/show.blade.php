@extends('layouts.main')
@section('title', 'ข้อมูลการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user"></i> ข้อมูลของ </h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="#" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    &nbsp; &nbsp;
    <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> {{ __('แก้ไข') }}</a>
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        <table class="table table-light">
            <tbody>
                <tr>
                    <th>ประเภทการลา</th>
                    <td></td>
                </tr>
                <tr>
                    <th>วันที่ลา</th>
                    <td></td>
                </tr>
                <tr>
                    <th>จำนวนวันลา</th>
                    <td></td>
                </tr>
                <tr>
                    <th>เหตุผลที่ลา</th>
                    <td></td>
                </tr>
                <tr>
                    <th>รูปภาพ</th>
                    <td></td>
                </tr>
                <tr>
                    <th>สถานะ</th>
                    <td></td>
                </tr>
                <tr>
                    <th>หมายเหตุ</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection