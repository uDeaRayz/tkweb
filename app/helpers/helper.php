<?php

    function db2date($val){

        $arr = explode("-",$val);
        $year = $arr[0] + 543;

        return $arr[2]."/".$arr[1]."/".$year;
    }

    function db2txt($val){
        
        $arr = explode("-",$val);
        $year = $arr[0] + 543;

        switch ($arr[1]) {
            case 01:
                $month = "ม.ค."; break;
            case 02:
                $month = "ก.พ."; break;
            case 03:
                $month = "มี.ค.";break;
            case 04:
                $month = "เม.ย."; break;
            case 05:
                $month = "พ.ค."; break;
            case 06:
                $month = "มิ.ย."; break;
            case 07:
                $month = "ก.ค."; break;
            case 8:
                $month = "ส.ค."; break;
            case 9:
                $month = "ก.ย."; break;
            case 10:
                $month = "ต.ค."; break;
            case 11:
                $month = "พ.ย."; break;
            case 12:
                $month = "ธ.ค."; break;
                        }
        return "$arr[2] $month $year";
    }
    function db2txt_full($val){
        
        $arr = explode("-",$val);
        $year = $arr[0] + 543;

        switch ($arr[1]) {
            case 01:
                $month = "มกราคม"; break;
            case 02:
                $month = "กุมภาพันธ์"; break;
            case 03:
                $month = "มีนาคม";break;
            case 04:
                $month = "เมษายน"; break;
            case 05:
                $month = "พฤษภาคม"; break;
            case 06:
                $month = "มิถุนายน"; break;
            case 07:
                $month = "กรกฎาคม"; break;
            case 8:
                $month = "สิงหาคม"; break;
            case 9:
                $month = "กันยายน"; break;
            case 10:
                $month = "ตุลาคม"; break;
            case 11:
                $month = "พฤศจิกายน"; break;
            case 12:
                $month = "ธันวาคม"; break;
                        }
        return "$arr[2] $month $year";
    }

    function dateFullnow(){
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
        return "$date";
    }
?>