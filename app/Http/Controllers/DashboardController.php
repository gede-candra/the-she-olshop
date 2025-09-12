<?php

namespace App\Http\Controllers;

use App\Services\Order\OrderService;
use App\Services\Product\ProductService;
use App\Services\User\UserService;

class DashboardController extends Controller
{
    private $userService, $productService, $orderService;

    /**
     * __construct
     *
     * @param  mixed $userService
     * @param  mixed $productService
     * @param  mixed $orderService
     * @return void
     */
    public function __construct(UserService $userService, ProductService $productService, OrderService $orderService)
    {
        $this->userService    = $userService;
        $this->productService = $productService;
        $this->orderService   = $orderService;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = [
            "productCount" => $this->productService->getProductCount(),
            "userCount"    => $this->userService->getUserCount(),
            // "orderCount"   => $this->orderService->getOrderCount(),
        ];
        
        
        return view('apps.admin_page.dashboard', $data);
    }
}
