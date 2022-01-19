
<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    require "../inc/connect2.php";
    conndb();
    $data = $_GET['data'];
    $val = $_GET['val'];
   // $val2 = $_GET['val2'];


         if ($data=='province') { 
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='province'  onChange=\"dochange1('amphur', this.value)\">";
              //echo "<option value='$val2'>$val2</option>\n"; 
              echo "<option value='0'>----- เลือกจังหวัด -----</option>\n";                           
              $result=mysql_query("select * from provinces order by name_th");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[id]' >$row[name_th]</option>" ;
              }
              echo"</div>";
         } else if ($data=='amphur') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='amphur' onChange=\"dochange1('district', this.value)\">";
              echo "<option value='0'>----- เลือกอำเภอ -----</option>\n";                             
              $result=mysql_query("SELECT * FROM amphures WHERE province_id= '$val' ORDER BY name_th");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id]\" >$row[name_th]</option> " ;
              }
              echo"</div>";
         } else if ($data=='district') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='district'>\n";
              echo "<option value='0'>----- เลือกตำบล -----</option>\n";
              $result=mysql_query("SELECT * FROM districts WHERE amphure_id= '$val' ORDER BY name_th");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id]\" >$row[name_th]</option> \n" ;
              }
              echo"</div>";
         }
         echo "</select>\n";

         echo mysql_error();
         closedb();
?>

