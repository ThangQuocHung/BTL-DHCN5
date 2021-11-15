<?php
require('./db.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $DB = new DabatabseHandler();
    $res = $DB->get_list('select id, song_key from user_music where u_id=' . $_GET['id']);
    if ($res != false)
        echo json_encode($res);
    else
        echo -1;
} else {
    echo -1;
}
