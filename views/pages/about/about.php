
<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo | O projektu",
    'styles' => [
        "assets/css/breadcrumb-banner.css",
        "assets/css/about.css", // Можете додати кастомні стилі для сторінки
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>

<body>
<div class="wrapper">
    <?php $view->component("header", [
        "activeMenu" => "onas"
    ]); ?>
    <main class="main">
        <?php $view->component("breadcrumb", [
            "title" => "O projektu",
            "image" => "",
            "links" => [
                    [
                            "title" => "O NÁS",
                            "link" => "/about"
                    ]
            ]
        ]); ?>

        <div class="container py-5">
            <section class="about-section">
                <div class="row align-items-center">
                        <h2 class="fw-bold text-center">O projektu</h2>
                        <p class="text text-justify">
                            Tento projekt je součástí semestrální práce v rámci předmětu <strong>KIV/WEB</strong>.
                            Jeho cílem je vytvořit internetový obchod s jízdními koly, kde si uživatelé mohou prohlédnout nabídku
                            produktů, zobrazit jejich detailní informace, přidat produkty do košíku a provést demonstrační nákup.
                        </p>
                        <p class="text text-justify">
                            Administrátor má možnost spravovat tabulky databáze prostřednictvím administračního panelu.
                            Projekt využívá moderní technologie a zaměřuje se na jednoduché uživatelské prostředí a efektivní správu dat.
                        </p>
                </div>
            </section>

            <section class="features-section mt-5">
                <h3 class="text-center fw-bold">Klíčové vlastnosti</h3>
                <div class="row mt-4">
                    <div class="col-md-4 text-center">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Prohlížení produktů</h5>
                                <p class="card-text">Uživatelé si mohou prohlédnout širokou nabídku jízdních kol s detailními informacemi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Demonstrační nákup</h5>
                                <p class="card-text">Simulace nákupního procesu, kde si uživatelé mohou přidat produkty do košíku a provést objednávku.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Administrační panel</h5>
                                <p class="card-text">Možnost spravovat produkty a databázové tabulky prostřednictvím jednoduchého rozhraní.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
