<?php
require('./db.php');


$data = json_decode(file_get_contents('php://input'), true);
if (
    isset($data) && !empty($data)
) {
    $username = $data["username"];
    $password = $data["password"];

    // Tạo Mới Đối Tượng
    $DB = new DabatabseHandler();
    $res = $DB->get_row('select id, username, fullname, email, search_count from user_account where username = "' . $username . '" and password = "' . $password . '"');
    if ($res != false)
        echo json_encode($res);
    else
        echo -1;
} else {
    echo -1;
}
