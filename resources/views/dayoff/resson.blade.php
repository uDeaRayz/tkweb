@extends('layouts.main')
@section('title', 'เหตุผลไม่อนุมัติการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll-h"></i> เหตุผลไม่อนุมัติการลา</h2>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex flex-row-reverse add-btn">
            <button class="btn btn-primary" data-toggle="modal" data-target="#AddData"><i class="fas fa-plus"></i> {{ __('เพิ่มเหตุผล') }}</button>
        </div>
        <div class="table-responsive-md">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ประเภทการลา</th>
                        <th class="text-center">เหตุผล</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">ลาป่วย</td>
                        <td class="text-center">ระยะเวลานานเกินไป</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="edit" title="แก้ไขข้อมูล" id="BtnEdit"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger" data-toggle="del" title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="edit"]').tooltip();
        $('[data-toggle="del"]').tooltip();
        $("#BtnAdd").click(function(){
            $("#AddData").modal();
        });
        $("#BtnEdit").click(function(){
            $("#EditData").modal();
        });
    });

</script>
@endsection

@section('modal')
  <!-- Modal -->
  <div class="modal fade" id="AddData" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มเหตุผล') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="leave_id" style="font-weight:600;">{{ __('ประเภทการลา') }}</label>
                    <select class="form-control" id="leave_id" name="leave_id">
                      <option>เลือกประเภทการลา</option>
                      <option>2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="resson_name" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                    <input type="text" class="form-control" name="resson_name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal">{{ __('เพิ่ม') }}</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
            </div>
          </div>
          
        </div>
      </div>

      
  <div class="modal fade" id="EditData" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('แก้ไขเหตุผล') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="leave_id" style="font-weight:600;">{{ __('ประเภทการลา') }}</label>
                    <select class="form-control" id="leave_id" name="leave_id">
                      <option>เลือกประเภทการลา</option>
                      <option>2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="resson_name" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                    <input type="text" class="form-control" name="resson_name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">{{ __('บันทึก') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
            </div>
          </div>
          
        </div>
      </div>
@endsection