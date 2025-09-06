<?php

namespace App\Services\Order;

use App\Repositories\Order\OrderRepository;

class OrderServiceImplement implements OrderService
{
   private $orderRepository;
   
   /**
    * __construct
    *
    * @param  mixed $orderRepository
    * @return void
    */
   public function __construct(OrderRepository $orderRepository)
   {
      $this->orderRepository = $orderRepository;
   }
      
   /**
    * Get all order data
    *
    * @return void
    */
   public function getAllOrder()
   {
      return $this->orderRepository->getAllOrder();
   }

   /**
    * Get all Order by where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllOrderWhere($column, $value)
   {
      return $this->orderRepository->getAllOrderWhere($column, $value);
   }
      
   /**
    * Get one order data with where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getOneOrderWhere($column, $value)
   {
      return $this->orderRepository->getOneOrderWhere($column, $value);
   }
}
?>