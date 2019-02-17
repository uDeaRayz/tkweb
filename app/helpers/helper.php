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


?>