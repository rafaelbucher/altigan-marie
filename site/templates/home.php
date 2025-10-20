<?php snippet('header') ?>

<?php
$images = [];
$assetsRoot = kirby()->root('assets');
$assetsUrl  = kirby()->url('assets');
$imageDirectory = $assetsRoot . '/img';

if (is_dir($imageDirectory)) {
    $files = glob($imageDirectory . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
    if ($files !== false) {
        sort($files, SORT_NATURAL | SORT_FLAG_CASE);
        foreach ($files as $file) {
            $filename = basename($file);
            $label = pathinfo($filename, PATHINFO_FILENAME);
            $label = str_replace(['-', '_'], ' ', $label);
            $label = trim($label);

            $images[] = [
                'url' => $assetsUrl . '/img/' . $filename,
                'alt' => $label !== '' ? ucfirst($label) : 'Illustration'
            ];
        }
    }
}
?>

<?php if (!empty($images)): ?>
  <section class="home-gallery" aria-label="Galerie d’images">
    <?php foreach ($images as $image): ?>
      <figure class="home-gallery__item">
        <img src="<?= $image['url'] ?>" alt="<?= esc($image['alt'], 'attr') ?>" loading="lazy">
      </figure>
    <?php endforeach ?>
  </section>
<?php else: ?>
  <p class="home-gallery__empty" role="status">
    Aucune image n’est disponible pour le moment.
  </p>
<?php endif ?>

<?php snippet('footer') ?>
