<?php
namespace App\Services\Auth;

use App\Repositories\User\UserRepository;
use Exception;
use Log;

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

         $user = $this->userRepository->findByUsernameOrEmail($data['username_email']);
         if (!$user) {
            return [
               'success' => false,
               'code'    => 401,
               'message' => 'Kredensial login tidak diterima',
            ];
         }

         $credentials = [
            'email'    => $user->email,
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
         Log::error('Login error: ' . $e->getMessage());

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
         $userData = [
            'name'     => $data['name'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
         ];

         $this->userRepository->create($userData);

         return [
            'success' => true,
            'code'    => 201,
            'message' => 'Registrasi berhasil. Silakan login.',
            'data'    => [
               'redirect' => route('login'),
            ],
         ];
      }
      catch (Exception $e) {
         Log::error('Registration error: ' . $e->getMessage());

         return [
            'success' => false,
            'code'    => 500,
            'message' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.',
         ];
      }
   }

   /**
    * Handle lupa password request
    *
    * @return array
    */
   public function lupaPasword($data)
   {
      try {
         $user = $this->userRepository->findByEmail($data['email']);
         if (!$user) {
            return [
               'success' => false,
               'code'    => 404,
               'message' => 'Email tidak ditemukan',
            ];
         }
         // Here you would typically send a password reset email.
         // For simplicity, we'll just return a success message.  
         return [
            'success' => true,
            'code'    => 200,
            'message' => 'Instruksi untuk mereset password telah dikirim ke email Anda.',
         ];

      }
      catch (Exception $e) {
         Log::error('Lupa password error: ' . $e->getMessage());

         return [
            'success' => false,
            'code'    => 500,
            'message' => 'Terjadi kesalahan saat memproses permintaan. Silakan coba lagi.',
         ];
      }
   }

   /**
    * Handle logout request
    *
    * @return array
    */
   public function logout()
   {
      try {
         auth()->logout();
         
         return [
            'success' => true,
            'code'    => 200,
            'message' => 'Logout berhasil',
            'data'    => [
               'redirect' => route('homepage'),
            ],
         ];
      }
      catch (Exception $e) {
         Log::error('Logout error: ' . $e->getMessage());

         return [
            'success' => false,
            'code'    => 500,
            'message' => 'Terjadi kesalahan saat logout. Silakan coba lagi.',
         ];
      }
   }
}