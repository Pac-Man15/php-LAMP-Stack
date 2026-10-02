<?php
if (!defined('APP_ROOT')) {
    require __DIR__ . '/../app/bootstrap.php';
    http_response_code(404);
}
page_header('Page not found', '', '');
?>
<section class="page-title"><div class="wrap">
  <h1>That page is not here</h1>
  <p class="lead">The link may be old or mistyped.</p>
  <p class="actions">
    <a class="btn btn-primary" href="<?= e(url('/products')) ?>">Browse products</a>
    <a class="btn btn-ghost" href="<?= e(url('/')) ?>">Go home</a>
  </p>
</div></section>
<?php page_footer();
