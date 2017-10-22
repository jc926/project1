




<?Php 


class display extends page{

 public function get(){



 if (isset($_GET['filename'])) {
        $filepath   = './uploadfolder/'. $_GET['filename'];
      
        echo "<html>";
        echo "<body>";
        echo "<div style='overflow-x:auto;'>";
        echo "<table style='width:100%'><caption>" . $_GET['filename'] . "</caption>";
        $read_file = file($filepath);
        foreach ($read_file as $key => $value) {
        
               echo "<tr>";
            foreach(explode(",", $value) as $cell) {
              echo ($key == 0) ? "<th>$cell</th>" : "<td>$cell</td>";
            }
              echo "</tr>";
         }           

        echo "</table></div>";
        echo "</body>";
        echo "</html>";	
      
 } 
 }
}
?>



