<?php
require __DIR__ . '/../app/bootstrap.php';
page_header('FAQs', 'Answers about applying JABB Beauveria bassiana products, how they work in the plant, and which formulation to choose.', 'faqs');
?>
<section class="page-title"><div class="wrap">
  <h1>Frequently asked questions</h1>
</div></section>

<section class="section">
  <div class="wrap narrow">
    <?php foreach (faqs() as $i => [$q, $a]): ?>
      <details class="faq"<?= $i === 0 ? ' open' : '' ?>>
        <summary><?= e($q) ?></summary>
        <div class="prose"><?= str_starts_with($a, '<p>') ? $a : '<p>' . $a . '</p>' /* trusted content from data.php */ ?></div>
      </details>
    <?php endforeach; ?>
    <p class="after">More questions? <a href="<?= e(url('/contact')) ?>">Contact us</a>.</p>
  </div>
</section>
<?php page_footer();
