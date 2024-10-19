<?php
/**
 * @var \App\Kernel\View\View $view
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
                    <h3 class="card-title">Upravit uživatelský účet {{$user->id}}</h3></div>
                <form action="admin/user1/update" enctype="multipart/form-data"
                      method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Změnit jméno</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Zadejte jméno uživatele" value="">

                            <div class="text-danger">{{$message}}</div>

                        </div>
                        <div class="form-group">
                            <label for="last_name">Změnit příjmení</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   placeholder="Zadejte příjmení"
                                   value="">

                            <div class="text-danger">{{$message}}</div>

                        </div>
                        <div class="form-group">
                            <label for="address">Změnit adresu</label>
                            <input type="text" class="form-control" name="address" id="address"
                                   placeholder="Zadejte adresu" value="">

                            <div class="text-danger">{{$message}}</div>

                        </div>
                        <div class="form-group">
                            <label for="phone">Změnit telefonní číslo</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="Zadejte telefonní číslo" pattern="^\+38[0-9]{10}$"
                                   title="Zadejte telefonní číslo ve formátu +38[0-9]{10}"
                                   value="">

                            <div class="text-danger">{{$message}}</div>

                        </div>
                        <div class="form-group">
                            <label for="role">Změnit roli</label>
                            <select class="form-control" name="role" id="role">
                                <option disabled selected>Role</option>
                                <option {{ old("gender") == 1 ? "selected" : ""}} value="0">Zákazník
                                </option>
                                <option {{ old("gender") == 2 ? "selected" : ""}} value="1">Admin
                                </option>
                            </select>
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
