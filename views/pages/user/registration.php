
<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View\ViewInterface $view
 */
?>
<?php
$view->component("head", [
        'title' => "Bikoo|Registrace",
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]);
?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <section class="registration">
            <div class="container registration__container">
                <div class="account-holder">
                    <div class="account-holder__right registration__right">
                        <img
                            class="account-holder__img"
                            src="assets/img/login.png"
                            alt="registration"
                        />
                        <p class="account-holder__desc">Vítejte zpět Bikoo</p>
                    </div>
                    <div class="account-holder__left registration__left">
                        <div class="account-holder__title registration__title">
                            <h1>Vytvořit účet</h1>
                        </div>
                        <form class="form-container" action="/registration" method="post">
                            <div class="form-fields">
                                <div class="input-container">
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        pattern="^[^\s]+$"
                                        required=""
                                        placeholder="Zadejte jméno"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <?php if($session->has("name")) { ?>
                                    <div class="text-danger">
                                        <ul>
                                            <?php foreach ($session->getFlash("name") as $error) { ?>
                                                <li style="color: red"><?php echo  $error ?></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                <?php  }?>
                                <div class="text-danger"></div>
                                <div class="input-container">
                                    <input
                                        type="text"
                                        id="surname"
                                        pattern="^[^\s]+$"
                                        name="last_name"
                                        required=""
                                        placeholder="Zadejte příjmení"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <?php if($session->has("surname")) { ?>
                                    <div class="text-danger">
                                        <ul>
                                            <?php foreach ($session->getFlash("surname") as $error) { ?>
                                                <li style="color: red"><?php echo  $error ?></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                <?php  }?>
                                <div class="input-container">
                                    <input
                                        type="email"
                                        id="email"
                                        required=""
                                        name="email"
                                        placeholder="Zadejte e-mail"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <?php if($session->has("email")) { ?>
                                    <div class="text-danger">
                                        <ul>
                                            <?php foreach ($session->getFlash("email") as $error) { ?>
                                                <li style="color: red"><?php echo  $error ?></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                <?php  }?>
                                <div class="input-container">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        required=""
                                        placeholder="Zadejte heslo"
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
                                <div class="input-container">
                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        required
                                        placeholder="Zadejte telefonní číslo"
                                        pattern="\420[0-9]{9}$"
                                        title="Zadejte telefonní číslo ve formátu 420 a 9 číslic, například +420123456789"
                                    />
                                    <div class="highlight"></div>
                                </div>
                                <?php if($session->has("phone")) { ?>
                                    <div class="text-danger">
                                        <ul>
                                            <?php foreach ($session->getFlash("phone") as $error) { ?>
                                                <li style="color: red"><?php echo  $error ?></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                <?php  }?>
                                <button class="form__button cloud-btn" type="submit">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--redblack">
                                                vytvořit účet
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </button>

                                <p class="form__link-text">
                                    Máte již účet? Prosím,
                                    <a href="/authorisation" class="form__link"
                                    ><span>přihlaste se</span></a
                                    >
                                    zde
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer"); ?>
</div>
<script defer src="assets/js/burger.js"></script>
</body>
</html>
