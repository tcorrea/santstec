<?php
    $userName = $systemProperties['system']['site']['auth']['user'];
    $password = $systemProperties['system']['site']['auth']['pass'];

    $cookieCrumbs = split("\.", $_COOKIE['authKey']);

    bindtextdomain("messages", _ENV_COMMONS_CLASSPATH.'protection'.DIRECTORY_SEPARATOR."locale");

    if(!is_array($cookieCrumbs) || md5($userName . $password . $cookieCrumbs[0]) != $cookieCrumbs[1]) {

        if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {

            if ($_POST['username'] != $userName || $_POST['password'] != $password) {
                header('Cache-Control: no-cache');
                header('Expires: -1');
                header('Pragma: no-cache');

                $smarty->assign('server', $_SERVER['SERVER_NAME']);
                $smarty->assign('msg', _('Invalid login details, please try again.'));
                $smarty->display(_ENV_COMMONS_CLASSPATH . 'protection' . DIRECTORY_SEPARATOR . 'loginForm.tpl');

                exit();

            } else {

                $salt = sprintf("%08x\n", mt_rand(0, 0x7FFFFFFF));
                try {
                    setcookie('authKey', $salt . '.' . md5($userName . $password . $salt), 0);
                }catch(Exception $e) {}
            }

        } else {
            header('Cache-Control: no-cache');
            header('Expires: -1');
            header('Pragma: no-cache');

            $smarty->assign('server', $_SERVER['SERVER_NAME']);
            $smarty->display(_ENV_COMMONS_CLASSPATH . 'protection' . DIRECTORY_SEPARATOR . 'loginForm.tpl');

            exit();
        }
    }
