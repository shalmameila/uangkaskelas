        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>

        <!-- Popper for Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/metisMenu.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/waves.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.js') ?>"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>

        <!-- Buttons examples -->
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.print.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.colVis.min.js') ?>"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url('assets/plugins/waypoints/jquery.waypoints.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/counterup/jquery.counterup.min.js') ?>"></script>

        <!-- Dashboard init -->
        <!-- <script src="<?php echo base_url('assets/pages/jquery.dashboard.js') ?>"></script> -->

        <!-- App js -->
        <script src="<?php echo base_url('assets/js/jquery.core.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.app.js') ?>"></script>

        <!--FooTable Example-->
        <!-- <script src="<?php echo base_url('assets/pages/jquery.footable.js') ?>"></script> -->

        <!-- Xeditable -->
        <script src="<?php echo base_url('assets/plugins/moment/moment.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/pages/jquery.xeditable.init.js') ?>" type="text/javascript"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>

        <script>
            var resizefunc = [];
        </script>

        <!-- Sweet-Alert  -->
        <script src="<?= base_url('assets/plugins/sweet-alert2/sweetalert2.min.js') ?>"></script>
        <script src="<?= base_url('assets/pages/jquery.sweet-alert.init.js') ?> "></script>

        <script src="<?= base_url('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/plugins/autoNumeric/autoNumeric.js') ?>" type="text/javascript"></script>

        <!-- Modal-Effect -->
        <script src="<?= base_url('assets/plugins/custombox/js/custombox.min.js') ?>"></script>
        <script src="<?= base_url('assets/plugins/custombox/js/legacy.min.js') ?>"></script>
        <!-- <script src="<?= base_url('assets/pages/jquery.form-advanced.init.js') ?>">

        <!-- plugin js -->
        <script src="<?= base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>

        <!-- Init js -->
        <script src="<?= base_url('assets/pages/jquery.form-pickers.init.js') ?>"></script>

        <script type="text/javascript">
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>

        <script type="text/javascript">
            function datadeleteConfirm(url) {
                $('#btn-delete-data').attr('href', url);
                $('#deleteModal-data').modal();
            }
        </script>

        <script type="text/javascript">
            function subdeleteConfirm(url) {
                $('#btn-delete-sub').attr('href', url);
                $('#deleteModal-sub').modal();
            }
        </script>

        <script type="text/javascript">
            function roledeleteConfirm(url) {
                $('#btn-delete-role').attr('href', url);
                $('#deleteModal-role').modal();
            }
        </script>
        
        <script type="text/javascript">
            function masukdeleteConfirm(url) {
                $('#btn-delete-masuk').attr('href', url);
                $('#deleteModal-masuk').modal();
            }
        </script>
        
        <script type="text/javascript">
            function logoutConfirm(url) {
                $('#btn-logout').attr('href', url);
                $('#logoutModal').modal();
            }
        </script>

        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>

        <script>
            $('.form-check-input').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');
                //mengambil data-role dan data-menu, variable menuId dan roleId diisi dengan tombol ceklis yg sedang diklik ambil datanya yang namanya "menu" dan "role"

                $.ajax({
                    url: "<?= base_url('admin/ubahakses');  ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('admin/roleakses/') ?>" + roleId;
                    }
                });

            });
        </script>

        <script type="text/javascript">
            jQuery(function($) {
                $('.autonumber').autoNumeric('init');
            });
        </script>


        </body>

        </html>