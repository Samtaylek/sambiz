<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Pay for something</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="payment-container">
            <h2 class="header"> Pay for something</h2>
            <form action="checkout.php" method="post" autocomplete="off">
                <label for="item">
                    Product
                    <input type="text" name="product">
                </label>
                <label for="amount">
                    Price
                    <input type="text" name="price">
                </label>
                <input type="submit" value="Pay">
            </form>

            <p>You'll be taken to PayPal to complete your order.</p>
        </div>
    </body>
</html>