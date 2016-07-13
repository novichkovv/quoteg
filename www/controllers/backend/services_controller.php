<?php
/**
 * Created by PhpStorm.
 * service: asus1
 * Date: 08.06.2016
 * Time: 2:44
 */
class services_controller extends controller
{
    public function index()
    {
        if(isset($_POST['delete_service_btn'])) {
            $this->model('services')->deleteById($_POST['service_id']);
            header('Location: ' . SITE_DIR . 'services/');
            exit;
        }
        $this->render('services', $this->model('services')->getAll());
        $this->view('services' . DS . 'index');
    }

    public function add()
    {
        if(isset($_POST['save_service_btn'])) {
            $service = $_POST['service'];
            if($_GET['id']) {
                $service['id'] = $_GET['id'];
            } else {
                $service['create_date'] = date('Y-m-d H:i:s');
            }
            $service['id'] = $this->model('services')->insert($service);
            header("Location: " . SITE_DIR . "services/");
            exit;
        }
        if($_GET['id']) {
            $this->render('service', $this->model('services')->getById($_GET['id']));
        }
        $this->render('units', $this->model('service_unites')->getAll());
        $this->view('services' . DS . 'add');
    }
}