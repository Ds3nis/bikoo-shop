<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $sessionKey
 */
?>

<?php if ($session->has("$sessionKey")) { ?>
    <div class="alert alert-success alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Zpráva!</h5>
        <?php echo $session->getFlash("$sessionKey"); ?>
    </div>
<?php } ?>
