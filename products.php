<?php
require __DIR__ . '/../app/bootstrap.php';
page_header('Products', 'JABB biological products for organic and conventional markets, using beneficial fungi as a symbiotic endophyte.', 'products');
?>
<section class="page-title"><div class="wrap">
  <h1>Products for organic and conventional markets</h1>
  <p class="lead">Our products promote plant health by using beneficial fungi as a symbiotic endophyte. Endophytes grow with the plant and form a relationship that makes it more resistant to seasonal stressors.</p>
</div></section>

<section class="section">
  <div class="wrap">
    <?php foreach (products() as $p): ?>
      <article class="product" id="<?= e($p['slug']) ?>">
        <header>
          <h2><a href="<?= e(url('/products/' . $p['slug'])) ?>"><?= e($p['name']) ?></a></h2>
          <p class="meta"><?= e($p['market']) ?>. <?= e($p['form']) ?>.</p>
        </header>
        <p><?= e($p['body']) ?></p>
        <ul class="docs">
          <?php foreach ($p['docs'] as [$label, $href]): ?>
            <li><a href="<?= e($href) ?>" target="_blank" rel="noopener"><?= e($label) ?> (PDF)</a></li>
          <?php endforeach; ?>
        </ul>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="section tint" id="crops">
  <div class="wrap">
    <h2>Crops</h2>
    <p class="measure">For use on crops such as, but not limited to:</p>
    <ul class="tags">
      <?php foreach (crop_list() as $c): ?><li><?= e($c) ?></li><?php endforeach; ?>
    </ul>
    <p><a href="<?= e(url('/crops')) ?>">See reported results by crop</a></p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2>Interested in how symbiosis can improve your crops?</h2>
    <p><a class="btn btn-primary" href="<?= e(url('/contact')) ?>">Contact us to learn more</a></p>
  </div>
</section>
<?php page_footer();
