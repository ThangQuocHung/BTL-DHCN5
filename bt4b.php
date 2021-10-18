Bài tập Hàm trong PHP: Thiết kế hiện thị thông tin bài tập dưới đây trên một trang
web<br>
2. Viết PHP script để xử lý hàm để đảo ngược chuỗi
<hmtl>
<form method="post" action="#">
    <table>
        <tr>
            <td>Nhập một chuỗi kí tự:</td>
            <td><input type="text" name="n" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Đảo ngược"></td>
        </tr>
    </table>
</form>
<br>
<?php
    function dao_nguoc_chuoi($strl){
        $n= strlen($strl);
        if($n == 1)
        {
            return $strl;
        }else
        {
            $n--;
            return dao_nguoc_chuoi(substr($strl,1, $n)) . substr($strl, 0, 1);
        }
    }

    if($_POST)
    {
        echo ("Chuỗi ban đầu: ".$_POST['n']."<br>");
        echo ("Chuỗi được đảo ngược là: ");
        print_r(dao_nguoc_chuoi($_POST['n'])."<br>");
    } else 
    {
        echo "Chuỗi rỗng, vui lòng nhập kí tự!"; 
    }  
?>