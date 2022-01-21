<?php
require('./db.php');
$data = json_decode(file_get_contents('php://input'), true);
if (
    isset($data) && !empty($data)
) {
    $username = $data["username"];
    // Tạo Mới Đối Tượng
    $DB = new DabatabseHandler();
    $res = $DB->get_row('select count(*) from user_music where username = "' . $username);
    if ($res != false)
        echo json_encode($res);
    else
        echo -1;
} else {
    echo -1;
}
