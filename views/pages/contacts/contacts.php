<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View\ViewInterface $view
 */

?>
<?php $view->component("head", [
        "title" => "Bikoo|Kontakty",
        "styles" => [
                "assets/css/breadcrumb-banner.css",
        ],
        'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        ]]); ?>
<body>
<div class="wrapper">
    <?php $view->component("header", [
            "activeMenu" => "kontakty"
    ]) ?>
    <main class="main">
        <section class="breadcrumb-banner breadcrumb-banner--contacts">
            <div class="container breadcrumb__container">
                <div class="breadcrumb__content">
                    <div class="breadcrumb__title">
                        <h1>Kontakty</h1>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="breadcrumb__item">
                            <a class="breadcrumb__link" href="#">Hlavní</a>
                        </li>
                        <li class="breadcrumb__list">
                            <span class="spacer"> // </span>
                        </li>
                        <li class="breadcrumb__item">
                            <a class="breadcrumb__link" href="#">Kontakty</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="contacts">
            <div class="container contacts__container">
                <div class="contacts__row contact">
                    <div class="contact__left">
                        <div class="contact__text">
                            <div class="contact__title"><h2>Pošlete nám zprávu</h2></div>
                            <h4 class="contact__desc">
                                Máte-li jakékoli dotazy nebo potřebujete-li další informace,
                                napište nám zprávu pomocí níže uvedeného formuláře.

                            </h4>
                            <?php $view->component("success", [
                                    "sessionKey" => "mailSuccess"
                            ]) ?>
                            <?php $view->component("success", [
                                "sessionKey" => "mailError"
                            ]) ?>
                        </div>
                        <form
                            class="form-container contact__form"
                            action="/contacts"
                            method="post"
                        >
                            <div class="form-fields">
                                <div class="input-container input-container__flex">
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        pattern="^[^\s]+$"
                                        required=""
                                        placeholder="Vaše jméno"
                                    />
                                    <input
                                        type="text"
                                        id="surname"
                                        name="surname"
                                        pattern="^[^\s]+$"
                                        required=""
                                        placeholder="Vaše přijmení"
                                    />
                                </div>
                                <div class="input-container">
                                    <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            required=""
                                            placeholder="Email"
                                    />
                                </div>
                                <div class="input-container">
                                    <input
                                        type="text"
                                        id="subject"
                                        name="subject"
                                        required=""
                                        placeholder="Téma"
                                    />
                                </div>
                                <div class="input-container">
                      <textarea
                          name="message"
                          placeholder="Vaše zpráva"
                          required=""
                          id="message"
                      ></textarea>
                                </div>
                                <button class="form__button cloud-btn" type="submit">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--redblack">
                                                Odeslat zprávu
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="contact__right">
                        <img
                            class="contact__img"
                            src="assets/img/contact_img-1.jpg"
                            alt="contact1"
                        />
                    </div>
                </div>
                <div class="contacts__map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d34697.291369043785!2d13.369394036698575!3d49.73166534245715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2scz!4v1727888015677!5m2!1suk!2scz"
                        width="100%"
                        height="400px"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
