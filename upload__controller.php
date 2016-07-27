<?php
    
    $dir = "./uploads/";
    
    // Function to return a js callback to parent window (the my_iframe in index.html)
    function set_notify($text){
        return "<script>parent.notify('$text');</script>";
    }
    // Function to return a js callback to render the picture uploaded in the parent window
    function render_picture($filename){
        return "<script>parent.render_picture('$filename');</script>";
    }
    // Function to rename a file with its has name
    function rename_hash($filename){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = pathinfo($filename, PATHINFO_BASENAME);
        return md5($basename).".".$ext;
    }
    
    
    // Exit with an error if the file content is not set
    if(!isset($_FILES['picture']) || empty($_FILES['picture'])){
        exit(set_notify("No file selected."));
    } else {
        $pic = $_FILES['picture'];
    }
    
    
    /* ********************************************************************************* */
    // Check to avoid overflow of resourses in my web space ;)
    // Maximum number of pictures in /uploads/ : 10
    if(count(scandir($dir)) > 12){
        exit(set_notify("The webspace is full, please try again later. Cheers!"));
    }
    /* ********************************************************************************* */
    
    // Check for errors
    if($pic["error"] > 0){
        // Collect errrors
        $errors = "Error: " . $_FILES["picture"]["error"];
        // Send email to notify for uploads errors
        mail("info@thatsmy.name","Tourismpo - Errori upload",$errori);
        exit(set_notify($errors));
    }
    

    // Check if $dir is a directory
    if(!is_dir($dir)){
        exit(set_notify("$dir is not a directory."));
    }
    
    
    // Rename file with its name hash
    $pic["name"] = rename_hash($pic["name"]);
    // Check if file with same name already exists
    // Now the file before saving is renamed with its name hash (md5)
    // TODO:: Function to automatically rename the file.
    if(file_exists($dir.$pic["name"])){
        exit(set_notify("A file with the same name exists, please rename the file before submitting it."));
    }
    
    
    // Save the file
    if(move_uploaded_file($pic["tmp_name"], $dir.$pic["name"])){
        exit(render_picture($pic["name"]));
    }
    exit(set_notify("Error while uploading.."));


?>