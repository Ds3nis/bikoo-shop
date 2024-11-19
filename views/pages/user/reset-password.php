<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Auth\User $user
 * @var string $token
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo|Zapomenuté heslo",
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]);

?>


<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <div class="container">
            <section class="reset-password">
                <div class="account-holder__title registration__title">
                    <h1>Změna hesla</h1>
                </div>
                <form class="form-container" action="/reset-password" method="post">
                    <div class="form-fields">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token) ?>">
                        <div class="input-container">
                            <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required=""
                                    placeholder="Zadejte nové heslo"
                            />
                            <div class="highlight"></div>
                        </div>
                        <?php if($session->has("password")) { ?>
                            <div class="text-danger">
                                <ul>
                                    <?php foreach ($session->getFlash("password") as $error) { ?>
                                        <li style="color: red"><?php echo  $error ?></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        <?php  }?>
                        <div class="input-container">
                            <input
                                    type="password"
                                    id="password"
                                    placeholder="Potvrzení hesla"
                                    name="password_confirmation"
                                    required=""
                            />
                            <div class="highlight"></div>
                        </div>
                        <?php if($session->has("password_confirmation")) { ?>
                            <div class="text-danger">
                                <ul>
                                    <?php foreach ($session->getFlash("password_confirmation") as $error) { ?>
                                        <li style="color: red"><?php echo  $error ?></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        <?php  }?>
                        <button class="form__button cloud-btn" type="submit">
                            <nav>
                                <ul class="cloud-btn__list">
                                    <li class="cloud-btn__item cloud-btn__item--redblack">
                                        Změnit heslo
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </li>
                                </ul>
                            </nav>
                        </button>

                        <p class="form__link-text">
                            Vzpomněli jste si na své staré heslo?
                            <a href="/authorisation" class="form__link"
                            ><span>autorizace</span></a
                            >
                        </p>
            </section>
        </div>
    </main>
    <?php $view->component("footer"); ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
