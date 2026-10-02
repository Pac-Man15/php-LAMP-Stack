<?php
require __DIR__ . '/../app/bootstrap.php';
start_session();

const MSG_MAX = 1000;
$errors = [];
$old = ['name' => '', 'email' => '', 'topic' => 'general', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name']    = trim((string) ($_POST['name'] ?? ''));
    $old['email']   = trim((string) ($_POST['email'] ?? ''));
    $old['topic']   = (string) ($_POST['topic'] ?? '');
    $old['message'] = trim((string) ($_POST['message'] ?? ''));

    // Bot checks: honeypot, minimum fill time, CSRF, simple rate limit.
    $bot = ($_POST['website'] ?? '') !== ''
        || (time() - (int) ($_SESSION['form_t'] ?? time())) < 3;

    if (!csrf_valid($_POST['csrf'] ?? null)) {
        $errors[] = 'Your session expired. Please try sending again.';
    } elseif (!$bot) {
        $sent = array_filter($_SESSION['sent'] ?? [], fn ($t) => $t > time() - 3600);
        if (count($sent) >= 3) {
            $errors[] = 'Too many messages from this browser. Please call us at ' . company()['phone'] . '.';
        }

        $topics = contact_topics();
        if ($old['name'] === '' || mb_strlen($old['name']) > 100) {
            $errors['name'] = 'Enter your name.';
        }
        if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($old['email']) > 150) {
            $errors['email'] = 'Enter a valid email address so we can reply.';
        }
        if (!isset($topics[$old['topic']])) {
            $errors['topic'] = 'Choose who should get your message.';
        }
        $len = mb_strlen($old['message']);
        if ($len < 10 || $len > MSG_MAX) {
            $errors['message'] = 'Write between 10 and ' . MSG_MAX . ' characters.';
        }

        if (!$errors) {
            $mailSent = false;
            $to   = config('mail_routes')[$old['topic']] ?? company()['email'];
            $from = (string) config('mail_from');
            $clean = fn (string $s) => trim(preg_replace('/[\r\n]+/', ' ', $s));

            $body = "Name: {$clean($old['name'])}\nEmail: {$clean($old['email'])}\nTopic: {$topics[$old['topic']]}\n\n{$old['message']}\n";
            $headers = [
                'From'         => $from,
                'Reply-To'     => $clean($old['email']),
                'Content-Type' => 'text/plain; charset=UTF-8',
            ];
            $mailSent = @mail($to, 'Website message: ' . $topics[$old['topic']], $body, $headers);
            if (!$mailSent) {
                error_log('JABB contact mail() failed for topic ' . $old['topic']);
            }

            $stored = false;
            if ($pdo = db()) {
                try {
                    $pdo->prepare('INSERT INTO contact_messages (name, email, topic, message, mail_sent) VALUES (?, ?, ?, ?, ?)')
                        ->execute([$old['name'], $old['email'], $old['topic'], $old['message'], (int) $mailSent]);
                    $stored = true;
                } catch (Throwable $ex) {
                    error_log('JABB contact insert failed: ' . $ex->getMessage());
                }
            }

            if ($mailSent || $stored) {
                $sent[] = time();
                $_SESSION['sent'] = $sent;
                flash('ok', 'Thanks, your message is on its way. We will reply by email.');
                header('Location: ' . url('/contact'));
                exit;
            }
            $errors[] = 'We could not send your message. Please call ' . company()['phone'] . ' or email ' . company()['email'] . '.';
        }
    } else {
        // Looks like a bot: act as if it worked, do nothing.
        flash('ok', 'Thanks, your message is on its way. We will reply by email.');
        header('Location: ' . url('/contact'));
        exit;
    }
}

$_SESSION['form_t'] = time();
$flash = flash();
$c = company();
page_header('Contact', 'Contact JABB of the Carolinas in Pine Level, NC, and meet the team.', 'contact');
?>
<section class="page-title"><div class="wrap">
  <h1>Get in touch</h1>
</div></section>

<section class="section">
  <div class="wrap two">
    <div>
      <?php if ($flash): ?>
        <p class="notice ok" role="status"><?= e($flash['message']) ?></p>
      <?php endif; ?>
      <?php if ($errors): ?>
        <div class="notice err" role="alert">
          <p>Fix the following and send again:</p>
          <ul><?php foreach ($errors as $m): ?><li><?= e($m) ?></li><?php endforeach; ?></ul>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= e(url('/contact')) ?>" class="form" novalidate>
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <label for="name">Name</label>
        <input id="name" name="name" type="text" required maxlength="100" autocomplete="name" value="<?= e($old['name']) ?>">

        <label for="email">Email address</label>
        <input id="email" name="email" type="email" required maxlength="150" autocomplete="email" value="<?= e($old['email']) ?>">

        <label for="topic">Who should get this?</label>
        <select id="topic" name="topic" required>
          <?php foreach (contact_topics() as $k => $label): ?>
            <option value="<?= e($k) ?>"<?= $old['topic'] === $k ? ' selected' : '' ?>><?= e($label) ?></option>
          <?php endforeach; ?>
        </select>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="6" required maxlength="<?= MSG_MAX ?>" data-counter="msg-count"><?= e($old['message']) ?></textarea>
        <p class="count"><span id="msg-count">0</span> / <?= MSG_MAX ?></p>

        <button class="btn btn-primary" type="submit">Send message</button>
      </form>
    </div>

    <aside class="prose">
      <h2>JABB of the Carolinas</h2>
      <address>
        <?= e($c['street']) ?><br><?= e($c['city']) ?><br>
        <a href="tel:<?= e($c['phone_raw']) ?>"><?= e($c['phone']) ?></a><br>
        <a href="mailto:<?= e($c['email']) ?>"><?= e($c['email']) ?></a>
      </address>
      <p><a href="<?= e($c['maps']) ?>" target="_blank" rel="noopener">Open in Google Maps</a></p>
    </aside>
  </div>
</section>

<section class="section tint" id="team">
  <div class="wrap">
    <h2>Meet the team</h2>
    <ul class="team">
      <?php foreach (team() as [$name, $role, $phones]): ?>
        <li>
          <span class="avatar" aria-hidden="true"><?= e(mb_substr($name, 0, 1)) ?></span>
          <h3><?= e($name) ?></h3>
          <p class="role"><?= e($role) ?></p>
          <p>
            <?php foreach ($phones as $ph): ?>
              <a href="tel:<?= e(preg_replace('/\D/', '', $ph)) ?>"><?= e($ph) ?></a><br>
            <?php endforeach; ?>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php page_footer();
