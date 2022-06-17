<?php

function paginationCompress($total = 0,$index_page = 1,$num_rows=0) {
    $total = intval($total);
    $index_page = intval($index_page);
    $num_rows = intval($num_rows);

    $count = ceil($total/$num_rows);
    $start = ($index_page -1) * $num_rows ;
    
    return array(
        'total' => $total,
        'active' => $index_page,
        'num_rows' => $num_rows,
        'count_page' =>  $count,
        'start' => $start
    );
}

?>