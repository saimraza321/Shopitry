<?php
return
    [
    'easypay' => 
        [
        'STORE_ID' => "",
        'HASH_KEY' => "",

        // post back urls
        'POST_BACK_URL1' => 'http://127.0.0.1:8000/checkout-confirm',
        'POST_BACK_URL1' => 'http://127.0.0.1:8000/paymentStatus',

        // live

        'TRANSACTION_POST_URL1' => 'https://easypaystg.easypaisa.com.pk/easypay/index.jsf/',
        'TRANSACTION_POST_URL2' => 'https://easypaystg.easypaisa.com.pk/easypay/confirm.jsf/',
        ]
    ];