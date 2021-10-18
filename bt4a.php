<!--Bài tập Hàm trong PHP: Thiết kế hiện thị thông tin bài tập dưới đây trên một trang
web<br>
1. Viết PHP script để xử lý hàm để tính giai thừa của một số <br>-->
<html>
<form method="post" action="#">
    <table>
        <tr>
            <td>Nhập một số:</td>
            <td><input type="text" name="n" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Tính"></td>
        </tr>
    </table>
</form>
<br>
<?php
    
    function tinhgiaithua($n){
        if($n >0){
            return $n * tinhgiaithua($n-1);
        }else{
            return 1;
        }
    }  
    if($_POST){
        echo ("Giai thừa của " . $_POST['n']. " là: " . tinhGiaithua ($_POST['n']));
    } else 
    {
        echo "Không tồn tại giá trị cần tính, vui lòng nhập giá trị!"; 
    }  
?>
</html>

