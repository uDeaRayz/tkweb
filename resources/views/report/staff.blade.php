@extends('layouts.main')
@section('title', 'รายงานบุคลากร')

@section('subtitle')
<h2 class=" text-primary"><i class="fas fa-poll"></i> {{ __('รายงานบุคลากร') }}</h2>
@endsection

@section('content')

<div class="d-flex justify-content-center mb-3">
    <div class="p-2">
        <label for="leave" style="font-weight:600;">{{ __('แสดงข้อมูลจาก') }}</label>
    </div>
    
        <div class="p-2">
            <form action="{{ route('report-staff.store') }}" method="post">
                    @csrf
            <select class="form-control" id="leave" name="leave">
                <option value="0" @if ($id == 0){{ __('selected') }}@endif>{{ __('เลือกทั้งหมด') }}</option>
                <option value="2"  @if ($id == 2){{ __('selected') }}@endif>{{ __('พนักงาน') }}</option>
                <option value="3"  @if ($id == 3){{ __('selected') }}@endif>{{ __('นักศึกษาฝึกงาน') }}</option>
            </select>
        </div>
        <div class="p-2">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> {{ __('ค้นหา') }}</button>
        </div>
    </form>
    @if ($id == 0)
        <div class="p-2">
            <a href="{{ url('/report_staffs') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</a>
        </div>
    @endif
    @if ($id == 2)
        <div class="p-2">
            <a href="{{ url('/report_staff') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</a>
        </div>
    @endif
    @if ($id == 3)
        <div class="p-2">
            <a href="{{ url('/report_trainee') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> {{ __('pdf') }}</a>
        </div>
    @endif

  </div>
<div class="table-responsive-md">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">เบอร์โทร</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">LINE ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>
                        @if($item->prename == 1)
                            {{ "นาย" }}
                        @endif
                        @if($item->prename == 2)
                            {{ "นาง" }}
                        @endif
                        @if($item->prename == 3)
                            {{ "นางสาว" }}
                        @endif
                        {{ $item->fname }} {{ $item->lname }}
                    </td>
                    <td class="text-center">{{ $item->post_name }}</td>
                    <td class="text-center">
                        @if ($item->level == 2)
                            {{ __('พนักงาน') }}
                        @endif
                        @if ($item->level == 3)
                            {{ __('นักศึกษาฝึกงาน') }}
                        @endif
                    </td>
                    <td class="text-center">{{ $item->phone }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center">{{ $item->line }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $user->links() }}
</div>
@endsection

@section('script')
    
@endsection
