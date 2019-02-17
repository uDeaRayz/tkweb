@extends('layouts.main')
@section('title', 'ผู้ดูแลระบบ')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-users"></i> ผู้ดูแลระบบ</h2>
@endsection

@section('content')

<div class="d-flex flex-row-reverse add-btn">
    <a href="{{ route ('admin.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('ผู้ดูแลระบบ') }}</a>
</div>
@if (session('Status'))
<div class="alert alert-success">
    <p class="text-success">{{ session('Status') }}</p>
</div>
@endif
@if (session('del'))
<div class="alert alert-success">
    <p class="text-success">{{ session('del') }}</p>
</div>
@endif
<div class="table-responsive-md">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th class="text-center">ลำดับที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">อีเมล</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $key => $item)
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
                <td class="text-center">{{ $item->email }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.destroy',$item->id) }}" method="post" class="delete_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-toggle="del" title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></button>
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
        $('[data-toggle="del"]').tooltip();
        //  ฟังก์ชั่นยืนยันการลบ
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


@section('name')

@endsection