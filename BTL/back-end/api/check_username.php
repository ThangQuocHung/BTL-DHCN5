<?php
require('./db.php');

if (
    isset($_GET['username']) && !empty($_GET['username'])
) {
    $username = $_GET['username'];
    // Tạo Mới Đối Tượng
    $DB = new DabatabseHandler();
    echo $DB->get_row('select count(*) as a from user_account where username = "' . $username . '"')['a'];
} else {
    echo -1;
}
