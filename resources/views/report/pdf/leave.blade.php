<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('รายงานข้อมูลบุคลากร') }}</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        body {
            font-family: 'thfont', sans-serif;
        }

        table.nodoc {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0px;
        }

        table.nodoc th {
            font-size: 14pt;
            text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111;
            border-left: 1px solid #111;
            background-color: #fff;
        }

        table.nodoc tr {
            font-size: 14pt;
            text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111;
            border-left: 1px solid #111;
            background-color: #fff;
        }

        table.nodoc td {
            font-size: 14pt;
            text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111;
            border-left: 1px solid #111;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
        <table style="text-align:center; width:100%">
            <tr>
                <td style="font-weight:bold;">
                    บริษัท ทราคูล จำกัด TRAKOOL Co.,Ltd.
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold;">
                    273/8 ถ.ช้างคลาน ต.ช้างคลาน อ.เมือง จ.เชียงใหม่ 50100 &nbsp;&nbsp;โทร. 053-272616
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold;">
                    รายงานบันทึกการลา
                    &nbsp;&nbsp;
                    ประเภท {{ $leave }}
                </td>
            </tr>
        </table>
        <hr>
    </htmlpageheader>
    <br>
    <div style=" margin-top: 200vh;">
        <br>
        <br>
        <br>
        <br>
        <table class="nodoc">
            <tr>
                <th style="text-align: center; width:40px;">ลำดับที่</th>
                <th style="text-align: center; width:150px;">ชื่อ-สกุล</th>
                <th style="text-align: center;">ประเภทการลา</th>
                <th style="text-align: center; width:150px;">วันที่ลา</th>
                <th style="text-align: center; width:80px;">จำนวนวันลา</th>
                <th style="text-align: center; width:200px;">รายละเอียดการลา</th>
                <th style="text-align: center; width:100px;">สถานะ</th>
                <th style="text-align: center; width:200px;">หมายเหตุ</th>
            </tr>
            @foreach ($leaves as $key => $data)
            <tr>
                <td style="padding:3px 7px 3px 3px; text-align: center;">{{ $key + 1 }}</td>
                <td style="padding:3px 7px 3px 3px;">
                    @if($data->prename == 1)
                    {{ "นาย" }}
                    @endif
                    @if($data->prename == 2)
                    {{ "นาง" }}
                    @endif
                    @if($data->prename == 3)
                    {{ "นางสาว" }}
                    @endif
                    {{ $data->fname }} {{ $data->lname }}
                </td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">{{ $data->amount_leave }}</td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">{{ db2txt($data->date_start) }} -
                    {{ db2txt($data->date_end) }}</td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">
                    @if ($data->add_type == 1)
                    {{ __('ครึ่งวันเช้า') }}
                    @endif
                    @if ($data->add_type == 2)
                    {{ __('ครึ่งวันบ่าย') }}
                    @endif
                    @if ($data->add_type == 3)
                    {{ $data->total }} วัน
                    @endif
                </td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">{{ $data->detail }}</td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">
                    @if ($data->status == 0)
                    {{ __('รอการอนุมัติ') }}
                    @endif
                    @if ($data->status == 1)
                    {{ __('อนุมัติ') }}
                    @endif
                    @if ($data->status == 2)
                    {{ __('ไม่อนุมัติ') }}
                    @endif
                </td>
                <td style="padding:3px 7px 3px 3px; text-align: center;">
                    @if (!$data->resson_id == '')
                    @foreach ($resson as $ressons)
                    {{ $ressons->resson_name }}
                    @endforeach
                    @else
                    {{ $data->comment }}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <htmlpagefooter name="page-footer">
        <hr>
        รายงานบันทึกการลา ประเภท {{ $leave }}

    </htmlpagefooter>
</body>

</html>