<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        $manglienhop = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg",  
        "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",  
        "Finland"=>"Helsinki", "France" => "Paris",  
        "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana",  
        "Germany" => "Berlin", "Greece" => "Athens",  
        "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam",
        "Austria" => "Vienna", "Poland"=>"Warsaw");
        arsort($manglienhop);
        foreach($manglienhop as $quocgia => $thudo){
            echo "Thu do cua $quocgia la $thudo"."<br>";
        }
    ?>
</body>
</html>