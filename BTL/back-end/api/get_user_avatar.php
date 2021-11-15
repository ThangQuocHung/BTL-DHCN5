<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

if (isset($_GET["email"]) && !empty($_GET["email"])) {
    echo 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($_GET["email"]))).'?s=256';
} else
    echo -1;
