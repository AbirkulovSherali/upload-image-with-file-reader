<?php

    if(isset($_POST['blob']) && !empty($_POST['blob'])){
        $slices = explode('.', $_POST['image']);
        $imgExt = $slices[count($slices) - 1];
        $extension = ['png', 'jpg', 'jpeg', 'ico'];

        $mimes = [
            "image/gif", "image/jpeg", "image/png",
            "image/vnd.microsoft.icon", "image/x-icon"
        ];

        $image = explode(',', $_POST['blob']);
        $data = base64_decode($image[1]);
        $fileSize = strlen($data) / 1000;

        $temp = tmpfile();
        fwrite($temp, $data);
        $mimeType = mime_content_type($temp);
        fclose($temp);

        if(!in_array($mimeType, $mimes)) {
            header('Location: /');
            exit;
        }

        if(!in_array($imgExt, $extension)){
            header('Location: /');
            exit;
        }

        if($fileSize > 130) {
            header('Location: /');
            exit;
        }

        $newImgName = 'image-'.time().'.'.$imgExt;

        $fh = fopen('images/'.$newImgName, 'w', true);
        fwrite($fh, $data);
        fclose($fh);

        header('Location: /');
    }

?>
