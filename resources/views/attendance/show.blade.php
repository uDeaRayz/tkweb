@extends('layouts.main')
@section('title', 'บันทึกการเข้างาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user"></i> บันทึกการเข้างาน</h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{ route('attendance.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
        {{ __('ย้อนกลับ') }}</a>
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        <table class="table">
            <tbody>
                <tr>
                    <td class="title">ชื่อ-สกุล</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        @if($atten->prename == 1)
                        {{ "นาย" }}
                        @endif
                        @if($atten->prename == 2)
                        {{ "นาง" }}
                        @endif
                        @if($atten->prename == 3)
                        {{ "นางสาว" }}
                        @endif
                        {{ $atten->fname }} {{ $atten->lname }}
                    </td>
                </tr>
                <tr>
                    <td class="title">วันที่</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ db2txt($atten->atten_date) }}
                    </td>
                </tr>
                <tr>
                    <td class="title">เวลาเข้า - ออก</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ $atten->time_in }} &nbsp;&nbsp;-&nbsp;&nbsp;{{ $atten->time_out }}
                    </td>
                </tr>
                <tr>
                    <td class="title">รวมชั่วโมงทำงาน:วัน</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        {{ $atten->atten_total }} ชั่วโมง
                    </td>
                </tr>
                <tr>
                    <td class="title">{{ __('รูปภาพเข้างาน') }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        @if (!$atten->img_in== null)
                        <img src="{{ asset($atten->img_in) }}" class="img-show">
                        @else
                        <img src="{{ asset('img/noimg.png') }}" class="img-show">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="title">{{ __('รูปภาพออกงานงาน') }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="sub-title">
                        @if (!$atten->img_out== null)
                        <img src="{{ asset($atten->img_out) }}" class="img-show">
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
