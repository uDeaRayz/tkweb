@extends('layouts.main')
@section('title', 'แก้ไข')

@section('subtitle')
    <h2 class=" text-primary"><i class="fas fa-user"></i> ข้อมูลของ
        @if($staff->prename == 1) {{ __('นาย') }} @endif
        @if($staff->prename == 2) {{ __('นาง') }} @endif
        @if($staff->prename == 3) {{ __('นางสาว') }}@endif
        {{ $staff->fname }} {{ $staff->lname }} 
    </h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    <a href="{{ route('staff.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
</div>
<form action="{{ route('staff.update', $id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row justify-content-center show-data">
        <div class="col-md-10 card form-staff">
            <div class="row">
                <div class="col-md-2">
                    <p class="text-dark">คำนำหน้า</p>
                </div>
                <div class="col-md">
                    @if($staff->prename == 1)
                      
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename1" name="prename" value="1" checked>
                            <label class="custom-control-label" for="prename1">นาย</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename2" name="prename" value="2">
                            <label class="custom-control-label" for="prename2">นาง</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename3" name="prename" value="3">
                            <label class="custom-control-label" for="prename3">นางสาว</label>
                        </div>
                    @endif
                    @if($staff->prename == 2)
                        
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename1" name="prename" value="1">
                            <label class="custom-control-label" for="prename1">นาย</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename2" name="prename" value="2" checked>
                            <label class="custom-control-label" for="prename2">นาง</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename3" name="prename" value="3">
                            <label class="custom-control-label" for="prename3">นางสาว</label>
                        </div>
                    @endif
                    @if($staff->prename == 3)
                        
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename1" name="prename" value="1">
                            <label class="custom-control-label" for="prename1">นาย</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename2" name="prename" value="2">
                            <label class="custom-control-label" for="prename2">นาง</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="prename3" name="prename" value="3"  checked>
                            <label class="custom-control-label" for="prename3">นางสาว</label>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="text-dark">{{ __('ชื่อ') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="fname" class="form-control" value="{{ $staff->fname }}">
                </div>
                <div class="col-md-1">
                    <p class="text-dark">{{ __('สกุล') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="lname" class="form-control" value="{{ $staff->lname }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('ตำแหน่ง') }}</p>
                </div>
                <div class="col-md">
                    <select class="custom-select" name="position">
                        @foreach ($position as $item)
                            <option value="{{ $staff->position }}"
                                @if ($item->post_id == $staff->position)
                                    {{ 'selected' }}
                                @endif> 
                            {{ $item->post_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-2">
                    <p class="text-dark">{{ __('เบอร์โทร') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="phone" class="form-control" value="{{ $staff->phone }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('ID Line') }}</p>
                </div>
                <div class="col-md">
                    <input type="text" name="line" class="form-control" value="{{ $staff->line }}">
                </div>
                <div class="col-md-2">
                    <p class="text-dark">{{ __('Email') }}</p>
                </div>
                <div class="col-md">
                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}">
                </div>
            </div>
            <div class="row form-staff-margin">
                <div class="col-md-2">
                    <p class="text-dark">{{ __('รูปภาพ') }}</p>
                </div>
                <div class="col-md">
                    <input type="file" name="img" class="form-control">
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
                <div class="row">
                    <div class="col-md" style="padding: 0 20px 20px 20px; margin:5px">
                        <div class="row">
                            @foreach ($amount as $item)
                            
                            <div class="col-md-6 card" style="padding:20px">
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-2">
                                        <label for="leave" style="font-weight:600;">{{ __('ประเภท') }}</label>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="leave[]" class="form-control" value="{{ $item->leave_name }}" readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-4">
                                        <label for="amount_num" style="font-weight:600;">{{ __('จำนวน (วัน/ปี)') }}</label>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="amount_num[]" class="form-control" value="{{ $item->amount_num }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    <div class="text-center" style="margin-bottom:40px;">
        <input type="hidden" name="level" value="2">
        <button class="btn btn-primary">{{ __('บันทึก') }}</button>
        <a href="{{ route('staff.index') }}" class="btn btn-warning">{{ __('ยกเลิก') }}</a>
    </div>
</form>
@endsection

@section('script') 
    <script>

    </script>
@endsection