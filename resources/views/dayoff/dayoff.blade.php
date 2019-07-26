@extends('layouts.main')
@section('title', 'ประเภทการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-calendar-day"></i> ประเภทการลา</h2>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex flex-row-reverse add-btn">
            <button class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus"></i> {{
                __('เพิ่มการลา') }}</button>
        </div>
        @if (count($dayoff) === 0)
        <div class="text-center">
            <span style="font-size:18pt; font-weight:700;">{{ __('ไม่พบข้อมูล') }}</span>
        </div>
        @else
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
            @if (session('update'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('update') }}</p>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ชื่อการลา</th>
                        <th class="text-center">จำนวนวันลา (ปี)</th>
                        <th class="text-center" colspan="2">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dayoff as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key +1 }}</td>
                        <td class="text-center">{{ $item->leave_name }}</td>
                        <td class="text-center">{{ $item->leave_num }}</td>
                        <td class="text-center">
                            <button class="edit-modal btn btn-warning BtnEdit" data-toggle="edit" title="แก้ไขข้อมูล"
                                id="BtnEdit" data-id="{{ $item->leave_id }}" data-name="{{ $item->leave_name }}"
                                data-num="{{ $item->leave_num }}" data-target="#EditData">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                        <td class="text-center" width="20px;">
                            <form action="{{ route('dayoff-type.destroy',$item->leave_id) }}" method="post"
                                class="delete_form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="del" data-toggle="del"
                                    title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse">
                {{ $dayoff->links() }}
            </div>
        </div>
        @endif
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

        $(".BtnEdit").click(function () {
            $(".modalEdit").modal();
            var leave_id = $(this).data('id');
            var leave_name = $(this).data('name');
            var leave_num = $(this).data('num');
            $(".modal-body #leave_id").val(leave_id);
            $(".modal-body #leave_name").val(leave_name);
            $(".modal-body #leave_num").val(leave_num);
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
                <form action="{{ route('dayoff-type.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="leave_name"
                            style="font-weight:600;">{{ __('ชื่อประเภท') }}</label>
                        <input type="text" class="form-control" id="leave_name" name="leave_name"
                            placeholder="ชื่อประเภท" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="leave_num"
                            style="font-weight:600;">{{ __('จำนวนวันลา') }}</label>
                        <input type="text" class="form-control" id="leave_num" name="leave_num" placeholder="จำนวนวันลา"
                            required>
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


<div class="modal fade modalEdit" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __("แก้ไขข้อมูล") }}</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form action="{{ route('edit_leave')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="resson_name" style="font-weight:600;">{{ __('ประเภทการลา') }}</label>
                        <input type="text" class="form-control" name="leave_name" id="leave_name" value="">
                        <input type="hidden" class="form-control" name="leave_id" id="leave_id">
                    </div>
                    <div class="form-group">
                        <label for="resson_name" style="font-weight:600;">{{ __('จำนวนวันลาต่อปี') }}</label>
                        <input type="text" class="form-control" name="leave_num" id="leave_num" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection