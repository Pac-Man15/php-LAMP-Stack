<?php
require __DIR__ . '/../app/bootstrap.php';
page_header('Crop results', 'Yield and plant health results reported by JABB for corn, soybeans, wheat, potatoes, cotton and vegetables.', 'crops');
?>
<section class="page-title"><div class="wrap">
  <h1>Yield data by crop</h1>
  <p class="lead">Results reported by JABB from trials and grower fields. Results vary by field and season.</p>
</div></section>

<section class="section">
  <div class="wrap">
    <div class="crop-list">
      <?php foreach (yield_data() as [$crop, $headline, $points, $pdf]): ?>
        <article class="crop">
          <h2><?= e($crop) ?></h2>
          <p class="big"><?= e($headline) ?></p>
          <ul>
            <?php foreach ($points as $pt): ?><li><?= e($pt) ?></li><?php endforeach; ?>
          </ul>
          <?php if ($pdf): ?><p><a href="<?= e($pdf) ?>" target="_blank" rel="noopener">Read the potato research (PDF)</a></p><?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section tint">
  <div class="wrap">
    <h2>Trial reports</h2>
    <ul class="docs">
      <?php foreach (trial_reports() as [$label, $href]): ?>
        <li><a href="<?= e($href) ?>" target="_blank" rel="noopener"><?= e($label) ?> (PDF)</a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2>For growers, by growers</h2>
    <p><a class="btn btn-primary" href="<?= e(url('/about')) ?>">Learn more about JABB</a></p>
  </div>
</section>
<?php page_footer();
