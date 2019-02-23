@extends('layouts.main')
@section('title', 'รายงานบันทึกการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกการลา') }}</h2>
@endsection

@section('content')

<div class="d-flex justify-content-center mb-3">
    <div class="p-2">
        <label for="leave" style="font-weight:600;">{{ __('แสดงข้อมูลจาก') }}</label>
    </div>
    <div class="p-2">
        <form action="{{ route('report-dayoff.store') }}" method="post">
            @csrf
            <select class="form-control" id="leave" name="leave">
                <option value="0" @if ($id==0) {{ __('selected') }}@endif>{{ __('ประเภทการลาทั้งหมด') }}</option>
                @foreach ($dayoff as $item)
                    <option value="{{ $item->leave_id }}" @if ($id==$item->leave_id ) {{ __('selected') }}@endif>{{ $item->leave_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="p-2">
            <button class="btn btn-primary"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
        </div>
        </form>
    <div class="p-2">
        <button class="btn btn-success"><i class="fas fa-print"></i> {{ __('พิมพ์') }}</button>
    </div>
    <div class="p-2">
        <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</button>
    </div>
</div>
<div class="table-responsive-md">
    <table class="table table-hover">
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
            @foreach ($atten as $key => $item)
            <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center">{{ $item->leave_name }}</td>
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
                <td class="text-center">{{ $item->total }}</td>
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
                <td class="text-center">{{ $item->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $atten->links() }}
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function{

        });
    </script>
@endsection
