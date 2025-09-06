<?php

namespace App\Repositories\Order;

interface OrderRepository
{      
   /**
    * Get Order by id
    *
    * @param  mixed $id
    * @return void
    */
   public function getOrderByUuid($uuid);

   /**
    * Get all Order data
    *
    * @return void
    */
   public function getAllOrder();
   
   /**
    * Get all order data with where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllOrderWhere($column, $value);
      
   /**
    * Get one order data with where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getOneOrderWhere($column, $value);
}
?>