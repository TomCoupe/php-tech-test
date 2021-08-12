<?php

$path = $_POST['pfp'];
$userID = $_REQUEST['user_id'];

if ($path == '') {
    echo 'Error: path has been set to empty';
    return;
}

var_dump($userID);

