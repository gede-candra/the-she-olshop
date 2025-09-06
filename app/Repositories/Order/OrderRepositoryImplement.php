<?php

namespace App\Repositories\Order;

use App\Models\Order;

class OrderRepositoryImplement implements OrderRepository
{
   private $orderModel;
   
   /**
    * __construct
    *
    * @param  mixed $orderModel
    * @return void
    */
   public function __construct(Order $orderModel)
   {
      $this->orderModel = $orderModel;
   }
      
   /**
    * Get Order data by id
    *
    * @param  mixed $id
    * @return void
    */
   public function getOrderByUuid($uuid)
   {
      return $this->orderModel->findOrFail($uuid);
   }

   /**
    * Get all Order data
    *
    * @return void
    */
   public function getAllOrder()
   {
      return $this->orderModel->all();
   }
   
   /**
    * Get all Order data with where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllOrderWhere($column, $value)
   {
      return $this->orderModel->where($column, $value)->get();
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
      return $this->orderRepository->where($column, $value)->first();
   }
}

?>