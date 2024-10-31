<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $sessionKey
 */
?>

<?php if($session->has("$sessionKey")) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0 p-0">
            <?php foreach ($session->getFlash("$sessionKey") as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>