@extends('layouts.main')
@section('title', 'รายงานบันทึกการทำงานนอกพื้นที่')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบันทึกการทำงานนอกพื้นที่') }}</h2>
@endsection

@section('content')

<form action="{{ route('getwork') }}" method="post">
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
<form action="{{ route('pdf_work') }}" method="post">
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
                <th class="text-center">สถานที่</th>
                <th class="text-center">รายละเอียดงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($work as $works)
                <tr>
                    <td class="text-center">{{ db2txt($works->date) }}</td>
                    <td class="text-center">
                        @if($works->prename == 1)
                            {{ "นาย" }}
                        @endif
                        @if($works->prename == 2)
                            {{ "นาง" }}
                        @endif
                        @if($works->prename == 3)
                            {{ "นางสาว" }}
                        @endif
                            {{ $works->fname }} {{ $works->lname }}
                    </td>
                    <td class="text-left" style="word-wrap: break-word;min-width: 160px;max-width: 250px;">{{ $works->place }} <br> ตำบล{{ $works->subdist_name }} &nbsp;&nbsp;&nbsp;อำเภอ{{ $works->dist_name }} &nbsp;&nbsp;&nbsp;จังหวัด{{ $works->prov_name }}</td>
                    <td class="text-left" style="word-wrap: break-word;min-width: 160px;max-width: 250px;">{{ $works->detail }}</td>
                </tr> 
            @endforeach
        </tbody>
    </table>
    {{ $work->links() }}
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function{

        });
    </script>
@endsection
