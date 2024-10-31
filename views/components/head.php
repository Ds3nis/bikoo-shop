<!DOCTYPE html>
<html lang="en">
<?php  ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Prodej jizdnich kol" />
    <meta name="author" content="Denys Khuda" />
    <?php if(!empty($title)) { ?>
        <title><?php echo $title?></title>
    <?php }else { ?>
        <title>Bikoo</title>
    <?php } ?>
    <base href="/">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/contacts.css" />
    <link rel="stylesheet" href="assets/css/reg-auth.css" />

    <?php if (!empty($styles)) {?>
        <?php  foreach ($styles as $style) {?>
            <link rel="stylesheet" href="<?= $style ?>" />
        <?php } ?>
    <?php } ?>

    <?php if(!empty($bootstrap)) { ?>
        <link
                href="<?php echo $bootstrap[0]?>"
                rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                crossorigin="anonymous"
        />
    <?php } ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap"
      rel="stylesheet"
          />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
          />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
          />

</head>