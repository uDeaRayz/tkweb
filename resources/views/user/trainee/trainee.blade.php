@extends('layouts.main')
@section('title', 'นักศึกษาฝึกงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-users"></i> นักศึกษาฝึกงาน</h2>
@endsection

@section('content')
<div class="d-flex flex-row-reverse add-btn">
    <a href="{{ route('trainee.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('เพิ่มนักศึกษาฝึกงาน') }}</a>
</div>
<div class="table-responsive-md">
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
                <th class="text-center" colspan="2">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainee as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->prename }}{{ $item->fname }} {{ $item->lname }}</td>
                    <td>{{ $item->post_name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->line }}</td>
                    <td class="text-center">
                        <a href="{{ route('trainee.show',$item->id) }}" class="btn btn-info" data-toggle="view" title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('trainee.edit','/',$item->id) }}" class="btn btn-warning" data-toggle="edit" title="แก้ไขข้อมูล"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="text-center" width="20px;">
                        <form action="{{ route('trainee.destroy',$item->id) }}" method="post" class="delete_form">
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