<?php

namespace MyApp\Controllers;

use MyApp\Auth;
use MyApp\Models\History;
use MyApp\Models\Users;

class AccountController extends Controller
{
    public function actionLogin()
    {
        $error = false;

        if (isset($_POST['login'])) {
            if (Users::check($_POST['login'], $_POST['pwd'])) {
                Auth::login($_POST['login']);
                $this->redirect('/account');
            } else {
                $error = true;
            }
        }

        $this->render('account/login.twig', [
            'error' => $error,
        ]);
    }

    public function actionLogout()
    {
        Auth::logout();
        $this->redirect('/');
    }


    public function actionIndex()
    {
        if (!($user = Auth::getUser())) {
            $this->redirect('/account/login');
        }

        $history = History::getLast($user['id']);

        $this->render('account/index.twig', [
            'history' => $history,
        ]);
    }

    public function actionSettings()
    {
        echo 'Users settings';
    }

    public function actionPassword()
    {
        echo 'Users change pwd page';
    }
}