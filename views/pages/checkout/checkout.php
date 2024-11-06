<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Models\Order $order
 * @var array<\App\Models\Product> $productsInOrder
 * @var \App\Models\User $user
 * @var int $countAll
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo|",
    'styles' => [
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
        "assets/css/checkout.css",
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <div class="main">
        <div class="container">
            <div class="checkout">
                <div class="checkout__title">
                    <h4>Dokončení objednávky</h4>
                </div>
                <div class="checkout__holder">
                    <form action="/checkout-order" class="checkout__form" method="post">
                    <div class="form__fields">
                        <div class="input-group">
                            <label class="label"><i class="fa fa-user"></i>Jméno<sup>*</sup></label>
                            <input name="name" class="input input_change" value="<?php echo $user->name()?>"
                                   type="text" placeholder="Zadejte vaše jméno" required>
                            <div></div>
                            <?php if($session->has("name")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("name") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="input-group">
                            <label class="label"><i class="fa fa-user"></i>Příjmení<sup>*</sup></label>
                            <input name="last_name" class="input input_change"
                                   value="<?php echo $user->lastName()?>"
                                   type="text" placeholder="Zadejte vaše příjmení" required>
                            <div></div>
                            <?php if($session->has("last_name")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("last_name") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="input-group">
                            <label class="label"><i class="fa fa-envelope"></i>Email<sup>*</sup></label>
                            <input name="email" class="input input_change" value="<?php echo $user->email()?>"
                                   type="email" placeholder="Zadejte váš email" required>
                            <div></div>
                            <?php if($session->has("email")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("email") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="input-group">
                            <label class="label"><i class="fa fa-address-card-o"></i> Město <sup>*</sup></label>
                            <input name="city" class="input input_change" value=""
                                   type="text" placeholder="Zadejte město" required>
                            <?php if($session->has("city")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("city") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>

                        <div class="input-group">
                            <label class="label"><i class="fa fa-address-card-o"></i> PSČ <sup>*</sup></label>
                            <input name="psc" class="input input_change" value=""
                                   type="text" placeholder="Zadejte PSČ" required>
                            <?php if($session->has("psc")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("psc") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>

                        <div class="input-group">
                            <label class="label"><i class="fa fa-address-card-o"></i> Ulice <sup>*</sup></label>
                            <input name="street" class="input input_change" value=""
                                   type="text" placeholder="Zadejte ulici" required>
                            <?php if($session->has("street")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("street") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>

                        <div class="input-group">
                            <label class="label"><i class="fa fa-address-card-o"></i> Číslo domu <sup>*</sup></label>
                            <input name="home" class="input input_change" value=""
                                   type="text" placeholder="Zadejte číslo domu" required>
                            <?php if($session->has("home")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("home") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>


                        <div class="input-group">
                            <label class="label"><i class="fa fa-phone"></i>Telefon<sup>*</sup></label>
                            <input name="phone" class="input input_change" value="<?php echo $user->phone()?>"
                                   type="text" placeholder="Zadejte vaše telefonní číslo"
                                   pattern="\420[0-9]{9}$"
                                   title="Zadejte telefonní číslo ve formátu 420 a 9 číslic, například 420123456789"
                                   required>
                            <div></div>
                            <?php if($session->has("phone")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("phone") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                    </div>
                    <button class="checkout__form-btn" type="submit">
                        Dokončit objednávku
                    </button>
                    </form>
                    <div class="checkout__holder-products">
                        <div class="container">
                            <h4>Košík
                                <span class="price" style="color:black"><i class="fa fa-shopping-cart">
                            </i><b><?php echo '  ' . $countAll ?></b>
                        </span>
                            </h4>
                            <p>
                            <h4>Celkový počet:
                                <span class="price"><?php echo count($productsInOrder)?></span>
                            </h4>
                            </p>
                            <?php foreach($productsInOrder as $product) {?>
                            <p>
                                <a href="/catalog/product/?id=<?php echo $product->id() ?>"><?php echo $product->name()?></a>
                                <span class="price"> <?php echo number_format($product->price(), 0, '.', ' ') ?> Kč / ks</span>
                            </p>
                            <?php } ?>
                            <hr>
                            <p>Celkem: <span class="price" style="color:black"><b><?php echo $order->price() ?> CZK</b></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
</body>