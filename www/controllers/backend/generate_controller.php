<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 22.06.2016
 * Time: 23:18
 */
class generate_controller extends controller
{
    public function index()
    {
//        $this->generate(1);
//        exit;
        if(isset($_POST['generate_btn'])) {
            $quote = $_POST['quote'];
            $quote['id'] = $this->model('quotes')->insert([
                'creator' => registry::get('user')['id'],
                'create_date' => date('Y-m-d H:i:s')
            ]);
            if($quote['services']) {
                $total = 0;
                foreach ($quote['services'] as $k => $service) {
                    $serv = $this->model('services')->getById($service['id']);
                    $service['service_name'] = $serv['service_name'];
                    $service['rate'] = $serv['rate'];
                    $service['description'] = $serv['description'];
                    $service['total'] = $service['rate'] * $service['qty'];
                    $total += $service['total'];
                    $quote['services'][$k] = $service;
                }
                $this->render('total', $total);
            }
            $this->render('quote', $quote);
            $this->generate($_POST['template_no']);
        }
        if(!$visibility = $this->model('quote_user_groups')->getById(registry::get('user')['user_group_id'])['quote_visibility']) {
            $companies = $this->model('companies')->getByField('id', registry::get('user')['company_id'], true);
//            foreach ($this->model('companies')->getAll() as $company) {
//                if($company['id'] == registry::get('user')['company_id']) {
//                    $companies[] = $company;
//                }
//            }
        } else {
            $companies = $this->model('companies')->getAll('company_name');
        }
        if(count($companies) == 1) {
            $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);

        } else {
            $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);
        }
        $this->render('comp', $comp);
        $this->render('services', $this->model('services')->getAll());
        $this->render('companies', $companies);
        $this->view('generate' . DS . 'index');
    }

    public function index_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_quote_form":
                if(!file_exists(TEMPLATE_DIR . 'generate' . DS . 'forms' . DS . $_POST['template_no'] . '.php')) {
                    echo json_encode(array('status' => 2));
                    exit;
                }
                $template = $this->fetch('generate' . DS . 'forms' . DS . $_POST['template_no']);
                echo json_encode(array('status' => 1, 'template' => $template));
                exit;
                break;

            case "get_service_field":
                $this->render('service', $this->model('services')->getById($_POST['service_id']));
                $this->render('count', $_POST['count']);
                echo json_encode(array('status' => 1, 'template' => $this->fetch('generate' . DS . 'ajax' . DS . 'service')));
                exit;
                break;
        }
    }

    private function generate($template)
    {
        $pdf = $this->tools()->pdf('BLANK', 'A4', 0,0,8,8,35,30);
        $folder = 'generate' . DS . 'pdf' . DS . $template . DS;
        $header = $this->fetch($folder . 'header');
        $pdf->SetHTMLHeader($header);
        $pdf->SetHTMLFooter($this->fetch($folder. 'footer'));
        $pdf->writeHTML(file_get_contents(TEMPLATE_DIR . $folder . 'style.css'),1);
        $content = $this->fetch($folder . 'body');
        $pdf->writeHTML($content, 2);
        $tmp_name = mktime();
        $contract_file = ROOT_DIR . 'tmp' . DS . $tmp_name . 'contract.pdf';
        $pdf->Output($contract_file, 'F');
        header("Content-type:application/pdf");
        readfile($contract_file);
        unlink($contract_file);
        exit;
    }
}