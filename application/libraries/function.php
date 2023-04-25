<?php 
    // active
    $active_controller = $this->router->fetch_class();
    $active_method = $this->router->fetch_method();

    // explode name
    $firstname = null;
    $lastname = null;
    $third_word = null;
    $words = "";
    if(isset($active)) {
        if($active_controller == "admin") {
            if (isset($admin)) {
                $words = explode(" ", $admin["nama"]);
            }
        } else if($active_controller == "responden"){
            if (isset($responden)) {
                $words = explode(" ", $responden["nama"]);
            }
        }
        if(isset($words[0]))
        $firstname = $words[0];
        if(isset($words[1]))
        $lastname = $words[1];
        if(isset($words[2]))
        $third_word = $words[2];
    
        $name_explode = [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "third_word" => $third_word
        ];
    }

    // substr get file extension
    function get_file_extension($file) {
       return substr(strrchr($file,'.'),1);
    }

    
    function check_file_extension($file) {
        // validasi file extension
        $file_extension = get_file_extension($file);
        $file_extension_color = "";

        if($file_extension == "docx") {
          $file_extension = "word-o";
          $file_extension_color = "info";
        } else if($file_extension == "xlsx") {
            $file_extension = "excel-o";
            $file_extension_color = "success";
        } else if($file_extension == "pptx") {
            $file_extension = "powerpoint-o";
            $file_extension_color = "primary";
        } else if($file_extension == "pdf") {
            $file_extension = "pdf-o";
            $file_extension_color = "danger";

        }
    }

?>