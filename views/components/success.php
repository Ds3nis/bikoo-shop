<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $sessionKey
 */
?>

<?php if ($session->has("$sessionKey")) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $session->getFlash("$sessionKey"); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>