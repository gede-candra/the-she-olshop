$(document).ready(function () {
   const btnSwitchLogin      = $('#btn-switch-login');
   const btnSwitchRegister   = $('#btn-switch-register');
   const loginForm           = $('#form-login');
   const registerForm        = $('#form-register');

   $('.btn-auth-modal').click(function (e) { 
      e.preventDefault();
      
      authSwitch(btnSwitchRegister, btnSwitchLogin, registerForm, loginForm)
      loginForm[0].reset();
      registerForm[0].reset();
   });

   $(btnSwitchLogin).click(function (e) { 
      e.preventDefault();
      
      authSwitch(btnSwitchRegister, this, registerForm, loginForm)
      loginForm[0].reset();
   });
   
   $(btnSwitchRegister).click(function (e) { 
      e.preventDefault();
      
      authSwitch(btnSwitchLogin, this, loginForm, registerForm, 'register')
      registerForm[0].reset();
   });
});

// Wizard Form Auth Modal
function authSwitch(btnPreviouslyActive, btnAfterActive, formPreviouslyActive, formAfterActive, authType = 'login')
{
   $(btnPreviouslyActive).attr('disabled', false)
   $(btnPreviouslyActive).removeClass('btn-success')
   $(btnPreviouslyActive).addClass('border-0 text-success')

   $(btnAfterActive).attr('disabled', true)
   $(btnAfterActive).addClass('btn-success')
   $(btnAfterActive).removeClass('border-0 text-success')

   $(formPreviouslyActive).addClass('d-none')

   $(formAfterActive).removeClass('d-none')

   if (authType == 'login') {
      $('#btn-auth-submit').html('<i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Sign in');
   } else {
      $('#btn-auth-submit').html('<i class="fa-solid fa-user-plus me-2"></i> Sign up');
   }
}