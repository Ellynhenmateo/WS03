<?php

use Framework\Session;

$messages = [
    [
        'text' => Session::getFlash('success_message'),
        'class' => 'bg-green-100 text-green-800 border-green-300',
    ],
    [
        'text' => Session::getFlash('error_message'),
        'class' => 'bg-red-100 text-red-800 border-red-300',
    ],
];
?>

<?php foreach ($messages as $message) : ?>
<?php if (!empty($message['text'])) : ?>
<div class="message border p-3 my-3 rounded <?= $message['class'] ?>" role="alert">
    <?= htmlspecialchars($message['text']) ?>
</div>
<?php endif; ?>
<?php endforeach; ?>
