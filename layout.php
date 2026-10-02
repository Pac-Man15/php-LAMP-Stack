<?php
declare(strict_types=1);

function page_header(string $title, string $desc = '', string $active = ''): void
{
    $site  = (string) config('site_name');
    $full  = $title === '' ? $site : $title . ' | ' . $site;
    $desc  = $desc !== '' ? $desc : 'Biological solutions for growers, built on beneficial fungi that live inside the crop.';
    $path  = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $canon = rtrim((string) config('site_url'), '/') . $path;

    $nav = [
        'home'     => ['Home', '/'],
        'about'    => ['About', '/about'],
        'products' => ['Products', '/products'],
        'crops'    => ['Crops', '/crops'],
        'faqs'     => ['FAQs', '/faqs'],
        'contact'  => ['Contact', '/contact'],
    ];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($full) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<link rel="canonical" href="<?= e($canon) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e($site) ?>">
<meta property="og:title" content="<?= e($full) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<link rel="icon" href="<?= e(asset('img/favicon.svg')) ?>" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700&amp;family=Public+Sans:ital,wght@0,400;0,600;1,400&amp;display=swap">
<link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="site-header">
  <div class="wrap bar">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="<?= e($site) ?> home">
      <?php if (is_file(APP_ROOT . '/public/assets/img/logo.png')): ?>
        <img src="<?= e(asset('img/logo.png')) ?>" alt="JABB" height="44">
      <?php else: ?>
        <span class="wordmark">JABB</span><span class="wordmark-sub">of the Carolinas</span>
      <?php endif; ?>
    </a>
    <button class="nav-toggle" aria-expanded="false" aria-controls="site-nav">Menu</button>
    <nav id="site-nav" class="site-nav" aria-label="Main">
      <ul>
        <?php foreach ($nav as $key => [$label, $href]): ?>
          <li class="<?= $key === 'products' ? 'has-sub' : '' ?>">
            <a href="<?= e(url($href)) ?>"<?= $active === $key ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
            <?php if ($key === 'products'): ?>
              <ul class="sub">
                <?php foreach (products() as $p): ?>
                  <li><a href="<?= e(url('/products/' . $p['slug'])) ?>"><?= e($p['name']) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
<main id="main">
<?php
}

function page_footer(): void
{
    $c = company();
    ?>
</main>
<footer class="site-footer">
  <div class="wrap foot-grid">
    <div>
      <p class="foot-brand">JABB of the Carolinas</p>
      <p>Helps farmers increase their success and profits through sustainable, biological solutions for today’s agricultural market.</p>
    </div>
    <div>
      <h2>Company</h2>
      <ul>
        <li><a href="<?= e(url('/')) ?>">Home</a></li>
        <li><a href="<?= e(url('/about')) ?>">About</a></li>
        <li><a href="<?= e(url('/contact#team')) ?>">Team</a></li>
        <li><a href="<?= e(url('/contact')) ?>">Contact</a></li>
      </ul>
    </div>
    <div>
      <h2>Support</h2>
      <ul>
        <li><a href="<?= e(url('/products')) ?>">Products</a></li>
        <li><a href="<?= e(url('/faqs')) ?>">FAQs</a></li>
        <li><a href="<?= e(url('/contact')) ?>">Help</a></li>
      </ul>
    </div>
    <div>
      <h2>Contact us</h2>
      <address>
        <a href="mailto:<?= e($c['email']) ?>"><?= e($c['email']) ?></a><br>
        <a href="tel:<?= e($c['phone_raw']) ?>"><?= e($c['phone']) ?></a><br>
        <?= e($c['street']) ?><br><?= e($c['city']) ?>
      </address>
    </div>
  </div>
  <div class="wrap legal">&copy; <?= date('Y') ?> JABB of the Carolinas. Established <?= (int) $c['founded'] ?>.</div>
</footer>
<script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
<?php
}
