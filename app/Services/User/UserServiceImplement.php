<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserServiceImplement implements UserService
{
   private $userRepository;
   
   /**
    * __construct
    *
    * @param  mixed $userRepository
    * @return void
    */
   public function __construct(UserRepository $userRepository)
   {
      $this->userRepository = $userRepository;
   }
   
   /**
    * Get all user by where condition
    *
    * @param  mixed $where
    * @param  mixed $value
    * @return void
    */
   public function getAllUserWhere($where, $value)
   {
      return $this->userRepository->getAllUserWhere($where, $value);
   }
}
?>