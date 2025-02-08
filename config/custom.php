<?php
/*
custom config
*/
return [
    "packagePricing" => array(
        "package-basic" => 37500,
        "package-business" => 450000,
        "package-enterprise" => 0,
        "package-payasyougo" => 9000
    ),
    "paystack" => array(
        "transInitialize" => "https://api.paystack.co/transaction/initialize",
        "transVerify" => "https://api.paystack.co/transaction/verify/",
        "transFetch" => "https://api.paystack.co/transaction/"
    )
];