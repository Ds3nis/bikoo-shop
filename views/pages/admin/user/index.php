<?php
/**
 * @var \App\Kernel\View\View $view
 * @var array<\App\Models\User> $users
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
?>
<?php
$view->include("main");

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Uživatelé</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin">Hlavní</a></li>
                    <li class="breadcrumb-item active">Uživatelé</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <!-- Malé boxy (Stat box) -->
        <div class="row flex-column">
            <div class="col-1 mb-3">
                <?php if ($auth->user()->role() < 3) { ?>
                    <!-- Кнопка з повідомленням про відсутність доступу -->
                    <button class="btn btn-block btn-danger" style="min-width: 150px" data-toggle="modal" data-target="#accessDeniedModal">
                        Přidat
                    </button>

                    <!-- Модальне вікно для повідомлення про відсутність доступу -->
                    <div class="modal fade" id="accessDeniedModal" tabindex="-1" role="dialog" aria-labelledby="accessDeniedLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="accessDeniedLabel">Upozornění</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Nemáte dostatečné oprávnění pro provedení této operace.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                <button class="btn btn-block btn-primary" style="min-width: 150px" data-toggle="modal" data-target="#exampleModal">Přidat
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Přidání uživatele</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/users/" method="post">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Jméno</label>
                                            <input type="text" value="" name="name"
                                                   class="form-control"
                                                   id="name"
                                                   required
                                                   placeholder="Zadejte jméno">
                                        </div>

                                        <?php $view->component("errors", [
                                            "sessionKey" => "name"
                                        ]) ?>

                                        <div class="form-group">
                                            <label for="lastName">Příjmení</label>
                                            <input type="text" value="" name="last_name"
                                                   class="form-control"
                                                   id="lastName"
                                                   required
                                                   placeholder="Zadejte příjmení">
                                        </div>

                                        <?php $view->component("errors", [
                                            "sessionKey" => "last_name"
                                        ]) ?>


                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="address">Adresa</label>-->
                                        <!--                                            <input type="text" value="" name="address"-->
                                        <!--                                                   class="form-control"-->
                                        <!--                                                   id="address"-->
                                        <!--                                                   placeholder="Zadejte adresu">-->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                        <span class="text-danger"> </span>-->

                                        <div class="form-group">
                                            <label for="phone">Telefon</label>
                                            <input type="tel"
                                                   value=""
                                                   name="phone"
                                                   class="form-control"
                                                   id="phone"
                                                   required
                                                   placeholder="Zadejte telefonní číslo"
                                                   pattern="\420[0-9]{9}$"
                                                   title="Zadejte telefonní číslo ve formátu 420 a 9 číslic, například +420123456789"
                                            >
                                        </div>

                                        <?php $view->component("errors", [
                                            "sessionKey" => "phone"
                                        ]) ?>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="" name="email"
                                                   class="form-control"
                                                   id="email"
                                                   required
                                                   placeholder="Zadejte email">
                                        </div>

                                        <?php $view->component("errors", [
                                            "sessionKey" => "email"
                                        ]) ?>

                                        <div class="form-group">
                                            <label for="password">Heslo</label>
                                            <input type="password" name="password" class="form-control"
                                                   id="password"
                                                   placeholder="Zadejte heslo"  required>
                                        </div>
                                        <?php $view->component("errors", [
                                            "sessionKey" => "password"
                                        ]) ?>

                                        <div class="form-group">
                                            <label for="role">Vyberte roli</label>
                                            <select class="form-control" name="role" id="role">
                                                <option selected value="1">Role</option>
                                                <option  value="1">Klient
                                                </option>
                                                <option  value="2">Admin
                                                </option>
                                                <option  value="3">SuperAdmin
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít
                                    </button>
                                    <button type="submit" class="btn btn-primary">Uložit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>


            <div class="mt-1">
                <?php $view->include("success-alert", [
                        "sessionKey" => "success"
                ]); ?>
                <?php $view->include("fail-alert", [
                    "sessionKey" => "failed"
                ]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Zákazníci obchodu</h3>

                        </div>
                        <div class="card-body table-responsive p-0" style="height: 450px;">
                            <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jméno</th>
                                    <th>Příjmení</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Role</th>
                                    <th>Datum vytvoření</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($users as $user) { ?>
                                <tr>
                                        <td><?php echo $user->id() ?></td>
                                        <td><a href="/admin/users/<?php echo '?id=' . $user->id() ?>"><?php echo $user->name() ?></a></td>
                                        <td><?php echo $user->lastName() ?></td>
                                        <td><?php echo $user->email() ?></td>
                                        <td><?php echo $user->phone() ?></td>
                                        <td>
                                            <?php
                                            switch ($user->role()) {
                                                case 1:
                                                    echo "Zakaznik";
                                                    break;
                                                case 2:
                                                    echo "Admin";
                                                    break;
                                                case 3:
                                                    echo "SuperAdmin";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $user->createdAt() ?></td>
                                </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
$view->include("ends");
?>
