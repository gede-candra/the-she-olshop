<?php

namespace App\Services\Order;

interface OrderService
{      
   /**
    * Get all order data
    *
    * @return void
    */
   public function getAllOrder();

   /**
    * Get all Order by where condition
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