<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viết PHP script để hiển thị giai thừa của một số trong PHP</title>
</head>
<body>
    <?php
        $a = 10;
        function giaithua($n) {
            if($n>0) {
                return $n * giaithua($n - 1);
            }
            else {
                return 1;
            }
        }
        echo ("giai thua cua " . $a . "la:" . giaithua($a));
    ?>
</body>
</html>