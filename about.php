<?php
require __DIR__ . '/../app/bootstrap.php';
page_header('About', 'JABB of the Carolinas was founded in 1994 by researchers and farmers. Today it uses beneficial microbes as plant endophytes.', 'about');
?>
<section class="page-title"><div class="wrap">
  <h1>Over 30 years of working with growers</h1>
</div></section>

<section class="section">
  <div class="wrap two">
    <div class="prose">
      <h2>Our story</h2>
      <p>Established in 1994, JABB of the Carolinas offers sustainable biological solutions to growers. JABB was started by a group of researchers and farmers looking for alternative and safer pest management practices in livestock facilities.</p>
      <p>As JABB continued to grow and innovate, the team began exploring how beneficial microbes can benefit plant health. Today, our primary focus is using beneficial microbes as plant <strong>endophytes</strong>.</p>
    </div>
    <div class="prose">
      <h2>What is an endophyte?</h2>
      <p>Endophytes are microorganisms that live in plant tissue without causing harm. The relationship helps a plant thrive in its environment. Plants with endophytic relationships have improved photosynthetic efficiency, induced systemic resistance, enhanced resistance to seasonal stresses, and increased growth.</p>
      <p>Beauveria’s presence throughout the plant is maintained through the growing season.</p>
    </div>
  </div>
</section>

<section class="section tint">
  <div class="wrap">
    <h2>For growers, by growers</h2>
    <div class="video">
      <iframe src="https://player.vimeo.com/video/1030896498" title="JABB of the Carolinas company video" loading="lazy" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
    </div>
    <p><a href="<?= e(url('/contact#team')) ?>">Meet the team</a></p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2>Interested in how symbiosis can improve your crops?</h2>
    <p><a class="btn btn-primary" href="<?= e(url('/contact')) ?>">Contact us</a></p>
  </div>
</section>
<?php page_footer();
