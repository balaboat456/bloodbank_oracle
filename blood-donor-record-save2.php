<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    include('checkPermission.php');
    date_default_timezone_set('Asia/Bangkok');
    // header('Content-Type: text/html; charset=utf-8');

    $donateid = (!empty($_POST['donateid']))?$_POST['donateid']:0;

    $logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
    $dateNowValue = date("Y-m-d H:i:s") ;
    $username = $_SESSION['username'];

    mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$donateid','$logtext','$dateNowValue','$username','blood-donor-record','บันทึกผู้มาบริจาคโลหิต')");


    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $username = $_SESSION['username'];
    $dateNowValue = dateNowYMDHM() ;

    

    if((!checkPermission("BK_DONATE","AD") && empty($donateid)) ||  (!checkPermission("BK_DONATE","ED") && !empty($donateid))) 
    {
        echo '';
        return false;
    }

    // start ผู้บริจาค
    $runn;
    

    
    $donorid = (!empty($_POST['donorid']))?$_POST['donorid']:"";
    $donorcode = (!empty($_POST['donorcode']))?$_POST['donorcode']:"";
    $donoridcard = str_replace("-","",$_POST['donoridcard']);
    $donorpassport = $_POST['donorpassport'];
    
    $isidcardpassport = (!empty($_POST['isidcardpassport']))?$_POST['isidcardpassport']:1;
    

    $donorbirthday = (!empty($_POST['donorbirthday']))?dmyToymd($_POST['donorbirthday']):'0000-00-00';
    $donorage = (!empty($_POST['donorage']))?$_POST['donorage']:0;
    $donoragetext = (!empty($_POST['donoragetext']))?$_POST['donoragetext']:'';
    
    $donoroccupation = (!empty($_POST['donoroccupation']))?$_POST['donoroccupation']:0;
    $donoroccupationother = ($_POST['donoroccupation'] == '99')?$_POST['donoroccupationother']:'';
    
    $donortelhome = $_POST['donortelhome'];
    $donormobile = $_POST['donormobile'];
    $genderid = (!empty($_POST['genderid']))?$_POST['genderid']:0;
    $prefixid = (!empty($_POST['prefixid']))?$_POST['prefixid']:0;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $_POST['fullname'];
    $donorpassport = $_POST['donorpassport'];
    $donoremail = $_POST['donoremail'];

    $address = $_POST['address'];
    $address_moo = $_POST['address_moo'];
    $address_alley = $_POST['address_alley'];
    // $address_alley = $address_alleysub.substr(3);
    $address_street = $_POST['address_street'];
    $address2 = $_POST['address2'];
    $countryid = (!empty($_POST['countryid']))?$_POST['countryid']:0;
    $provinceid = (!empty($_POST['provinceid']))?$_POST['provinceid']:0;
    $districtid = (!empty($_POST['districtid']))?$_POST['districtid']:0;
    $subdistrictid = (!empty($_POST['subdistrictid']))?$_POST['subdistrictid']:0;
    $zipcode = $_POST['zipcode'];

    $address_current = $_POST['address_current'];
    $address_moo_current = $_POST['address_moo_current'];
    $address_alley_current = $_POST['address_alley_current'];
    $address_street_current = $_POST['address_street_current'];
    $address2_current = $_POST['address2_current'];
    $countrycurrentid = (!empty($_POST['countrycurrentid']))?$_POST['countrycurrentid']:0;
    $provincecurrentid = (!empty($_POST['provincecurrentid']))?$_POST['provincecurrentid']:0;
    $districtcurrentid = (!empty($_POST['districtcurrentid']))?$_POST['districtcurrentid']:0;
    $subdistrictcurrentid = (!empty($_POST['subdistrictcurrentid']))?$_POST['subdistrictcurrentid']:0;
    $zipcode_current = $_POST['zipcode_current'];

    $issendletter = (!empty($_POST['issendletter']))?$_POST['issendletter']:1;
    $souvenirid = (!empty($_POST['souvenirid']))?$_POST['souvenirid']:0;

    $blood_group = $_POST['blood_group'];
    $rh = $_POST['rh'];
    $donation_type_id_last = (!empty($_POST['donation_type_id']))?$_POST['donation_type_id']:0;

    $donatenostatusid = (!empty($_POST['donatenostatusid']))?$_POST['donatenostatusid']:0;
    $donatenostatusdate = (!empty($_POST['donatenostatusdate']))?dmyToymd($_POST['donatenostatusdate']):'0000-00-00';
    $donation_status = (!empty($_POST['donation_status']))?$_POST['donation_status']:0;
    $isconfirmdonorblooddonation = (!empty($_POST['isconfirmdonorblooddonation']))?$_POST['isconfirmdonorblooddonation']:'';
    $isconfirmdonorsdp = (!empty($_POST['isconfirmdonorsdp']))?$_POST['isconfirmdonorsdp']:'';

    $lastdate = (!empty($_POST['donation_date']))?dmyToymd($_POST['donation_date']):'0000-00-00';
    $lasttime = (!empty($_POST['donation_time']))?$_POST['donation_time']:'';

    

    if(!empty($donateid))
    {
        $lastdate = (!empty($_POST['last_donation_date']))?dmyToymd($_POST['last_donation_date']):'0000-00-00';
        $lasttime = (!empty($_POST['last_donation_time']))?$_POST['last_donation_time']:'';
    }

    $donorfile = $_POST['donorfile'];
    $runningImage = getRunningYM('IM');
    $pofilecode = $runningImage['code'];
    $donorimagepath = "";

    if(!empty($donorfile))
    {
        
        $donorimagepath = do_upload($donorfile,$pofilecode,"uploads/donor_pofile/");
    }else
    {
        $donorimagepath = '';
    }

    if($isidcardpassport == 1){
        $sql = "SELECT * FROM donor WHERE donoridcard = '$donoridcard'";
    }else{
        $sql = "SELECT * FROM donor WHERE donorpassport = '$donorpassport'";
    }
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {


        $condition = '';
        $row = mysqli_fetch_assoc($result);

        $donorid_data = $donorid ;
        $fname_data = $row['fname'] ;
        $lname_data = $row['lname'] ;
        $donorid = $row['donorid'] ;
        $updatetime_data = dateNowYMDHM() ;

        if($fname != $fname_data || $lname != $lname_data)
        {
            $condition = $condition . 'ischangename = 1,' ;

            $sql = "
                    INSERT INTO donor_history
                    (
                        donorid,
                        fname,
                        lname,
                        fnamenew,
                        lnamenew,
                        updatetime,
                        fullname
                    )
                    values
                    (
                        '$donorid_data',
                        '$fname_data',
                        '$lname_data',
                        '$fname',
                        '$lname',
                        '$updatetime_data',
                        '$fullname'
                    )
                    ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            error_log("=========1============".$status);
            error_log($sql);
        }

        $donorpassport_data = $row['donorpassport'] ;
        if($donorpassport_data != $donorpassport && !empty($donorpassport_data) && !empty($donorpassport))
        {
            $condition = $condition . 'ischangepassport = 1,' ;

            

            $sql = "
                        INSERT INTO donor_passport_history
                        (
                            donorid,
                            donorpassport,
                            donorpassportnew,
                            updatetime,
                            fullname
                        )
                        values
                        (
                            '$donorid_data',
                            '$donorpassport_data',
                            '$donorpassport',
                            '$updatetime_data',
                            '$fullname'
                        )
                        ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            error_log("==========2===========".$status);

            error_log($sql);

        }

        $blood_group_data = $row['blood_group'] ;
        if($blood_group_data != $blood_group && !empty($blood_group_data) && !empty($blood_group))
        {
            $sql = "INSERT INTO blood_group_history
                    (   donorid,
                        donorblood_group,
                        donorblood_group_new,
                        updatetime,
                        fullname
                    )
                    VALUES
                    (
                        '$donorid_data',
                        '$blood_group_data',
                        '$blood_group',
                        '$updatetime_data',
                        '$fullname'
                    )
                    ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            error_log("==========3===========".$status);

            error_log($sql);
        }

        
        $condition_donor = "";
        if(!empty($donorimagepath))
        $condition_donor = $condition_donor." donorimagepath = '$donorimagepath' ,";

        if($donation_status == 2){
        $sql = "
        UPDATE donor set
        $condition_donor
        donorcode = '$donorcode',
        donoridcard = '$donoridcard',
        isidcardpassport = '$isidcardpassport',
        donorpassport = '$donorpassport',
        donorbirthday = '$donorbirthday',
        donorage = '$donorage',
        donoragetext = '$donoragetext',
        donoroccupation = '$donoroccupation',
        donoroccupationother = '$donoroccupationother',
        donortelhome = '$donortelhome',
        donormobile = '$donormobile',
        genderid = '$genderid',
        prefixid = '$prefixid',
        fname = '$fname',
        lname = '$lname',
        donoremail='$donoremail',

        address = '$address',
        address_moo = '$address_moo',
        address_alley = '$address_alley',
        address_street = '$address_street',
        address2 = '$address2',
        countryid = '$countryid',
        provinceid = '$provinceid',
        districtid = '$districtid',
        subdistrictid = '$subdistrictid',
        zipcode = '$zipcode',

        address_current = '$address_current',
        address_moo_current = '$address_moo_current',
        address_alley_current = '$address_alley_current',
        address_street_current = '$address_street_current',
        address2_current = '$address2_current',
        countrycurrentid = '$countrycurrentid',
        provincecurrentid = '$provincecurrentid',
        districtcurrentid = '$districtcurrentid',
        subdistrictcurrentid = '$subdistrictcurrentid',
        zipcode_current = '$zipcode_current',

        issendletter = '$issendletter',
        souvenirid = '$souvenirid',
        blood_group = '$blood_group',
        
        rh = '$rh',
        lastcheckdate = '$lastdate',
        lastchecktime = '$lasttime',
        $condition
        donation_type_id_last = '$donation_type_id_last'
        
        WHERE donorid = '$donorid'
        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("=======4==============".$status);

        error_log($sql);
        }else{
            $sql = "
            UPDATE donor set
            $condition_donor
            donorcode = '$donorcode',
            donoridcard = '$donoridcard',
            isidcardpassport = '$isidcardpassport',
            donorpassport = '$donorpassport',
            donorbirthday = '$donorbirthday',
            donorage = '$donorage',
            donoragetext = '$donoragetext',
            donoroccupation = '$donoroccupation',
            donoroccupationother = '$donoroccupationother',
            donortelhome = '$donortelhome',
            donormobile = '$donormobile',
            genderid = '$genderid',
            prefixid = '$prefixid',
            fname = '$fname',
            lname = '$lname',
            donoremail='$donoremail',
            address = '$address',
            address_moo = '$address_moo',
            address_alley = '$address_alley',
            address_street = '$address_street',
            address2 = '$address2',
            countryid = '$countryid',
            provinceid = '$provinceid',
            districtid = '$districtid',
            subdistrictid = '$subdistrictid',
            zipcode = '$zipcode',
    
            address_current = '$address_current',
            address_moo_current = '$address_moo_current',
            address_alley_current = '$address_alley_current',
            address_street_current = '$address_street_current',
            address2_current = '$address2_current',
            countrycurrentid = '$countrycurrentid',
            provincecurrentid = '$provincecurrentid',
            districtcurrentid = '$districtcurrentid',
            subdistrictcurrentid = '$subdistrictcurrentid',
            zipcode_current = '$zipcode_current',
    
            issendletter = '$issendletter',
            souvenirid = '$souvenirid',
            blood_group = '$blood_group',
            
            rh = '$rh',
            lastdate = '$lastdate',
            lastcheckdate = '$lastdate',
            lastchecktime = '$lasttime',
            lasttime = '$lasttime',
            $condition
            donation_type_id_last = '$donation_type_id_last'
            
            WHERE donorid = '$donorid'
            ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            error_log("==========5===========".$status);
            
            error_log($sql);
        }
        
       
    } else {
        $running = getRunningYM('DO');
        $donorid = $running['runn'];
        if(empty($donorcode))
        $donorcode = '';

        $sql = "
        INSERT INTO donor
        (
        donorid,
        isidcardpassport,
        donorcode,
        donoridcard,
        donorpassport,
        donorbirthday,
        donorage,
        donoragetext,
        donoroccupation,
        donoroccupationother,
        donortelhome,
        donormobile,
        genderid,
        prefixid,
        fname,
        lname,
        donoremail,

        address,
        address_moo,
        address_alley,
        address_street,
        address2,
        countryid,
        provinceid,
        districtid,
        subdistrictid,
        zipcode,

        address_current,
        address_moo_current,
        address_alley_current,
        address_street_current,
        address2_current,
        countrycurrentid,
        provincecurrentid,
        districtcurrentid,
        subdistrictcurrentid,
        zipcode_current,

        issendletter,
        souvenirid,
        blood_group,
        rh,
        lastdate,
        lasttime,
        donation_type_id_last,
        donorimagepath
        )
        values
        (
        '$donorid',
        '$isidcardpassport',
        '$donorcode',
        '$donoridcard',
        '$donorpassport',
        '$donorbirthday',
        '$donorage',
        '$donoragetext',
        '$donoroccupation',
        '$donoroccupationother',
        '$donortelhome',
        '$donormobile',
        '$genderid',
        '$prefixid',
        '$fname',
        '$lname',
        '$donoremail',

        '$address',
        '$address_moo',
        '$address_alley',
        '$address_street',
        '$address2',
        '$countryid',
        '$provinceid',
        '$districtid',
        '$subdistrictid',
        '$zipcode',

        '$address_current',
        '$address_moo_current',
        '$address_alley_current',
        '$address_street_current',
        '$address2_current',
        '$countrycurrentid',
        '$provincecurrentid',
        '$districtcurrentid',
        '$subdistrictcurrentid',
        '$zipcode_current',

        '$issendletter',
        '$souvenirid',
        '$blood_group',
        '$rh',
        '$lastdate',
        '$lasttime',
        '$donation_type_id_last',
        '$donorimagepath'
        )
        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("============6=========".$status);

        error_log($sql);
     
    }
    // end ผู้บริจาค

    // start การบริจาค
    $donatecode = (!empty($_POST['donatecode']))?$_POST['donatecode']:'';
    $donation_type_id = (!empty($_POST['donation_type_id']))?$_POST['donation_type_id']:0;
    $isfirstblooddonation = (!empty($_POST['isfirstblooddonation']))?$_POST['isfirstblooddonation']:0;
    
    $placeid = (!empty($_POST['placeid']))?$_POST['placeid']:0;
    $placetime = (!empty($_POST['placetime']))?$_POST['placetime']:0;

    $souvenirnum = (!empty($_POST['souvenirnum']))?$_POST['souvenirnum']:0;
    $souvenirdate = (!empty($_POST['souvenirdate']))?dmyToymd($_POST['souvenirdate']):'';

    $staffcardid = (!empty($_POST['staffcardid']))?$_POST['staffcardid']:0;
    $getcarddate = (!empty($_POST['getcarddate']))?dmyToymd($_POST['getcarddate']):'';

$receivecard = (!empty($_POST['receivecard'])) ? $_POST['receivecard'] : 0;
$receivestaffcardid = (!empty($_POST['receivestaffcardid'])) ? $_POST['receivestaffcardid'] : 0;
$receivecarddate = (!empty($_POST['receivecarddate'])) ? dmyToymd($_POST['receivecarddate']) : '';
    
    $islab = (!empty($_POST['islab']))?$_POST['islab']:0;
    
    $staffsouvenirid = (!empty($_POST['staffsouvenirid']))?$_POST['staffsouvenirid']:0;
    $isunitoffice = (!empty($_POST['isunitoffice']))?$_POST['isunitoffice']:0;
    $unitnameid = (!empty($_POST['unitnameid']))?$_POST['unitnameid']:0;
    $departmentid = (!empty($_POST['departmentid']))?$_POST['departmentid']:0;
    $activityid = (!empty($_POST['activityid']))?$_POST['activityid']:0;

    $donation_get_type_id = (!empty($_POST['donation_get_type_id']))?$_POST['donation_get_type_id']:0;

    $hn = $_POST['hn'];
    $an = $_POST['an'];
    $patientname = $_POST['patientname'];

    $diagnosisid = $_POST['diagnosisid'];
    $diagnosis = $_POST['diagnosis'];
    $diagnosisdetail = $_POST['diagnosisdetail'];


    
  
    $blood_use_date = (!empty($_POST['blood_use_date']))?dmyToymd($_POST['blood_use_date']):'0000-00-00';
    $unitofficeid = $_POST['unitofficeid'];
    $bag_number = $_POST['bag_number'];
    $bag_type_id = 0;
    // if($donation_type_id=='2')
    // {
    //     $bag_type_id = 8;
    // }else 
    if($donation_type_id=='3')
    {
        $bag_type_id = 9;
    }else
    {
        $bag_type_id = (!empty($_POST['bag_type_id']))?$_POST['bag_type_id']:0;
    }
    

    $expired_date = (!empty($_POST['expired_date']))?dmyToymd($_POST['expired_date']):'0000-00-00';
    $donation_date = (!empty($_POST['donation_date']))?dmyToymd($_POST['donation_date']):'0000-00-00';
    $last_donation_date = (!empty($_POST['last_donation_date']))?dmyToymd($_POST['last_donation_date']):'0000-00-00';

    $donation_time = (!empty($_POST['donation_time']))?$_POST['donation_time']:'';
    $last_donation_time = (!empty($_POST['last_donation_time']))?$_POST['last_donation_time']:'';

    $donation_qty = (!empty($_POST['donation_qty']))?$_POST['donation_qty']:"0";
    $blood_group = (!empty($_POST['blood_group']))?$_POST['blood_group']:'';
    $rh = (!empty($_POST['rh']))?$_POST['rh']:'';
    $hemoglobin = (!empty($_POST['hemoglobin']))?$_POST['hemoglobin']:"";
    $remarkhemoglobin = (!empty($_POST['remarkhemoglobin']))?$_POST['remarkhemoglobin']:'';
    
    $prebp1 = (!empty($_POST['prebp1']))?$_POST['prebp1']:"";
    $prebp2 = (!empty($_POST['prebp2']))?$_POST['prebp2']:"";
    $remarkprebp = (!empty($_POST['remarkprebp']))?$_POST['remarkprebp']:'';

    $postbp1 = (!empty($_POST['postbp1']))?$_POST['postbp1']:"";
    $postbp2 = (!empty($_POST['postbp2']))?$_POST['postbp2']:"";
    $remarkpostbp = (!empty($_POST['remarkpostbp']))?$_POST['remarkpostbp']:'';

    $pulse = (!empty($_POST['pulse']))?$_POST['pulse']:"";
    $remarkpulse = (!empty($_POST['remarkpulse']))?$_POST['remarkpulse']:'';


    $drug = (!empty($_POST['drug']))?$_POST['drug']:'';
    $temperature = (!empty($_POST['temperature']))?$_POST['temperature']:'';
    
    $blood_driller_id = (!empty($_POST['blood_driller_id']))?$_POST['blood_driller_id']:0;
    $weight = (!empty($_POST['weight']))?$_POST['weight']:"";
    $height = (!empty($_POST['height']))?$_POST['height']:"";

    $pulse_status = (!empty($_POST['pulse_status']))?$_POST['pulse_status']:0;
    $physical_status = (!empty($_POST['physical_status']))?$_POST['physical_status']:0;
    $pain_heart_status = (!empty($_POST['pain_heart_status']))?$_POST['pain_heart_status']:0;
    
    $donatenocauseid = (!empty($_POST['donatenocauseid']))?$_POST['donatenocauseid']:0;
    $donatenocauseremark = (!empty($_POST['donatenocauseremark']))?$_POST['donatenocauseremark']:'';
    $donatenocausedetail = (!empty($_POST['donatenocausedetail']))?$_POST['donatenocausedetail']:'';
    
    $physical_detail = (!empty($_POST['physical_detail']))?$_POST['physical_detail']:'';
    $donatestatusid = (!empty($_POST['donatestatusid']))?$_POST['donatestatusid']:0;
    $bag_staff_id = (!empty($_POST['bag_staff_id']))?$_POST['bag_staff_id']:0;
    $inspectorid = (!empty($_POST['inspectorid']))?$_POST['inspectorid']:0;
    $staff_screening = (!empty($_POST['staff_screening'])) ? $_POST['staff_screening'] : 0;
$experienced_staff = (!empty($_POST['experienced_staff'])) ? $_POST['experienced_staff'] : 0;

    $getcard = (!empty($_POST['getcard']))?$_POST['getcard']:0;

    $donationproblemsid = (!empty($_POST['donationproblemsid']))?$_POST['donationproblemsid']:0;
    $donatereactionid = (!empty($_POST['donatereactionid']))?$_POST['donatereactionid']:0;
    $isdonateremark = (!empty($_POST['isdonateremark']))?$_POST['isdonateremark']:0;
    $donateremark = (!empty($_POST['donateremark']))?$_POST['donateremark']:'';
    $remarkaccident = (!empty($_POST['remarkaccident']))?$_POST['remarkaccident']:'';
    $isconfirmblooddonation = (!empty($_POST['isconfirmblooddonation']))?$_POST['isconfirmblooddonation']:'';

    // ---- SDP ----
    $sdpfirsttime = (!empty($_POST['sdpfirsttime']))?$_POST['sdpfirsttime']:0;
    $machineid = (!empty($_POST['machineid']))?$_POST['machineid']:0;
    $sdpno = (!empty($_POST['sdpno']))?$_POST['sdpno']:'';
    $sdpcodeno = (!empty($_POST['sdpcodeno']))?$_POST['sdpcodeno']:'';
    $sdplotno = (!empty($_POST['sdplotno']))?$_POST['sdplotno']:'';
    $sdppresys = (!empty($_POST['sdppresys']))?$_POST['sdppresys']:'';
    $sdppredia = (!empty($_POST['sdppredia']))?$_POST['sdppredia']:'';
    $sdppreremark = (!empty($_POST['sdppreremark']))?$_POST['sdppreremark']:'';
    $sdpprehb = (!empty($_POST['sdpprehb']))?$_POST['sdpprehb']:'';
    $sdpprehct = (!empty($_POST['sdpprehct']))?$_POST['sdpprehct']:'';
    $sdpprerbc = (!empty($_POST['sdpprerbc']))?$_POST['sdpprerbc']:'';
    $sdpprewbc = (!empty($_POST['sdpprewbc']))?$_POST['sdpprewbc']:'';
    $sdppreplt = (!empty($_POST['sdppreplt']))?$_POST['sdppreplt']:'';
    $sdppremcv = (!empty($_POST['sdppremcv']))?$_POST['sdppremcv']:'';
    $sdppreeosinophil = (!empty($_POST['sdppreeosinophil']))?$_POST['sdppreeosinophil']:'';

    $sdpprehb_before = (!empty($_POST['sdpprehb_before']))?$_POST['sdpprehb_before']:'';
    $sdpprehct_before = (!empty($_POST['sdpprehct_before']))?$_POST['sdpprehct_before']:'';
    $sdpprerbc_before = (!empty($_POST['sdpprerbc_before']))?$_POST['sdpprerbc_before']:'';
    $sdpprewbc_before = (!empty($_POST['sdpprewbc_before']))?$_POST['sdpprewbc_before']:'';
    $sdppreplt_before = (!empty($_POST['sdppreplt_before']))?$_POST['sdppreplt_before']:'';
    $sdppremcv_before = (!empty($_POST['sdppremcv_before']))?$_POST['sdppremcv_before']:'';
    $sdppreeosinophil_before = (!empty($_POST['sdppreeosinophil_before']))?$_POST['sdppreeosinophil_before']:'';

    $sdpprehb_before_0 = (!empty($_POST['sdpprehb_before_0']))?$_POST['sdpprehb_before_0']:'';
    $sdpprehct_before_0 = (!empty($_POST['sdpprehct_before_0']))?$_POST['sdpprehct_before_0']:'';
    $sdpprerbc_before_0 = (!empty($_POST['sdpprerbc_before_0']))?$_POST['sdpprerbc_before_0']:'';
    $sdpprewbc_before_0 = (!empty($_POST['sdpprewbc_before_0']))?$_POST['sdpprewbc_before_0']:'';
    $sdppreplt_before_0 = (!empty($_POST['sdppreplt_before_0']))?$_POST['sdppreplt_before_0']:'';
    $sdppremcv_before_0 = (!empty($_POST['sdppremcv_before_0']))?$_POST['sdppremcv_before_0']:'';
    $sdppreeosinophil_before_0 = (!empty($_POST['sdppreeosinophil_before_0']))?$_POST['sdppreeosinophil_before_0']:'';


    $sdppostsys = (!empty($_POST['sdppostsys']))?$_POST['sdppostsys']:'';
    $sdppostdia = (!empty($_POST['sdppostdia']))?$_POST['sdppostdia']:'';
    $sdppostremark = (!empty($_POST['sdppostremark']))?$_POST['sdppostremark']:'';
    $sdpposthb = (!empty($_POST['sdpposthb']))?$_POST['sdpposthb']:'';
    $sdpposthct = (!empty($_POST['sdpposthct']))?$_POST['sdpposthct']:'';
    $sdppostrbc = (!empty($_POST['sdppostrbc']))?$_POST['sdppostrbc']:'';
    $sdppostwbc = (!empty($_POST['sdppostwbc']))?$_POST['sdppostwbc']:'';
    $sdppostplt = (!empty($_POST['sdppostplt']))?$_POST['sdppostplt']:'';
    $sdppostmcv = (!empty($_POST['sdppostmcv']))?$_POST['sdppostmcv']:'';
    $sdpposteosinophil = (!empty($_POST['sdpposteosinophil']))?$_POST['sdpposteosinophil']:'';

    $sdpprodhct = (!empty($_POST['sdpprodhct']))?$_POST['sdpprodhct']:'';
    $sdpprodpltcount = (!empty($_POST['sdpprodpltcount']))?$_POST['sdpprodpltcount']:'';
    $sdpprodpltyield = (!empty($_POST['sdpprodpltyield']))?$_POST['sdpprodpltyield']:'';
    $sdpprodvol = (!empty($_POST['sdpprodvol']))?$_POST['sdpprodvol']:'';
    $sdpprodcycle = (!empty($_POST['sdpprodcycle']))?$_POST['sdpprodcycle']:'';
    $sdpprodtime = (!empty($_POST['sdpprodtime']))?$_POST['sdpprodtime']:'';
    $sdpresultvolproc = (!empty($_POST['sdpresultvolproc']))?$_POST['sdpresultvolproc']:'';
    $sdpresultacvol = (!empty($_POST['sdpresultacvol']))?$_POST['sdpresultacvol']:'';
    $sdpresulttime = (!empty($_POST['sdpresulttime']))?$_POST['sdpresulttime']:'';
    $sdpresultpltweight = (!empty($_POST['sdpresultpltweight']))?$_POST['sdpresultpltweight']:'';
    $sdpresultmachineyield = (!empty($_POST['sdpresultmachineyield']))?$_POST['sdpresultmachineyield']:'';
    $sdpresultpltpost = (!empty($_POST['sdpresultpltpost']))?$_POST['sdpresultpltpost']:'';
    
    $sdpresulttype = (!empty($_POST['sdpresulttype']))?$_POST['sdpresulttype']:0;
    $sdpresultvolume = (!empty($_POST['sdpresultvolume']))?$_POST['sdpresultvolume']:'';

    $sdpprodvolume1 = (!empty($_POST['sdpprodvolume1']))?$_POST['sdpprodvolume1']:'';
    $sdpprodcount1 = (!empty($_POST['sdpprodcount1']))?$_POST['sdpprodcount1']:'';
    $sdpprodyltyield1 = (!empty($_POST['sdpprodyltyield1']))?$_POST['sdpprodyltyield1']:'';
    $sdpprodunit1 = (!empty($_POST['sdpprodunit1']))?$_POST['sdpprodunit1']:'';

    $sdpprodvolume2 = (!empty($_POST['sdpprodvolume2']))?$_POST['sdpprodvolume2']:'';
    $sdpprodcount2 = (!empty($_POST['sdpprodcount2']))?$_POST['sdpprodcount2']:'';
    $sdpprodyltyield2 = (!empty($_POST['sdpprodyltyield2']))?$_POST['sdpprodyltyield2']:'';
    $sdpprodunit2 = (!empty($_POST['sdpprodunit2']))?$_POST['sdpprodunit2']:'';

    $sdpresultvolume3 = (!empty($_POST['sdpresultvolume3']))?$_POST['sdpresultvolume3']:'';
    $sdpprodvolume3 = (!empty($_POST['sdpprodvolume3']))?$_POST['sdpprodvolume3']:'';
    $sdpprodcount3 = (!empty($_POST['sdpprodcount3']))?$_POST['sdpprodcount3']:'';
    $sdpprodyltyield3 = (!empty($_POST['sdpprodyltyield3']))?$_POST['sdpprodyltyield3']:'';
    $sdpprodunit3 = (!empty($_POST['sdpprodunit3']))?$_POST['sdpprodunit3']:'';

    $problemmachineid = json_encode((!empty($_POST['problemmachineid']))?$_POST['problemmachineid']:'');
    $problemmachineother = (!empty($_POST['problemmachineother']))?$_POST['problemmachineother']:'';
    $problemdonorid = json_encode((!empty($_POST['problemdonorid']))?$_POST['problemdonorid']:'');
    $problemdonorremark = (!empty($_POST['problemdonorremark']))?$_POST['problemdonorremark']:'';
    $problemproductid = json_encode((!empty($_POST['problemproductid']))?$_POST['problemproductid']:'');
    $problemproductremark = (!empty($_POST['problemproductremark']))?$_POST['problemproductremark']:'';
    $problemhumanid = json_encode((!empty($_POST['problemhumanid']))?$_POST['problemhumanid']:'');
    $problemhumanremark = (!empty($_POST['problemhumanremark']))?$_POST['problemhumanremark']:'';

    $ischecklab = (!empty($_POST['ischecklab']))?$_POST['ischecklab']:0;
    $issdpsave = (!empty($_POST['issdpsave']))?$_POST['issdpsave']:0;

    $useless = (!empty($_POST['useless']))?$_POST['useless']:'';
    $lostset = (!empty($_POST['lostset']))?$_POST['lostset']:'';
    $isuseless = (!empty($_POST['isuseless']))?$_POST['isuseless']:0;
    $islostset = (!empty($_POST['islostset']))?$_POST['islostset']:0;

    $sdpclaim = (!empty($_POST['sdpclaim']))?$_POST['sdpclaim']:'';
    $sdpreturn = (!empty($_POST['sdpreturn']))?$_POST['sdpreturn']:'';
    $sdpisclaim = (!empty($_POST['sdpisclaim']))?$_POST['sdpisclaim']:0;
    $sdpisreturn = (!empty($_POST['sdpisreturn']))?$_POST['sdpisreturn']:0;

    ///เพิ่ม field DB query donate insert update
    $sdppretsys = (!empty($_POST['sdppretsys']))?$_POST['sdppretsys']:'';
    $sdppretdia = (!empty($_POST['sdppretdia']))?$_POST['sdppretdia']:'';
    $sdppretremark = (!empty($_POST['sdppretremark']))?$_POST['sdppretremark']:'';

    $sdpdonatenostatusid = (!empty($_POST['sdpdonatenostatusid']))?$_POST['sdpdonatenostatusid']:0; 
    $sdpdonatenocauseremark = (!empty($_POST['sdpdonatenocauseremark']))?$_POST['sdpdonatenocauseremark']:'';
    $sdpisdonateremark = (!empty($_POST['sdpisdonateremark']))?$_POST['sdpisdonateremark']:0;
    $sdpdonateremark = (!empty($_POST['sdpdonateremark']))?$_POST['sdpdonateremark']:"";

    $autologousisappointment = (!empty($_POST['autologousisappointment']))?$_POST['autologousisappointment']:0;
    $autologousappointmentdate = (!empty($_POST['autologousappointmentdate']))?dmyToymd($_POST['autologousappointmentdate']):'0000-00-00';
    $autologousappointmentremark = (!empty($_POST['autologousappointmentremark']))?$_POST['autologousappointmentremark']:"";

    $sdpdonateisappointment = (!empty($_POST['sdpdonateisappointment']))?$_POST['sdpdonateisappointment']:0;
    $sdpdonateappointmentdate = (!empty($_POST['sdpdonateappointmentdate']))?dmyToymd($_POST['sdpdonateappointmentdate']):'0000-00-00';
    $sdpdonateappointmentremark = (!empty($_POST['sdpdonateappointmentremark']))?$_POST['sdpdonateappointmentremark']:"";

    $istube_after = (!empty($_POST['istube_after']))?$_POST['istube_after']:'';
    $blood_invest_tube_edta_after = (!empty($_POST['blood_invest_tube_edta_after']))?$_POST['blood_invest_tube_edta_after']:'';
    $blood_invest_tube_clotted_after = (!empty($_POST['blood_invest_tube_clotted_after']))?$_POST['blood_invest_tube_clotted_after']:'';
    $blood_invest_tube_acd_after = (!empty($_POST['blood_invest_tube_acd_after']))?$_POST['blood_invest_tube_acd_after']:'';

    $notdonoridcard = (!empty($_POST['notdonoridcard']))?$_POST['notdonoridcard']:"";
    $nottimedonate = (!empty($_POST['nottimedonate']))?$_POST['nottimedonate']:"";

    $assignsdp = (!empty($_POST['assignsdp'])) ? $_POST['assignsdp'] : "";

$assignsdpdate = (!empty($_POST['assignsdpdate'])) ? dmyToymd($_POST['assignsdpdate']) : '0000-00-00';

    

    $prcexp = '0000-00-00';
    $lprcexp = '0000-00-00';
    $ldprcexp = '0000-00-00';
    $ffpexp = '0000-00-00';
    $pcexp = '0000-00-00';
    $lppcexp = '0000-00-00';
    $sdpexp = '0000-00-00';
    $sdrexp = '0000-00-00';
    $wbexp = '0000-00-00';
    $crpexp = '0000-00-00';
    $cryoexp = '0000-00-00';
    if($donation_date != '0000-00-00')
    {
        
        $newdate = date_create("$donation_date");
        $prcexp =  $newdate->modify('+35 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $lprcexp =  $newdate->modify('+42 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $ldprcexp =  $newdate->modify('+42 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $ffpexp =  $newdate->modify('+1 day +1 year')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $pcexp =  $newdate->modify('+5 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $lppcexp =  $newdate->modify('+5 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $lppc_pasexp =  $newdate->modify('+5 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $sdpexp =  $newdate->modify('+5 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $sdp_pasexp =  $newdate->modify('+5 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $sdrexp =  $newdate->modify('+42 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $wbexp =  $newdate->modify('+35 day')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $crpexp =  $newdate->modify('+1 day +1 year')->format('Y-m-d');
        $newdate = date_create("$donation_date");
        $cryoexp =  $newdate->modify('+1 day +1 year')->format('Y-m-d');

    }
    
    $docconfirmblooddonation = loadUpFile();
    if(!empty($donateid))
    {
        

        $sql = "UPDATE donate SET
            
            donatecode = '$donatecode',
            donation_type_id = '$donation_type_id',
            isfirstblooddonation = '$isfirstblooddonation',
            placeid = '$placeid',
            placetime = '$placetime',
            unitnameid = '$unitnameid',
            departmentid = '$departmentid',
            activityid = '$activityid',
            donation_get_type_id = '$donation_get_type_id',
            hn = '$hn',
            an = '$an',
            patientname = '$patientname',
            diagnosisid = '$diagnosisid',
            diagnosis = '$diagnosis',
            diagnosisdetail = '$diagnosisdetail',
            blood_use_date = '$blood_use_date',
            unitofficeid = '$unitofficeid',
            bag_number = '$bag_number',
            bag_type_id = '$bag_type_id',
            expired_date = '$expired_date',
            donation_date = '$donation_date',
            last_donation_date = '$last_donation_date',
            donation_time = '$donation_time',
            last_donation_time = '$last_donation_time',
            donation_qty = '$donation_qty',
            souvenirid = '$souvenirid',
            souvenirnum = '$souvenirnum',
            souvenirdate = '$souvenirdate',
            staffsouvenirid = '$staffsouvenirid',
            blood_group = '$blood_group',
            rh = '$rh',
            hemoglobin = '$hemoglobin',
            remarkhemoglobin = '$remarkhemoglobin',
            prebp1 = '$prebp1',
            prebp2 = '$prebp2',
            remarkprebp = '$remarkprebp',
            postbp1 = '$postbp1',
            postbp2 = '$postbp2',
            remarkpostbp = '$remarkpostbp',
            pulse = '$pulse',
            remarkpulse = '$remarkpulse',
            drug = '$drug',
            temperature = '$temperature' ,
            blood_driller_id = '$blood_driller_id',
            weight = '$weight',
            height = '$height',
            pulse_status = '$pulse_status',
            physical_status = '$physical_status',
            pain_heart_status = '$pain_heart_status',
            donation_status = '$donation_status',
            donatenocauseid = '$donatenocauseid',
            donatenocauseremark = '$donatenocauseremark',
            donatenocausedetail = '$donatenocausedetail',
            bag_staff_id = '$bag_staff_id',
            inspectorid = '$inspectorid',
            staff_screening = '$staff_screening',
            experienced_staff = '$experienced_staff',
            donorid = '$donorid',
            physical_detail = '$physical_detail',
            donatestatusid = '$donatestatusid',
            getcard = '$getcard',
            staffcardid = '$staffcardid',
            getcarddate = '$getcarddate',
            receivecard = '$receivecard',
            receivecarddate = '$receivecarddate',
            receivestaffcardid = '$receivestaffcardid',
            islab = '$islab',
            donationproblemsid = '$donationproblemsid',
            donatereactionid = '$donatereactionid',
            donateremark = '$donateremark' ,
            remarkaccident = '$remarkaccident' ,
            isdonateremark = '$isdonateremark',
            isconfirmblooddonation = '$isconfirmblooddonation',
            sdpfirsttime = '$sdpfirsttime' ,
            machineid = '$machineid' ,
            sdpno = '$sdpno' ,
            sdpcodeno = '$sdpcodeno' ,
            sdplotno = '$sdplotno' ,
            sdppresys = '$sdppresys' ,
            sdppredia = '$sdppredia' ,
            sdppreremark = '$sdppreremark',
            sdpprehb = '$sdpprehb' ,
            sdpprehct = '$sdpprehct' ,
            sdpprerbc = '$sdpprerbc' ,
            sdpprewbc = '$sdpprewbc' ,
            sdppreplt = '$sdppreplt' ,
            sdppremcv = '$sdppremcv' ,
            sdppreeosinophil = '$sdppreeosinophil' ,
            

            sdpprehb_before = '$sdpprehb_before' ,
            sdpprehct_before = '$sdpprehct_before' ,
            sdpprerbc_before = '$sdpprerbc_before' ,
            sdpprewbc_before = '$sdpprewbc_before' ,
            sdppreplt_before = '$sdppreplt_before' ,
            sdppremcv_before = '$sdppremcv_before' ,
            sdppreeosinophil_before = '$sdppreeosinophil_before' ,

            sdpprehb_before_0 = '$sdpprehb_before_0' ,
            sdpprehct_before_0 = '$sdpprehct_before_0' ,
            sdpprerbc_before_0 = '$sdpprerbc_before_0' ,
            sdpprewbc_before_0 = '$sdpprewbc_before_0' ,
            sdppreplt_before_0 = '$sdppreplt_before_0' ,
            sdppremcv_before_0 = '$sdppremcv_before_0' ,
            sdppreeosinophil_before_0 = '$sdppreeosinophil_before_0' ,

            sdppostsys = '$sdppostsys' ,
            sdppostdia = '$sdppostdia' ,
            sdppostremark = '$sdppostremark' ,
            sdpposthb = '$sdpposthb' ,
            sdpposthct = '$sdpposthct' ,
            sdppostrbc = '$sdppostrbc' ,
            sdppostwbc = '$sdppostwbc' ,
            sdppostplt = '$sdppostplt' ,
            sdppostmcv = '$sdppostmcv' ,
            sdpposteosinophil = '$sdpposteosinophil' ,
            
            sdpprodhct = '$sdpprodhct' ,
            sdpprodpltcount = '$sdpprodpltcount' ,
            sdpprodpltyield = '$sdpprodpltyield' ,
            sdpprodvol = '$sdpprodvol' ,
            sdpprodcycle = '$sdpprodcycle' ,
            sdpprodtime = '$sdpprodtime' ,
            sdpresultvolproc = '$sdpresultvolproc' ,
            sdpresultacvol = '$sdpresultacvol' ,
            sdpresulttime = '$sdpresulttime' ,
            sdpresultpltweight = '$sdpresultpltweight' ,
            sdpresultmachineyield = '$sdpresultmachineyield' ,
            sdpresultpltpost = '$sdpresultpltpost',
            sdpresulttype = '$sdpresulttype',
            sdpresultvolume = '$sdpresultvolume' ,

            sdpprodvolume1 = '$sdpprodvolume1',
            sdpprodcount1 = '$sdpprodcount1',
            sdpprodyltyield1 = '$sdpprodyltyield1',
            sdpprodunit1 = '$sdpprodunit1',

            sdpprodvolume2 = '$sdpprodvolume2',
            sdpprodcount2 = '$sdpprodcount2',
            sdpprodyltyield2 = '$sdpprodyltyield2',
            sdpprodunit2 = '$sdpprodunit2',

            sdpresultvolume3 = '$sdpresultvolume3',
            sdpprodvolume3 = '$sdpprodvolume3',
            sdpprodcount3 = '$sdpprodcount3',
            sdpprodyltyield3 = '$sdpprodyltyield3',
            sdpprodunit3 = '$sdpprodunit3',

            isunitoffice = '$isunitoffice',
            problemmachineid = '$problemmachineid',
            problemmachineother = '$problemmachineother',
            problemdonorid = '$problemdonorid',
            problemdonorremark = '$problemdonorremark',
            problemproductid = '$problemproductid',
            problemhumanid = '$problemhumanid',
            problemproductremark = '$problemproductremark',
            problemhumanremark = '$problemhumanremark',
            ischecklab = '$ischecklab',
            issdpsave = '$issdpsave',
            useless = '$useless',
            lostset = '$lostset',
            isuseless = '$isuseless',
            islostset = '$islostset',

            sdpclaim = '$sdpclaim',
            sdpreturn = '$sdpreturn',
            sdpisclaim = '$sdpisclaim',
            sdpisreturn = '$sdpisreturn',

            istube_after = '$istube_after',
            blood_invest_tube_edta_after = '$blood_invest_tube_edta_after',
            blood_invest_tube_clotted_after = '$blood_invest_tube_clotted_after',
            blood_invest_tube_acd_after = '$blood_invest_tube_acd_after',

            docconfirmblooddonation = '$docconfirmblooddonation',
            prcexp = '$prcexp',
            lprcexp = '$lprcexp',
            ldprcexp = '$ldprcexp',
            ffpexp = '$ffpexp',
            pcexp = '$pcexp',
            lppcexp = '$lppcexp',
            lppc_pasexp = '$lppc_pasexp',
            sdpexp = '$sdpexp',
            sdp_pasexp = '$sdp_pasexp',
            sdrexp = '$sdrexp',
            wbexp = '$wbexp',
            crpexp = '$crpexp',
            cryoexp = '$cryoexp',

            donatenostatusid = '$donatenostatusid',
            donatenostatusdate = '$donatenostatusdate',


            isconfirmdonorblooddonation = '$isconfirmdonorblooddonation',
            isconfirmdonorsdp = '$isconfirmdonorsdp',
            userupdate = '$username',
            datetimeupdate = '$dateNowValue',
            sdppretsys = '$sdppretsys',
            sdppretdia = '$sdppretdia',
            sdppretremark = '$sdppretremark',
            sdpdonatenostatusid = '$sdpdonatenostatusid',
            sdpdonatenocauseremark = '$sdpdonatenocauseremark',
            sdpisdonateremark = '$sdpisdonateremark',
            sdpdonateremark = '$sdpdonateremark',

            autologousisappointment = '$autologousisappointment',
            autologousappointmentdate = '$autologousappointmentdate',
            autologousappointmentremark = '$autologousappointmentremark',

            sdpdonateisappointment = '$sdpdonateisappointment',
            sdpdonateappointmentdate = '$sdpdonateappointmentdate',
            sdpdonateappointmentremark = '$sdpdonateappointmentremark',

            assignsdp = '$assignsdp',
            assignsdpdate = '$assignsdpdate',

            notdonoridcard = '$notdonoridcard',
            notmobile = '$notmobile'

            WHERE donateid = '$donateid'
        
        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("==========7===========".$status);

        error_log($sql);

    
      
    }else
    {

        $autologous_qty = '0';

        if($donation_get_type_id == 3)
        {
            $sql = "SELECT IFNULL(max(autologous_qty),0)+1 as autologous_qty_max 
                    FROM donate  
                    WHERE donation_get_type_id = 3   
                    AND DATEDIFF(CURDATE() + INTERVAL 543 YEAR, donation_date ) <= 30
                    AND donorid = '$donorid'";
            $result = mysqli_query($conn, $sql);
            

            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $autologous_qty = $row["autologous_qty_max"];
            }
        }
        
        
        $running_DN = getRunningYM('DN');
        $donateid = $running_DN['runn'];
        $donatecode = $running_DN['code'];

        $sql = "
        INSERT INTO 
        donate
        (
            donateid,
            donatecode,
            donation_type_id,
            isfirstblooddonation,
            placeid,
            placetime,
            isunitoffice,
            unitnameid,
            departmentid,
            activityid,
            donation_get_type_id,
            hn,
            an,
            patientname,
            diagnosisid,
            diagnosis,
            diagnosisdetail,
            blood_use_date,
            unitofficeid,
            bag_number,
            bag_type_id,
            expired_date,
            donation_date,
            last_donation_date,
            donation_time,
            last_donation_time,
            donation_qty,
            autologous_qty,
            souvenirid,
            souvenirnum,
            souvenirdate,
            staffsouvenirid,
            blood_group,
            rh,
            hemoglobin,
            remarkhemoglobin,
            prebp1,
            prebp2,
            remarkprebp,
            postbp1,
            postbp2,
            remarkpostbp,
            pulse,
            remarkpulse,
            drug,
            temperature,
            blood_driller_id,
            weight,
            height,
            pulse_status,
            physical_status,
            pain_heart_status,
            donation_status,
            donatenocauseid,
            donatenocauseremark,
            donatenocausedetail,
            bag_staff_id,
            inspectorid,
            staff_screening,
            experienced_staff,
            donorid,
            physical_detail,
            donatestatusid,
            getcard,
            staffcardid,
            getcarddate,
            receivecard,
            receivecarddate,
            receivestaffcardid,
            islab,
            donationproblemsid,
            donatereactionid,
            donateremark,
            remarkaccident,
            isdonateremark,
            isconfirmblooddonation,
            sdpfirsttime  ,
            machineid,
            sdpno ,
            sdpcodeno ,
            sdplotno ,
            sdppresys,
            sdppredia,
            sdppreremark,
            sdpprehb,
            sdpprehct,
            sdpprerbc,
            sdpprewbc,
            sdppreplt,
            sdppremcv,
            sdppreeosinophil,

            sdpprehb_before,
            sdpprehct_before,
            sdpprerbc_before,
            sdpprewbc_before,
            sdppreplt_before,
            sdppremcv_before,
            sdppreeosinophil_before,

            sdpprehb_before_0,
            sdpprehct_before_0,
            sdpprerbc_before_0,
            sdpprewbc_before_0,
            sdppreplt_before_0,
            sdppremcv_before_0,
            sdppreeosinophil_before_0,

            sdppostsys,
            sdppostdia,
            sdppostremark,
            sdpposthb,
            sdpposthct,
            sdppostrbc,
            sdppostwbc,
            sdppostplt,
            sdppostmcv,
            sdpposteosinophil,

            sdpprodhct,
            sdpprodpltcount,
            sdpprodpltyield,
            sdpprodvol,
            sdpprodcycle,
            sdpprodtime,
            sdpresultvolproc,
            sdpresultacvol,
            sdpresulttime,
            sdpresultpltweight,
            sdpresultmachineyield,
            sdpresultpltpost,
            sdpresulttype,
            sdpresultvolume ,

            sdpprodvolume1,
            sdpprodcount1,
            sdpprodyltyield1,
            sdpprodunit1,

            sdpprodvolume2,
            sdpprodcount2,
            sdpprodyltyield2,
            sdpprodunit2,

            sdpresultvolume3,
            sdpprodvolume3,
            sdpprodcount3,
            sdpprodyltyield3,
            sdpprodunit3,

            problemmachineid,
            problemmachineother,
            problemdonorid,
            problemdonorremark,
            problemproductid,
            problemhumanid,
            problemproductremark,
            problemhumanremark,
            ischecklab,
            issdpsave,
            useless,
            lostset,
            isuseless,
            islostset,

            sdpclaim,
            sdpreturn,
            sdpisclaim,
            sdpisreturn,

            istube_after,
            blood_invest_tube_edta_after,
            blood_invest_tube_clotted_after,
            blood_invest_tube_acd_after,

            docconfirmblooddonation,
            prcexp,
            lprcexp,
            ldprcexp,
            ffpexp,
            pcexp,
            lppcexp,
            lppc_pasexp,
            sdpexp,
            sdrexp,
            wbexp,
            crpexp,
            cryoexp,

            donatenostatusid,
            donatenostatusdate,
            isconfirmdonorblooddonation,
            isconfirmdonorsdp,
            usercreate,
            datetimecreate,
            sdppretsys,
            sdppretdia,
            sdppretremark,
            sdpdonatenostatusid,
            sdpdonatenocauseremark,
            sdpisdonateremark,
            sdpdonateremark,

            autologousisappointment,
            autologousappointmentdate,
            autologousappointmentremark,

            assignsdp,
            assignsdpdate,

            sdpdonateisappointment,
            sdpdonateappointmentdate,
            sdpdonateappointmentremark,
            notdonoridcard,
            notmobile

            
        )
        VALUES
        (
            '$donateid',
            '$donatecode',
            '$donation_type_id',
            '$isfirstblooddonation',
            '$placeid',
            '$placetime',
            '$isunitoffice',
            '$unitnameid',
            '$departmentid',
            '$activityid',
            '$donation_get_type_id',
            '$hn',
            '$an',
            '$patientname',
            '$diagnosisid',
            '$diagnosis',
            '$diagnosisdetail',
            '$blood_use_date',
            '$unitofficeid',
            '$bag_number',
            '$bag_type_id',
            '$expired_date',
            '$donation_date',
            '$last_donation_date',
            '$donation_time',
            '$last_donation_time',
            '$donation_qty',
            '$autologous_qty',
            '$souvenirid',
            '$souvenirnum',
            '$souvenirdate',
            '$staffsouvenirid',
            '$blood_group',
            '$rh',
            '$hemoglobin',
            '$remarkhemoglobin',
            '$prebp1',
            '$prebp2',
            '$remarkprebp',
            '$postbp1',
            '$postbp2',
            '$remarkpostbp',
            '$pulse',
            '$remarkpulse',
            '$drug',
            '$temperature',
            '$blood_driller_id',
            '$weight',
            '$height',
            '$pulse_status',
            '$physical_status',
            '$pain_heart_status',
            '$donation_status',
            '$donatenocauseid',
            '$donatenocauseremark',
            '$donatenocausedetail',
            '$bag_staff_id',
            '$inspectorid',
            '$staff_screening',
            '$experienced_staff',
            '$donorid',
            '$physical_detail',
            '$donatestatusid',
            '$getcard',
            '$staffcardid',
            '$getcarddate',
            '$receivecard',
            '$receivecarddate',
            '$receivestaffcardid',
            '$islab',
            '$donationproblemsid',
            '$donatereactionid',
            '$donateremark',
            '$remarkaccident',
            '$isdonateremark',
            '$isconfirmblooddonation',
            '$sdpfirsttime'  ,
            '$machineid',
            '$sdpno',
            '$sdpcodeno',
            '$sdplotno' ,
            '$sdppresys',
            '$sdppredia',
            '$sdppreremark',
            '$sdpprehb',
            '$sdpprehct',
            '$sdpprerbc',
            '$sdpprewbc',
            '$sdppreplt',
            '$sdppremcv',
            '$sdppreeosinophil',

            '$sdpprehb_before',
            '$sdpprehct_before',
            '$sdpprerbc_before',
            '$sdpprewbc_before',
            '$sdppreplt_before',
            '$sdppremcv_before',
            '$sdppreeosinophil_before',

            '$sdpprehb_before_0',
            '$sdpprehct_before_0',
            '$sdpprerbc_before_0',
            '$sdpprewbc_before_0',
            '$sdppreplt_before_0',
            '$sdppremcv_before_0',
            '$sdppreeosinophil_before_0',

            '$sdppostsys',
            '$sdppostdia',
            '$sdppostremark',
            '$sdpposthb',
            '$sdpposthct',
            '$sdppostrbc',
            '$sdppostwbc',
            '$sdppostplt',
            '$sdppostmcv',
            '$sdpposteosinophil',

            '$sdpprodhct',
            '$sdpprodpltcount',
            '$sdpprodpltyield',
            '$sdpprodvol',
            '$sdpprodcycle',
            '$sdpprodtime',
            '$sdpresultvolproc',
            '$sdpresultacvol',
            '$sdpresulttime',
            '$sdpresultpltweight',
            '$sdpresultmachineyield',
            '$sdpresultpltpost',
            '$sdpresulttype',
            '$sdpresultvolume' ,

            '$sdpprodvolume1',
            '$sdpprodcount1',
            '$sdpprodyltyield1',
            '$sdpprodunit1',

            '$sdpprodvolume2',
            '$sdpprodcount2',
            '$sdpprodyltyield2',
            '$sdpprodunit2',

            '$sdpresultvolume3',
            '$sdpprodvolume3',
            '$sdpprodcount3',
            '$sdpprodyltyield3',
            '$sdpprodunit3',

            '$problemmachineid',
            '$problemmachineother',
            '$problemdonorid',
            '$problemdonorremark',
            '$problemproductid',
            '$problemhumanid',
            '$problemproductremark',
            '$problemhumanremark',

            '$ischecklab',
            '$issdpsave',
            '$useless',
            '$lostset',
            '$isuseless',
            '$islostset',

            '$sdpclaim',
            '$sdpreturn',
            '$sdpisclaim',
            '$sdpisreturn',

            '$istube_after',
            '$blood_invest_tube_edta_after',
            '$blood_invest_tube_clotted_after',
            '$blood_invest_tube_acd_after',

            '$docconfirmblooddonation',

            '$prcexp',
            '$lprcexp',
            '$ldprcexp',
            '$ffpexp',
            '$pcexp',
            '$lppcexp',
            '$lppc_pasexp',
            '$sdpexp',
            '$sdrexp',
            '$wbexp',
            '$crpexp',
            '$cryoexp',

            '$donatenostatusid',
            '$donatenostatusdate',

            '$isconfirmdonorblooddonation',
            '$isconfirmdonorsdp',
            '$username',
            '$dateNowValue',
            '$sdppretsys',
            '$sdppretdia',
            '$sdppretremark',
            '$sdpdonatenostatusid',
            '$sdpdonatenocauseremark',
            '$sdpisdonateremark',

            '$sdpdonateremark',

            '$autologousisappointment',
            '$autologousappointmentdate',
            '$autologousappointmentremark',

            '$sdpdonateisappointment',
            '$sdpdonateappointmentdate',
            '$sdpdonateappointmentremark',

            '$assignsdp',
            '$assignsdpdate',

            '$notdonoridcard',
            '$notmobile'
        )

        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("=========8============".$status);

        error_log($sql);
            

    }

    $count =$_POST['hpcount'];
    $sql = "DELETE FROM donor_hp WHERE donorid = '$donorid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = 0;

    error_log("=========9============".$status);

    error_log($sql);

    $hparr = json_decode($_POST['hparr']);
    foreach ($hparr as $item) {

        $donorhpvalue = $item->donorhpvalue;
        $donorhpdate = (!empty($item->donorhpdate))?dmyToymd($item->donorhpdate):'0000-00-00';

        $sql = "INSERT INTO donor_hp(donorhpdate,donorhpvalue,donorid) VALUE ('$donorhpdate','$donorhpvalue','$donorid') ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = 0;

        error_log("==========10===========".$status);

        error_log($sql);

    }

    $sql = "DELETE FROM donor_lost WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = 0;

    error_log("==========11===========".$status);

    error_log($sql);

    if(!empty($lostset))
    {
        $sql = "INSERT INTO donor_lost(donorlostdate,donorlosttext,donorid,donateid) VALUE ('$donation_date','$lostset','$donorid','$donateid')";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("==========12===========".$status);

        error_log($sql);
    }


    if($donationproblemsid == "15")
    {
        $sql = "UPDATE donate SET 
                prcremark = '$donationproblemsid',
                lprcremark = '$donationproblemsid',
                ldprcremark = '$donationproblemsid',
                ffpremark = '$donationproblemsid',
                pcremark = '$donationproblemsid',
                lppcremark = '$donationproblemsid',
                lppc_pasremark = '$donationproblemsid',
                sdpremark = '$donationproblemsid',
                sdp_pasremark = '$donationproblemsid',
                sdrremark = '$donationproblemsid',
                wbremark = '$donationproblemsid'
                WHERE donateid = '$donateid'
        ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        error_log("=========13============".$status);

        error_log($sql);
    }

    $sql = "SELECT * FROM donate WHERE IFNULL(ispayautologous,'') != 1 AND donation_get_type_id = 3 AND donateid = '$donateid'";
    
    $query = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($query);

    if($num_rows > 0 || !empty($hn))
    {
            $hnAPI = replaceHNGet($hn);
            $anAPI = replaceANGet($an);
            $dateMDY = date('m/d/Y');
            $dateHIS = intval(date('His'));

            $sql = "SELECT * FROM patient WHERE patienthn = '$hn'";

            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_array($query);

            $insuranceid = $result["patientinsuranceid"];
            $insurancetext = $result["patientinsurance"];

            $datasendAPI = '[
                {
                    "HN": '.$hnAPI.',
                    "INCDATE": "'.$dateMDY.'",
                    "INCTIME": '.$dateHIS.',
                    "INCOME": "B27",
                    "INCOMENM": "Autologous",
                    "ITEMNO": 1,
                    "PRVNO": 1,
                    "PTTYPE": '.$insuranceid.',
                    "PTTYPENM": "'.$insurancetext.'",
                    "AN": '.$anAPI.',
                    "QTY": 1,
                    "DCT":-99,
                    "OVERTIME":1,
                    "CLINICLCT":507
                }
            ]
            ';


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $rhis_api_absws_config1.'GetToken?user=abs&password=w,j%5Bvdot',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "user":"abs",
                "password":"w,j[vdot"
            }',
                CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $responseArray = json_decode($response);

            $token = $responseArray->Result;


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $rhis_api_apibb_config.'insicptdt?hn='.$hnAPI,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $datasendAPI ,
            CURLOPT_HTTPHEADER => array(
                "X-Access-Token: $token",
                "Content-Type: application/json"
            ),
            ));

            $response = str_replace("'","`",curl_exec($curl));
            $datasendAPI = str_replace("'","`",$datasendAPI);

            curl_close($curl);

            $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$donateid','$datasendAPI','$dateNowValue','$username','blood-donor-record Autologous datasend API','บันทึกผู้มาบริจาคโลหิต datasendAPI')";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$donateid','$response','$dateNowValue','$username','blood-donor-record Autologous response API','บันทึกผู้มาบริจาคโลหิต response')";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "UPDATE donate SET ispayautologous=1 WHERE donateid = '$donateid'";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;
    }

    if(empty($donorid) || $donorid == "0")
    $status = 0;

    
    if ($status) {
        mysqli_commit($conn);
        $_SESSION['status'] = 'successful';
        echo "1";
    }else
    {
        mysqli_rollback($conn);
        $_SESSION['status'] = 'error';
    }


    if ($status) {
        mysqli_commit($conn);
        $_SESSION['status'] = 'successful';
        echo json_encode(
            array(
            'status' => $status,
            'url' => "blood-donor-record.php?id=$donateid"
            )
           
        )  ;
    }else
    {
        mysqli_rollback($conn);
        $_SESSION['status'] = 'error';
    }


    // $url = "blood-donor-record.php?id=$donateid";
    // header("Location: $url"); 
    

    // end การบริจาค
    function loadUpFile()
    {
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"uploads/".$_FILES["filUpload"]["name"]))
        {
            return $_FILES["filUpload"]["name"];
          
        }else
        {
            return "";
        }

    }

    function do_upload($image,$name,$path) {
        $random_string = substr(str_shuffle("_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 10);
        $imageArr = explode(",",$image);
        
        $imageDoc1 = explode("/",$imageArr[0]);
        $imageDoc2 = explode(";",$imageDoc1[1]);
        $data = base64_decode($imageArr[1]);
       
        $file ="";
        if($imageDoc2[0] == "vnd.openxmlformats-officedocument.wordprocessingml.document")
        {
            $file = $path.$name.$random_string.'.'.'docx';
        }else
        {
            $file = $path.$name.$random_string.'.'.$imageDoc2[0];
        }
        
        file_put_contents($file, $data);
        
        return $file;
     
    }

    function replaceHNGet($text)
    {
        $arrayStr = explode("-",$text);
        $newtext =  $arrayStr[1].$arrayStr[0];
        return $newtext;
    }

    function replaceANGet($text)
    {
        $arrayStr = explode("-",$text);
        $newtext =  $arrayStr[0];
        return $newtext;
    }

?>