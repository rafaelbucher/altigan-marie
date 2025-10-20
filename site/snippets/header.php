<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- SEO de base -->
  <title><?= html($page->title()->or($site->title())) ?></title>
  <?php if ($site->description()->isNotEmpty()): ?>
    <meta name="description" content="<?= html($site->description()) ?>">
  <?php endif ?>

  <!-- Thème du navigateur (utile pour l’accessibilité contrastes/UA) -->
  <meta name="theme-color" content="rgb(206, 47, 59)">

  <!-- (Option B CDN) Préconnexion si tu utilises jsDelivr pour les polices -->
  <!-- <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin> -->

  <!-- CSS principal (qui importe ta police & couleurs) -->
  <link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

  <!-- Styles minimaux pour l’accessibilité (skip-link visible même sans CSS principal) -->
  <style>
    :root { --brand-red: rgb(206, 47, 59); --brand-white: #fff; }
    .skip-link{position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden}
    .skip-link:focus{position:static;width:auto;height:auto;padding:.5rem .75rem;border-radius:.5rem;
      background:var(--brand-red);color:var(--brand-white);outline:2px solid currentColor}
    /* S’assurer que les liens focus sont visibles si ta CSS ne définit rien */
    a:focus{outline:2px solid var(--brand-red);outline-offset:2px}
  </style>
</head>

<body class="bg-white text-default">
  <!-- Lien d’évitement (RGAA/WCAG 2.4.1) -->
  <a class="skip-link" href="#main-content">Aller au contenu</a>

  <!-- En-tête sémantique avec zone de navigation -->
  <header id="top" class="site-header" role="banner">
    <div class="container" style="padding:1rem;max-width:1200px;margin:0 auto;">
      <div class="brand" style="display:flex;align-items:center;gap:.75rem;">
        <a href="<?= $site->url() ?>" class="brand-link" aria-label="Accueil ALTIGAN Marie">
          <?= html($site->FirstName()->or('Marie')) ?>
          <span><?= html($site->LastName()->or('Altigan')) ?></span>
        </a>
      </div>

      <nav class="site-nav" role="navigation" aria-label="Navigation principale">
        <!-- Exemple (remplace/complète si tu as un menu) -->
        <a href="#tsunami-modal" class="site-modal-trigger" data-modal-target="tsunami-modal" role="button">TSUNAMI</a>
        <a href="#bio-modal" class="site-modal-trigger" data-modal-target="bio-modal" role="button">BIO</a>
      </nav>
    </div>
  </header>

  <div id="bio-modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="bio-modal-title">
    <div class="modal__box" role="document" tabindex="-1">
      <button type="button" class="modal__close" data-modal-close aria-label="Fermer la biographie">&times;</button>
      <div class="modal__content">
        <h2 id="bio-modal-title">Biographie</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris commodo semper ipsum nec gravida. Nulla sed turpis id sapien lobortis aliquam eget dapibus velit. Aenean egestas odio dolor, at condimentum nunc auctor mattis. Donec ut lobortis ipsum. Praesent blandit justo arcu, nec pellentesque massa viverra non. In feugiat mi non enim efficitur, et fringilla neque euismod. Maecenas blandit tortor nec tortor tristique, ut molestie metus ullamcorper. Fusce ultrices diam eu tellus rhoncus, ac convallis nibh tempus. Nunc ut mi nec felis accumsan laoreet nec sit amet urna. Nunc eu commodo turpis, id molestie ante. Donec a sagittis quam, quis dapibus enim. Morbi et fermentum nulla. Nullam vehicula mauris non mi aliquet, et laoreet erat ultrices. Morbi tincidunt scelerisque feugiat.</p>
      </div>
      <div class="modal-footer">
        <p style="margin:0;line-height:1.6;">
            <br><strong>ALTIGAN Marie</strong>
            <br>tél. <a href="tel:+33667256637" aria-label="Appeler le +33 6 67 25 66 37">+33&nbsp;6&nbsp;67&nbsp;25&nbsp;66&nbsp;37</a>
            <br>Mail : <a href="mailto:contact@altigan-marie.art">contact@altigan-marie.art</a>
        </p>
        <p style="margin:0;">
            <span aria-hidden="true">©</span> <span class="sr-only">Copyright </span> 2025 
        </p>
      </div>
    </div>
  </div>

  <div id="tsunami-modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="tsunami-modal-title">
    <div class="modal__box" role="document" tabindex="-1">
      <button type="button" class="modal__close" data-modal-close aria-label="Fermer le tsunami">&times;</button>
      <div class="modal__content">
          <h2 id="tsunami-modal-title">Tsunami</h2>
          <p>Suspendisse non velit leo. Quisque rhoncus tortor et elit dapibus posuere.<br/><br/>Sed tellus augue, tempor eget magna ac, ultrices ornare augue. Donec vel vehicula nibh. Sed massa libero, vestibulum quis ipsum ac, consectetur tempor arcu. Morbi sit amet lorem metus. Vivamus aliquam commodo ullamcorper. Nam aliquet tristique ante a pharetra. Ut turpis lectus, suscipit vitae purus at, ornare interdum nulla. Nullam nec laoreet nulla. Nunc elementum et turpis at rutrum. Nam dignissim, lectus non tempor vestibulum, lorem metus tincidunt arcu, quis consectetur lorem enim eget eros. Nullam dapibus tempus magna, ac accumsan mauris. Praesent sagittis urna eu massa faucibus, in cursus tortor ultricies. Integer gravida mauris a pretium posuere. Suspendisse metus odio, tristique ut tincidunt aliquam, faucibus in nisi. Ut dictum arcu ac nisl pharetra, ut fringilla ipsum bibendum. Aenean in nisi eleifend leo posuere aliquam non at lorem.</p>
      </div>
    </div>
  </div>

  <!-- Zone principale de contenu (landmark) -->
  <main id="main-content" tabindex="-1">
