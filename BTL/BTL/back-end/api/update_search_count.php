<?php
require('./db.php');


if (
    isset($_GET['id']) && !empty($_GET['id'])
) {
    // Tạo Mới Đối Tượng
    $DB = new DabatabseHandler();
    $search_count = $DB->get_row('select search_count from user_account')['search_count'];
    print_r($DB->update('user_account', array('search_count' => $search_count + 1), 'id=' . $_GET['id']));
} else {
    echo -1;
}
