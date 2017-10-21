




<?Php 


class display extends page{

 public function post(){



 if (isset($_GET['file'])) {
        $filepath   = 'uploadfolder/'. $_GET['file'];
      
        echo "<html>";
        echo "<body>";
        echo "<div style='overflow-x:auto;'>";
        echo "<table style='width:100%'><caption>" . $_GET['file'] . "</caption>";
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



