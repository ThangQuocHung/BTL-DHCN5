<?php
require('./db.php');


$data = json_decode(file_get_contents('php://input'), true);
if (
    isset($data) && !empty($data)
) {
    if (
        isset($data["id"]) && !empty($data["id"]) &&
        isset($data["counts"]) && !empty($data["counts"])
    ) {
        // Tạo Mới Đối Tượng
        $DB = new DabatabseHandler();
        print_r($DB->insert("user_account", $data));
    }
    echo -1;
} else {
    echo -1;
}
