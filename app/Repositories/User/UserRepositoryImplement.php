<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepositoryImplement implements UserRepository
{
   private $userModel;
   
   /**
    * __construct
    *
    * @param  mixed $userModel
    * @return void
    */
   public function __construct(User $userModel)
   {
      $this->userModel = $userModel;
   }
   
   /**
    * get user data by id
    *
    * @param  mixed $id
    * @return void
    */
   public function getUserById($id)
   {
      return $this->userModel->findOrFail($id);
   }
   
   /**
    * get all user data
    *
    * @return void
    */
   public function getAllUser()
   {
      return $this->userModel->all();
   }
   
   /**
    * Get all user by where condition
    *
    * @return void
    */
   public function getAllUserWhere($where, $value)
   {
      return $this->userModel->all()->where($where, $value);
   }

}
?>