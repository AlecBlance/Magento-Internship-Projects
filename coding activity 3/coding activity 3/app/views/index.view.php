<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Warranty Form</title>
        <link rel="stylesheet" href="assets/css/stylesheet.css" />
    </head>
    <body>
        <div class="warranty_form">
            <div class="header">
                <h1>Warranty Form</h1>
                <p>Gives warranty to products purchased by customers. Customized warranty information is provided.</p>
            </div>
            <form class="form_input" action="" method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" autocomplete="off">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off">
                <div>
                    <div>
                        <label for="order_id">Order #</label>
                        <input name="order_id" type="text" id="order_id" autocomplete="off">
                    </div>
                    <div>
                        <label for="product_sku">Product SKU</label>
                        <input name="product_sku" type="text" id="product_sku" autocomplete="off">
                    </div>
                </div>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" autocomplete="off"></textarea>
                <p class="result" hidden></p>
                <input type="submit" name="submit" value="Submit" >
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
