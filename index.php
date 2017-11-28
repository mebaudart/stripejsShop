<?php
    session_start();
    $_SESSION['price'] = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Stripe</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" >
</head>
<body>
    <div class="container">
        <h1>Ma boutique</h1>
        <div class="row">
            <div class="col-md-4">
                <h2>Mon premier produit</h2>
                <div class="price" data-price="50">50€</div>
                <a href="javascript:void(0)" class="add-to-cart">Ajouter au panier</a>
            </div>
            <div class="col-md-4">
                <h2>Mon deuxième produit</h2>
                <div class="price" data-price="20">20€</div>
                <a href="javascript:void(0)" class="add-to-cart">Ajouter au panier</a>
            </div>
            <div class="col-md-4">
                <h2>Mon troisième produit</h2>
                <div class="price" data-price="15">15€</div>
                <a href="javascript:void(0)" class="add-to-cart">Ajouter au panier</a>
            </div>
        </div>
    </div>
    <div id="panier">
        <div class="container">
            <?php if(isset($_POST['stripeToken'])){ ?>
                <div class="alert-success">Paiement validé</div>
            <?php }
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            ?>
            <h3 class="total">
                Total : <span class="final-price">0.00 €</span>
            </h3>
            <form action="charge.php" method="post" id="payment-form">
                <div class="form-row">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <button>Submit Payment</button>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="js/script.js"></script>
</html>