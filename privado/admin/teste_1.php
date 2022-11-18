<?php

     $Foto = "admin/".$_FILES["file"]["name"];

    echo '<h1>Foto = '.$Foto.' </h1>';
    
    move_uploaded_file($_FILES["file"]["tmp_name"],$Foto);
    
   


