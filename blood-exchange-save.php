<?php
include('connection.php');
include('data/running.php');
include('dateNow.php');

$status = true;
$state = '';
mysqli_autocommit($conn, FALSE);

    $bloodexchangeid = $_POST['bloodexchangeid'];
    $patientid = $_POST['patientid'];

    $bloodexchangedate = $_POST['bloodexchangedatetime']; 
    $bloodexchangetime = $_POST['bloodexchangetime'];
    $datetime = explode("/",$bloodexchangedate);
    $bloodexchangedatetime = $datetime[2].'-'.$datetime[1].'-'.$datetime[0].' '.$bloodexchangetime.':00';

    $terms = $_POST['terms'];
    $bloodexchangetypeid = $_POST['bloodexchangetypeid'];
    $unitofficeid = $_POST['unitofficeid'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bloodgroupid = $_POST['bloodgroupid'];
    $rhid = $_POST['rhid'];
    $diagnosis = $_POST['diagnosis'];
    $diagnosisdetail = $_POST['diagnosisdetail'];
    $doctorid = $_POST['doctorid'];
    $exchangemachineid = $_POST['exchangemachineid'];
    $setlotno = $_POST['setlotno'];
    $acdalotno = $_POST['acdalotno'];
    $nsslotno = $_POST['nsslotno'];
    $albuminelotno = $_POST['albuminelotno'];
    $other = $_POST['other'];
    $bloodwarmer = $_POST['bloodwarmer'];

    $pretest_sys = $_POST['pretest_sys'];
    $pretest_dia = $_POST['pretest_dia'];
    $pretest_pulse = $_POST['pretest_pulse'];
    $pretest_hb = $_POST['pretest_hb'];
    $pretest_hct = $_POST['pretest_hct'];
    $pretest_rbc = $_POST['pretest_rbc'];
    $pretest_wbc = $_POST['pretest_wbc'];
    $pretest_plt = $_POST['pretest_plt'];
    $pretest_calcium = $_POST['pretest_calcium'];
    $pretest_spo2 = $_POST['pretest_spo2'];
    $pretest_other = $_POST['pretest_other'];
    $pretest_remark = $_POST['pretest_remark'];
    $posttest_sys = $_POST['posttest_sys'];
    $posttest_dia = $_POST['posttest_dia'];
    $posttest_pulse = $_POST['posttest_pulse'];
    $posttest_hb = $_POST['posttest_hb'];
    $posttest_hct = $_POST['posttest_hct'];
    $posttest_rbc = $_POST['posttest_rbc'];
    $posttest_wbc = $_POST['posttest_wbc'];
    $posttest_plt = $_POST['posttest_plt'];
    $posttest_calcium = $_POST['posttest_calcium'];
    $posttest_spo2 = $_POST['posttest_spo2'];
    $posttest_other = $_POST['posttest_other'];
    $posttest_remark = $_POST['posttest_remark'];

    $ffp = $_POST['ffp'];
    $albumin = $_POST['albumin'];
    $nss = $_POST['nss'];

    $ffpqty = $_POST['ffpqty'];
    $albuminqty = $_POST['albuminqty'];
    $nssqty = $_POST['nssqty'];
    $bagnum = $_POST['bag_number'];

    $other2 = $_POST['other2'];
    $other2detail = $_POST['other2detail'];
    $tbv = $_POST['tbv'];
    $tpv = $_POST['tpv'];
    $tpvtype = $_POST['tpvtype'];
    $fluidbalance = $_POST['fluidbalance'];
    $volumeexchange = $_POST['volumeexchange'];
    $acused = $_POST['acused'];
    $actopatient = $_POST['actopatient'];
    $removebag = $_POST['removebag'];
    $replacementused = $_POST['replacementused'];
    $bolus = $_POST['bolus'];
    $buffycoatvolume = $_POST['buffycoatvolume'];
    $additionalfluid = $_POST['additionalfluid'];

    $additionalfluiddetail = $_POST['additionalfluiddetail'];
    // $time = $_POST['time'];
    // $remark = $_POST['remark'];
    // $bloodexchangeresult = $_POST['bloodexchangeresult'];
    
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $timeuse = $_POST['timeuse'];
    
    $patientcause = $_POST['patientcause'];
    $machinecause = $_POST['machinecause'];
    $humancause = $_POST['humancause'];

    $calcium = $_POST['calcium'];
    $dose = $_POST['dose'];
    $albuminpercent = $_POST['albuminpercent'];
    $result = $_POST['result'];

    $staff = $_POST['staff'];
    $usercreate = $_POST['nurse'];
    $appointment = $_POST['appointment'];
    // $appointment = date("Y-m-d",($appointment));
    $appoittext = $_POST['appoittext'];
    $crp = $_POST['crp'];
    $crpqty = $_POST['crpqty'];
    //เพิ่มดาต้าเบส
    $isuseless = $_POST['isuseless'];
    $useless = $_POST['useless'];
    $islostset = $_POST['islostset'];
    $lostset = $_POST['lostset'];
    $problemmachineid = $_POST['problemmachineid'];
    $problemmachineother = $_POST['problemmachineother'];
    $problemdonorid = $_POST['problemdonorid'];
    $problemdonorremark = $_POST['problemdonorremark'];
    $problemproductid = $_POST['problemproductid'];
    $problemproductremark = $_POST['problemproductremark'];
    $problemhumanid = $_POST['problemhumanid'];
    $problemhumanremark = $_POST['problemhumanremark'];
    //Paletเพิ่ม
    $sdpresultvolproc = $_POST['sdpresultvolproc'];
    $sdpresultacvol = $_POST['sdpresultacvol'];
    $sdpresulttime = $_POST['sdpresulttime'];
    $sdpresultpltweight = $_POST['sdpresultpltweight'];
    $sdpresultmachineyield = $_POST['sdpresultmachineyield'];
    $sdpresulttype1 = $_POST['sdpresulttype1'];
    $sdpresulttype2 = $_POST['sdpresulttype2'];
    $sdpprodvolume1 = $_POST['sdpprodvolume1'];
    $sdpprodcount1 = $_POST['sdpprodcount1'];
    $sdpprodyltyield1 = $_POST['sdpprodyltyield1'];
    $sdpprodunit1 = $_POST['sdpprodunit1'];


    if(empty($bloodexchangeid))
    {
        $state = 'insert' ;
        $running = getRunningYM('BEX');
        $bloodexchangeid = $running['runn'];
        $bloodexchangecode = $running['code'];
        $sql = "
        INSERT INTO blood_exchange
        (
            bloodexchangeid,
            bloodexchangecode,
            patientid,
            bloodexchangedate,
            bloodexchangetime,
            terms,
            bloodexchangetypeid,
            unitofficeid,
            weight,
            height,
            bloodgroupid,
            rhid,
            diagnosis,
            diagnosisdetail,
            doctorid,
            exchangemachineid,
            setlotno,
            acdalotno,
            nsslotno,
            albuminelotno,
            other,
            bloodwarmer,

            pretest_sys,
            pretest_dia,
            pretest_pulse,
            pretest_hb,
            pretest_hct,
            pretest_rbc,
            pretest_wbc,
            pretest_plt,
            pretest_calcium,
            pretest_spo2,
            pretest_other,
            pretest_remark,
            posttest_sys,
            posttest_dia,
            posttest_pulse,
            posttest_hb,
            posttest_hct,
            posttest_rbc,
            posttest_wbc,
            posttest_plt,
            posttest_calcium,
            posttest_spo2,
            posttest_other,
            posttest_remark,

            ffp,
            albumin,
            nss,
            ffpqty,
            albuminqty,
            nssqty,
            bag_number,
            other2,
            other2detail,
            tbv,
            tpv,
            tpvtype,
            fluidbalance,
            volumeexchange,
            acused,
            actopatient,
            removebag,
            replacementused,
            bolus,
            buffycoatvolume,
            additionalfluid,
            additionalfluiddetail,
            time,
            remark,
            bloodexchangeresult,
            starttime,
            endtime,
            timeuse,
            patientcause,
            machinecause,
            humancause,
            usercreate,
            calcium,
            dose,
            albuminpercent,
            result,
            appointment,
            appoittext,
            isuseless,
            useless,
            islostset,
            lostset,
            problemmachineid,
            problemmachineother,
            problemdonorid,
            problemdonorremark,
            problemproductid,
            problemproductremark,
            problemhumanid,
            problemhumanremark,
            sdpresultvolproc,
            sdpresultacvol,
            sdpresulttime,
            sdpresultpltweight,
            sdpresultmachineyield,
            sdpresulttype1,
            sdpresulttype2,
            sdpprodvolume1,
            sdpprodcount1,
            sdpprodyltyield1,
            sdpprodunit1,
            staff

        )
        VALUE
        (
            '$bloodexchangeid',
            '$bloodexchangecode',
            '$patientid',
            '$bloodexchangedatetime',
            '$bloodexchangetime',
            '$terms',
            '$bloodexchangetypeid',
            '$unitofficeid',
            '$weight',
            '$height',
            '$bloodgroupid',
            '$rhid',
            '$diagnosis',
            '$diagnosisdetail',
            '$doctorid',
            '$exchangemachineid',
            '$setlotno',
            '$acdalotno',
            '$nsslotno',
            '$albuminelotno',
            '$other',
            '$bloodwarmer',

            '$pretest_sys',
            '$pretest_dia',
            '$pretest_pulse',
            '$pretest_hb',
            '$pretest_hct',
            '$pretest_rbc',
            '$pretest_wbc',
            '$pretest_plt',
            '$pretest_calcium',
            '$pretest_spo2',
            '$pretest_other',
            '$pretest_remark',
            '$posttest_sys',
            '$posttest_dia',
            '$posttest_pulse',
            '$posttest_hb',
            '$posttest_hct',
            '$posttest_rbc',
            '$posttest_wbc',
            '$posttest_plt',
            '$posttest_calcium',
            '$posttest_spo2',
            '$posttest_other',
            '$posttest_remark',

            '$ffp',
            '$albumin',
            '$nss',
            '$ffpqty',
            '$albuminqty',
            '$nssqty',
            '$bagnum',
            '$other2',
            '$other2detail',
            '$tbv',
            '$tpv',
            '$tpvtype',
            '$fluidbalance',
            '$volumeexchange',
            '$acused',
            '$actopatient',
            '$removebag',
            '$replacementused',
            '$bolus',
            '$buffycoatvolume',
            '$additionalfluid',
            '$additionalfluiddetail',
            '$time',
            '$remark',
            '$bloodexchangeresult',
            '$starttime',
            '$endtime',
            '$timeuse',
            '$patientcause',
            '$machinecause',
            '$humancause',
            '$usercreate',
            '$calcium',
            '$dose',
            '$albuminpercent',
            '$result',
            '$appointment',
            '$appoittext',
            '$isuseless',
            '$useless',
            '$islostset',
            '$lostset',
            '$problemmachineid',
            '$problemmachineother',
            '$problemdonorid',
            '$problemdonorremark',
            '$problemproductid',
            '$problemproductremark',
            '$problemhumanid',
            '$problemhumanremark',
            '$sdpresultvolproc',
            '$sdpresultacvol',
            '$sdpresulttime',
            '$sdpresultpltweight',
            '$sdpresultmachineyield',
            '$sdpresulttype1',
            '$sdpresulttype2',
            '$sdpprodvolume1',
            '$sdpprodcount1',
            '$sdpprodyltyield1',
            '$sdpprodunit1',
            '$staff'
        )
        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        

    }else
    {
        $state = 'update' ;
        $sql = "UPDATE blood_exchange SET
           
           terms = '$terms',
           bloodexchangetypeid = '$bloodexchangetypeid',
           unitofficeid = '$unitofficeid',
           `weight` = '$weight',
           height = '$height',
           bloodgroupid = '$bloodgroupid',
           rhid = '$rhid',
           diagnosis = '$diagnosis',
           diagnosisdetail = '$diagnosisdetail',
           doctorid = '$doctorid',
           exchangemachineid = '$exchangemachineid',
           setlotno = '$setlotno',
           acdalotno = '$acdalotno',
           nsslotno = '$nsslotno',
           albuminelotno = '$albuminelotno',
           other = '$other',
           bloodwarmer = '$bloodwarmer',

           pretest_sys = '$pretest_sys',
           pretest_dia = '$pretest_dia',
           pretest_pulse = '$pretest_pulse',
           pretest_hb = '$pretest_hb',
           pretest_hct = '$pretest_hct',
           pretest_rbc = '$pretest_rbc',
           pretest_wbc = '$pretest_wbc',
           pretest_plt = '$pretest_plt',
           pretest_calcium = '$pretest_calcium',
           pretest_spo2 = '$pretest_spo2',
           pretest_other = '$pretest_other',
           pretest_remark = '$pretest_remark',
           posttest_sys = '$posttest_sys',
           posttest_dia = '$posttest_dia',
           posttest_pulse = '$posttest_pulse',
           posttest_hb = '$posttest_hb',
           posttest_hct = '$posttest_hct',
           posttest_rbc = '$posttest_rbc',
           posttest_wbc = '$posttest_wbc',
           posttest_plt = '$posttest_plt',
           posttest_calcium = '$posttest_calcium',
           posttest_spo2 = '$posttest_spo2',
           posttest_other = '$posttest_other',
           posttest_remark = '$posttest_remark',

           ffp = '$ffp',
           albumin = '$albumin',
           nss = '$nss',
           ffpqty = '$ffpqty',
           albuminqty = '$albuminqty',
           nssqty = '$nssqty',
           bag_number = '$bagnum',
           other2 = '$other2',
           other2detail = '$other2detail',
           tbv = '$tbv',
           tpv = '$tpv',
           tpvtype = '$tpvtype',
           fluidbalance = '$fluidbalance',
           volumeexchange = '$volumeexchange',
           acused = '$acused',
           actopatient = '$actopatient',
           removebag = '$removebag',
           replacementused ='$replacementused',
           bolus = '$bolus',
           buffycoatvolume = '$buffycoatvolume',
           additionalfluid = '$additionalfluid',
           additionalfluiddetail = '$additionalfluiddetail',
           `time` = '$time',
           remark = '$remark',
           bloodexchangeresult = '$bloodexchangeresult',
           starttime = '$starttime',
           endtime = '$endtime',
           timeuse = '$timeuse',
           patientcause = '$patientcause',
           machinecause = '$machinecause',
           humancause = '$humancause',
           calcium = '$calcium',
           dose = '$dose',
           albuminpercent = '$albuminpercent',
           result = '$result',
           appointment = '$appointment',
           appoittext = '$appoittext',
           isuseless = '$isuseless',
           useless = '$useless',
           islostset = '$islostset',
           lostset = '$lostset',
           problemmachineid = '$problemmachineid',
           problemmachineother = '$problemmachineother',
           problemdonorid = '$problemdonorid',
           problemdonorremark = '$problemdonorremark',
           problemproductid = '$problemproductid',
           problemproductremark = '$problemproductremark',
           problemhumanid = '$problemhumanid',
           problemhumanremark = '$problemhumanremark',
           sdpresultvolproc = '$sdpresultvolproc',
           sdpresultacvol = '$sdpresultacvol',
           sdpresulttime = '$sdpresulttime',
           sdpresultpltweight = '$sdpresultpltweight',
           sdpresultmachineyield = '$sdpresultmachineyield',
           sdpresulttype1 = '$sdpresulttype1',
           sdpresulttype2 = '$sdpresulttype2',
           sdpprodvolume1 = '$sdpprodvolume1',
           sdpprodcount1 = '$sdpprodcount1',
           sdpprodyltyield1 = '$sdpprodyltyield1',
           sdpprodunit1 = '$sdpprodunit1',
           staff = '$staff'
            WHERE bloodexchangeid = '$bloodexchangeid'
        
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    }

    

    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }
    if($test == true){
        echo json_encode(
            array(
                'status' => $status,
                'state' => $state
            )
        );
    }    else{
        echo json_encode(
            array(
                'status' => $status,
                'state' => $state
                
                
            )
        );
    }
    

?>