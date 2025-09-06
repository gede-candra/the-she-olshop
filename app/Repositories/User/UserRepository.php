<?php

namespace App\Repositories\User;

interface UserRepository
{   
   /**
    * get data user by id
    *
    * @param  mixed $id
    * @return void
    */
   public function getUserByid($id);
   
   /**
    * get all user data
    *
    * @return void
    */
   public function getAllUser();
   
   /**
    * Get all user data by where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllUserWhere($where, $value);
}
?>