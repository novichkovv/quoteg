<?php
/**
 * Created by PhpStorm.
 * company: asus1
 * Date: 08.06.2016
 * Time: 2:44
 */
class companies_controller extends controller
{
    public function index()
    {
        if(isset($_POST['delete_company_btn'])) {
            $this->model('companies')->deleteById($_POST['company_id']);
            header('Location: ' . SITE_DIR . 'companies/');
            exit;
        }
        $this->render('companies', $this->model('companies')->getAll());
        $this->view('companies' . DS . 'index');
    }

    public function add()
    {
        if(isset($_POST['save_company_btn'])) {
            $company = $_POST['company'];
            if($_GET['id']) {
                $company['id'] = $_GET['id'];
            }
            $company['id'] = $this->model('companies')->insert($company);
            $contact = $_POST['contact'];
            $contact['companyID'] = $company['id'];
            $this->model('companies_contacts')->insert($contact);
            header("Location: " . SITE_DIR . "companies/");
            exit;
        }
        if($_GET['id']) {
            $this->render('company', $this->model('companies')->getById($_GET['id']));
            $this->render('contact', $this->model('companies_contacts')->getByField('companyId', $_GET['id']));
        }
        $this->view('companies' . DS . 'add');
    }
}