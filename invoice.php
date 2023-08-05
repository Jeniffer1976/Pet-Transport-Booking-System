<?php

include('dbFunctions.php');

use Invoice\Order;
use Twilio\Rest\Client;

require_once 'vendor/autoload.php';

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$id = $_GET["quote_id"];

$orderItemResult = $orderModel->getQuote($id);
$result = $orderModel->getPetOwners($orderItemResult[0]["owner_id"]);
$recipientPhoneNo = "whatsapp:+65" . strval($result[0]['mobile']);

$invoiceResult = $orderModel->getInvoice($orderItemResult[0]["quote_id"]);
$messageStatus = $invoiceResult[0]['msgStatus'];
$invoice_id = $invoiceResult[0]['invoice_id'];

if (!empty($result)) {
    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);

    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $account_sid = "ACa8bd31122a50ac8ddb1f4b4fbe20ac03";
    $token = "8bcd08290de197e76d1981654aee9734";
    $twilio = new Client($account_sid, $token);

    if ($messageStatus == 'NOT SEND') {
        $message = $twilio->messages
            ->create(
                $recipientPhoneNo,
                // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => "Your quote has been reviewed and accepted by us. Here are the details of your invoice: https://f30d-121-6-10-155.ngrok-free.app/Pet-Transport-Booking-System/invoice.php?quote_id=" . $id
                )
            );

        print($message->sid);

        $updateMsgStat = "UPDATE invoice SET msgStatus='SEND' WHERE invoice_id = '$invoice_id'";
        $msgStatUpdateStatus = mysqli_query($link, $updateMsgStat);
    }

}