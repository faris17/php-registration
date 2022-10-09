<?php

if (isset($_POST['submitLogin'])) {
    $username = strtolower(trim($_POST['username']));
    $newPassword = md5($_POST['password']);

    $result = $user->getUser($username, $newPassword);
    if (!$result) {
        echo '<div class="alert alert-danger" role="alert">User Not Found</div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        header('Location: ' . baseUrl . '?page=viewRegister');
    }
}
