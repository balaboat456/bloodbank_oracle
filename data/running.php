<?php

function getRunning($modul = "") 
{ 
    date_default_timezone_set('Asia/Bangkok');
    include('connection.php');;
    $date = "";
    $runn = 1;
    $key = '';
    $code = '';
    $running = '';

    $sql = "SELECT RN.*,IT.RUNLAST,IT.RUNNING
                    FROM RUNNING RN
                    LEFT JOIN RUNITEM IT ON RN.RUNID = IT.RUNID
                    WHERE RN.MODULE = '$modul'
                    AND IT.DATECODE = '$date'";
  
    $runnlast = $con->query($sql);
    if($runnlast->num_rows > 0)
    {

        $datarunning = $runnlast->fetch_assoc();

        if(!empty($datarunning['RUNLAST']))
        {
            $key = $datarunning['RUNKEY'];
            $runn = $runn + $datarunning['RUNLAST'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }
            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;

            $runid = $datarunning['RUNID'];
            
            $sql = "UPDATE RUNITEM SET RUNNING='$runn',RUNLAST='$runn' WHERE RUNID='$runid' AND DATECODE = '$date'";
            // echo $sql;
            $con->query($sql);
        }else
        {
            $runid = $datarunning['RUNID'];

            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);
        }
       

    }else
    {
        
        $sql = "SELECT * FROM RUNNING WHERE MODULE = '$modul'";
        $runnlast = $con->query($sql);

        if($runnlast->num_rows > 0)
        {
            $datarunning = $runnlast->fetch_assoc();
           
            $key = $datarunning['RUNKEY'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }

            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;


            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);

        }
    }
    return array(
        'runn' =>  $running,
        'code' =>  $code
    );

}



function getRunningYM($modul = "") 
{ 
    date_default_timezone_set('Asia/Bangkok');
    include('connection.php');;
    $date = date("ym",strtotime("now"));
    $runn = 1;
    $key = '';
    $code = '';
    $running = '';

    $sql = "SELECT RN.*,IT.RUNLAST,IT.RUNNING
                    FROM RUNNING RN
                    LEFT JOIN RUNITEM IT ON RN.RUNID = IT.RUNID
                    WHERE RN.MODULE = '$modul'
                    AND IT.DATECODE = '$date'";
  
    $runnlast = $con->query($sql);
    if($runnlast->num_rows > 0)
    {

        $datarunning = $runnlast->fetch_assoc();

        if(!empty($datarunning['RUNLAST']))
        {
            $key = $datarunning['RUNKEY'];
            $runn = $runn + $datarunning['RUNLAST'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }
            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;

            $runid = $datarunning['RUNID'];
            
            $sql = "UPDATE RUNITEM SET RUNNING='$runn',RUNLAST='$runn' WHERE RUNID='$runid' AND DATECODE = '$date'";
            // echo $sql;
            $con->query($sql);
        }else
        {
            $runid = $datarunning['RUNID'];

            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);
        }
       

    }else
    {
        
        $sql = "SELECT * FROM RUNNING WHERE MODULE = '$modul'";
        $runnlast = $con->query($sql);

        if($runnlast->num_rows > 0)
        {
            $datarunning = $runnlast->fetch_assoc();
           
            $key = $datarunning['RUNKEY'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }

            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;


            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);

        }
    }
    return array(
        'runn' =>  $running,
        'code' =>  $code
    );

}

?>