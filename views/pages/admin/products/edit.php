<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Models\Product $product
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>
<?php
$view->include("main");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Úprava produktu</h1>
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
            <div class="pt-3 col-9 card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upravit produkt <?php echo $product->code() ?></h3></div>
                <form action="/admin/product/edit" enctype="multipart/form-data"
                      method="POST">
                    <?php $view->include("success-alert", [
                        "sessionKey" => "updated"
                    ]); ?>
                    <input type="hidden" name="product_id" value="<?php echo $product->id()?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Změnit název</label>
                            <textarea type="text" class="form-control" name="title" id="title"
                                      placeholder="Zadejte název" style="resize: none;"><?php echo $product->name()?>
                            </textarea>


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
                    </div>
                    <div class="form-group">
                        <input type="text" class="hidden-input" name="hidden" hidden>
                        <label for="exampleInputFile">Vložení souboru</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"
                                       id="exampleInputFile" name="image[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Vyberte
                                    obrázek</label>
                            </div>
                        </div>
                        <ul class="custom-file-input-list">
                            <?php
                            $images = explode('|', $product->images());
                            $images = array_filter($images);

                            if (!empty($images)) {
                                foreach ($images as $imagePath) {
                                    ?>
                                    <li>
                                        <img style="width: 150px" src="<?php echo htmlspecialchars($imagePath); ?>">
                                    </li>
                                    <?php
                                }
                            } ?>


                        </ul>

                        <?php if($session->has("image")) { ?>
                            <div class="text-danger">
                                <ul>
                                    <?php foreach ($session->getFlash("image") as $error) { ?>
                                        <li style="color: red"><?php echo  $error ?></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        <?php  }?>

                    </div>
                    <div class="form-group">
                        <label for="price">Změnit cenu</label>
                        <input type="number" class="form-control" name="price" id="price"
                               placeholder="Zadejte cenu"
                               value="<?php echo $product->price()?>">

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
                        <label for="is_available">Změnit dostupnost</label>
                        <select class="form-control" name="is_available" id="is_available">
                            <option  value="1" <?php echo $product->availability() == 1 ? 'selected' : ''; ?>>K dispozici
                            </option>
                            <option value="0" <?php echo $product->availability() == 0 ? 'selected' : ''; ?>>Není k dispozici
                            </option>
                        </select>

                        <?php if($session->has("is_available")) { ?>
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
                        <label for="quantity">Změnit množství</label>
                        <input type="number" min="0" class="form-control" name="quantity" id="quantity"
                               placeholder="Zadejte množství"
                               value="<?php echo $product->count()?>">

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
                        <label for="summernote">Změnit popis</label>
                        <textarea name="description"
                                  id="summernote"><?php echo $product->description() ?></textarea>
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
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
$view->include("ends");
?>
