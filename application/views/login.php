<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body style="background-color: #EEF1FF">
    <!-- Navigation-->
    <?php $this->load->view('header.php') ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card rounded" style="background-color: #AAC4FF; box-shadow: 5px 5px 0px #4267B2">
                    <div class=" card-body">
                        <h1 class="text-white">Login</h1>
                        <?php echo $this->session->set_flashdata('message'); ?>
                        <?php echo form_open(); ?>
                        <div class="form-group text-white ">
                            <label>Email</label>
                            <?php echo form_input('username',  set_value('username'),  'class="form-control rounded" placeholder="Your Email"'); ?>
                        </div>
                        <div class="form-group mb-3 text-white">
                            <label class="form-label ">Password</label>
                            <?php echo form_input('password', set_value('password'),  'class="form-control rounded " placeholder="Your Password"'); ?>
                        </div>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <button style="background-color: #4267B2; box-shadow: 5px 5px 0px #DBB632"
                                        class="btn form-control text-white rounded" type="submit">Facebook</button>
                                </div>
                                <div class="col-md-6">
                                    <button style="box-shadow: 5px 5px 0px #4267B2"
                                        class="btn btn-warning text-white form-control rounded"
                                        type="submit">Google</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button style="background-color: #B1B2FF; box-shadow: 5px 5px 0px #4267B2"
                                class="btn  form-control rounded" type="submit">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php $this->load->view('footer.php') ?>
</body>

</html>