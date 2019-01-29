@extends('layouts.main')
@section('title', 'บันทึกเวลาการทำงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-calendar-check"></i> {{ __('บันทึกเวลาการทำงาน') }}</h2>
@endsection

@section('content')

<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">เวลาเข้างาน</th>
                <th class="text-center">เวลาออกงาน</th>
                <th class="text-center">จำนวนชั่วโมง</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1 01 2562</td>
                <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                <td class="text-center">09.00</td>
                <td class="text-center">17.00</td>
                <td class="text-center">8</td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="view" title="ดูข้อมูล" id="BtnShow"><i
                            class="fas fa-eye"></i></button>
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
        $("#BtnShow").click(function () {
            $("#ModalShow").modal();
        });
    });

</script>
@endsection

@section('modal')

<div class="modal fade" id="ModalShow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('การบันทึกเวลา') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="t">เข้างาน</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="{{ asset('img/user.png') }}" alt="" class="img-show"></td>
                        </tr>
                        <tr>
                            <td class="t">ออกงาน</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="{{ asset('img/user.png') }}" alt="" class="img-show"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> {{ __('ปิด') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection