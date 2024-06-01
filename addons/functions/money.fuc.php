<?php
//MONEY FUNCTION STARTS
// money format starts
function money($num,$type='default'){if($type === 'default'){return number_format($num,2,'.',',');}else{return number_format($num,0);}}
// money format ends
//MONEY FUNCTION ENDS
?>