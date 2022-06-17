<?php


function createExcel($array,$data)
{
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('Chesse1');
    
    
    foreach($array as $key=>$value) {

        $objPHPExcel->getActiveSheet()->setCellValue(toAlpha($key)."1", $value["title"]);

        foreach($data as $k=>$v) {
        
            $objPHPExcel->getActiveSheet()->setCellValue(toAlpha($key).($k+2), $v[$value["field"]]);
        }
       
    }
    

    return $objPHPExcel;

    
}

function toAlpha($data) {
    $alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $alpha_flip = array_flip($alphabet);
    if($data <= 25){
      return $alphabet[$data];
    }
    elseif($data > 25){
      $dividend = ($data + 1);
      $alpha = '';
      $modulo;
      while ($dividend > 0){
        $modulo = ($dividend - 1) % 26;
        $alpha = $alphabet[$modulo] . $alpha;
        $dividend = floor((($dividend - $modulo) / 26));
      } 
      return $alpha;
    }
}


?>