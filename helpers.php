<?php

use App\Contracts\CartInterface;
use Illuminate\Support\Facades\App;

/**
 * Function to get an instance of CartInterface.
 *
 * This function uses the App facade to resolve an instance of the CartInterface
 * from the Laravel service container. The service container is responsible for
 * managing the application's class dependencies.
 */
function cart(): CartInterface
{
    // Resolve and return an instance of CartInterface using the Laravel service container.
    return App::make(CartInterface::class);
}
