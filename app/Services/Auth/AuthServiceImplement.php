<?php
namespace App\Services\Auth;

use App\Repositories\User\UserRepository;
use Exception;

class AuthServiceImplement implements AuthService
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
    * Handle login request
    *
    * @return array
    */
   public function login($data)
   {
      try {
         if (!isset($data['remember']) || !$data['remember']) {
            $data['remember'] = false;
         }

         $credentials = [
            'email'    => $data['email'],
            'password' => $data['password'],
         ];

         if (auth()->attempt($credentials, $data['remember'])) {
            return [
               'success' => true,
               'code'    => 200,
               'message' => 'Login berhasil',
               'data'    => [
                  'redirect' => route('dashboard'),
               ],
            ];
         }

         return [
            'success' => false,
            'code'    => 401,
            'message' => 'Kredensial login tidak diterima',
         ];

      }
      catch (Exception $e) {
         // Optional: logging
         // Log::error('Login error: ' . $e->getMessage());

         return [
            'success' => false,
            'code'    => 500,
            'message' => 'Terjadi kesalahan saat login. Silakan coba lagi.',
         ];
      }
   }

   /**
    * Get Category By Slug
    *
    * @param  mixed $slug
    * @return void
    */
   public function register($data)
   {
      try {
         //code...
      }
      catch (\Throwable $th) {
         //throw $th;
      }
   }
}
?>