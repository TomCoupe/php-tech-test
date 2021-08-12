<?php
    require('User.php');
    $id = $_POST['id'];

    $userObj;

    if($id == '' || $id == null) {
        return;
    }

    require_once('mysqli_connect.php');
    $query = "SELECT * FROM users WHERE id = $id";
    $user = @mysqli_query($dbc, $query);

    while ($row = mysqli_fetch_assoc($user)) {
        if($row['id'] == $id) {
            $userObj = new User($row['name'], $row['email'], $row['phoneNumber'], $row['dateOfBirth'], $row['bio']);
            break;
        }
        return;
    }
    $userObj->deleteUser($id);

?>