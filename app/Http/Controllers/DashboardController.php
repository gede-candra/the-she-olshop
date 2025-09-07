<?php

namespace App\Http\Controllers;

use App\Repositories\Order\OrderRepository;
use App\Services\Product\ProductService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

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
    public function __construct(UserService $userService, ProductService $productService, OrderRepository $orderService)
    {
        $this->userService      = $userService;
        $this->productService   = $productService;
        $this->orderService     = $orderService;
    }
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = [
            "products"  => $this->productService->getAllProduct(),
            "users"     => $this->userService->getAllUserWhere("level", "pelanggan"),
            "orders"    => $this->orderService->getAllOrder(),
        ];

        return view('apps.admin_page.dashboard', $data);
    }
}
