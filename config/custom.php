<?php
/*
custom config
Database:smartver_smartverify
username:smartver_root
password:Sm4rtV3r1fy
*/
return [
    "packageLimit" => array(
        "package-basic" => 5,
        "package-business" => 10,
        "package-enterprise" => 10000, //unlimited
        "package-payasyougo" => 1 //can verify only one document
    ),
    "packageName" => array(
        "package-basic" => "Basic",
        "package-business" => "Business",
        "package-enterprise" => "Enterprise",
        "package-payasyougo" => "Pay-As-You-Go"
    ),
    "packagePricing" => array(
        "package-basic" => 37500,
        "package-business" => 70000,
        "package-enterprise" => 0,
        "package-payasyougo" => 9000
    ),
    "paystack" => array(
        "publickey" => "pk_test_48f9c1d23041e406b620438391c682afbe66cfbb",
        //"secretkey" => "sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5",
        "secretkey" => "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb",
        "transInitialize" => "https://api.paystack.co/transaction/initialize",
        "transVerify" => "https://api.paystack.co/transaction/verify/",
        "transFetch" => "https://api.paystack.co/transaction/",
        "paySessTime" => "https://api.paystack.co/integration/payment_session_timeout"
    )
];