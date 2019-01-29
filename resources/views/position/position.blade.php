@extends('layouts.main')
@section('title', 'ตำแหน่ง')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-award"></i> ตำแหน่ง</h2>
@endsection

@section('content')

<div class="d-flex flex-row-reverse add-btn">
    <a class="create-modal btn btn-primary text-white" data-toggle="modal" data-target="#create"><i class="fas fa-plus"></i>
        {{ __('เพิ่มตำแหน่ง') }}</a>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="table-responsive-md">
            @if (session('del'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('del') }}</p>
            </div>
            @endif
            @if (session('add'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('add') }}</p>
            </div>
            @endif
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ชื่อตำแหน่ง</th>
                        <th class="text-center" colspan="2">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($position as $key => $item)
                    {{ csrf_field() }}
                    <tr class="position{{ $item->post_id }}">
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $item->post_name }}</td>
                        <td width="20px;">
                            <button href="#" class="edit-modal btn btn-warning" data-toggle="edit" title="แก้ไขข้อมูล"
                                data-id="{{ $item->post_id }}" data-name="{{ $item->post_name }}" data-target="#EditData"><i
                                    class="fas fa-pencil-alt"></i></button>
                        </td>
                        <td class="text-center" width="20px;">
                            <form action="{{ route('position.destroy',$item->post_id) }}" method="post" class="delete_form">
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
<script type="text/javascript">
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
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มตำแหน่ง') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('position.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="post_name" style="font-weight:600;">{{ __('ชื่อตำแหน่ง') }}</label>
                        <input type="text" class="form-control" id="post_name" name="post_name" placeholder="ชื่อตำแหน่ง"
                            required>

                        <p class="error text-center alert alert-danger" hidden></p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="add">{{ __('เพิ่ม') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="EditData" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มตำแหน่ง') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('position.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="post_name" style="font-weight:600;">{{ __('ชื่อตำแหน่ง') }}</label>
                        <input type="text" class="form-control" id="post_name" name="post_name" value="" required>
                        <input type="text" class="form-control" id="post_id" name="post_id" placeholder="ชื่อตำแหน่ง"
                            required>
                        <p class="error text-center alert alert-danger" hidden></p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="add">{{ __('เพิ่ม') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection