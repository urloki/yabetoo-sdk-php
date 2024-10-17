<?php


require 'vendor/autoload.php';

use Yabetoo\Yabetoo;

$yabetoo = new Yabetoo('sk_test_4WRT22f4upSTOGvTBjYqYN3ApYKmmSmVYZfT33csh8USJ76Uo2MdUoel');

try {
    // Exemple d'utilisation : Créer un paiement
    /*$payment = $yabetoo->payments->create([
        'amount' => 200000,
        'currency' => 'xaf',
        'description' => 'Test payment',
    ]);
    echo 'Payment created: ' . json_encode($payment) . PHP_EOL;

    $confirm = $yabetoo->payments->confirm($payment['id'], [
        "client_secret" => $payment['clientSecret'],
        "first_name" => "Loumbou",
        "last_name" => "Scoty",
        "email" => "scott@artkodes.com",
        "payment_method_data" => [
            "type" => "momo",
            "momo" => [
                "country" => "cg",
                "msisdn" => "242123456789",
                "operator_name" => "mtn"
            ],
        ],
    ]);
    echo 'Payment confirmed: ' . json_encode($confirm) . PHP_EOL;*/

    /*$list = $yabetoo->payments->list();
    echo 'Payments list: ' . json_encode($list) . PHP_EOL;*/

    /*$p = $yabetoo->payments->retrieve('pi_r6xmz6xOfNXUb33ceoWtAQM3EkrirMcRd0Kz');
    echo 'Payment retrieved: ' . json_encode($p) . PHP_EOL;*/

    $session = $yabetoo->sessions->create([
        "total" => 200000,
        "currency" => "xaf",
        "accountId" => "acct_iNXIGeot1lqyhGI5eP7KL0LcWTCTgFLytfRa",
        "successUrl" => "https://monsite.com/checkout-success",
        "cancelUrl" => "https://monsite.com/checkout-cancel",
        "metadata" => [
            "test" => "ok"
        ],
        "items" => [
            [
                "productId" => "12Z34D5F",
                "quantity" => 1,
                "price" => 200000,
                "productName" => "Écran LG"
            ]
        ]
    ]);
    echo 'Session created: ' . json_encode($session) . PHP_EOL;

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}