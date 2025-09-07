$(document).ready(function () {
   const $btnSwitchLogin = $('#btn-switch-login');
   const $btnSwitchRegister = $('#btn-switch-register');
   const $loginForm = $('#form-login');
   const $registerForm = $('#form-register');

   // Open Auth Modal
   $('.btn-auth-modal').on('click', function (e) {
      e.preventDefault();

      authSwitch($btnSwitchRegister, $btnSwitchLogin, $registerForm, $loginForm);
      if ($loginForm.length) $loginForm.trigger('reset');
      if ($registerForm.length) $registerForm.trigger('reset');
   });

   // Switch Login Button
   $btnSwitchLogin.on('click', function (e) {
      e.preventDefault();

      authSwitch($btnSwitchRegister, this, $registerForm, $loginForm);
      if ($loginForm.length) $loginForm.trigger('reset');
   });

   // Switch Register Button
   $btnSwitchRegister.on('click', function (e) {
      e.preventDefault();

      authSwitch($btnSwitchLogin, this, $loginForm, $registerForm, 'register');
      if ($registerForm.length) $registerForm.trigger('reset');
   });

   // Wizard Form Auth Modal
   function authSwitch(btnPrev, btnNext, formPrev, formNext, authType = 'login') {
      const $btnPrev = $(btnPrev);
      const $btnNext = $(btnNext);
      const $formPrev = $(formPrev);
      const $formNext = $(formNext);

      $btnPrev.prop('disabled', false).removeClass('btn-success').addClass('border-0 text-success');
      $btnNext.prop('disabled', true).addClass('btn-success').removeClass('border-0 text-success');

      $formPrev.addClass('d-none');
      $formNext.removeClass('d-none');

      const $firstInput = $formNext.find('input,select,textarea').filter(':visible:enabled').first();
      if ($firstInput.length) $firstInput.trigger('focus');

      const $submit = $('#btn-auth-submit');
      $submit.data('auth-type', authType);
      $submit.html(
         authType === 'login'
            ? '<i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Sign in'
            : '<i class="fa-solid fa-user-plus me-2"></i> Sign up'
      );

      // Bersihkan error ketika switch tab
      clearValidationErrors($formNext);

      $submit.off('click.auth').on('click.auth', function (e) {
         e.preventDefault();

         // bersihkan error sebelum submit ulang
         clearValidationErrors($formNext);

         const activeFormEl = $formNext[0];
         if (!activeFormEl) return alert('Form tidak ditemukan.');

         const url = authType === 'login' ? $('#login-url').val() : $('#register-url').val();
         if (!url) return alert('URL tidak ditemukan.');

         const formData = new FormData(activeFormEl);

         ajaxPost(url, this, formData)
            .done((res) => {
               if (authType === 'login') {
                  window.location.href = res?.redirect || '/dashboard';
               } else {
                  alert('Register berhasil, silakan login!');
                  $formNext.trigger('reset');
                  authSwitch($btnNext, $btnPrev, $formNext, $formPrev, 'login');
               }
            })
            .fail((xhr) => {
               // Tangani 422 dari Laravel
               if (xhr?.status === 422 && xhr?.responseJSON?.errors) {
                  showValidationErrors(xhr.responseJSON.errors, $formNext);
                  return;
               }

               const msg = xhr?.responseJSON?.message || (authType === 'login' ? 'Login error' : 'Register error');
               alert(msg);
            });
      });
   }

   // Logout Function
   $('.btn-logout').on('click', function (e) {
      e.preventDefault();

      if (!confirm('Apakah Anda yakin ingin logout?')) {
         return; // batal logout
      }

      const url = $('#logout-url').val();
      if (!url) return alert('URL logout tidak ditemukan.');

      ajaxPost(url, this)
         .done((res) => {
            // redirect ke halaman login atau home setelah logout
            window.location.href = res?.redirect || '/';
         })
         .fail((xhr) => {
            const msg = xhr?.responseJSON?.message || 'Logout gagal, coba lagi.';
            alert(msg);
         });
   });
});
