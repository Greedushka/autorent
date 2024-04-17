<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Admin;


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
            $this->view->redirect('admin/add');
        }

        $this->view->render('Вход');
    }
    public function addAction(): void
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['img'])) {
                $fileName = rand() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $fileName);
                $_POST['img'] = $fileName;
            } else {
                $_POST['img'] = NULL;
            }

            $id = $this->model->postAdd($_POST);
            //$this->view->message('success', 'id: '.$id);
            $this->view->redirect('admin/cars');
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
        $cars = $this->model->getCars();
        $this->view->render('Машины', ['cars' => $cars]);
    }

    public function carAction(): void
    {
        $car = $this->model->getCar($this->route['id']);
        $this->view->render('Машина', ['car' => $car[0]]);
    }

    public function carSaveAction(): void
    {
        if (!empty($_FILES['img'])) {
            $fileName = rand() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $fileName);
            $_POST['img'] = $fileName;

            $car = $this->model->getCar($this->route['id']);
            unlink($_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $car[0]['img']);
        } else {
            $car = $this->model->getCar($this->route['id']);
            $_POST['img'] = $car[0]['img'];
        }

        $this->model->editCar($this->route['id'], $_POST);
        $this->view->redirect("admin/car/{$this->route['id']}");
    }

    public function carDeleteAction(): void
    {
        $car = $this->model->getCar($this->route['id']);
        unlink($_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $car[0]['img']);

        $this->model->delCar($this->route['id']);
        $this->view->redirect('admin/cars');
    }

    public function promoAction() : void
    {
        $promos = $this->model->getPromos();
        $this->view->render('Промокоды',  ['promos' => $promos]);
    }

    public function promoAddAction(): void
    {
        $this->model->addPromo($_POST);
        $this->view->redirect('admin/promo');
    }

    public function promoDeleteAction(): void
    {
        $this->model->delPromo($this->route['id']);
        $this->view->redirect('admin/promo');
    }

    public function addpostAction()
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['img'])) {
                $fileName = rand() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $fileName);
                $_POST['img'] = $fileName;
            } else {
                $_POST['img'] = NULL;
            }
            $this->model->addpost($_POST);
            $this->view->redirect('admin/posts');
        }
        $this->view->render('Добавить пост');
    }

    public function postsAction()
    {
        $posts = $this->model->getPosts();
        $this->view->render('Посты', ['posts' => $posts]);
    }

    public function postAction() {
        $adminModel = new Admin();
        $vars = [
            'data' => $adminModel->carData($this->route['id'])[0],
        ];
        $this->view->render('Пост', $vars);
    }
    public function postDeleteAction(): void
    {
        $post = $this->model->getPost($this->route['id']);
//        unlink($_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $post[0]['img']);

        $this->model->delPost($this->route['id']);
        $this->view->redirect('admin/posts');
    }

    public function postSaveAction(): void
    {
        if (!empty($_FILES['img'])) {
            $fileName = rand() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $fileName);
            $_POST['img'] = $fileName;

            $post = $this->model->getPost($this->route['id']);
//            unlink($_SERVER['DOCUMENT_ROOT'] . '/public/imgs/' . $post[0]['img']);
        } else {
            $post = $this->model->getPost($this->route['id']);
            $_POST['img'] = $post[0]['img'];
        }

        $this->model->editPost($this->route['id'], $_POST);
        $this->view->redirect("admin/post/{$this->route['id']}");
    }
}