@extends('layouts.main')
@section('title', 'การลาผ่านการอนุมัติ')

@section('subtitle')
<h2 class=" text-primary"><i class="far fa-thumbs-up"></i> การลาผ่านการอนุมัติ</h2>
@endsection

@section('content')

<div style="border: 2px solid #eeeeee; box-shadow: 1px 1px #e0e0e0; margin:20px;">
    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">ชื่อ-สกุล</th>
                    <th class="text-center">ประเภทการลา</th>
                    <th class="text-center">วันที่ลา</th>
                    <th class="text-center">จำนวนวันลา</th>
                    <th class="text-center">รายละเอียด</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                    <td class="text-center">ลาป่วย</td>
                    <td class="text-center">2/01/2562 - 3/01/2562</td>
                    <td class="text-center">1</td>
                    <td class="text-center">หมอนัด</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-info" data-toggle="view" title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
    });

</script>
@endsection
