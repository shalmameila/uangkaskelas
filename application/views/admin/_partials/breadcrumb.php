<!-- end row -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                                Sistem Pencatatan Uang Kas Kelas
                        </h4>

                        <ol class="breadcrumb float-right">
                            <?php foreach ($this->uri->segments as $segment) : ?>
                                <?php
                                $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                                $is_active =  $url == $this->uri->uri_string;
                                ?>
                                <li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
                                    <?php if ($is_active) : ?>
                                        <?php echo ucfirst($segment) ?>
                                    <?php else : ?>
                                        <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->