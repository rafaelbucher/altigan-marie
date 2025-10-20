<?php snippet('header') ?>

  <section class="container" aria-labelledby="page-title" style="max-width: 1200px; margin: 0 auto; padding: 2rem 1rem;">
    <header>
      <h1 id="page-title" style="margin: 0 0 1rem 0;">
        <?= html($page->title()->or($site->title())) ?>
      </h1>

      <?php if ($page->subtitle()->isNotEmpty()): ?>
        <p class="subtitle" style="margin: 0 0 1.25rem 0; color:#555;">
          <?= html($page->subtitle()) ?>
        </p>
      <?php endif ?>
    </header>

    <?php if ($page->text()->isNotEmpty()): ?>
      <article class="prose" style="line-height:1.7;">
        <?= $page->text()->kt() ?>
      </article>
    <?php else: ?>
      <p role="status">Cette page n’a pas encore de contenu.</p>
    <?php endif ?>

    <?php if ($page->images()->isNotEmpty()): ?>
      <div class="media-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem;margin-top:2rem;">
        <?php foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>
          <figure>
            <img
              src="<?= $image->url() ?>"
              alt="<?= html($image->alt()->or($image->filename())) ?>"
              loading="lazy"
              width="<?= $image->width() ?>"
              height="<?= $image->height() ?>"
              style="max-width:100%;height:auto;border-radius:.5rem"
            >
            <?php if ($image->caption()->isNotEmpty()): ?>
              <figcaption style="font-size:.9rem;color:#555;"><?= $image->caption()->kt() ?></figcaption>
            <?php endif ?>
          </figure>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </section>

<?php snippet('footer') ?>
