<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>
<?php $view->component("head", [
    'title' => "Bikoo|Osobní účet",
    'styles' => [
        "assets/css/breadcrumb-banner.css",
        "assets/css/office.css"
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <?php $view->component("breadcrumb", [
            "title" => "Osobní účet",
            "image" => "breadcrumb-banner--profile",
            "links" => [
                [
                    "title" => "Změna hesla",
                    "link" => "/profile/change/password"
                ]
            ]
        ]); ?>
        <section class="profile">
            <div class="container profile__container">
                <div class="office">
                    <div class="office__account account">
                        <?php $view->component("profile-menu",[
                                "change" => "change"
                        ]) ?>
                        <div class="account__content account-content">
                            <div class="account-content__title">Změna hesla</div>
                            <form
                                action="/profile/change/password"
                                class="form-container form-container_change"
                                method="post"
                            >
                                <?php $view->component("success",[
                                        "sessionKey" => "verify"
                                ]) ?>

                                <div class="form__fields">
                                    <div class="input-group">
                                        <label class="label">Aktuální heslo</label>
                                        <input
                                            autocomplete="on"
                                            name="password"
                                            class="input input_change"
                                            value=""
                                            type="password"
                                            required
                                        />
                                        <div></div>
                                        <?php if($session->has("password")) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul class="mb-0 p-0">
                                                <?php foreach ($session->getFlash("password") as $error) { ?>
                                                    <li><?php echo $error; ?></li>
                                                <?php } ?>
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php } else {
                                            echo "<span style='color: red'>" . $session->getFlash("notverify") . "</span>";
                                        } ?>
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Nové heslo</label>
                                        <input
                                            autocomplete="on"
                                            name="newpassword"
                                            class="input input_change"
                                            value=""
                                            type="password"
                                            required
                                        />
                                        <div></div>
                                        <?php $view->component("errors", [
                                            "sessionKey" => "newpassword"
                                        ]) ?>
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Potvrzení hesla</label>
                                        <input
                                            autocomplete="on"
                                            name="newpassword_confirmation"
                                            class="input input_change"
                                            value=""
                                            type="password"
                                            required
                                        />
                                        <div></div>
                                        <?php $view->component("errors", [
                                                "sessionKey" => "newpassword_confirmation"
                                        ]) ?>
                                    </div>
                                </div>
                                <button class="change_password" type="submit" id="submit">
                                    Aktualizace hesla
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
