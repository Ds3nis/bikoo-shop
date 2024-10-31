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
        <?php $view->component("breadcrumb") ?>
        <section class="profile">
            <div class="container profile__container">
                <div class="office">
                    <div class="office__account account">
                        <?php $view->component("profile-menu", [
                                "orders" => "orders"
                        ]) ?>
                        <div class="account__content account-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-5">
                                            <div class="card-header bg-success">
                                                <h4 class="text-white">Objednávka №1 stav</h4>
                                                @if($order->status == 1)
                                                <h6 class="text-white">
                                                    Статус замовлення: В процесі обробки
                                                </h6>
                                                @elseif($order->status == 2)
                                                <h6 class="text-white">
                                                    Статус замовлення: Відправлено
                                                </h6>
                                                @elseif($order->status == 3)
                                                <h6 class="text-white">
                                                    Статус замовлення: Доставлено
                                                </h6>
                                                @endif
                                                <h4 class="text-white">
                                                    Stav objednávky: V procesu zpracování
                                                </h4>
                                                <h4 class="text-white">Datum objednávky</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <h5>Інформація про замовлення</h5>
                                                    <div class="col-md-6">
                                                        <label for="">Jmeno</label>
                                                        <div class="border p-2"></div>
                                                        <label for="">E-mail</label>
                                                        <div class="border p-2"></div>
                                                        <label for="">Kontakty</label>
                                                        <div class="border p-2"></div>
                                                        <label for="">Adresa</label>
                                                        <div class="border p-2"></div>
                                                    </div>
                                                    <div class="col">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Název</th>
                                                                <th scope="col">Množství</th>
                                                                <th scope="col">Cena</th>
                                                                <th scope="col">Obrázek</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 15px; cursor: pointer"
                                                                >
                                                                    <a href="#" class="link-primary"></a>
                                                                </td>
                                                                <td></td>
                                                                <td>11 CZK</td>
                                                                @php $photos = explode("|",
                                                                $product->image); $photos =
                                                                array_filter($photos); @endphp
                                                                <td>
                                                                    <img
                                                                        style="width: 100px; height: 150px object-fit:cover;"
                                                                        src="../img/coming-bike1.png"
                                                                        alt="{{$product->title}}"
                                                                    />
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <h4 class="px-2">
                                                            Celková částka:
                                                            <span class="float-end">1111 CZK</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="account-content__title">-->
                            <!--                              <p>Zatím nemáte žádné objednávky</p>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="../js/burger.js"></script>
</body>
</html>
