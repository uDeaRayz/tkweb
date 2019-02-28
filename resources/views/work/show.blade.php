@extends('layouts.main')
@section('title', 'การทำงานนอกพื้นที่')

@section('subtitle')
    <h2 class=" text-primary"><i class="fas fa-user"></i> การทำงานนอกพื้นที่</h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{ route('work.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        <table class="table">
            <tbody>
                <tr>
                    <td class="title">ชื่อ-สกุล</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        @if($work->prename == 1){{ "นาย" }}@endif
                        @if($work->prename == 2){{ "นาง" }}@endif
                        @if($work->prename == 3){{ "นางสาว" }}@endif
                        {{ $work->fname }} {{ $work->lname }}
                    </td>
                </tr>
                <tr>
                    <td class="title">วันที่ทำงาน</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ db2txt($work->date) }}
                    </td>
                </tr>
                <tr>
                    <td class="title">สถานที่</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ $work->place }} &nbsp;&nbsp;&nbsp;&nbsp;<b>ตำบล</b> {{ $work->subdist_name }} &nbsp;&nbsp;&nbsp;&nbsp;<b>อำเภอ</b> {{ $work->dist_name }} &nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด</b> {{ $work->prov_name }}
                    </td>
                </tr>
                <tr>
                    <td class="title">รายละเอียดงาน</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ $work->detail }}
                    </td>
                </tr>
                <tr>
                    <td class="title">{{ __('รูปภาพ') }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        @if (!$work->work_img == null)
                            <img src="{{ asset($work->work_img) }}" class="img-show">
                        @else
                            <img src="{{ asset('img/noimg.png') }}" class="img-show">
                        @endif
                    </td>
                </tr>
            </tbody>
        </table> 
        <div class="row">
            <div class="col-md text-center">
                
            </div>
            <div class="col-md">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection