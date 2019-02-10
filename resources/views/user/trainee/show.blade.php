@extends('layouts.main')
@section('title', 'นักศึกษาฝึกงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user"></i> ข้อมูลของ 
    @if($trainee->prename == 1) {{ __('นาย') }} @endif
    @if($trainee->prename == 2) {{ __('นาง') }} @endif
    @if($trainee->prename == 3) {{ __('นางสาว') }}@endif
    {{ $trainee->fname }} {{ $trainee->lname }} 
</h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{ route('trainee.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    &nbsp; &nbsp;
    <a href="{{ route('trainee.edit',$trainee->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> {{ __('แก้ไข') }}</a>
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        
        <div class="row">
            <div class="col-md">
                <img src="{{ asset($trainee->img) }}" class="img-show">
            </div>
            <div class="col-md">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="title">ชื่อ-สกุล</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">
                                @if($trainee->prename == 1) {{ __('นาย') }} @endif
                                @if($trainee->prename == 2) {{ __('นาง') }} @endif
                                @if($trainee->prename == 3) {{ __('นางสาว') }}@endif
                                {{ $trainee->fname }} {{ $trainee->lname }}
                            </td>
                        </tr>
                        <tr>
                            <td class="title">ตำแหน่ง</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">{{ $trainee->post_name }}</td>
                        </tr>
                        <tr>
                            <td class="title">เบอร์โทร</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">{{ $trainee->phone }}</td>
                        </tr>
                        <tr>
                            <td class="title">Email</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">{{ $trainee->email }}</td>
                        </tr>
                        <tr>
                            <td class="title">ID Line</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="sub-title">{{ $trainee->line }}</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
 {{-- ข้อมูลการลา --}}
 <div class="row justify-content-center show-data">
        <div class="col-md-10 card form-staff">
            <p style="color:black; font-size: 20px; margin-bottom:3px;">
                {{ __('ข้อมูลการลา') }}
            </p>
            <hr>
            <div class="row form-staff-margin">
                @foreach ($amount as $item)
                    <div class="col-md card" style="padding: 20px; margin:5px">
                        <div class="row" style="margin-bottom:5px;">
                            <div class="col-md-2">
                                <label for="leave_id" style="font-weight:600;">{{ __('ประเภท') }}</label>
                            </div>
                            <div class="col-md">
                                <p style="color: #111;" aria-readonly="true">{{ $item->leave_name }}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4">
                                    <label for="leave_id" style="font-weight:600;">{{ __('จำนวน (วัน/ปี)') }}</label>
                                </div>
                            <div class="col-md">
                                    <p style="color: #111;">{{ $item->amount_num }} &emsp; วัน</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> 

@endsection

@section('script')
<script>

</script>
@endsection