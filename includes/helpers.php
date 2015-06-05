<?php
    function getBase64Image($imgPath){
        $imgType   = end(explode(".", trim($imgPath)));
        $imgType   = strtolower($imgType);
        $img       = file_get_contents($imgPath);
        $img       = base64_encode($img);

        return "data:image/$imgType;base64,$img";
    }