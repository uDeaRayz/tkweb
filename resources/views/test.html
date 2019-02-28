@extends('layouts.main')
@section('title', 'บันทึกเวลาการทำงาน')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-calendar-check"></i> {{ __('บันทึกเวลาการทำงาน') }}</h2>
@endsection

@section('content')
@if (count($atten) === 0)
<div class="text-center">
    <span style="font-size:18pt; font-weight:700;">{{ __('ไม่พบข้อมูล') }}</span>
</div>
@else
<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">เวลาเข้างาน</th>
                <th class="text-center">เวลาออกงาน</th>
                <th class="text-center">จำนวนชั่วโมง</th>
                <th class="text-center">จัดการ</th>
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
                <td class="text-center">
                    <a href="{{ route('attendance.show', $attendance->atten_id) }}" class="btn btn-primary"
                        data-toggle="view" title="ดูข้อมูล">
                        <i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif


@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
        $("#BtnShow").click(function () {
            $("#ModalShow").modal();
        });
    });

</script>
@endsection

@section('modal')

<div class="modal fade" id="ModalShow" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('การบันทึกเวลา') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="t">เข้างาน</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="{{ asset('img/user.png') }}" alt="" class="img-show"></td>
                        </tr>
                        <tr>
                            <td class="t">ออกงาน</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="{{ asset('img/user.png') }}" alt="" class="img-show"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> {{ __('ปิด') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection