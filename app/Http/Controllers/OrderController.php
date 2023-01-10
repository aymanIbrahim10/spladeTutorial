<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function status()
    {
        return view('order.status', [
            'order' => Order::first(),
        ]);
    }
    public function edit(User $user)
    {
        return view('order.success', [
            'order' => Order::first(),
        ]);
    }
}
