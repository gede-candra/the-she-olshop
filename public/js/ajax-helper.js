(function ($, window, document) {
  'use strict';

  // --- util yg sudah ada ---
  function clearValidationErrors($form) {
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.invalid-feedback.server').remove();
  }

  function normalizeFieldName(key) {
    return key
      .replace(/\.(\d+)(?=\.|$)/g, '[$1]')
      .replace(/\.(\w+)/g, '[$1]');
  }

  function showValidationErrors(errors, $form) {
    clearValidationErrors($form);
    Object.entries(errors || {}).forEach(([key, msgs]) => {
      const msg = Array.isArray(msgs) ? msgs[0] : msgs;
      const selector = `[name="${key}"], [name="${normalizeFieldName(key)}"]`;
      const $input = $form.find(selector).first();
      if (!$input.length) return;

      $input.addClass('is-invalid');
      const $feedback = $('<div class="invalid-feedback server"></div>').text(msg);

      if ($input.hasClass('form-check-input')) {
        const $wrap = $input.closest('.form-check');
        $wrap.find('.invalid-feedback.server').remove();
        $wrap.append($feedback);
      } else {
        $input.next('.invalid-feedback.server').remove();
        $input.after($feedback);
      }
    });

    const $first = $form.find('.is-invalid').first();
    if ($first.length) {
      $first.trigger('focus');
      $('html, body').animate({ scrollTop: $first.offset().top - 100 }, 300);
    }
  }

  function getCsrf() {
    var el = document.querySelector('meta[name="csrf-token"]');
    return el ? el.getAttribute('content') : undefined;
  }

  function setBtnLoading($btn, loading) {
    if (!$btn || !$btn.length) return;
    if (loading) {
      if (!$btn.data('orig-html')) $btn.data('orig-html', $btn.html());
      if (!$btn.data('orig-width')) $btn.data('orig-width', $btn.outerWidth());
      $btn.prop('disabled', true).css('width', $btn.data('orig-width'))
          .html('<i class="fa fa-spinner fa-spin me-2"></i> Processing...');
    } else {
      $btn.prop('disabled', false).css('width', '').html($btn.data('orig-html') || $btn.html());
    }
  }

  function resolveForm($btn) {
    if ($btn && $btn.length) {
      var $form = $btn.closest('form');
      if ($form.length) return $form;
    }
    return $('form').first();
  }

  // ---- satu versi saja safeDefine (hindari duplikasi) ----
  function safeDefine(name, fn) {
    if (Object.prototype.hasOwnProperty.call(window, name)) {
      console.warn('[helper] Global "' + name + '" sudah ada. Skip export.');
      return;
    }
    Object.defineProperty(window, name, {
      value: fn, writable: false, configurable: false, enumerable: false
    });
  }

  // ---- FIX: ajaxPost sekarang menerima data (FormData/objek/serialized) + opts ----
  /**
   * POST helper
   * @param {string} url
   * @param {string|HTMLElement|jQuery} [btnSubmit]
   * @param {FormData|object|string} [data]
   * @param {object} [opts] { method, headers, form, ajax }
   * @returns {jqXHR}
   */
  function _ajaxPost(url, btnSubmit, data, opts) {
    opts = opts || {};
    var $btn = btnSubmit ? $(btnSubmit) : null;
    var $form = opts.form ? $(opts.form) : resolveForm($btn);

    // Tentukan payload
    var payload = data;
    if (typeof payload === 'undefined') {
      if ($form && $form.length) {
        var hasFile = $form.find('input[type="file"]').length > 0;
        payload = hasFile ? new FormData($form[0]) : $form.serialize();
      } else {
        payload = null;
      }
    }

    var isFD = (typeof FormData !== 'undefined') && (payload instanceof FormData);

    if ($btn) setBtnLoading($btn, true);

    var headers = Object.assign(
      { 'X-Requested-With': 'XMLHttpRequest' },
      opts.headers || {}
    );
    var csrf = getCsrf();
    if (csrf && !headers['X-CSRF-TOKEN']) headers['X-CSRF-TOKEN'] = csrf;

    var ajaxOptions = Object.assign({
      url: url,
      method: opts.method || 'POST',
      data: payload,
      processData: isFD ? false : true,
      contentType: isFD ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
      cache: false,
      headers: headers
    }, opts.ajax || {});

    var jq = $.ajax(ajaxOptions);
    return jq.always(function () {
      if ($btn) setBtnLoading($btn, false);
    });
  }

  /**
   * GET helper (bisa terima query object/string)
   * @param {string} url
   * @param {string|HTMLElement|jQuery} [btnSubmit]
   * @param {object|string} [query]
   * @param {object} [opts]
   */
  function _ajaxGet(url, btnSubmit, query, opts) {
    opts = opts || {};
    var $btn = btnSubmit ? $(btnSubmit) : null;
    var $form = opts.form ? $(opts.form) : resolveForm($btn);

    var qs;
    if (typeof query !== 'undefined') {
      qs = typeof query === 'string' ? query : $.param(query);
    } else {
      qs = $form && $form.length ? $form.serialize() : '';
    }
    var fullUrl = qs ? url + (url.indexOf('?') > -1 ? '&' : '?') + qs : url;

    if ($btn) setBtnLoading($btn, true);

    var ajaxOptions = Object.assign({
      url: fullUrl,
      method: 'GET',
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    }, opts.ajax || {});

    var jq = $.ajax(ajaxOptions);
    return jq.always(function () {
      if ($btn) setBtnLoading($btn, false);
    });
  }

  // ---- Export ----
  safeDefine('clearValidationErrors', clearValidationErrors);
  safeDefine('normalizeFieldName', normalizeFieldName);
  safeDefine('showValidationErrors', showValidationErrors);
  safeDefine('ajaxPost', _ajaxPost);
  safeDefine('ajaxGet', _ajaxGet);

})(jQuery, window, document);
