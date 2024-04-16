<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use application\models\Admin;


class MainController extends Controller {
    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function registrationAction()
    {
        $this->view->render('Регистрация');
    }

    public function authorizeAction()
    {
        $db = new Db();
        $user = $db->row("SELECT * FROM user WHERE login = '{$_POST['login']}'");

        if (empty($user)) {
            $this->view->redirect('login');
        }

        if ($user[0]['password'] === $_POST['password']) {
            $_SESSION['user'] = $user[0]['id'];
            $this->view->redirect('');
        } else {
            $this->view->redirect('login');
        }
    }

    public function createUserAction()
    {
        $db = new Db();
        $user = $db->row("SELECT * FROM user WHERE login = '{$_POST['login']}'");

        if (!empty($user)) {
            $this->view->redirect('login');
        }

        if ($_POST['password'] === $_POST['re-password']) {
            $db->row("INSERT INTO user VALUE (DEFAULT, 'name', 'number', 'email', 0, 0, 'role', '{$_POST['login']}', '{$_POST['password']}')");
            $_SESSION['user'] = $db->lastInsertId();;

            $this->view->redirect('');
        } else {
            $this->view->redirect('registration');
        }
    }

    public function logoutAction()
    {
        session_destroy();
        $this->view->redirect('login');
    }


    public function indexAction() {
        $db = new Db();
        $vars = [
            'cars' => $db->row('SELECT * FROM car')
        ];
        $this->view->render('Главная', $vars);
    }

    public function aboutAction() {
        $this->view->render('Обо мне');
    }

    public function contactAction() {
        if (!empty($_POST)) {
            if(!$this->model->contactValidate($_POST)) {
               $this->view->message('error', $this->model->error);
            }
            mail('gekebon642@rentaen.com', 'Сообщение из блогга от '.$_POST['name'], $_POST['text']);
            $this->view->message('success', 'форма отработала');
        }
        $this->view->render('Контакты');
    }

    public function carAction() {
        $adminModel = new Admin();
        $vars = [
            'data' => $adminModel->postData($this->route['id'])[0],
        ];
        $this->view->render('Машина', $vars);
    }

    public function filterAction() {
       echo json_encode($this->model->filterData());
    }

    public function profileAction() {
        $db = new Db();
        $vars = [
          'data' => $db->query('SELECT price, date FROM orders')
        ];
        $this->view->render('Профиль', $vars);
    }
}