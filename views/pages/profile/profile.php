<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Auth\User $user
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
      <?php $view->component("breadcrumb") ?>
        <section class="profile">
            <div class="container profile__container">
                <div class="office">
                    <div class="office__account account">
                        <?php $view->component("profile-menu", [
                                "data" => "data"
                        ]) ?>
                        <div class="account__content account-content">
                            <div class="account-content__title">Osobní údaje</div>
                            <?php $view->component("success", [
                                    "sessionKey" => "updated"
                            ]) ?>
                            <div class="input-group">
                              <label class="label">Datum registrace</label>
                              <input
                                autocomplete="on"
                                name="name"
                                class="input"
                                value="<?php echo $user->createdAt()?> "
                                type="text"
                                readonly
                              />
                              <div></div>

                              <div class="text-danger"></div>
                            </div>
                            <form action="" class="form-container" method="post">
                              <input type="hidden" name="id" value="<?php echo $user->getId()?>">
                              <div class="form__fields">
                                <div class="input-group">
                                  <label class="label">Jméno</label>
                                  <input
                                    autocomplete="on"
                                    name="name"
                                    class="input"
                                    value="<?php echo $user->getName()?>"
                                    type="text"
                                    disabled
                                    required
                                  />
                                  <div></div>
                                    <?php if($session->has("name")) { ?>
                                        <div class="text-danger">
                                            <ul class="mb-0 pl-0">
                                                <?php foreach ($session->getFlash("name") as $error) { ?>
                                                    <li class="pl-0 ml-0" style="color: red"><?php echo  $error ?></li>
                                                <?php  } ?>
                                            </ul>
                                        </div>
                                    <?php  }?>
                                </div>
                                <div class="input-group">
                                  <label class="label">Příjmení</label>
                                  <input
                                    autocomplete="on"
                                    disabled
                                    name="last_name"
                                    value="<?php echo $user->getLastName()?>"
                                    class="input"
                                    type="text"
                                    required
                                  />
                                  <div></div>
                                    <?php if($session->has("last_name")) { ?>
                                        <div class="text-danger">
                                            <ul class="mb-0 pl-0">
                                                <?php foreach ($session->getFlash("last_name") as $error) { ?>
                                                    <li style="color: red"><?php echo  $error ?></li>
                                                <?php  } ?>
                                            </ul>
                                        </div>
                                    <?php  }?>
                                </div>
                                <div class="input-group">
                                  <label class="label">E-mail</label>
                                  <input
                                    autocomplete="on"
                                    disabled
                                    name="email"
                                    value="<?php echo $user->getEmail()?>"
                                    class="input"
                                    type="email"
                                    required
                                  />
                                  <div></div>

                                    <?php if($session->has("email")) { ?>
                                        <div class="text-danger">
                                            <ul class="mb-0 p-sm-0">
                                                <?php foreach ($session->getFlash("email") as $error) { ?>
                                                    <li style="color: red"><?php echo  $error ?></li>
                                                <?php  } ?>
                                            </ul>
                                        </div>
                                    <?php  }?>
                                </div>
                                <div class="input-group">
                                  <label class="label">Telefonní číslo</label>
                                  <input
                                    type="tel"
                                    id="phone"
                                    disabled
                                    name="phone"
                                    class="input"
                                    value="<?php echo $user->getPhone()?>"
                                    required
                                    pattern="\420[0-9]{9}$"
                                    title="Zadejte telefonní číslo ve formátu 420 a 9 číslic, například +420123456789"
                                  />
                                  <div></div>

                                    <?php if($session->has("phone")) { ?>
                                        <div class="text-danger">
                                            <ul class="mb-0 pl-0">
                                                <?php foreach ($session->getFlash("phone") as $error) { ?>
                                                    <li style="color: red"><?php echo  $error ?></li>
                                                <?php  } ?>
                                            </ul>
                                        </div>
                                    <?php  }?>
                                </div>
                                <div class="input-group">
                                  <label class="label">Dodací adresa</label>
                                  <input
                                    autocomplete="off"
                                    disabled
                                    name="address"
                                    value=""
                                    class="input"
                                    type="text"
                                  />
                                  <div></div>

                                  <div class="text-danger"></div>
                                </div>
                              </div>
                              <button class="form__button_edit" id="edit" type="button">
                                Upravit
                              </button>
                              <button class="form__button" type="submit" id="submit">
                                Uložit
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
<script defer src="assets/js/personal-data.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
