@extends('layouts.main')
@section('title', 'ผู้ดูแลระบบ')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user-plus"></i> {{ __('เพิ่มผู้ดูแล') }}</h2>
@endsection

@section('content')

<div class="d-flex add-btn">
    <a href="{{ route('admin.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ')}}</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 card" style="padding:20px">
        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('คำนำหน้า') }}</label>

                <div class="col-md-7">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename1" name="prename" value="นาย">
                        <label class="custom-control-label" for="prename1">{{ __('นาย') }}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename2" name="prename" value="นาง">
                        <label class="custom-control-label" for="prename2">{{ __('นาง') }}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="prename3" name="prename" value="นางสาว">
                        <label class="custom-control-label" for="prename3">{{ __('นางสาว') }}</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                <div class="col-md-6">
                    <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                        name="fname" value="{{ old('fname') }}" required autofocus>

                    @if ($errors->has('fname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label>

                <div class="col-md-6">
                    <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                        name="lname" value="{{ old('lname') }}" required autofocus>
                        @if ($errors->has('lname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                        @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password')}}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="level" value="0">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('บันทึก') }}</button>
                <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i> {{ __('ยกเลิก') }}</button>
            </div>
        </form>
    </div>
</div>


@endsection

@section('script')

@endsection