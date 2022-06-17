<?php
    include('../../connection.php');
    include('../../data/dateFormat.php');

    $condition = '';
    $hn =$_GET['hn'];
    $id =$_GET['id'];

    $fromdate = dmyToymd($_GET['fromdate']);
    $todate = dmyToymd($_GET['todate']);

    if(!empty($id))
    $condition = $condition." AND CR.labcheckrequestid = '$id' ";

    if(!empty($hn))
    $condition = $condition." AND PT.patienthn = '$hn' AND IFNULL(PT.patienthn,'') != ''  ";

    if(!empty($fromdate) || !empty($todate))
    $condition = $condition." AND DATE_FORMAT(CR.labsenddatetime,'%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'   ";

    $sql = "SELECT 	CR.*,
                PT.patientfullname,
                PT.patientan,
                PT.patienthn,
                PT.patientidcard,
                UN.labunitname,
                ST.checkresultbloodstatusname,
                JT.labjobtypename,
                UR.unitofficename,
                DT.doctorname,
                RS.reasonsendingname,
                MR.maintenancerightname,
                DL.labdeliveryname,
                BG.bloodgroupname,
                RH.rhname3,
                BGM.bloodgroupname AS mombloodgroupname,
                RHM.rhname3 AS momrhname3
            FROM lab_check_request CR 
            LEFT JOIN patient PT ON CR.patientid = PT.patientid
            LEFT JOIN lab_unit UN ON CR.labunitid = UN.labunitid
            LEFT JOIN lab_checkresultbloodstatus ST ON CR.checkresultbloodstatusid = ST.checkresultbloodstatusid
            LEFT JOIN lab_jobtype JT ON CR.labjobtypeid = JT.labjobtypeid
            LEFT JOIN unit_office UR ON CR.labunitroomid = UR.unitofficecode
            LEFT JOIN doctor DT ON CR.doctorid = DT.doctorcode2
            LEFT JOIN lab_reasonsending RS ON CR.reasonsendingid = RS.reasonsendingid
            LEFT JOIN maintenance_right MR ON CR.maintenancerightid = MR.maintenancerightid
            LEFT JOIN lab_delivery DL ON CR.labdeliveryid = DL.labdeliveryid
            LEFT JOIN blood_group BG ON CR.labbloodgroupid = BG.bloodgroupid
            LEFT JOIN rh RH ON CR.labrhid = RH.rhid
            LEFT JOIN blood_group BGM ON CR.motherbloodgroup = BGM.bloodgroupid
            LEFT JOIN rh RHM ON CR.motherrh = RHM.rhid
            WHERE IFNULL(CR.checkresultbloodstatusid,'')  not in ('0','') 
            AND CR.checkresultbloodstatusid != '1'
            $condition
            ORDER BY CR.labgetdatetime DESC,CR.labcheckrequestid DESC";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        $labcheckrequestid = $result["labcheckrequestid"];

        // Start Test Item
        $sql = "SELECT 
        IM.*,
        DATE_FORMAT(IM.a_date_time,'%d/%m/%Y %H:%I') AS  a_date_time,
        DATE_FORMAT(IM.v_date_time,'%d/%m/%Y %H:%I') AS  v_date_time,
        LF.labformname 
                FROM lab_check_request_item IM
                LEFT JOIN labform LF ON IM.labformid = LF.labformid
                LEFT JOIN lab_check_request LC ON LC.labcheckrequestid = IM.labcheckrequestid
                WHERE IM.active <> 0
                AND IM.labcheckrequestid = '$labcheckrequestid'
                GROUP BY LF.labformname ";
        $query_test_item = mysqli_query($conn,$sql);
        $resultArray_test_item = array();
        while($result_test_item = mysqli_fetch_array($query_test_item))
        {
            array_push($resultArray_test_item,$result_test_item);
        }
        $result["lab_labcheckrequest_item"] = $resultArray_test_item;
        // End Test Item


        // Start ABO Tab 0
        $sql = "SELECT * FROM lab_abo_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_0 = mysqli_query($conn,$sql);
        $resultArray_ABO_0 = array();
        while($result_abo_0 = mysqli_fetch_array($query_abo_tab_0))
        {
            array_push($resultArray_ABO_0,$result_abo_0);
        }
        $result["lab_abo_item_0"] = $resultArray_ABO_0;
        // End ABO Tab 0

        // Start Rh Tab 0
        $sql = "SELECT * FROM lab_rh_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_0 = mysqli_query($conn,$sql);
        $resultArray_RH_0 = array();
        while($result_rh_0 = mysqli_fetch_array($query_rh_tab_0))
        {
            array_push($resultArray_RH_0,$result_rh_0);
        }
        $result["lab_rh_item_0"] = $resultArray_RH_0;
        // End Rh Tab 0

        // Start Antibody Sceening test Tab 0
        $sql = "SELECT * FROM lab_antibodysceentest_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentest_tab_0 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentest_0 = array();
        while($result_antibodysceentest_0 = mysqli_fetch_array($query_antibodysceentest_tab_0))
        {
            array_push($resultArray_antibodysceentest_0,$result_antibodysceentest_0);
        }
        $result["lab_antibodysceentest_item_0"] = $resultArray_antibodysceentest_0;
        // End Antibody Sceening test Tab 0

        // Start Antibody identification test Tab 0
        $sql = "SELECT * FROM lab_antibodyidentificationtest_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtest_tab_0 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtest_0 = array();
        while($result_antibodyidentificationtest_0 = mysqli_fetch_array($query_antibodyidentificationtest_tab_0))
        {
            array_push($resultArray_antibodyidentificationtest_0,$result_antibodyidentificationtest_0);
        }
        $result["lab_antibodyidentificationtest_item_0"] = $resultArray_antibodyidentificationtest_0;
        // End Antibody identification test Tab 0

        // Start Saliva test Tab 0
        $sql = "SELECT * FROM lab_salivatest_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_salivatest_tab_0 = mysqli_query($conn,$sql);
        $resultArray_salivatest_0 = array();
        while($result_salivatest_0 = mysqli_fetch_array($query_salivatest_tab_0))
        {
            array_push($resultArray_salivatest_0,$result_salivatest_0);
        }
        $result["lab_salivatest_item_0"] = $resultArray_salivatest_0;
        // End Saliva test Tab 0

        // Start Saliva test Tab 0
        $sql = "SELECT * FROM lab_titration_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_titration_tab_0 = mysqli_query($conn,$sql);
        $resultArray_titration_0 = array();
        while($result_titration_0 = mysqli_fetch_array($query_titration_tab_0))
        {
            array_push($resultArray_titration_0,$result_titration_0);
        }
        $result["lab_titration_item_0"] = $resultArray_titration_0;
        // End Saliva test Tab 0

        // Start Cold agglutinin Tab 0
        $sql = "SELECT * FROM lab_coldagglutinin_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_coldagglutinin_tab_0 = mysqli_query($conn,$sql);
        $resultArray_coldagglutinin_0 = array();
        while($result_coldagglutinin_0 = mysqli_fetch_array($query_coldagglutinin_tab_0))
        {
            array_push($resultArray_coldagglutinin_0,$result_coldagglutinin_0);
        }
        $result["lab_coldagglutinin_item_0"] = $resultArray_coldagglutinin_0;
        // End Cold agglutinin Tab 0

        // Start Antibody identification test Get Method Tab 0
        $sql = "SELECT * FROM lab_antibodyidentificationtestgetmethod_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtestgetmethod_tab_0 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtestgetmethod_0 = array();
        while($result_antibodyidentificationtestgetmethod_0 = mysqli_fetch_array($query_antibodyidentificationtestgetmethod_tab_0))
        {
            array_push($resultArray_antibodyidentificationtestgetmethod_0,$result_antibodyidentificationtestgetmethod_0);
        }
        $result["lab_antibodyidentificationtestgetmethod_item_0"] = $resultArray_antibodyidentificationtestgetmethod_0;
        // End Antibody identification test Get Method Tab 0

        // Start Antibody Sceening test Get Method Tab 0
        $sql = "SELECT * FROM lab_antibodysceentestgetmethod_0 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentestgetmethod_tab_0 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentestgetmethod_0 = array();
        while($result_antibodysceentestgetmethod_0 = mysqli_fetch_array($query_antibodysceentestgetmethod_tab_0))
        {
            array_push($resultArray_antibodysceentestgetmethod_0,$result_antibodysceentestgetmethod_0);
        }
        $result["lab_antibodysceentestgetmethod_item_0"] = $resultArray_antibodysceentestgetmethod_0;
        // End Antibody Sceening test Get Method Tab 0


        // =================Tab 1=======================

        // Start ABO Tab 1
        $sql = "SELECT * FROM lab_abo_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_1 = mysqli_query($conn,$sql);
        $resultArray_ABO_1 = array();
        while($result_abo_1 = mysqli_fetch_array($query_abo_tab_1))
        {
            array_push($resultArray_ABO_1,$result_abo_1);
        }
        $result["lab_abo_item_1"] = $resultArray_ABO_1;
        // End ABO Tab 1

        // Start Rh Tab 1
        $sql = "SELECT * FROM lab_rh_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_1 = mysqli_query($conn,$sql);
        $resultArray_RH_1 = array();
        while($result_rh_1 = mysqli_fetch_array($query_rh_tab_1))
        {
            array_push($resultArray_RH_1,$result_rh_1);
        }
        $result["lab_rh_item_1"] = $resultArray_RH_1;
        // End Rh Tab 1

        // Start Antibody Sceening test Tab 1
        $sql = "SELECT * FROM lab_antibodysceentest_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentest_tab_1 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentest_1 = array();
        while($result_antibodysceentest_1 = mysqli_fetch_array($query_antibodysceentest_tab_1))
        {
            array_push($resultArray_antibodysceentest_1,$result_antibodysceentest_1);
        }
        $result["lab_antibodysceentest_item_1"] = $resultArray_antibodysceentest_1;
        // End Antibody Sceening test Tab 1

        // Start Antibody identification test Tab 1
        $sql = "SELECT * FROM lab_antibodyidentificationtest_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtest_tab_1 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtest_1 = array();
        while($result_antibodyidentificationtest_1 = mysqli_fetch_array($query_antibodyidentificationtest_tab_1))
        {
            array_push($resultArray_antibodyidentificationtest_1,$result_antibodyidentificationtest_1);
        }
        $result["lab_antibodyidentificationtest_item_1"] = $resultArray_antibodyidentificationtest_1;
        // End Antibody identification test Tab 1

        // Start Saliva test Tab 1
        $sql = "SELECT * FROM lab_salivatest_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_salivatest_tab_1 = mysqli_query($conn,$sql);
        $resultArray_salivatest_1 = array();
        while($result_salivatest_1 = mysqli_fetch_array($query_salivatest_tab_1))
        {
            array_push($resultArray_salivatest_1,$result_salivatest_1);
        }
        $result["lab_salivatest_item_1"] = $resultArray_salivatest_1;
        // End Saliva test Tab 1

        // Start Saliva test Tab 1
        $sql = "SELECT * FROM lab_titration_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_titration_tab_1 = mysqli_query($conn,$sql);
        $resultArray_titration_1 = array();
        while($result_titration_1 = mysqli_fetch_array($query_titration_tab_1))
        {
            array_push($resultArray_titration_1,$result_titration_1);
        }
        $result["lab_titration_item_1"] = $resultArray_titration_1;
        // End Saliva test Tab 1

        // Start Cold agglutinin Tab 1
        $sql = "SELECT * FROM lab_coldagglutinin_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_coldagglutinin_tab_1 = mysqli_query($conn,$sql);
        $resultArray_coldagglutinin_1 = array();
        while($result_coldagglutinin_1 = mysqli_fetch_array($query_coldagglutinin_tab_1))
        {
            array_push($resultArray_coldagglutinin_1,$result_coldagglutinin_1);
        }
        $result["lab_coldagglutinin_item_1"] = $resultArray_coldagglutinin_1;
        // End Cold agglutinin Tab 1

        // Start Antibody identification test Get Method Tab 1
        $sql = "SELECT * FROM lab_antibodyidentificationtestgetmethod_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtestgetmethod_tab_1 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtestgetmethod_1 = array();
        while($result_antibodyidentificationtestgetmethod_1 = mysqli_fetch_array($query_antibodyidentificationtestgetmethod_tab_1))
        {
            array_push($resultArray_antibodyidentificationtestgetmethod_1,$result_antibodyidentificationtestgetmethod_1);
        }
        $result["lab_antibodyidentificationtestgetmethod_item_1"] = $resultArray_antibodyidentificationtestgetmethod_1;
        // End Antibody identification test Get Method Tab 1

        // Start Antibody Sceening test Get Method Tab 1
        $sql = "SELECT * FROM lab_antibodysceentestgetmethod_1 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentestgetmethod_tab_1 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentestgetmethod_1 = array();
        while($result_antibodysceentestgetmethod_1 = mysqli_fetch_array($query_antibodysceentestgetmethod_tab_1))
        {
            array_push($resultArray_antibodysceentestgetmethod_1,$result_antibodysceentestgetmethod_1);
        }
        $result["lab_antibodysceentestgetmethod_item_1"] = $resultArray_antibodysceentestgetmethod_1;
        // End Antibody Sceening test Get Method Tab 1


        // =================Tab 2=======================

        // Start ABO Tab 2
        $sql = "SELECT * FROM lab_abo_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_2 = mysqli_query($conn,$sql);
        $resultArray_ABO_2 = array();
        while($result_abo_2 = mysqli_fetch_array($query_abo_tab_2))
        {
            array_push($resultArray_ABO_2,$result_abo_2);
        }
        $result["lab_abo_item_2"] = $resultArray_ABO_2;
        // End ABO Tab 2

        // Start Rh Tab 2
        $sql = "SELECT * FROM lab_rh_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_2 = mysqli_query($conn,$sql);
        $resultArray_RH_2 = array();
        while($result_rh_2 = mysqli_fetch_array($query_rh_tab_2))
        {
            array_push($resultArray_RH_2,$result_rh_2);
        }
        $result["lab_rh_item_2"] = $resultArray_RH_2;
        // End Rh Tab 2

        // Start Antibody Sceening test Tab 2
        $sql = "SELECT * FROM lab_antibodysceentest_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentest_tab_2 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentest_2 = array();
        while($result_antibodysceentest_2 = mysqli_fetch_array($query_antibodysceentest_tab_2))
        {
            array_push($resultArray_antibodysceentest_2,$result_antibodysceentest_2);
        }
        $result["lab_antibodysceentest_item_2"] = $resultArray_antibodysceentest_2;
        // End Antibody Sceening test Tab 2

        // Start Antibody identification test Tab 2
        $sql = "SELECT * FROM lab_antibodyidentificationtest_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtest_tab_2 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtest_2 = array();
        while($result_antibodyidentificationtest_2 = mysqli_fetch_array($query_antibodyidentificationtest_tab_2))
        {
            array_push($resultArray_antibodyidentificationtest_2,$result_antibodyidentificationtest_2);
        }
        $result["lab_antibodyidentificationtest_item_2"] = $resultArray_antibodyidentificationtest_2;
        // End Antibody identification test Tab 2

        // Start Saliva test Tab 2
        $sql = "SELECT * FROM lab_salivatest_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_salivatest_tab_2 = mysqli_query($conn,$sql);
        $resultArray_salivatest_2 = array();
        while($result_salivatest_2 = mysqli_fetch_array($query_salivatest_tab_2))
        {
            array_push($resultArray_salivatest_2,$result_salivatest_2);
        }
        $result["lab_salivatest_item_2"] = $resultArray_salivatest_2;
        // End Saliva test Tab 2

        // Start Saliva test Tab 2
        $sql = "SELECT * FROM lab_titration_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_titration_tab_2 = mysqli_query($conn,$sql);
        $resultArray_titration_2 = array();
        while($result_titration_2 = mysqli_fetch_array($query_titration_tab_2))
        {
            array_push($resultArray_titration_2,$result_titration_2);
        }
        $result["lab_titration_item_2"] = $resultArray_titration_2;
        // End Saliva test Tab 2

        // Start Cold agglutinin Tab 2
        $sql = "SELECT * FROM lab_coldagglutinin_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_coldagglutinin_tab_2 = mysqli_query($conn,$sql);
        $resultArray_coldagglutinin_2 = array();
        while($result_coldagglutinin_2 = mysqli_fetch_array($query_coldagglutinin_tab_2))
        {
            array_push($resultArray_coldagglutinin_2,$result_coldagglutinin_2);
        }
        $result["lab_coldagglutinin_item_2"] = $resultArray_coldagglutinin_2;
        // End Cold agglutinin Tab 2

        // Start Antibody identification test Get Method Tab 2
        $sql = "SELECT * FROM lab_antibodyidentificationtestgetmethod_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtestgetmethod_tab_2 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtestgetmethod_2 = array();
        while($result_antibodyidentificationtestgetmethod_2 = mysqli_fetch_array($query_antibodyidentificationtestgetmethod_tab_2))
        {
            array_push($resultArray_antibodyidentificationtestgetmethod_2,$result_antibodyidentificationtestgetmethod_2);
        }
        $result["lab_antibodyidentificationtestgetmethod_item_2"] = $resultArray_antibodyidentificationtestgetmethod_2;
        // End Antibody identification test Get Method Tab 2

        // Start Antibody Sceening test Get Method Tab 2
        $sql = "SELECT * FROM lab_antibodysceentestgetmethod_2 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentestgetmethod_tab_2 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentestgetmethod_2 = array();
        while($result_antibodysceentestgetmethod_2 = mysqli_fetch_array($query_antibodysceentestgetmethod_tab_2))
        {
            array_push($resultArray_antibodysceentestgetmethod_2,$result_antibodysceentestgetmethod_2);
        }
        $result["lab_antibodysceentestgetmethod_item_2"] = $resultArray_antibodysceentestgetmethod_2;
        // End Antibody Sceening test Get Method Tab 2


        // =================Tab 3=======================

        // Start ABO Tab 3
        $sql = "SELECT * FROM lab_abo_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_3 = mysqli_query($conn,$sql);
        $resultArray_ABO_3 = array();
        while($result_abo_3 = mysqli_fetch_array($query_abo_tab_3))
        {
            array_push($resultArray_ABO_3,$result_abo_3);
        }
        $result["lab_abo_item_3"] = $resultArray_ABO_3;
        // End ABO Tab 3

        // Start Rh Tab 3
        $sql = "SELECT * FROM lab_rh_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_3 = mysqli_query($conn,$sql);
        $resultArray_RH_3 = array();
        while($result_rh_3 = mysqli_fetch_array($query_rh_tab_3))
        {
            array_push($resultArray_RH_3,$result_rh_3);
        }
        $result["lab_rh_item_3"] = $resultArray_RH_3;
        // End Rh Tab 3

        // Start Antibody Sceening test Tab 3
        $sql = "SELECT * FROM lab_antibodysceentest_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentest_tab_3 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentest_3 = array();
        while($result_antibodysceentest_3 = mysqli_fetch_array($query_antibodysceentest_tab_3))
        {
            array_push($resultArray_antibodysceentest_3,$result_antibodysceentest_3);
        }
        $result["lab_antibodysceentest_item_3"] = $resultArray_antibodysceentest_3;
        // End Antibody Sceening test Tab 3

        // Start Antibody identification test Tab 3
        $sql = "SELECT * FROM lab_antibodyidentificationtest_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtest_tab_3 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtest_3 = array();
        while($result_antibodyidentificationtest_3 = mysqli_fetch_array($query_antibodyidentificationtest_tab_3))
        {
            array_push($resultArray_antibodyidentificationtest_3,$result_antibodyidentificationtest_3);
        }
        $result["lab_antibodyidentificationtest_item_3"] = $resultArray_antibodyidentificationtest_3;
        // End Antibody identification test Tab 3

        // Start Saliva test Tab 3
        $sql = "SELECT * FROM lab_salivatest_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_salivatest_tab_3 = mysqli_query($conn,$sql);
        $resultArray_salivatest_3 = array();
        while($result_salivatest_3 = mysqli_fetch_array($query_salivatest_tab_3))
        {
            array_push($resultArray_salivatest_3,$result_salivatest_3);
        }
        $result["lab_salivatest_item_3"] = $resultArray_salivatest_3;
        // End Saliva test Tab 3

        // Start Saliva test Tab 3
        $sql = "SELECT * FROM lab_titration_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_titration_tab_3 = mysqli_query($conn,$sql);
        $resultArray_titration_3 = array();
        while($result_titration_3 = mysqli_fetch_array($query_titration_tab_3))
        {
            array_push($resultArray_titration_3,$result_titration_3);
        }
        $result["lab_titration_item_3"] = $resultArray_titration_3;
        // End Saliva test Tab 3

        // Start Cold agglutinin Tab 3
        $sql = "SELECT * FROM lab_coldagglutinin_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_coldagglutinin_tab_3 = mysqli_query($conn,$sql);
        $resultArray_coldagglutinin_3 = array();
        while($result_coldagglutinin_3 = mysqli_fetch_array($query_coldagglutinin_tab_3))
        {
            array_push($resultArray_coldagglutinin_3,$result_coldagglutinin_3);
        }
        $result["lab_coldagglutinin_item_3"] = $resultArray_coldagglutinin_3;
        // End Cold agglutinin Tab 3

        // Start Antibody identification test Get Method Tab 3
        $sql = "SELECT * FROM lab_antibodyidentificationtestgetmethod_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodyidentificationtestgetmethod_tab_3 = mysqli_query($conn,$sql);
        $resultArray_antibodyidentificationtestgetmethod_3 = array();
        while($result_antibodyidentificationtestgetmethod_3 = mysqli_fetch_array($query_antibodyidentificationtestgetmethod_tab_3))
        {
            array_push($resultArray_antibodyidentificationtestgetmethod_3,$result_antibodyidentificationtestgetmethod_3);
        }
        $result["lab_antibodyidentificationtestgetmethod_item_3"] = $resultArray_antibodyidentificationtestgetmethod_3;
        // End Antibody identification test Get Method Tab 3

        // Start Antibody Sceening test Get Method Tab 3
        $sql = "SELECT * FROM lab_antibodysceentestgetmethod_3 WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_antibodysceentestgetmethod_tab_3 = mysqli_query($conn,$sql);
        $resultArray_antibodysceentestgetmethod_3 = array();
        while($result_antibodysceentestgetmethod_3 = mysqli_fetch_array($query_antibodysceentestgetmethod_tab_3))
        {
            array_push($resultArray_antibodysceentestgetmethod_3,$result_antibodysceentestgetmethod_3);
        }
        $result["lab_antibodysceentestgetmethod_item_3"] = $resultArray_antibodysceentestgetmethod_3;
        // End Antibody Sceening test Get Method Tab 3

        // Start ABO Tab child
        $sql = "SELECT * FROM lab_abo_child WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_child = mysqli_query($conn,$sql);
        $resultArray_ABO_child = array();
        while($result_abo_child = mysqli_fetch_array($query_abo_tab_child))
        {
            array_push($resultArray_ABO_child,$result_abo_child);
        }
        $result["lab_abo_item_child"] = $resultArray_ABO_child;
        // End ABO Tab child

        // Start ABO Tab father
        $sql = "SELECT * FROM lab_abo_father WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_abo_tab_father = mysqli_query($conn,$sql);
        $resultArray_ABO_father = array();
        while($result_abo_father = mysqli_fetch_array($query_abo_tab_father))
        {
            array_push($resultArray_ABO_father,$result_abo_father);
        }
        $result["lab_abo_item_father"] = $resultArray_ABO_father;
        // End ABO Tab father

        // Start Rh Tab child
        $sql = "SELECT * FROM lab_rh_child WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_child = mysqli_query($conn,$sql);
        $resultArray_RH_child = array();
        while($result_rh_child = mysqli_fetch_array($query_rh_tab_child))
        {
            array_push($resultArray_RH_child,$result_rh_child);
        }
        $result["lab_rh_item_child"] = $resultArray_RH_child;
        // End Rh Tab child

        // Start Rh Tab father
        $sql = "SELECT * FROM lab_rh_father WHERE labcheckrequestid = '$labcheckrequestid' AND active <> 0";
        $query_rh_tab_father = mysqli_query($conn,$sql);
        $resultArray_RH_father = array();
        while($result_rh_father = mysqli_fetch_array($query_rh_tab_father))
        {
            array_push($resultArray_RH_father,$result_rh_father);
        }
        $result["lab_rh_item_father"] = $resultArray_RH_father;
        // End Rh Tab father

		array_push($resultArray,$result);
    }
    


    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
    );

    mysqli_close($conn);
?>