@extends('layouts.main')
@section('title', 'บันทึกการทำงานนอกพื้นที่')

@section('subtitle')
    <h2 class=" text-primary"><i class="fas fa-calendar-check"></i> {{ __('บันทึกการทำงานนอกพื้นที่') }}</h2>
@endsection

@section('content')
<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">สถานที่</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">จัดการ</th>
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
                    <td class="text-justify" style="word-wrap: break-word;min-width: 160px;max-width: 250px;">{{ $works->place }} <b>ตำบล</b>{{ $works->subdist_name }} <b>อำเภอ</b>{{ $works->dist_name }} <b>จังหวัด</b>{{ $works->prov_name }}</td>
                    <td class="text-justify" style="word-wrap: break-word;min-width: 160px;max-width: 250px;">{{ $works->detail }}</td>
                    <td class="text-center">
                        <a href="{{ route('work.show',$works->work_id) }}" class="btn btn-primary BtnShow" data-toggle="view" title="ดูข้อมูล"><i class="fas fa-eye"></i></a>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('[data-toggle="view"]').tooltip();
    });
</script>
@endsection
