<?php
/**
 * Created by PhpStorm.
 * project_type: asus1
 * Date: 08.06.2016
 * Time: 2:44
 */
class project_types_controller extends controller
{
    public function index()
    {
        if(isset($_POST['delete_project_type_btn'])) {
            $this->model('project_types')->deleteById($_POST['project_type_id']);
            header('Location: ' . SITE_DIR . 'project_types/');
            exit;
        }
        $this->render('project_types', $this->model('project_types')->getAll());
        $this->view('project_types' . DS . 'index');
    }

    public function add()
    {
        if(isset($_POST['save_project_type_btn'])) {
            $project_type = $_POST['project_type'];
            if($_GET['id']) {
                $project_type['id'] = $_GET['id'];
            }
            $project_type['id'] = $this->model('project_types')->insert($project_type);
            header("Location: " . SITE_DIR . "project_types/");
            exit;
        }
        if($_GET['id']) {
            $this->render('project_type', $this->model('project_types')->getById($_GET['id']));
        }
        $this->view('project_types' . DS . 'add');
    }
}