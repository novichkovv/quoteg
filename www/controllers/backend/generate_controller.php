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
        if(isset($_POST['generate_btn'])) {
            $quote = $_POST['quote'];
            $total = 0;
            if($quote['services']) {
                foreach ($quote['services'] as $k => $service) {
                    $service['total'] = $service['rate'] * $service['qty'];
                    $total += $service['total'];
                    $quote['services'][$k] = $service;
                }
                $this->render('total', $total);
            }
            $row = [
                'creator' => registry::get('user')['id'],
                'create_date' => date('Y-m-d H:i:s'),
                'company_name' => $quote['company_name'],
                'project_name' => $quote['project_name'],
                'total' => $total,
                'quote_date' => $quote['date'],
                'address' => $quote['address'],
                'city' => $quote['city'],
                'state' => $quote['state'],
                'zip' => $quote['zip'],
                'phone_number' => $quote['phone'],
                'fax' => $quote['fax'],
                'mobile' => $quote['mobile'],
                'direct' => $quote['direct'],
                'attn' => $quote['attn'],
                'client_job_no' => $quote['client_job_no'],
                'project_type' => $quote['project_type'],
                'po_no' => $quote['po_no'],
                'expiration_date' => $quote['expiration_date'],
                'hourly_basis' => $quote['hourly_basis']
            ];
            if($quote['id']) {
                $row['id'] = $quote['id'];
                unset($quote['create_date']);
            }
            $quote['id'] = $this->model('quotes')->insert($row);
            $this->model('quote_services')->delete('quote_id', $quote['id']);
            if($quote['services']) {
                foreach ($quote['services'] as $v) {
                    $v['quote_id'] = $quote['id'];
                    unset($v['id']);
                    $this->model('quote_services')->insert($v);
                }
                $quote['services'] = [];
                foreach ($this->model('quote_services')->getByField('quote_id', $quote['id'], true, 'id') as $k => $service) {
                    $quote['services'][$service['scope']]['services'][] = $service;
                    if(!$quote['services'][$service['scope']]['scope_total']) {
                        $quote['services'][$service['scope']]['scope_total'] = $service['total'];
                    } else {
                        $quote['services'][$service['scope']]['scope_total'] += $service['total'];
                    }
                }
            }

            $company = [];
            $company['id'] = $_POST['company_id'];
            $company['company_name'] = $quote['company_name'];
            $company['address'] = $quote['address'];
            $company['city'] = $quote['city'];
            $company['state'] = $quote['state'];
            $company['zip'] = $quote['zip'];
            $company['phone_number'] = $quote['phone'];
            $this->model('companies')->insert($company);
            if(!$_POST['quote']['id']) {
                header('Location: ' . SITE_DIR . 'generate/?id=' . $quote['id'] . '#generate');
                exit;
            } else {
                if(!$quote['revision']) {
                    $this->model('quotes')->insert(['id' => $quote['id'], 'revision' => 1]);
                }
            }
            $this->render('quote', $quote);
            $this->generate($_POST['template_no'], $quote['id'], $total);
        }
//        if(!$visibility = $this->model('quote_user_groups')->getById(registry::get('user')['user_group_id'])['quote_visibility']) {
//            $companies = $this->model('companies')->getByField('id', registry::get('user')['company_id'], true);
//        } else {
//
//        }
        $companies = $this->model('companies')->getAll('company_name');
        if(count($companies) == 1) {
            $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);

        } else {
            $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);
        }
        $this->render('templates', $this->model('templates')->getAll());

        if(!empty($_GET['id'])) {
            $quote = $this->model('quotes')->getById($_GET['id']);
            foreach ($comp as $k => $v) {
                $comp[$k] = $quote[$k];
            }
            $quote['services'] = $this->model('quote_services')->getByField('quote_id', $quote['id'], true);

            $this->render('quote', $quote);
        }
        $comp['phone_number'] = strtr($comp['phone_number'], [
            ' ' => '',
            '(' => '',
            ')' => '-',
            '.' => '-'
        ]);
        $this->render('comp', $comp);
        $this->render('types', $this->model('project_types')->getAll());
        $this->render('services', $this->model('services')->getAll());
        $this->render('units', $this->model('service_unites')->getAll());
        $this->render('companies', $companies);
        $this->render('states', $this->model('states')->getAll('short_name'));
        $this->view('generate' . DS . 'index');
    }

    public function pdf()
    {
        if(isset($_POST['generate_btn'])) {
            $quote = $_POST['quote'];
            $total = 0;
            if($quote['services']) {
                foreach ($quote['services'] as $k => $service) {
                    $service['total'] = $service['rate'] * $service['qty'];
                    $total += $service['total'];
                    $quote['services'][$k] = $service;
                }
                $this->render('total', $total);
            }
            $row = [
                'creator' => registry::get('user')['id'],
                'create_date' => date('Y-m-d H:i:s'),
                'company_name' => $quote['company_name'],
                'project_name' => $quote['project_name'],
                'total' => $total,
                'quote_date' => $quote['date'],
                'address' => $quote['address'],
                'city' => $quote['city'],
                'state' => $quote['state'],
                'zip' => $quote['zip'],
                'phone_number' => $quote['phone'],
                'fax' => $quote['fax'],
                'mobile' => $quote['mobile'],
                'direct' => $quote['direct'],
                'attn' => $quote['attn'],
                'client_job_no' => $quote['client_job_no'],
                'project_type' => $quote['project_type'],
                'po_no' => $quote['po_no'],
                'expiration_date' => $quote['expiration_date'],
                'hourly_basis' => $quote['hourly_basis']
            ];
            if($quote['id']) {
                $row['id'] = $quote['id'];
                unset($quote['create_date']);
            }
            $quote['id'] = $this->model('quotes')->insert($row);
            $this->model('quote_services')->delete('quote_id', $quote['id']);
            if($quote['services']) {
                foreach ($quote['services'] as $v) {
                    $v['quote_id'] = $quote['id'];
                    unset($v['id']);
                    $this->model('quote_services')->insert($v);
                }
                $quote['services'] = [];
                foreach ($this->model('quote_services')->getByField('quote_id', $quote['id'], true, 'id') as $k => $service) {
                    $quote['services'][$service['scope']]['services'][] = $service;
                    if(!$quote['services'][$service['scope']]['scope_total']) {
                        $quote['services'][$service['scope']]['scope_total'] = $service['total'];
                    } else {
                        $quote['services'][$service['scope']]['scope_total'] += $service['total'];
                    }
                }
            }

            $company = [];
            $company['id'] = $_POST['company_id'];
            $company['company_name'] = $quote['company_name'];
            $company['address'] = $quote['address'];
            $company['city'] = $quote['city'];
            $company['state'] = $quote['state'];
            $company['zip'] = $quote['zip'];
            $company['phone_number'] = $quote['phone'];
            $this->model('companies')->insert($company);
            if(!$_POST['quote']['id']) {
                header('Location: ' . SITE_DIR . 'generate/?id=' . $quote['id'] . '#generate');
                exit;
            } else {
                if(!$quote['revision']) {
                    $this->model('quotes')->insert(['id' => $quote['id'], 'revision' => 1]);
                }
            }
            $this->render('quote', $quote);
            $this->generate($_POST['template_no'], $quote['id'], $total, true);
            header('Location: ' . SITE_DIR . 'generate/pdf/?id=' . $_GET['id']);
            exit;
        } else {
            $contract_file = ROOT_DIR . 'uploads' . DS . $_GET['id'] . '.pdf';
            header("Content-Disposition:inline;filename=Proposal.pdf");
            header("Content-type:application/pdf");
            readfile($contract_file);
            exit;
        }
    }

    public function pdf_na()
    {
        $this->pdf();
    }

    public function index_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_quote_form":
                if(!file_exists(TEMPLATE_DIR . 'generate' . DS . 'forms' . DS . $_POST['template_no'] . '.php')) {
                    echo json_encode(array('status' => 2));
                    exit;
                }
                if(!$visibility = $this->model('quote_user_groups')->getById(registry::get('user')['user_group_id'])['quote_visibility']) {
                    $companies = $this->model('companies')->getByField('id', registry::get('user')['company_id'], true);
                } else {
                    $companies = $this->model('companies')->getAll('company_name');
                }
                if(count($companies) == 1) {
                    $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);

                } else {
                    $comp = $this->model('companies')->getCompany($companies[array_keys($companies)[0]]['id']);
                }
                $comp['phone_number'] = strtr($comp['phone_number'], [
                    ' ' => '',
                    '(' => '',
                    ')' => '-',
                    '.' => '-'
                ]);
                $this->render('comp', $comp);
                $this->render('types', $this->model('project_types')->getAll());
                $this->render('services', $this->model('services')->getAll());
                $template = $this->fetch('generate' . DS . 'forms' . DS . $_POST['template_no']);
                echo json_encode(array('status' => 1, 'template' => $template));
                exit;
                break;

            case "get_service_field":
                $this->render('units', $this->model('service_unites')->getAll());
                $this->render('service', $this->model('services')->getById($_POST['service_id']));
                $this->render('count', $_POST['count']);
                echo json_encode(array('status' => 1, 'template' => $this->fetch('generate' . DS . 'ajax' . DS . 'service')));
                exit;
                break;

            case "get_company":
                echo json_encode($this->model('companies')->getCompany($_POST['company_id']));
                exit;
                break;

            case "save_type":
                if(!$this->model('project_types')->getByField('type_name', $_POST['val'])) {
                    $this->model('project_types')->insert(['type_name' => $_POST['val']]);
                }
                exit;
                break;
        }
    }

    private function generate($template, $id, $no_output = false)
    {
        $pdf = $this->tools()->pdf('BLANK', 'A4', 0,0,8,8,35,30);
        $folder = 'generate' . DS . 'pdf' . DS . $template . DS;
        $header = $this->fetch($folder . 'header');
        $pdf->SetHTMLHeader($header);
        $pdf->SetHTMLFooter($this->fetch($folder. 'footer'));
        $pdf->writeHTML(file_get_contents(TEMPLATE_DIR . $folder . 'style.css'),1);
        $content = $this->fetch($folder . 'body');
        $pdf->writeHTML($content, 2);
        $contract_file = ROOT_DIR . 'uploads' . DS . $id . '.pdf';
        $pdf->Output($contract_file, 'F');
        if($no_output) {
            header("Content-Disposition:inline;filename=Proposal.pdf");
            header("Content-type:application/pdf");
            readfile($contract_file);
            exit;
        }

    }
}