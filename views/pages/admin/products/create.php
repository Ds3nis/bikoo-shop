<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>
<?php
$view->include("main");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Přidat produkt</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Hlavní</a></li>
                    <li class="breadcrumb-item active">Produkty</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center">
            <div class="pt-3 col-8 card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Přidání produktu</h3></div>
                <?php $view->include("success-alert", [
                    "sessionKey" => "inserted"
                ]); ?>
                <?php $view->include("fail-alert", [
                    "sessionKey" => "dbfailed"
                ]); ?>
                <form action="admin/products/create" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Název</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Zadejte název" value="">

                            <?php if($session->has("title")) { ?>
                            <div class="text-danger">
                                <ul>
                                    <?php foreach ($session->getFlash("title") as $error) { ?>
                                    <li style="color: red"><?php echo  $error ?></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                            <?php  }?>

                        </div>
                        <div class="form-group">
                            <label for="code">Kód</label>
                            <input type="number" min="0" class="form-control" name="code" id="code"
                                   placeholder="Zadejte kód produktu"
                                   value="">
                            <?php if($session->has("code")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("code") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Vložení souboru</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                           id="exampleInputFile" name="image[]"  multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Vyberte
                                        obrázky</label>
                                </div>
                            </div>
                            <ul class="custom-file-input-list">

                            </ul>
                        </div>
                        <?php if($session->has("image")) { ?>
                            <div class="text-danger">
                                <ul>
                                    <?php foreach ($session->getFlash("image") as $error) { ?>
                                        <li style="color: red"><?php echo  $error ?></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        <?php  }?>
                        <div class="form-group">
                            <label for="price">Cena</label>
                            <input type="number" class="form-control" name="price" id="price"
                                   placeholder="Zadejte cenu"
                                   value="">

                            <?php if($session->has("price")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("price") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>

                        </div>
                        <div class="form-group">
                            <label for="is_available">Dostupnost</label>
                            <select class="form-control" name="is_available" id="is_available">
                                <option value="1">Skladem</option>
                                <option value="0">Není skladem</option>
                            </select>
                            <?php if($session->has("is_abailable")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("is_available") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Množství</label>
                            <input type="number" min="0" class="form-control" name="quantity" id="quantity"
                                   placeholder="Zadejte množství" value="">
                            <?php if($session->has("quantity")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("quantity") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Obsah</label>
                            <textarea name="description" id="summernote"></textarea>
                            <?php if($session->has("description")) { ?>
                                <div class="text-danger">
                                    <ul>
                                        <?php foreach ($session->getFlash("description") as $error) { ?>
                                            <li style="color: red"><?php echo  $error ?></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            <?php  }?>
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
