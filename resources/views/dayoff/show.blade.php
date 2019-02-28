@extends('layouts.main')
@section('title', 'ข้อมูลการลา')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-user"></i> ข้อมูลการลาของ 
    @if($dayoff->prename == 1)
        {{ "นาย" }}
    @endif
    @if($dayoff->prename == 2)
        {{ "นาง" }}
    @endif
    @if($dayoff->prename == 3)
        {{ "นางสาว" }}
    @endif
        {{ $dayoff->fname }} {{ $dayoff->lname }}
</h2>
@endsection

@section('content')
<div class="d-flex add-btn">
    @if ($dayoff->status == 0)
        <a href="{{ route('dayoff.index') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    @endif
    @if ($dayoff->status == 1)
        <a href="{{ route('allow') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    @endif
    @if ($dayoff->status == 2)
        <a href="{{ route('notallow') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('ย้อนกลับ') }}</a>
    @endif
</div>
<div class="row justify-content-center show-data">
    <div class="col-md-10">
        <table class="table table-light">
            <tbody>
                <tr>
                    <th>ประเภทการลา</th>
                    <td>{{ $dayoff->amount_leave }}</td>
                </tr>
                <tr>
                    <th>วันที่ลา</th>
                    <td>{{ db2txt($dayoff->date_start) }} - {{ db2txt($dayoff->date_end) }}</td>
                </tr>
                <tr>
                    <th>จำนวนวันลา</th>
                    <td>@if ($dayoff->add_type == 1)
                            {{ __('ครึ่งวันเช้า') }}
                        @endif
                        @if ($dayoff->add_type == 2)
                            {{ __('ครึ่งวันบ่าย') }}
                        @endif
                        @if ($dayoff->add_type == 3)
                            {{ $dayoff->total }} วัน
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>เหตุผลที่ลา</th>
                    <td>{{ $dayoff->detail }}</td>
                </tr>
                <tr>
                    <th>รูปภาพ</th>
                    <td>
                        @if ($dayoff->img == null)
                            <img src="{{ asset('img/user.png') }}">
                        @endif
                    </td>
                </tr>
                @if ($dayoff->status == 0)
                    <tr>
                        <th>จัดการ</th>
                        <td>
                            <button type="button" class="btn btn-success" id="allow" data-dismiss="modal">
                                <i class="fas fa-check"></i> {{ __('อนุมัติ') }}</button>
                            <button type="button" class="btn btn-warning" id="notallow" data-dismiss="modal">
                                <i class="fas fa-ban"></i> {{ __('ไม่อนุมัติ') }}</button>
                        </td>
                    </tr>
                @endif
                @if ($dayoff->status == 1)
                    <tr>
                        <th>สถานะ</th>
                        <td>
                            <label class="text-info" style="font-weight:bold;">{{ __('ผ่านอนุมัติ') }}</label>
                        </td>
                    </tr>
                @endif
                @if ($dayoff->status == 2)
                    <tr>
                        <th>สถานะ</th>
                        <td>
                            <label class="text-danger" style="font-weight:bold;">{{ __('ไม่ผ่านอนุมัติ') }}</label>
                        </td>
                    </tr>
                    <tr>
                        <th>หมายเหตุ</th>
                        <td>
                            @if (!$dayoff->resson_id == null)
                                {{ $resson_com->resson_name }}
                            @else
                                {{ $dayoff->comment }}
                            @endif
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#allow").click(function (){
            $("#Modalallow").modal();
        });
        $("#notallow").click(function (){
            $("#Modalnot").modal();
        });

        $('.notAllow_form').on('submit', function () {
            if (confirm("ยืนยันการไม่อนุมัติการลา ?")) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
@endsection

@section('modal')

<div class="modal fade" id="Modalallow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ยืนยันการอนุมัติ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('dayoff.update',$dayoff->add_id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p style="font-weight:500;color:black;">ยืนยันการอนุมัติการลา</p>
                    <input type="hidden" value="1" name="status" id="status">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('ยืนยัน') }}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="Modalnot" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('ไม่อนุมัติ') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('dayoff.update',$dayoff->add_id) }}" method="post" class="notAllow_form">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="resson_id" style="font-weight:600;">{{ __('เหตุผล') }}</label>
                        <select class="form-control" id="resson_id" name="resson_id">
                          <option value="">เลือกเหตุผล</option>
                            @foreach ($resson as $ressons)
                                <option value="{{ $ressons->resson_id }}">{{ $ressons->resson_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:600;">{{ __('กรอกเหตุผลอื่น ๆ ') }}</label>
                        <input type="text" class="form-control" name="comment">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="2" name="status" id="status">
                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

