<?php
session_start();
$new_price = $_SESSION['price'];

include('vendor/stripe/stripe-php/init.php');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("pk_test_NI38HEe8r0Xyx8i4Ax5vSImA");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form
if(!isset($_POST['stripeToken'])){
    header('Location:index.php');
}
$token = $_POST['stripeToken'];

// Charge the user's card:
$charge = \Stripe\Charge::create(array(
    "amount" => $new_price,
    "currency" => "eur",
    "description" => "Example charge",
    "source" => $token,
));
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
        <h1>Paiement accepté ! Merci pour votre confiance</h1>
        <h2>Montant de votre paiement : <?= $new_price/100; ?> €</h2>
    </div>
</body>
</html>
