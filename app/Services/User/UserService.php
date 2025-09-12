<?php

namespace App\Services\User;

interface UserService
{
   /**
    * Get all user by where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllUserWhere($where, $value);

   /**
    * Get customer count
    *
    * @return int
    */
   public function getUserCount();
}
?>