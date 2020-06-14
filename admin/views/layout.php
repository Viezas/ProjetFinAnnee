<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?= $pageDescription ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/<?= $style; ?>.css">
    <title><?= $pageTitle ?></title>
</head>
<body>
    <!-- Require du header -->
    <?php require ('partials/header.php'); ?>

    <!-- Require de la view qui se charge d'afficher le contenu -->
    <?php require $view; ?>
</body>
</html>
