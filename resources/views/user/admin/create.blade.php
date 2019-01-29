@extends('layouts.main')
@section('title', 'ผู้ดูแลระบบ')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-users"></i> ผู้ดูแลระบบ</h2>
@endsection

@section('content')

<div class="d-flex add-btn">
    <a href="{{url('/admin')}}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
</div>
<div class="table-responsive-md">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th class="text-center">ลำดับที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">รหัสผ่าน</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>นางสาวสุภาวดี เพ็งจันทร์</td>
                <td>0960030344</td>
                <td class="text-center">
                    <button class="btn btn-danger" data-toggle="del" title="ลบข้อมูล"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="edit"]').tooltip();
        $('[data-toggle="del"]').tooltip();
        $("#BtnAdd").click(function () {
            $("#AddData").modal();
        });
        $("#BtnEdit").click(function () {
            $("#EditData").modal();
        });
        $( "form" ).submit(function( event ) {
            event.preventDefault();
        });
    });

</script>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="AddData" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('เพิ่มผู้ดูแลระบบ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="modal-body">
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
                                name="password" >

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                            Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('บันทึก') }}
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection