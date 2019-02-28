@extends('layouts.main')
@section('title', 'พนักงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-users"></i> พนักงานทั้งหมด {{ $staff->count() }} คน</h2>
@endsection

@section('content')
<div class="d-flex flex-row-reverse add-btn">
    <a href="{{ route('staff.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
        {{ __('เพิ่มพนักงาน') }}</a>
</div>

@if (count($staff) === 0)
<div class="text-center">
    <span style="font-size:18pt; font-weight:700;">{{ __('ไม่พบข้อมูล') }}</span>
</div>
@else
<div class="table-responsive-md">
    @if (session('update'))
    <div class="alert alert-info">
        <p class="text-success">{{ session('update') }}</p>
    </div>
    @endif
    @if (session('add'))
    <div class="alert alert-success">
        <p class="text-success">{{ session('add') }}</p>
    </div>
    @endif
    @if (session('del'))
    <div class="alert alert-warning">
        <p class="text-success">{{ session('del') }}</p>
    </div>
    @endif
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
            @foreach ($staff as $key => $item)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>
                    @if($item->prename == 1)
                    {{ "นาย" }}
                    @endif
                    @if($item->prename == 2)
                    {{ "นาง" }}
                    @endif
                    @if($item->prename == 3)
                    {{ "นางสาว" }}
                    @endif
                    {{ $item->fname }} {{ $item->lname }}
                </td>
                <td>{{ $item->post_name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->line }}</td>
                <td class="text-center">
                    <a href="{{ route('staff.show',$item->id) }}" class="btn btn-info" data-toggle="view"
                        title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('staff.edit',$item->id) }}" class="btn btn-warning" data-toggle="edit"
                        title="แก้ไขข้อมูล"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td class="text-center" width="20px;">
                    <form action="{{ route('staff.destroy',$item->id) }}" method="post" class="delete_form">
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
    <div class="d-flex flex-row-reverse">
        {{ $staff->links() }}
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
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