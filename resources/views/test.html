@extends('layouts.main')
@section('title', 'รายงานบันทึกเวลางาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกเวลางาน') }}</h2>
@endsection

@section('content')

<form action="{{ url('/report_atten') }}" method="post">
    @csrf

    <div class="d-flex justify-content-center mb-3">
        <div class="p-2">
            <label for="user_type" style="font-weight:600;">{{ __('วันที่เริ่มต้น') }}</label>
        </div>
        <div class="p-2">
            <input class="form-control" type="date" name="start" id="start" value="{{ $start }}">
        </div>
        <div class="p-2">
            <label for="user_type" style="font-weight:600;">{{ __('วันที่สิ้นสุด') }}</label>
        </div>
        <div class="p-2">
            <input class="form-control" type="date" name="end" id="end" value="{{ $end }}">
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
        </div>
</form>
<form action="{{ route('pdf_atten') }}" method="post">
    @csrf
    <div class="p-2">
        <input type="hidden" value="{{ $start }}" name="start">
        <input type="hidden" value="{{ $end }}" name="end">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</button>
    </div>
</form>
</div>

<div class="table-responsive-md">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">เวลาเข้า</th>
                <th class="text-center">เวลาออก</th>
                <th class="text-center">เวลาทำงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atten as $attendance)
            <tr>
                <td class="text-center">{{ db2txt($attendance->atten_date) }}</td>
                <td class="text-center">
                    @if($attendance->prename == 1)
                    {{ "นาย" }}
                    @endif
                    @if($attendance->prename == 2)
                    {{ "นาง" }}
                    @endif
                    @if($attendance->prename == 3)
                    {{ "นางสาว" }}
                    @endif
                    {{ $attendance->fname }} {{ $attendance->lname }}
                </td>
                <td class="text-center">{{ $attendance->time_in }}</td>
                <td class="text-center">{{ $attendance->time_out }}</td>
                <td class="text-center">{{ $attendance->atten_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $atten->links() }}
</div>
@endsection

@section('script')

@endsection