<?php
use Invoice\Config;
use Invoice\Order;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__ . '/../lib/Config.php';

$config = new Config();
// Include the main TCPDF library (search for installation path).
require_once __DIR__ . '/../vendor/tecnickcom/tcpdf/tcpdf.php';


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo.png';
        $this->Image($image_file, 20, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', '4', 40);
        // Title
        $html = '<div style="text-align: right;">
        <div style="font-size: 25px;color: #666;">INVOICE</div>
        </div>';
        $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);

    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

class PDFService
{
    function generatePDF($result, $orderItemResult)
    {
        require_once __DIR__ . '/../vendor/tecnickcom/tcpdf/tcpdf.php';
        require_once('./vendor/autoload.php');
        $invoiceModel = new Order();
        $invoiceResult = $invoiceModel->getInvoice($orderItemResult[0]["quote_id"]);

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        $pdf->SetHeaderData(
            '',
            PDF_HEADER_LOGO_WIDTH,
            '',
            '',
            array(
                0,
                0,
                0
            ),
            array(
                255,
                255,
                255
            )
        );

        $pdf->SetTitle('Invoice - ' . $invoiceResult[0]["invoice_no"] . "-" . $invoiceResult[0]["invoice_id"]);
        $pdf->SetMargins(20, 35, 20, true);
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->SetFont('helvetica', '', 11);
        $pdf->AddPage();
        $orderedDate = date('d F Y', strtotime($invoiceResult[0]["invoice_date"]));
        $due_date = date("d F Y", strtotime('+' . Config::TERMS . 'days', strtotime($orderedDate)));

        require_once __DIR__ . '/../Template/purchase-invoice-template.php';
        $html = getHTMLPurchaseDataToPDF($result, $orderItemResult, $orderedDate, $due_date);
        $filename = "Invoice-" . $result[0]["order_invoice"];
        $pdf->writeHTML($html, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output($filename . '.pdf', 'I');
    }
}
?>