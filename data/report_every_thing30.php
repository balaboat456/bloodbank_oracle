<?php
    include('../connection.php');

    $condition = '';
    $year =$_GET['year'];

    $sql = "SELECT 
                'มกราคม $year' AS monthname,
                'ม.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-01'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'กุมภาพันธ์ $year' AS monthname,
                'ก.พ. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-02'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'มีนาคม $year' AS monthname,
                'มี.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-03'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'เมษายน $year' AS monthname,
                'เม.ย. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-04'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'พฤษภาคม $year' AS monthname,
                'พ.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-05'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'มิถุนายน $year' AS monthname,
                'มิ.ย. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-06'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'กรกฎาคม $year' AS monthname,
                'ก.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-07'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'สิงหาคม $year' AS monthname,
                'ส.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-08'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'กันยายน $year' AS monthname,
                'ก.ย. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-09'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'ตุลาคม $year' AS monthname,
                'ต.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-10'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'พฤศจิกายน $year' AS monthname,
                'พ.ย. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-11'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M
            UNION
            SELECT 
                'ธันวาคม $year' AS monthname,
                'ธ.ค. $year' AS monthcode,
                IFNULL(SUM(M.sum_requestblooditemqty),0) AS sum_requestblooditemqty,
                IFNULL(SUM(M.sum_crossmacth),0) AS sum_crossmacth,
                IFNULL(SUM(M.sum_crossmacth_pay),0) AS sum_crossmacth_pay
            FROM (SELECT M.* ,	
                    SUM(CASE WHEN IFNULL(CM.bloodtype,'') != '' THEN 1 ELSE 0 END)  AS sum_crossmacth,
                    SUM(CASE WHEN  CM.ispayblood = 1 THEN 1 ELSE 0 END) AS sum_crossmacth_pay

            FROM(
            SELECT 
            RB.requestbloodid,
            SUM(IFNULL(IM.requestblooditemqty,0)) AS sum_requestblooditemqty

            FROM request_blood RB
            LEFT JOIN users UR ON RB.requestbloodusersave = UR.username
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN unit_office UF ON RB.requestunit = UF.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid

            WHERE DATE_FORMAT(RB.requestblooddate, '%Y-%m') = '$year-12'

            GROUP BY RB.requestbloodid ) M
            LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            LEFT JOIN staff SF ON CM.isbloodpreparation = SF.id
            WHERE CM.bloodtype IN ('LDPRC' , 'LPRC' , 'LPRC-O' , 'PRC' , 'SDR' , 'LDSDR')
            GROUP BY M.requestbloodid) M";
 
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'sql' => $sql
        )
        
    );

    mysqli_close($conn);
?>