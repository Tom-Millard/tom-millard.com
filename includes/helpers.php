<?php
    function getBase64Image($imgPath){
        $imgType   = explode(".", trim($imgPath));
        $imgType   = strtolower($imgType[count($imgType) -1] );
        $img       = file_get_contents($imgPath);
        $img       = base64_encode($img);

        return "data:image/$imgType;base64,$img";
    }
