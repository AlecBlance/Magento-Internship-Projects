<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title></title>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");
            #email table:nth-of-type(2),
            #email table:nth-of-type(3) {
                
            }
        </style>
    </head>

    <body style="background-color: #f2f4f5;">
        <div id="email" style="width: 600px; background-color: white;
                margin: 0 auto;
                border-radius: 14px;
                padding-bottom: 25px;">
            <!-- Header -->
            <table style="border-top-left-radius: 14px;
                border-top-right-radius: 14px;
                background-color: #1d202b;
                padding: 15px;" role="presentation" border="0" cellspacing="0" width="100%">
                <tr>
                    <td>
                        <h1 style='font-family: "Karla", sans-serif;color: white;text-align: center;'>WARRANTY</h1>
                    </td>
                </tr>
            </table>

            <!-- Body -->
            <table style="margin: 25px;
                width: fit-content;" role="presentation" border="0" cellspacing="0" width="100%">
                <tr>
                    <td>Hello <?=$this->name?>,</td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                    <td>
                        We've sent this email to let you know that we've
                        provided a <b>warranty</b> for the following item:
                    </td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                    <td><b>Order #:</b> <?=$this->order_id?></td>
                </tr>
                <tr>
                    <td><b>Product name:</b> <?=$this->product[0]->name?></td>
                </tr>
                <tr>
                    <td><b>Product SKU:</b> <?=$this->product[0]->product_sku?></td>
                </tr>
                <tr>
                    <td><b>Warranty Info:</b> <?=$this->message?></td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                    <td>
                        <p>
                            If you have any inquiry, please don't hesitate to
                            reply to this email. Thank you so much for your
                            continuous support.
                        </p>
                    </td>
                </tr>
            </table>

            <!-- Footer -->
            <table style="margin: 25px;
                width: fit-content;" role="presentation" border="0" cellspacing="0" width="100%">
                <tr>
                    <td>Kind regards,</td>
                </tr>
                <tr>
                    <td><br /></td>
                </tr>
                <tr>
                    <td>Alec Blance</td>
                </tr>
                <tr>
                    <td><b>Administrator</b></td>
                </tr>
            </table>
        </div>
    </body>
</html>
