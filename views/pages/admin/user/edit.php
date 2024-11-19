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
                <h1 class="m-0">Úprava uživatelského účtu</h1>
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
        <div class="row justify-content-center">
            <div class="pt-3 col-6 card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upravit uživatelský účet <?php echo $user->id()?></h3></div>
                <?php $view->include("success-alert", [
                    "sessionKey" => "updated"
                ]); ?>
                <?php $view->include("fail-alert", [
                    "sessionKey" => "no_rights"
                ]); ?>
                <form action="admin/update/?id=<?php echo  $user->id() ?>" enctype="multipart/form-data"
                      method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Změnit jméno</label>
                            <input type="text" class="form-control" required name="name" id="name"
                                   placeholder="Zadejte jméno uživatele" value="<?php echo $user->name()?>">

                        </div>
                        <div class="form-group">
                            <label for="last_name">Změnit příjmení</label>
                            <input type="text" class="form-control" required name="last_name" id="last_name"
                                   placeholder="Zadejte příjmení"
                                   value="<?php echo $user->lastName()?>">

                        </div>

                        <div class="form-group">
                            <label for="address">Změnit email</label>
                            <input type="email" name="email" required class="form-control" value="<?php echo $user->email() ?>" id="exampleInputEmail1" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                            <?php $view->include("invalid-field", [
                                    "sessionKey" => "email"
                            ]); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Změnit telefonní číslo</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="Zadejte telefonní číslo"
                                   required
                                   pattern="\420[0-9]{9}$"
                                   title="Zadejte telefonní číslo ve formátu 420 a 9 číslic, například 420123456789"
                                   value="<?php echo $user->phone()?>">
                            <?php $view->include("invalid-field",[
                                "sessionKey" => "phone"
                            ]);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="role">Změnit roli</label>
                            <select
                                    required
                                    class="form-control"
                                    name="role"
                                    id="role"
                                <?php echo ($auth->user()->role() < 3) ? 'disabled' : ''; ?>
                            >
                                <option disabled>Role</option>
                                <option value="1" <?php echo $user->role() == 1 ? 'selected' : ''; ?>>Zákazník</option>
                                <option value="2" <?php echo $user->role() == 2 ? 'selected' : ''; ?>>Admin</option>
                                <option value="3" <?php echo $user->role() == 3 ? 'selected' : ''; ?>>SuperAdmin</option>
                            </select>
                            <?php if ($auth->user()->role() < 3): ?>
                                <small class="form-text text-danger">Nemáte oprávnění měnit roli.</small>
                            <?php endif; ?>
                        </div>

                        <div class="card">
                            <button type="submit" class="btn btn-primary">Uložit změny</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<?php
$view->include("ends");
?>
