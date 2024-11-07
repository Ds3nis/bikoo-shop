<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View\View $view
 */
?>
<?php
$view->component("head");

?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <section class="autorisation">
            <div class="container authorisation__container">
                <div class="account-holder">
                    <div class="account-holder__left authorisation__left">
                        <div class="account-holder__title authorisation__title">
                            <h1>Přihlášení</h1>
                        </div>
                        <form class="form-container" action="/authorisation" method="post">
                            <div class="form-fields">
                                <?php if($session->has("login-error")) { ?>
                                    <div class="text-danger" style="color: red; margin: 10px 0;">
                                        <p><?php echo $session->getFlash("login-error")?></p>
                                    </div>
                                <?php  }?>
                                <div class="input-container">
                                    <input
                                        type="email"
                                        id="email"
                                        required=""
                                        name="email"
                                        placeholder="Zadejte svůj e-mail"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <div class="input-container">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        required=""
                                        placeholder="Zadejte svoje heslo"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <a href="#" class="form__link">
                                    <p class="form__link-pass">Zapomněli jste heslo?</p>
                                </a>
                                <button class="form__button cloud-btn" type="submit">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--redblack">
                                                přihlasit se
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </button>

                                <p class="form__link-text">
                                    Nemáte účet? Prosím,
                                    <a href="/registration" class="form__link"
                                    ><span>vytvořte si</span></a
                                    >
                                    účet nyní
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="account-holder__right authorisation__right">
                        <img
                            class="account-holder__img"
                            src="assets/img/registration.png"
                            alt="registration"
                        />
                        <p class="account-holder__desc">Vítejte zpět Bikoo</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer"); ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
