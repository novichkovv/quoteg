<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 29.08.2015
 * Time: 0:10
 */
class index_controller extends controller
{
    public function index()
    {
        if(isset($_POST['download_id'])) {
            header("Content-type:application/pdf");
            readfile(ROOT_DIR . 'uploads' . DS . $_POST['download_id'] . '.pdf');
            exit;
        }
        $this->render('statuses', $this->model('quote_statuses')->getAll());
        $this->view('index' . DS . 'index');
    }

    public function index_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_quotes":
                $params = [];
                $params['table'] = 'quotes q';
                $params['select'] = [
                    'q.id',
                    'qs.status_name',
                    'DATE(q.create_date)',
                    'CONCAT(u.user_name, " ", u.user_surname)',
                    'CONCAT("
                    <a class=\"btn btn-outline green change_status\" href=\"#status_modal\" data-toggle=\"modal\" data-id=\"",q.id,"\">
                        Change Status
                    </a>
                    <button type=\"button\" class=\"btn btn-outline blue download\"   data-id=\"",q.id,"\"><i class=\"fa fa-download\"></i> Download</button>
                    ")'
                ];
                $params['join']['quote_statuses'] = [
                    'as' => 'qs',
                    'on' => 'q.status_id = qs.id'
                ];
                $params['join']['quote_users'] = [
                    'as' => 'u',
                    'on' => 'q.creator = u.id'
                ];
                if(!$this->model('quote_user_groups')->getById(registry::get('user')['user_group_id'])['quote_visibility']) {
                    $params['where']['creator'] = [
                        'sign' => '=',
                        'value' => registry::get('user')['id']
                    ];
                }
                $params['order'] = 'id DESC';
                echo json_encode($this->getDataTable($params));
                exit;
                break;

            case "change_status":
                $this->model('quotes')->insert($_POST['status']);
                echo json_encode(array('status' => 1));
                exit;
                break;
        }
    }

    public function index_na()
    {
        $this->addStyle('backend/theme/login_form');
        $this->view_only('common' . DS . 'system_header');
        $this->view_only('index' . DS . 'login_form');
        $this->view_only('common' . DS . 'system_footer');
    }
}