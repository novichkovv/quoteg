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
        $this->generate(1);
        exit;
        $this->view('generate' . DS . 'index');
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
        exit;
    }
}