@extends('layouts.main')
@section('title', 'เหตุผลไม่อนุมัติการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll-h"></i> เหตุผลไม่อนุมัติการลา</h2>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex flex-row-reverse add-btn">
            <button class="btn btn-primary" data-toggle="modal" data-target="#AddData"><i class="fas fa-plus"></i> {{
                __('เพิ่มเหตุผล') }}</button>
        </div>
        <div class="table-responsive-md">
            @if (session('del'))
            <div class="alert alert-warning">
                <p class="text-success">{{ session('del') }}</p>
            </div>
            @endif
            @if (session('add'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('add') }}</p>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ประเภทการลา</th>
                        <th class="text-center">เหตุผล</th>
                        <th class="text-center" colspan="2">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resson as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $item->leave_name }}</td>
                        <td class="text-center">{{ $item->resson_name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="edit" title="แก้ไขข้อมูล" id="BtnEdit"><i
                                    class="fas fa-pencil-alt"></i></button>
                        </td>
                        <td class="text-center" width="20px;">
                            <form action="{{ route('resson.destroy',$item->resson_id) }}" method="post" class="delete_form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="del" data-toggle="del" title="ลบข้อมูล"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
        $('.delete_form').on('submit', function () {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                return true;
            } else {
                return false;
            }
        });
    });

</script>
@endsection

@section('modal')
<div class="modal fade" id="AddData" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มเหตุผล') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('resson.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="leave_id" style="font-weight:600;">{{ __('ประเภทการลา') }}</label>
                        <select class="form-control" id="leave_id" name="leave_id">
                            <option>เลือกประเภทการลา</option>
                            @foreach ($dayoff as $item)
                            <option name="{{ $item->leave_id }}" value="{{ $item->leave_id }}">{{ $item->leave_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="resson_name" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                        <input type="text" class="form-control" name="resson_name">
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