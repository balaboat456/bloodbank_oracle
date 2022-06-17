
<?php

$start = date('Y-m-d H:i:s');
echo date('Y-m-d H:i:s',strtotime('+2 hour +543 year',strtotime($start)));

?>