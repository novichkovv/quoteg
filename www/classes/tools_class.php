<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 26.05.2015
 * Time: 10:10
 */
class tools_class
{
    private $excel;

    public static  $months_rus = array(
        '01' => 'Январь',
        '02' => 'Февраль',
        '03' => 'Март',
        '04' => 'Апрель',
        '05' => 'Март',
        '06' => 'Июнь',
        '07' => 'Июль',
        '08' => 'Август',
        '09' => 'Сентябрь',
        '10' => 'Октябрь',
        '11' => 'Ноябрь',
        '12' => 'Декабрь',
    );

    /**
     * @param string $subject
     * @param string $message
     * @param string $to
     * @param string $from
     * @param string string $name
     * @return bool
     * @throws Exception
     * @throws phpmailerException
     */

    public static function mail($subject, $message, $to, $from = 'info@tvoydom-norilsk.ru', $name = 'Client')
    {
        require_once LIBS_DIR.'phpmailer/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->SetFrom($from, 'qcop.ru');
        $mail->AddAddress($to, $name);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        return $mail->Send();
    }

    public function excel()
    {
        require_once(LIBS_DIR . 'PHPExcel' . DS . 'PHPExcel.php');
        if($this->excel === null) {
            $excel = new PHPExcel();
            $this->excel = $excel;
            return $excel;
        } else {
            return $this->excel;
        }
    }

    public static function formatTime($seconds)
    {
        $sec = $seconds % 60;
        $sec = $sec < 10 ? '0' . $sec : $sec;
        $seconds = floor($seconds / 60);
        $min = $seconds % 60;
        $min = $min < 10 ? '0' . $min : $min;
        $hours = floor($seconds / 60);
        $hours = $hours < 10 ? '0' . $hours : $hours;
        return $hours . ':' . $min . ':' . $sec;
    }

    public static function checkImgUrl($url)
    {
        $headers = @get_headers($url);
        return strpos($headers[0], '200');
    }

    public static function readXLS($file)
    {
        require_once LIBS_DIR . 'PHPExcel' . DS . 'PHPExcel.php';
        $pExcel = PHPExcel_IOFactory::load($file);
        $tables = [];
        foreach ($pExcel->getWorksheetIterator() as $worksheet) {
            $tables[] = $worksheet->toArray();
        }
        return $tables;
    }

    /**
     * @param string $mode
     * @param string $format
     * @return mPDF
     */

    public function pdf($mode = 'BLANK', $format = 'A4', $default_font_size = 0, $default_font= 0, $margin_left = 15, $margin_right = 15, $margin_top = 16, $margin_bottom = 16, $margin_header = 9, $margin_footer = 9 )
    {
        require_once(LIBS_DIR . 'mpdf60' . DS . 'mpdf.php');
        $mpdf = new mPDF($mode, $format, $default_font_size, $default_font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer);
        return $mpdf;
    }

}