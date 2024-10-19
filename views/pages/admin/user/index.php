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
        <div class="row">
            <div class="col-1 mb-3">
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
                                                   placeholder="Zadejte jméno">
                                        </div>

                                        <span class="text-danger"></span>

                                        <div class="form-group">
                                            <label for="lastName">Příjmení</label>
                                            <input type="text" value="" name="last_name"
                                                   class="form-control"
                                                   id="lastName"
                                                   placeholder="Zadejte příjmení">
                                        </div>

                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="middleName">Prostřední jméno</label>
                                            <input type="text" name="middle_name" value=""
                                                   class="form-control"
                                                   id="middleName"
                                                   placeholder="Zadejte prostřední jméno">
                                        </div>

                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="address">Adresa</label>
                                            <input type="text" value="" name="address"
                                                   class="form-control"
                                                   id="address"
                                                   placeholder="Zadejte adresu">
                                        </div>

                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="phone">Telefon</label>
                                            <input type="tel" value="" name="phone"
                                                   class="form-control"
                                                   id="phone"
                                                   placeholder="Zadejte telefonní číslo">
                                        </div>

                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="" name="email"
                                                   class="form-control"
                                                   id="email"
                                                   placeholder="Zadejte email">
                                        </div>

                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="password">Heslo</label>
                                            <input type="password" name="password" class="form-control"
                                                   id="password"
                                                   placeholder="Zadejte heslo">
                                        </div>
                                        <span class="text-danger"> </span>

                                        <div class="form-group">
                                            <label for="role">Vyberte roli</label>
                                            <select class="form-control" name="role" id="role">
                                                <option disabled selected>Role</option>
                                                <option {{ old("gender") == 1 ? "selected" : ""}} value="0">Klient
                                                </option>
                                                <option {{ old("gender") == 2 ? "selected" : ""}} value="1">Admin
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
                                    <th>Adresa</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td></td>
                                    <td><a href=""></a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

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
