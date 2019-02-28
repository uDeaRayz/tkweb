@extends('layouts.main')
@section('title', 'รายงานบันทึกการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกการลา') }}</h2>
@endsection

@section('content')

<form action="{{ route('getdayoff') }}" method="post">
    <div class="d-flex justify-content-center mb-3">
        <div class="p-2">
            <label for="leave" style="font-weight:600;">{{ __('แสดงข้อมูลจาก') }}</label>
        </div>
        <div class="p-2">
            @csrf
            <select class="form-control" id="leave" name="leave">
                <option value="" @if ($leave=='' ) {{ __('selected') }}@endif>{{ __('ประเภทการลาทั้งหมด') }}</option>
                @foreach ($dayoff as $item)
                <option value="{{ $item->leave_name }}" @if ($leave==$item->leave_name )
                    {{ __('selected') }}@endif>{{ $item->leave_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="p-2">
            <button class="btn btn-primary"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
        </div>
</form>
<form method="post" action="{{ route('pdf_dayoff') }}">
    @csrf
    <div class="p-2">
        <input type="hidden" name="name_leave" value="{{ $leave }}">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</button>
    </div>
</form>
</div>

@if (count($leaves) === 0)
<div class="text-center">
    <span style="font-size:18pt; font-weight:700;">{{ __('ไม่พบข้อมูล') }}</span>
</div>
@else
<div class="table-responsive-md">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">{{ __('ลำดับ') }}</th>
                <th class="text-center">{{ __('ประเภทการลา') }}</th>
                <th class="text-center">{{ __('ชื่อ-สกุล') }}</th>
                <th class="text-center">{{ __('วันที่ลา') }}</th>
                <th class="text-center">{{ __('จำนวนวันลา') }}</th>
                <th class="text-center">{{ __('รายละเอียด') }}</th>
                <th class="text-center">{{ __('สถานะ') }}</th>
                <th class="text-center">{{ __('หมายเหตุ') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $key => $item)
            <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center">{{ $item->amount_leave }}</td>
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
                    {{ $item->fname }} {{ $item->lname }}
                </td>
                <td class="text-center">{{ db2txt($item->date_start) }} {{ __('-') }} {{ db2txt($item->date_end) }}</td>
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
                    @if ($item->status == 0)
                    {{ __('รอการอนุมัติ') }}
                    @endif
                    @if ($item->status == 1)
                    {{ __('อนุมัติ') }}
                    @endif
                    @if ($item->status == 2)
                    {{ __('ไม่อนุมัติ') }}
                    @endif
                </td>
                <td class="text-center">
                    @if (!$item->resson_id == '')
                    @foreach ($resson as $ressons)
                    {{ $ressons->resson_name }}
                    @endforeach
                    @else
                    {{ $item->comment }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $leaves->links() }}
</div>
@endif
@endsection

@section('script')
<script>
    $(document).ready(function{

    });
</script>
@endsection