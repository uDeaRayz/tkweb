@extends('layouts.main')
@section('title', 'ผ่านการอนุมัติ')

@section('subtitle')
<h2 class=" text-primary"><i class="far fa-thumbs-up"></i> การลาผ่านอนุมัติ</h2>
@endsection

@section('content')

<div style="border: 2px solid #eeeeee; box-shadow: 1px 1px #e0e0e0; margin:20px;">
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
                @foreach ($leave as $key => $item)
                    <tr>
                        <td class="text-center">
                            @if($item->prename == 1)
                                {{ "นาย" }}
                            @endif
                            @if($item->prename == 2)
                                {{ "นาง" }}
                            @endif
                            @if($item->prename == 3)
                                {{ "นางสาว" }}
                            @endif
                                {{ $item->fname }} {{ $item->lname }}</td>
                        <td class="text-center">{{ $item->amount_leave }}</td>
                        <td class="text-center">{{ db2txt($item->date_start) }} - {{ db2txt($item->date_end) }}</td>
                        <td class="text-center">
                            @if ($item->add_type == 1)
                                {{ __('ครึ่งวันเช้า') }}
                            @endif
                            @if ($item->add_type == 2)
                                {{ __('ครึ่งวันบ่าย') }}
                            @endif
                            @if ($item->add_type == 3)
                                {{ $item->total }} วัน
                            @endif
                        </td>
                        <td class="text-center">{{ $item->detail }}</td>
                        <td class="text-center">
                                <a href="{{ route('dayoff.show',$item->add_id) }}" class="btn btn-info" data-toggle="view" title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
    });

</script>
@endsection
