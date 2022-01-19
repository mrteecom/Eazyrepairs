

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


         if ($data=='type_dev') {

              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='type_dev' onChange=\"dochange('class_dev', this.value)\">";
              echo "<option value='0'>----- ระบุประเภทอุปกรณ์ -----</option>\n";
              $result=mysql_query("select * from type ");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[id_type]' >  $row[type_name] </option>" ;
          
               }
              echo"</div>";
         } else if ($data=='class_dev') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='class_dev' onChange=\"dochange('sub_class_dev', this.value)\">";
              echo "<option value='0'>----- ระบุยี่ห้ออุปกรณ์ -----</option>\n";                             
              $result=mysql_query("SELECT * FROM class WHERE id_type = '$val' ");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id_class]\" >$row[class_name]</option> " ;
              }
              echo"</div>";
         } else if ($data=='sub_class_dev') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='sub_class_dev'>\n";
              echo "<option value='0'>----- ระบุรุ่นอุปกรณ์ -----</option>\n";
              $result=mysql_query("SELECT * FROM sub_class WHERE id_class= '$val' ORDER BY sc_name ASC ");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id_sc]\" >$row[sc_name]</option> \n" ;
              }
              echo"</div>";
         }
         echo "</select>\n";

         echo mysql_error();
         closedb();
?>
