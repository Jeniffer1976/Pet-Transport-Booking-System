<?php

include('loginFunctions.php');

use Invoice\Order;
use Twilio\Rest\Client;

require_once 'vendor/autoload.php';

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$id = $_GET["quote_id"];

$orderItemResult = $orderModel->getQuote($id);
$result = $orderModel->getPetOwners($orderItemResult[0]["owner_id"]);

$invoiceResult = $orderModel->getInvoice($orderItemResult[0]["quote_id"]);
$messageStatus = $invoiceResult[0]['msgStatus'];
$invoice_id = $invoiceResult[0]['invoice_id'];

if (!empty($result)) {
    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);

    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $recipientPhoneNo = "whatsapp:+65" . strval($result[0]['mobile']);
    //$body_msg = 'Test message';
    //$body_msg = "Your quote has been reviewed and accepted by us. Here are the details of your invoice: https://f30d-121-6-10-155.ngrok-free.app/Pet-Transport-Booking-System/invoice.php?quote_id=" . strval($id);
    $body_msg = 'Your quote from Waggin Wheels has been reviewed and accepted. Ensure you pay by the date stated in the invoice. Here are the invoice details: https://f30d-121-6-10-155.ngrok-free.app/Pet-Transport-Booking-System/invoice.php?quote_id=' . strval($id);

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
                    //"body" => "Your quote has been reviewed and accepted by us. Here are the details of your invoice: https://f30d-121-6-10-155.ngrok-free.app/Pet-Transport-Booking-System/invoice.php?quote_id=".$id
                    //"body" => 'Your Yummy Cupcakes Company order of 1 dozen frosted cupcakes has shipped and should be delivered on July 10, 2019. Details: http://www.yummycupcakes.com/'
                    "body" => $body_msg
                )
            );

        print($message->sid);

        $updateMsgStat = "UPDATE invoice SET msgStatus='SEND' WHERE invoice_id = '$invoice_id'";
        $msgStatUpdateStatus = mysqli_query($link, $updateMsgStat);
    }

}