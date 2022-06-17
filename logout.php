<?php

session_start();

$username = $_SESSION['username'];



session_destroy();

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['fullname']);
unset($_SESSION['roleid']);
unset($_SESSION['rolename']);
unset($_SESSION['staffid']);
unset($_SESSION['unitofficeid']);
unset($_SESSION['role_data']);

echo json_encode(
    array(
        'status' => true,
        'username' => $username
    )
    
);

?>
