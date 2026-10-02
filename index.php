<?php
require __DIR__ . '/../app/bootstrap.php';

$featured = ['sbb-2-5-inoculant', 'spe-120-es', 'endoshield-st'];
$labels = [
    'sbb-2-5-inoculant' => 'For conventional growers. Liquid or talc/graphite.',
    'spe-120-es'        => 'To meet organic standards. Liquid or talc/graphite.',
    'endoshield-st'     => 'For use in commercial seed treaters.',
];

page_header('', 'JABB of the Carolinas brings sustainable, biological solutions to growers, using beneficial fungi that live inside the crop. Established in 1994.', 'home');
?>
<section class="hero">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1>Help plants reach their full potential</h1>
      <p class="lead">Beneficial fungi that grow inside the crop and help it handle stress. Made by farmers, for farmers, since 1994.</p>
      <p class="actions">
        <a class="btn btn-primary" href="<?= e(url('/products')) ?>">See products</a>
        <a class="btn btn-ghost" href="<?= e(url('/contact')) ?>">Talk to the team</a>
      </p>
    </div>
    <?php require APP_ROOT . '/app/partials/cutaway.php'; ?>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2>A natural solution to your success</h2>
    <p class="measure">JABB offers biological products for both organic and conventional markets. Pick the formulation that fits how you plant.</p>
    <ul class="rows">
      <?php foreach ($featured as $slug): $p = find_product($slug); ?>
        <li class="row">
          <h3><?= e($p['name']) ?></h3>
          <p><?= e($labels[$slug]) ?> Active ingredient <em>Beauveria bassiana</em>.</p>
          <a href="<?= e(url('/products/' . $slug)) ?>">Labels and details<span class="sr"> for <?= e($p['name']) ?></span></a>
        </li>
      <?php endforeach; ?>
    </ul>
    <p><a href="<?= e(url('/products')) ?>">All five formulations</a></p>
  </div>
</section>

<section class="section tint">
  <div class="wrap">
    <h2>What happens after planting</h2>
    <ol class="steps">
      <li><h3>Spores go on the seed</h3><p>Apply in-furrow, in the planter box, or through a commercial seed treater.</p></li>
      <li><h3>The seed germinates, so do the spores</h3><p>Beauveria starts growing inside the young plant, outside the reach of seed fungicides.</p></li>
      <li><h3>The colonies move through the plant</h3><p>They grow between cells in the roots, stems and leaves and stay through the season.</p></li>
    </ol>
    <p><a href="<?= e(url('/about')) ?>">What is an endophyte?</a></p>
  </div>
</section>

<section class="section dark">
  <div class="wrap">
    <h2>What growers have reported</h2>
    <table class="results">
      <caption class="sr">Average yield changes reported by JABB</caption>
      <tbody>
      <?php foreach (array_slice(yield_data(), 0, 5) as [$crop, $headline]): ?>
        <tr><th scope="row"><?= e($crop) ?></th><td><?= e($headline) ?></td></tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <p class="fine">Figures are JABB-reported trial and grower averages. Results vary by field and season.</p>
    <p><a class="btn btn-primary" href="<?= e(url('/crops')) ?>">See crop results</a></p>
  </div>
</section>

<section class="section">
  <div class="wrap two">
    <div>
      <h2>A biological company run by farmers</h2>
      <p>Established nearly 30 years ago in 1994, JABB of the Carolinas is committed to bringing sustainable, biological solutions to the agricultural market. It started with researchers and farmers looking for safer pest management and now focuses on beneficial microbes that live in the plant.</p>
      <p><a href="<?= e(url('/about')) ?>">Read our story</a></p>
    </div>
    <div class="cta-box">
      <h2>Want to see how symbiosis could fit your crops?</h2>
      <p><a class="btn btn-primary" href="<?= e(url('/contact')) ?>">Contact JABB</a></p>
    </div>
  </div>
</section>
<?php page_footer();
