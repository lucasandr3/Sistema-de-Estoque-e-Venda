<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>404</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>resources/images/favicon.ico">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div class="error-bg"></div>

    <div class="account-pages">

        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="card shadow-none">
                        <div class="card-block">
                            <div class="text-center p-3">

                                <h1><span><i class="fa fa-frown-o" style="font-size:100px;"></i></span></h1>
                                <h2 class="mb-4 mt-5"><b>Opps, Algo deu errado!</b></h2>
                                <p class="mb-4">parece que a página que você esta procurando não existe ou foi digitado
                                    corretamente. <br></p>
                                <a class="btn btn-primary mb-4 waves-effect waves-light" href="<?= BASE_URL ?>"><i
                                        class="fa fa-mail-reply "></i> Voltar para Dashboard</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- END wrapper -->
</body>

</html>