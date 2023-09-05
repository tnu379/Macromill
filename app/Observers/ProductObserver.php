<?php

namespace App\Observers;

use App\Mail\ProductCreatedNotification;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    public function created(Product $product)
    {
        // Log::debug('mlemlemlsdasd');
        Mail::to('ngocuy99nt@gmail.com')->send(new ProductCreatedNotification($product));
    }
}
