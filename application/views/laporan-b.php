   <head>
       <title><?= $title ?></title>
       <?php $this->load->view("admin/_partials/head"); ?>
   </head>
   <?php
    $this->load->view("admin/_partials/topbar");
    $this->load->view("admin/_partials/navbar");
    $this->load->view("admin/_partials/breadcrumb");
    //$this->load->view("admin/_partials/tabel_report");
    $this->load->view("admin/_partials/footer");
    $this->load->view("admin/_partials/js");
    $this->load->view("admin/_partials/script_false");
    ?>