<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Akses Diblokir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

    <!-- App css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('assets/js/modernizr.min.js') ?>"></script>

</head>


<body class="bg-accpunt-pages">

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">

                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-content">
                                    <h1 class="text-error error mx-auto">Ups...</h1>
                                    <h2 class="text-uppercase text-danger m-t-30">Akses diblokir!</h2>
                                    <p class="text-muted m-t-30">Maaf, anda tidak memiliki akses untuk membuka halaman ini.</p>
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
<?php $this->load->view("admin/_partials/js") ?>
<?php $this->load->view("admin/_partials/script_true") ?>
</body>

</html>