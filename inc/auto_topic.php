

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


         if ($data=='type') {

              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='type' onChange=\"dochange('topic', this.value)\">";
              echo "<option value='0'>----- ระบุประเภทอุปกรณ์ -----</option>\n";
              $result=mysql_query("select * from type ");
        
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[id_type]' >  $row[type_name] </option>" ;

               }
              echo"</div>";
         } else if ($data=='topic') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='topic' onChange=\"dochange('detail', this.value)\">";
              echo "<option value='0'>----- ระบุหัวข้ออาการเสีย-----</option>\n";                             
              $result=mysql_query("SELECT * FROM topic WHERE id_type = '$val' ");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id_topic]\" >$row[topic]</option> " ;
              }
              echo"</div>";
         } else if ($data=='detail') {
              echo"<div class='form-group'>";
              echo "<select class='form-control input-lg' name='detail'>\n";
              echo "<option value='0'>----- ระบุอาการเสีย -----</option>\n";
              $result=mysql_query("SELECT * FROM detail_t WHERE id_topic= '$val' ORDER BY detail ASC ");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[id_detail]\" >$row[detail]</option> \n" ;
              }
              echo"</div>";
         }
         echo "</select>\n";

         echo mysql_error();
         closedb();
?>
