<?php

if(isset($_POST['price']) && !empty($_POST['price'])) {
    session_start();
    $price = $_POST['price'];

    if(is_float($price)){
        if(is_float($price*10)){
            $_SESSION['price'] = $_POST['price'];
        }else{
            $_SESSION['price'] = $_POST['price']*10;
        }
    }else{
        $_SESSION['price'] = $_POST['price']*100;
    }

    echo 'success';
}else{
    echo 'error';
}