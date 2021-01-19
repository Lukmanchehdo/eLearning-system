<?php @session_start(); require("connect.php");


//*** Select วันที่ในตาราง Counter ว่าปัจจุบันเก็บของวันที่เท่าไหร่  ***//
        //*** ถ้าเป็นของเมื่อวานให้ทำการ Update Counter ไปยังตาราง daily และลบข้อมูล เพื่อเก็บของวันปัจจุบัน ***//
        $strSQL = " SELECT DATE FROM counter LIMIT 0,1";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        if($objResult["DATE"] != date("Y-m-d"))
        {
            //*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
            $strSQL = " INSERT INTO daily (DATE,NUM) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."'";
            $objQuery = $conn->query($strSQL);

            //*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
            $strSQL = " DELETE FROM counter WHERE DATE != '".date("Y-m-d")."' ";
            $objQuery = $conn->query($strSQL);
        }

        //*** Insert Counter ปัจจุบัน ***//
        $strSQL = " INSERT INTO counter (DATE,IP) VALUES ('".date("Y-m-d")."','".$_SERVER["REMOTE_ADDR"]."') ";
        $objQuery = $conn->query($strSQL);

        // Today //
        $strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        $strToday = $objResult["CounterToday"];

        // Yesterday //
        $strSQL = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        $strYesterday = $objResult["NUM"];

        // This Month //
        $strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        $strThisMonth = $objResult["CountMonth"];

        // This Year //
        $strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        $strThisYear = $objResult["CountYear"];

        // All //
        $strSQL = " SELECT SUM(NUM) AS CounterAll FROM daily";
        $objQuery = $conn->query($strSQL);
        $objResult = $objQuery->fetch_assoc();
        $strAll = $objResult["CounterAll"];
?>