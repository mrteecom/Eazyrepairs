<?php 
function savelog($name,$status){
$day = date("d/M/Y");
$time = date("H:i:s");
//echo"$a <BR> $b <BR> $day $time ";
$status = $status." - " ;
 $ds[] = array($day,$time,$name,$status);

  foreach($ds AS $row){
    $datas[] = implode('|', $row); // a1|b1|c1
  }
$fp = fopen('savelog.txt','a');
fwrite($fp, implode('\n\r', $datas));
fclose($fp);
}
?>