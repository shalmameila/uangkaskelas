<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>s
    <?php $this->load->view("admin/_partials/head") ?>
</head>

<body>
    <?php $this->load->view("admin/_partials/topbar") ?>
    <?php $this->load->view("admin/_partials/navbar") ?>
    <?php $this->load->view("admin/_partials/breadcrumb") ?>
    <?php $this->load->view("admin/_partials/table_mng") ?>
    <?php $this->load->view("admin/_partials/footer") ?>
    <?php $this->load->view("admin/_partials/js") ?>
    <?php $this->load->view("admin/_partials/script_true") ?>
</body>

</html>