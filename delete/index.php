<!DOCTYPE html>
<html>
    <html>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
        <title>Empty Uploads Folder</title>
        <style>
            body{font-family:Arial,sans-serif;margin:0;padding:0;text-align:center;background:#f2f2f2;}
            input,button{padding:7px;font-size:24px;color:#fff;background:#222;border-radius:3px;-webkit-border-radius:3px;border:none;margin:30px;cursor:pointer;}
            a{color:#fff;text-decoration:none;}
        </style>
    </html>
    <body>
        <?php
            // If submit POST is set delete all files in ../uploads/
            if(isset($_POST['empty'])){
                ?><p>Deleted pictures:</p><?php
                foreach(scandir("../uploads") as $f){
                    $link = "../uploads/".$f;
                    if($f!="." && $f!=".."){
                        unlink($link);
                        echo "<p>$f</p>";
                    }
                }
                // Check if all files have been deleted
                if(count(scandir("../uploads/"))==2){
                    ?><h2>All pictures deleted</h2><?php 
                } else {
                    ?><h2>Not all pictures have been deleted</h2><?php 
                }
            }
        ?>
        <form action="" method="post">
            <input type="submit" name="empty" value="EMPTY UPLOAD FOLDER" />
        </form>
        <button><a href="../">BACK TO PICTURE UPLOADER</a></button>
    </body>
</html>