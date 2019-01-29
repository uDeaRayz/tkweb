@extends('layouts.main')
@section('title', 'การลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-calendar-day"></i> การลา</h2>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex flex-row-reverse add-btn">
            <button class="btn btn-primary" data-toggle="modal" data-target="#AddData"><i class="fas fa-plus"></i> {{ __('เพิ่มการลา') }}</button>
        </div>
        <div class="table-responsive-md">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ชื่อการลา</th>
                        <th class="text-center">จำนวนวันลา (ปี)</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">ลาป่วย</td>
                        <td class="text-center">30</td>
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
  <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มประเภทการลา') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('position.create') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="leave_name" style="font-weight:600;">{{ __('ชื่อประเภท') }}</label>
                        <input type="text" class="form-control" id="leave_name" name="leave_name" placeholder="ชื่อประเภท" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="leave_num" style="font-weight:600;">{{ __('จำนวนวันลา') }}</label>
                        <input type="text" class="form-control" id="leave_num" name="leave_num" placeholder="จำนวนวันลา" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('เพิ่ม') }}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection