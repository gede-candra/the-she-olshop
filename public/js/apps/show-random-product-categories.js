(function ($, window, document) {
  'use strict';

  function buildCategoryUrl(slug) {
    var tpl = $('#product-by-category-url-template').val();
    if (tpl && tpl.indexOf('___SLUG___') !== -1) {
      return tpl.replace('___SLUG___', slug);
    }
    // fallback kalau template tidak ada
    return '/' + encodeURIComponent(slug);
  }

  function normalizeCategory(item) {
    if (!item || typeof item !== 'object') return null;
    var slug = item.slug || item.Slug || item.code || item.id || '';
    var name = item.name || item.title || item.label || slug || 'Kategori';
    if (!slug) return null;
    return { slug: String(slug), name: String(name) };
  }

  function renderDesktop($ul, items) {
    if (!$ul || !$ul.length) return;

    // Simpan item "Home" (li pertama)
    var $home = $ul.children('li').first().clone(true, true);
    $ul.empty().append($home);

    // Tambahkan kategori
    items.forEach(function (it) {
      var url = buildCategoryUrl(it.slug);
      var $li = $('<li class="nav-item"></li>');
      var $a = $('<a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0" aria-current="page"></a>');
      $a.attr('href', url).text(it.name);
      $li.append($a);
      $ul.append($li);
    });
  }

  function renderMobile($ul, items) {
    if (!$ul || !$ul.length) return;

    // Ambil ulang bagian "Beranda" + garis pembatas jika ada
    var $all = $ul.children().clone(true, true);
    var $home = $all.filter('li.nav-item').first();
    var $divider = $all.filter('.border-bottom').first();

    $ul.empty();
    if ($home.length) $ul.append($home);
    if ($divider.length) $ul.append($divider);

    items.forEach(function (it) {
      var url = buildCategoryUrl(it.slug);
      var $li = $('<li class="nav-item"></li>');
      var $a = $(
        '<a class="text-decoration-none text-nowrap btn btn-outline-success btn-sm border-0 d-flex align-items-center gap-2" aria-current="page"></a>'
      );
      $a.attr('href', url)
        .append('<i class="fa-solid fa-magnifying-glass-dollar"></i>')
        .append(document.createTextNode(' ' + it.name));
      $li.append($a);
      $ul.append($li);
    });
  }

  function showLoadingState() {
    var $desk = $('#nav-categories');
    var $mob = $('#nav-categories-mobile');
    var loadingPill = function (text) {
      return $('<li class="nav-item"></li>').append(
        $('<span class="btn btn-outline-success btn-sm border-0 disabled"></span>').html(
          '<i class="fa fa-spinner fa-spin me-2"></i>' + text
        )
      );
    };
    if ($desk.length) {
      // Simpan home lalu tampilkan "Loading..."
      var $home = $desk.children('li').first().clone(true, true);
      $desk.empty().append($home).append(loadingPill('Memuat kategori...'));
    }
    if ($mob.length) {
      // sisakan beranda & divider bila ada, lalu loading
      var $all = $mob.children().clone(true, true);
      var $home = $all.filter('li.nav-item').first();
      var $divider = $all.filter('.border-bottom').first();
      $mob.empty();
      if ($home.length) $mob.append($home);
      if ($divider.length) $mob.append($divider);
      $mob.append(loadingPill('Memuat kategori...'));
    }
  }

  function clearLoadingState() {
    // Tidak diperlukan khusus karena render akan menimpa isi <ul>
  }

  function fetchAndRenderCategories() {
    var url = $('#show-random-product-category-url').val();
    if (!url) return;

    showLoadingState();

    ajaxGet(url, null, null, {
      ajax: {
        dataType: 'json'
      }
    }).done(function (res) {
      if (!res || !res.success) throw new Error(res && res.message || 'Gagal memuat');
      var items = Array.isArray(res.data) ? res.data : [];
      // normalize & buang null
      items = items.map(normalizeCategory).filter(Boolean);

      var $desk = $('#nav-categories');
      var $mob = $('#nav-categories-mobile');

      renderDesktop($desk, items);
      renderMobile($mob, items);
    }).fail(function (xhr) {
      console.error('Gagal mengambil kategori:', xhr);
      // Jika fail, biarkan isi server-rendered tetap (tidak dirubah)
      // atau Anda bisa menampilkan toast/notif di sini
    }).always(function () {
      clearLoadingState();
    });
  }

  $(document).ready(fetchAndRenderCategories);

})(jQuery, window, document);