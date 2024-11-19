<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Auth\User $user
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo|Zapomenuté heslo",
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>


<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <div class="container ">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Obnovení hesla
                            <p>Chcete-li obnovit heslo, zadejte svou e-mailovou adresu:</p>
                        </div>
                        <div class="card-body">
                            <form action="/forgot-password" method="POST">
                                <?php $view->component("success", [
                                   "sessionKey" => "sent-success"
                                ]); ?>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required
                                           autofocus>
                                    <?php $view->component("errors", [
                                            "sessionKey" => "email"
                                    ]); ?>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-danger">
                                    Odeslat odkaz
                                </button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php $view->component("footer"); ?>
</div>
<script defer src="assets/js/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
