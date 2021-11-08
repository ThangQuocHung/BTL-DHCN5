<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viết PHP script để hiển thị số lượng một ký tự bất kì trong chuỗi</title>
</head>
<body>
    <?php
       $string_ban_dau="mai anh nguyen";  
       $ki_tu_can_tim="a";  
       $count="0";  
       for($x="0"; $x < strlen($string_ban_dau); $x++)  
         {   
           if(substr($string_ban_dau,$x,1) == $ki_tu_can_tim)  
           {  
           $count = $count+1;  
            }  
         }  
       echo "Có " .$count. " kí tự " .$ki_tu_can_tim. " trong chuỗi '" .$string_ban_dau. "'";
       echo"tést"
    ?>
</body>
</html>