<?php

namespace App\Services\Auth;

interface AuthService
{
   /**
    * Handle login request
    *
    * @return object
    */
   public function login($data);

   /**
    * Get Category By Slug
    *
    * @return void
    */
   public function register($data);

   /**
    * Handle lupa password request
    *
    * @return object
    */
   public function lupaPasword($data);

   /**
    * Handle logout request
    *
    * @return void
    */
   public function logout();
}