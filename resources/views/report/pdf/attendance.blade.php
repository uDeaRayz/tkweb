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
                    รายงานบันทึกการเข้าปฏิบัติงาน
                    &nbsp;&nbsp;
                    @if ($start == '' && $end == '')
                    ประจำวันที่ {{ dateFullnow() }}
                    @endif
                    @if (!$start == '' && $end == '')
                    ตั้งแต่วันที่ {{ db2txt_full($start) }} จนถึงปัจจุบัน
                    @endif
                    @if ($start == '' && !$end == '')
                    ตั้งแต่เริ่มต้น จนถึง {{ db2txt_full($end) }}
                    @endif
                    @if (!$start == '' && !$end == '')
                    ตั้งแต่วันที่ {{ db2txt_full($start) }} จนถึง {{ db2txt_full($end) }}
                    @endif
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
                <th style="text-align: center; width:100px;">วันที่</th>
                <th style="text-align: center; width:300px;">ชื่อ-สกุล</th>
                <th style="text-align: center;">สถานะ</th>
                <th style="text-align: center;">เวลาเข้า</th>
                <th style="text-align: center;">เวลาออก</th>
                <th style="text-align: center;">รวมชั่วโมง <br> ทำงาน:วัน</th>
            </tr>
            @foreach ($atten as $key => $item)
            <tr>
                <td style="padding:3px 5px 3px 3px; text-align: center;">{{ db2txt($item->atten_date) }}</td>
                <td style="padding:3px 5px 3px 3px;">
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
                <td style="padding:3px 5px 3px 3px; text-align: center;">
                    @if ($item->level == 2)
                    {{ __('พนักงาน') }}
                    @endif
                    @if ($item->level == 3)
                    {{ __('นักศึกษาฝึกงาน') }}
                    @endif
                </td>
                <td style="padding:3px 5px 3px 3px; text-align: center;">{{ $item->time_in }}</td>
                <td style="padding:3px 5px 3px 3px; text-align: center;">{{ $item->time_out }}</td>
                <td style="padding:3px 5px 3px 3px; text-align: center;">{{ $item->atten_total }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <htmlpagefooter name="page-footer">
        <hr>
        รายงานบันทึกการเข้าปฏิบัติงาน
        @if ($start == '' && $end == '')
        ประจำวันที่ {{ dateFullnow() }}
        @endif
        @if (!$start == '' && $end == '')
        ตั้งแต่วันที่ {{ db2txt_full($start) }} จนถึงปัจจุบัน
        @endif
        @if ($start == '' && !$end == '')
        ตั้งแต่เริ่มต้น จนถึง {{ db2txt_full($end) }}
        @endif
        @if (!$start == '' && !$end == '')
        ตั้งแต่วันที่ {{ db2txt_full($start) }} จนถึง {{ db2txt_full($end) }}
        @endif
    </htmlpagefooter>
</body>

</html>