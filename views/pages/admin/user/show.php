<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Models\User $user
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
                <h1 class="m-0"><?php echo $user->name()?> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin">Hlavní stránka</a></li>
                    <li class="breadcrumb-item active">Uživatelé</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-2 mb-3">
                <a href="admin/edit/?id=<?php echo $user->id()?>"
                   class="btn btn-block btn-primary">Upravit</a>
            </div>

            <?php if ($auth->user()->role() < 3) { ?>
                <!-- Кнопка з повідомленням про відсутність доступу -->
                <button class="btn btn-block btn-danger col-2 mb-3" style="min-width: 150px" data-toggle="modal" data-target="#accessDeniedModal">
                    Smazat
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
            <form action="/admin/delete" class="col-2 mb-3" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user->id()?>">
                <button type="submit" class="btn btn-block btn-danger">Smazat</button>
            </form>
            <?php } ?>
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
            <div class="card-body table-responsive p-0" style="height: 450px;">
                <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Datum vytvoření</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $user->id()?></td>
                        <td><?php echo $user->name()?></td>
                        <td><?php echo $user->lastName()?></td>
                        <td><?php echo $user->phone()?></td>
                        <td><?php echo $user->email()?></td>
                        <td><?php echo $user->createdAt()?></td>
                    </tr>
                    </tbody>
                </table>
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
