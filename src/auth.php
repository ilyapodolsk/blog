<?php
    $error = false;
    if (isset($request->auth)) {
        $_SESSION['login'] = $request->login ?? '';
        if (isset($request->password) && is_string($request->password)) {
            $_SESSION['password'] = md5($request->password . SECRET); 
        }
        $error = true;
    }

    if (isset($request->logout)) {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        $error = false;
    }

    $login = $_SESSION['login'] ?? false;
    $password = $_SESSION['password'] ?? false;
    $auth_user = $db->getRowByWhere('users', '`login` = ? AND `password` = ?', [$login, $password]);
    if ($auth_user) {
        $error = false;
    }
?>