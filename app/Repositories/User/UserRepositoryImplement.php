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

   /**
    * Create new user
    *
    * @param  mixed $data
    * @return void
    */
   public function create($data)
   {
      return $this->userModel->create($data);
   }

   /**
    * Find user by username or email
    *
    * @param  mixed $usernameOrEmail
    * @return object
    */
   public function findByUsernameOrEmail($usernameOrEmail)
   {
      return $this->userModel
         ->where('username', $usernameOrEmail)
         ->orWhere('email', $usernameOrEmail)
         ->first();
   }
}