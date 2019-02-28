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
        table.nodoc{width: 100%; border-collapse: collapse; border-spacing: 0px; }
        table.nodoc th { 
            font-size: 14pt;  text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111; 
            border-left: 1px solid #111;
            background-color:#fff;   
        }
        table.nodoc tr { 
            font-size: 14pt;  text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111; 
            border-left: 1px solid #111;
            background-color:#fff;   
        }
        table.nodoc td { 
            font-size: 14pt;  text-align: left;
            border-top: 1px solid #111;
            border-bottom: 1px solid #111;
            border-right: 1px solid #111; 
            border-left: 1px solid #111;
            background-color:#fff;   
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
                        รายงาน 
                        @if ($id == 0)
                            {{ __('ข้อมูลบุคลากร') }}
                        @endif
                        @if ($id == 1)
                            {{ __('ข้อมูลนักศึกษาฝึกงาน') }}
                        @endif
                        @if ($id == 2)
                            {{ __('ข้อมูลพนักงาน') }}
                        @endif
                        &nbsp;&nbsp;
                        ประจำวันที่ 
                        <?php 
                            $_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",   
                            "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",   
                            "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",   
                            "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม");
                            
                            $vardate=date('Y-m-d');
                            $yy=date('Y');
                            $mm =date('m');$dd=date('d');
                            if ($dd<10){
                            $dd=substr($dd,1,2);
                            }
                            $date=$dd ." ".$_month_name[$mm]."  ".$yy+= 543;
                            echo $date;
                        ?>
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
                    <th  style="text-align: center;">ลำดับ</th>
                    <th style="text-align: center;">ชื่อ-สกุล</th>
                    <th style="text-align: center;">ตำแหน่ง</th>
                    <th style="text-align: center;">เบอร์โทร</th>
                    <th style="text-align: center;">E-mail</th>
                    <th style="text-align: center;">LINE ID</th>
                </tr>
                @foreach ($user as $key => $item)
                <tr>
                    <td style="text-align: center;">{{ $key + 1 }}</td>
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
                    <td style="padding:3px 5px 3px 3px;">{{ $item->post_name }}</td>
                    <td style="padding:3px 5px 3px 3px;">{{ $item->phone }}</td>
                    <td style="padding:3px 5px 3px 3px;">{{ $item->email }}</td>
                    <td style="padding:3px 5px 3px 3px;">{{ $item->line }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <htmlpagefooter name="page-footer">
            <hr>
            <div style="text-align:right;">
                รายงาน 
                @if ($id == 0)
                    {{ __('ข้อมูลบุคลากร') }}
                @endif
                @if ($id == 1)
                    {{ __('ข้อมูลนักศึกษาฝึกงาน') }}
                @endif
                @if ($id == 2)
                    {{ __('ข้อมูลพนักงาน') }}
                @endif
            </div>
        </htmlpagefooter>    
</body>
</html>