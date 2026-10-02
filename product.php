<?php
require __DIR__ . '/../app/bootstrap.php';

$p = find_product((string) ($_GET['slug'] ?? ''));
if (!$p) {
    not_found();
}
page_header($p['name'], $p['short'], 'products');
?>
<section class="page-title"><div class="wrap">
  <p class="crumb"><a href="<?= e(url('/products')) ?>">Products</a> / <?= e($p['name']) ?></p>
  <h1><?= e($p['name']) ?></h1>
  <p class="lead"><?= e($p['body']) ?></p>
</div></section>

<section class="section">
  <div class="wrap two">
    <div class="prose">
      <h2>How to apply</h2>
      <p><?= e($p['apply']) ?></p>
      <p>Active ingredient: <em>Beauveria bassiana</em>. Market: <?= e($p['market']) ?>. Formulation: <?= e($p['form']) ?>.</p>
      <p>Not sure which formulation fits your operation? <a href="<?= e(url('/faqs')) ?>">Read the FAQs</a> or <a href="<?= e(url('/contact')) ?>">ask the team</a>.</p>
    </div>
    <div>
      <h2>Labels and documents</h2>
      <ul class="docs">
        <?php foreach ($p['docs'] as [$label, $href]): ?>
          <li><a href="<?= e($href) ?>" target="_blank" rel="noopener"><?= e($label) ?> (PDF)</a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<section class="section tint">
  <div class="wrap">
    <h2>Other formulations</h2>
    <ul class="tags">
      <?php foreach (products() as $o): if ($o['slug'] === $p['slug']) continue; ?>
        <li><a href="<?= e(url('/products/' . $o['slug'])) ?>"><?= e($o['name']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php page_footer();
