#Thiết kế hiện thị thông tin bài tập dưới đây trên một trang
web <br>
1.Viết PHP script để lấy thông tin cấu hình và phiên bản của PHP <br>
<?php
    phpinfo();
?>
2. Viết PHP Lấy địa chỉ Client IP trong PHP <br>
<?php
    //Kiểm tra IP từ share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //Kiểm tra IP từ proxy
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //Kiểm tra IP từ Remote Address
    else
    {
        $ip_address = $_SERVER['REMOTE_ADDR']; 
    }
    echo("Địa chỉ Client IP là:  $ip_address <br>");
?>
3. Viết PHP Lấy URL trong PHP<br>
<?php
    $url = 'http://localhost:8080/testphp/bt1.php';
    $url = parse_url($url);
    echo'Scheme : '.$url['scheme']."<br>";  
	echo 'Host : '.$url['host']."<br>";  
    echo 'Path : '.$url['path']."<br>";
?>
4. Viết PHP script để lấy thư mục gốc, hiện thị toàn bộ nội dung cây thư mục<br>
<?php
    //Lấy thư mục gốc
	$folder_root = getenv('DOCUMENT_ROOT');  
	echo $folder_root."<br>";
    //Hiển thị nội dung cây thư mục
    foreach(glob("documents/*.txt") as $file){
    echo basename($file) . " (size: " . filesize($file) . " bytes)" . "<br>";
    }
?>
5. Viết PHP script để lấy thời gian file chỉnh sửa lần cuối cùng của trang hiện tại<br>
<?php
         echo "Lần chỉnh sửa cuối cùng: " . date ("F d Y H:i:s. ", getlastmod())."<br>";
?>
