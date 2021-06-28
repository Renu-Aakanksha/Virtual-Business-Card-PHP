<?php
if(isset($_POST['sub'])){
    $file = $_POST['fname'];
    $pass = $_POST['fpass'];
    $cpass = "karuneshD1@";
    if($pass == $cpass){
        $file_pointer = $file;
        if (unlink($file_pointer)) { 
            echo ("$file_pointer has been deleted"); 
        }
    }
}
?>
<html>
    <body>
        <form method="post">
            <input type="text" name="fname" placeholder="f">
            <input type="text" name="fpass" placeholder="p">
            <input type="submit" name="sub">
        </form>
    </body>
</html>