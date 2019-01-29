@extends('layouts.main')
@section('title', 'บันทึกการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-calendar-check"></i> บันทึกการลา</h2>
@endsection

@section('content')

<div style="border: 2px solid #eeeeee; box-shadow: 1px 1px #e0e0e0; margin:20px;">
    <h4 style="font-weight:600; margin:20px;">รออนุมัติ</h4>
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
                    <td class="text-center">2/01/2562 - 3/012562</td>
                    <td class="text-center">1</td>
                    <td class="text-center">หมอนัด</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary" data-toggle="view" title="ดูข้อมูล" id="BtnShowAllow"><i
                                class="fas fa-eye"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div style="border: 2px solid #eeeeee; box-shadow: 1px 1px #e0e0e0; margin:20px;">
    <h4 style="font-weight:600; margin:20px;">ประวัติบันทึกการลา</h4>
    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">ชื่อ-สกุล</th>
                    <th class="text-center">ประเภทการลา</th>
                    <th class="text-center">วันที่ลา</th>
                    <th class="text-center">จำนวนวันลา</th>
                    <th class="text-center">รายละเอียด</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">นางสาวสุภาวดี เพ็งจันทร์</td>
                    <td class="text-center">ลาป่วย</td>
                    <td class="text-center">2/01/2562 - 3/012562</td>
                    <td class="text-center">1</td>
                    <td class="text-center">หมอนัด</td>
                    <td class="text-center">
                        <center>
                            <div class="alert alert-success status text-center">
                                <i class="fas fa-check-circle"></i> <strong>อนุมัติ!</strong>
                            </div>
                            <div class="alert alert-danger status text-center">
                                <i class="fas fa-ban"></i> <strong>ไม่อนุมัติ!</strong>
                            </div>
                        </center>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary" data-toggle="view" title="ดูข้อมูล" id="BtnShow"><i
                                class="fas fa-eye"></i></button>
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
        $("#allow").click(function () {
            $("#Modalallow").modal();
        });
        $("#notallow").click(function () {
            $("#Modalnot").modal();
        });
        $("#BtnShow").click(function () {
            $("#ModalShow").modal();
        });
        $("#BtnShowAllow").click(function () {
            $("#ModalShowAllow").modal();
        });
    });

</script>
@endsection

@section('modal')

<div class="modal fade" id="Modalallow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ยืนยันการอนุมัติ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p style="font-weight:500;color:black;">ยืนยันการอนุมัติการลา</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">{{ __('ยืนยัน') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="Modalnot" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ไม่อนุมัติ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="resson_id" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                    <select class="form-control" id="resson_id" name="resson_id">
                      <option>เลือกเหตุผล</option>
                      <option>2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="resson_id" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                    <select class="form-control" id="resson_id" name="resson_id">
                      <option>เลือกเหตุผล</option>
                      <option>2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="ModalShow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ข้อมูลการลาของ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="t">ชื่อ-สกุล</td>
                            <td>นางสาวสุภาวดี เพ็งจันทร์</td>
                        </tr>
                        <tr>
                            <td class="t">ประเภทการลา</td>
                            <td>ลาป่วย</td>
                        </tr>
                        <tr>
                            <td class="t">วันที่ลา</td>
                            <td>2-01-2562 - 3-01-2562</td>
                        </tr>
                        <tr>
                            <td class="t">จำนวนวันลา</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td class="t">รายละเอียด</td>
                            <td>หมอนัด</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2"><img src="{{ asset('img/user.png') }}" style="width:400px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="t">สถานะ</td>
                            <td>
                                <div class="alert alert-success status text-center">
                                    <strong>อนุมัติ!</strong>
                                </div>
                                <div class="alert alert-danger status text-center">
                                    <strong>ไม่อนุมัติ!</strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="t">หมายเหตุ</td>
                            <td>
                                <label for="">ข้อความ</label>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalShowAllow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ข้อมูลการลาของ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="t">ชื่อ-สกุล</td>
                            <td>นางสาวสุภาวดี เพ็งจันทร์</td>
                        </tr>
                        <tr>
                            <td class="t">ประเภทการลา</td>
                            <td>ลาป่วย</td>
                        </tr>
                        <tr>
                            <td class="t">วันที่ลา</td>
                            <td>2-01-2562 - 3-01-2562</td>
                        </tr>
                        <tr>
                            <td class="t">จำนวนวันลา</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td class="t">รายละเอียด</td>
                            <td>หมอนัด</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2"><img src="{{ asset('img/user.png') }}" style="width:400px;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="allow" data-dismiss="modal">
                    <i class="fas fa-check"></i> {{ __('อนุมัติ') }}</button>
                <button type="button" class="btn btn-warning" id="notallow" data-dismiss="modal">
                    <i class="fas fa-ban"></i> {{ __('ไม่อนุมัติ') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection