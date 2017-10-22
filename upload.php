 <?php


//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);


class upload extends page{
    public function get(){
     
      $form = '<form method="POST" enctype="multipart/form-data">';
      
      $form .= '<input type="file" name="file" id="file">';
      $form .= '<input type="submit" name="upload" value=" Start uploading">';
      $form .= '</form>';
      $this->html .= 'Select file from your local: <br><br>';
      $this->html .= $form;
    }

    public function post(){
        if(isset($_REQUEST["upload"])){
        if (isset($_FILES['file'])) {
        $file   = $_FILES['file'];
        // print_r($file);  just checking File properties
        // File Properties
        $file_name  = $file['name'];
        $file_tmp   = $file['tmp_name'];
        $file_size  = $file['size'];
        $file_error = $file['error'];
        // Working With File Extension
        $file_ext   = explode('.', $file_name);
        $file_fname = explode('.', $file_name);
        $file_fname = strtolower(current($file_fname));
        $file_ext   = strtolower(end($file_ext));
        $allowed    = array('csv','txt','pdf','doc');
        if (in_array($file_ext,$allowed)) {
            //print_r($_FILES);
            if ($file_error === 0) {
                if ($file_size <= 5000000) {
                        $file_name_new     =  $file_fname . '.' . $file_ext;
                        
                        $file_destination =  'uploadfolder/' . $file_name_new;
                        // echo $file_destination;
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                                echo "File was uploaded Sucessfully";
                                //header('Location: index.php?page=display&filename = ');
                                header('Location: index.php?page=display&filename=' . $_FILES['file']['name']);
                        }
                        
                }
            }
        }
        }
        }
    }  


}





?>
    

