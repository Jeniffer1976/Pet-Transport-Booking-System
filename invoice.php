<?php
use Invoice\Order;

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$id = $_GET["quote_id"];

$orderItemResult = $orderModel->getQuote($id);
$result = $orderModel->getPetOwners($orderItemResult[0]["owner_id"]);

if (! empty($result)) {
    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);
}