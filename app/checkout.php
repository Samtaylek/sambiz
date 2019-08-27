<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 10/06/2018
 * Time: 23:20
 */
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'start.php';
if(!isset($_POST['product'], $_POST['price'])){
    die();
}

$product = $_POST['product'];
$price = $_POST['price'];
$shipping = 2.00;
$total = $price + $shipping;
$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
    ->setCurrency('NGN')
    ->setQuantity(1)
    ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
    ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('NGN')
    ->setTotal($total)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('PayForSomething Payment')
    ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . '/pay.php?success=true')
    ->setCancelUrl(SITE_URL . '/pay.php?success=false');

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

try{
    $payment->create($paypal);
} catch(Exception $e){
    die($e);
}

echo $approvalUrl = $payment->getApprovalLink();

header("Location: {$approvalUrl}");