<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $sessionKey
 */
?>

<?php if ($session->has("$sessionKey")) { ?>
    <?php foreach ($session->getFlash("$sessionKey") as $error) { ?>
        <span class="text-danger"><?php echo $error ?></span>
    <?php } ?>
<?php } ?>
