<?php
use Invoice\Order;

require_once __DIR__ . '/../Model/Order.php';

function getHTMLPurchaseDataToPDF($result, $orderItemResult, $orderedDate, $due_date)
{
    ob_start();
    $invoiceModel = new Order();
    $invoiceResult = $invoiceModel->getInvoice($orderItemResult[0]["quote_id"]);
    ?>
    <html>

    <head>Receipt of Purchase -
        <?php echo $invoiceResult[0]["invoice_id"] . $invoiceResult[0]["invoice_no"]; ?>
    </head>

    <body>
        <div style="text-align: right;">
            <!-- <div style="font-size: 24px;color: #666;">INVOICE</div> -->
            #
            <?php echo $invoiceResult[0]["invoice_no"] . "-" . $invoiceResult[0]["invoice_id"]; ?><br>
        </div>
        <table style="line-height: 1.5;">
            <tr>
                <td><b>Sender:</b></td>
                <td style="text-align:right;"><b>Date:</b>
                    <?php echo $orderedDate; ?>
                </td>
            </tr>
            <tr>
                <td><b>Waggin' Wheels</b></td>
                <td style="text-align:right;"><b>Payment Due:</b>
                    <?php echo $due_date; ?>
                </td>
            </tr>
            <tr>
                <td>Tel: 9751 1740</td>
                <td style="text-align:right;"></td>
            </tr>
            <tr>
                <td>farrahwagginwheels@gmail.com</td>
                <td style="text-align:right;"></td>
            </tr><br>
            <tr>
                <td><b>Bill To:</b></td>
                <td style="text-align:right;"></td>
            </tr>
            <tr><td><b><?php echo $result[0]["first_Name"] . ' ' . $result[0]["last_Name"]; ?></b>
                </td>
                <td style="text-align:right;">
                </td>
            </tr>
            <?php $mobile = strval($result[0]["mobile"]); $arrMobile = str_split($mobile, 4); ?>
            <tr><td>Tel: <?php echo $arrMobile[0] . " " . $arrMobile[1]; ?>
                </td>
                <td style="text-align:right;">
                </td>
            </tr>
            <tr><td><?php echo $result[0]["email"]; ?>
                </td>
                <td style="text-align:right;">

                </td>
            </tr>
        </table>

        <div></div>
        <div style="border-bottom:1px solid #000;">
            <table style="line-height: 2; padding: 5px">
                <tr style="font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;">
                    <td style="border:1px solid #cccccc; width:370px;">Item</td>
                    <td style="text-align:right;border:1px solid #cccccc;width:100px">Subtotal ($)</td>
                </tr>

                <tr>
                    <td style="border:1px solid #cccccc;"><?php echo $invoiceResult[0]["description"]; ?>
                    </td>
                    <td style="text-align:right; border:1px solid #cccccc;">
                        <?php echo number_format($orderItemResult[0]["price"], 2); ?>
                    </td>
                </tr>

                <tr style="font-weight: bold;">
                    <td></td>
                    <td style="text-align:right;">Total ($)&nbsp;&nbsp;&nbsp;
                        <?php echo number_format($orderItemResult[0]["price"], 2); ?>
                    </td>
                </tr>
            </table>
        </div>
        <p><u>Note:</u><br />Amount shown is Singapore Dollars (SGD)</p>
        <br />
        <p>
            <u>Kindly make your payment to</u>:<br />
            1&#41; by PAYNOW to mobile number: 97511740<br />
            2&#41; by Bank Transfer: POSB Account No-126627572<br />
            3&#41; by our website with PayPal<br /><br/>
            <i>Disclaimer: If methods 1 or 2 are being used, please inform the admin and provide a screenshot of your payment upon interaction.</i>
        </p>

        <p>THANK YOU FOR YOUR BUSINESS!</p>
    </body>

    </html>

    <?php
    return ob_get_clean();
}
?>