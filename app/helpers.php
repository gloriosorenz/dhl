<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return money_format('₱%i', $price / 1);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    // $tax = config('cart.tax') / 100;
    // $discount = session()->get('coupon')['discount'] ?? 0;
    // $code = session()->get('coupon')['name'] ?? null;
    // $newSubtotal = (Cart::subtotal() - $discount);
    // if ($newSubtotal < 0) {
    //     $newSubtotal = 0;
    // }
    // $newTax = $newSubtotal * $tax;
    // $newTotal = $newSubtotal * (1 + $tax);

    // return collect([
    //     'tax' => $tax,
    //     'discount' => $discount,
    //     'code' => $code,
    //     'newSubtotal' => $newSubtotal,
    //     'newTax' => $newTax,
    //     'newTotal' => $newTotal,
    // ]);

    $newSubtotal = (Cart::subtotal(2,'.',','));
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTotal = $newSubtotal;

    return collect([
        'newSubtotal' => $newSubtotal,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold', 5)) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

function randomNumber(){
    $random = str_shuffle('1234567890');
    $af_num = substr($random, 0, 6);

    return $af_num;
}
