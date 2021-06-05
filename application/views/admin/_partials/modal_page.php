<div class="row">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Modal with Pages</h4>

            <p class="text-muted m-b-15 font-13">
                Examples of custom modals.
            </p>

            <!-- Signup modal content -->
            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <h2 class="text-uppercase text-center m-b-30">
                                <a href="index.html" class="text-success">
                                    <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                                </a>
                            </h2>


                            <form class="form-horizontal" action="#">

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="username">Name</label>
                                        <input class="form-control" type="email" id="username" required="" placeholder="Michael Zenaty">
                                    </div>
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                    </div>
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12">
                                        <div class="checkbox checkbox-custom">
                                            <input id="checkbox11" type="checkbox" checked>
                                            <label for="checkbox11">
                                                I accept <a href="#">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Sign Up Free</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- Signup modal content -->
            <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <h2 class="text-uppercase text-center m-b-30">
                                <a href="index.html" class="text-success">
                                    <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                                </a>
                            </h2>

                            <form class="form-horizontal" action="#">

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="emailaddress1">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress1" required="" placeholder="john@deo.com">
                                    </div>
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <a href="page-recoverpw.html" class="text-muted pull-right font-14">Forgot your password?</a>
                                        <label for="password1">Password</label>
                                        <input class="form-control" type="password" required="" id="password1" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12">
                                        <div class="checkbox checkbox-custom">
                                            <input id="checkbox12" type="checkbox" checked>
                                            <label for="checkbox12">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="button-list">
                <!-- Custom width modal -->
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Sign Up Modal</button>
                <!-- Full width modal -->
                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#login-modal">Log in Modal</button>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- End row -->