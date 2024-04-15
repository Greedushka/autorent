<?php

namespace application\controllers;

use application\core\Controller;


class AdminController extends Controller {

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';

    }

    public function loginAction()
    {

        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/add');
        }

        if (!empty($_POST)) {
            if(!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('admin/add');
        }

        $this->view->render('Вход');
    }
    public function addAction(): void
    {
        if (!empty($_POST)) {
//            if (!$this->model->postValidate($_POST, 'add')) {
//                $this->view->message('error', $this->model->error);
//            }
            $id = $this->model->postAdd($_POST);
//            if(!id) {
//                $this->view->message('error', 'id нет');
//            }
//            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
            $this->view->message('success', 'id: '.$id);
        }
        $this->view->render('Добавить машину');
    }
    public function editAction() {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }
            $this->view->message('success', 'OK');
        }
        $this->view->render('Редактировать пост');
    }
    public function deleteAction() {
        if(!$this->model->isPostExists($this->route['id'])){
            $this->view->erorCode(404);
        }
        $this->model->postDelete($this->route['id']);
        $this->view->redirect('admin/cars');
    }
    public function logoutAction() {
        unset($_SESSION['admin']);
        session_destroy();
        $this->view->redirect('admin/login');
    }
    public function carsAction() {
        $this->view->render('Машины');
    }

}