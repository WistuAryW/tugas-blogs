<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico') ?>  " />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('../../assets/css/styles.css') ?> " rel="stylesheet" />
</head>

<body style="background-color: #EEF1FF">
    <!-- header -->
    <?php $this->load->view('header.php');  ?>
    <!-- Page Header-->

    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Selamat Datang</h1>
                        <span class="subheading">Website ini berisi artikel terbaru</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container">
        <?php echo $this->session->flashdata('message'); ?>

        <form class="d-flex justify-content-end" action="" method="get">
            <input type="text" name="find">
            <button type="submit"> Cari</button>
        </form>

        <!-- Post preview-->
        <div class="row">
            <?php foreach ($blogs as $key=>$blog):?>
            <div class="col-md-3 mt-3 justify-content-center">
                <div class="card ">
                    <div class="card-body m-0 p-0 rounded">
                        <img src="<?php echo base_url().'uploads/'.$blog['thumbnail']; ?>" width="100%" alt="thumbnail">
                    </div>
                    <div class="text-center" style="background-color: #B1BFFF">
                        <a href="<?php echo site_url('blog/detail/' . $blog['id']); ?>">
                            <h6 class="post-title m-3"><?php echo $blog['title']; ?></h6>
                            <?php if(isset($_SESSION['username']))
                        {
                        ?>
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <a class="btn btn-success form-control"
                                        href="<?php echo site_url('blog/edit/'.$blog['id']); ?>"><i
                                            class="bi bi-pencil"></i></a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-danger form-control"
                                        href="<?php echo site_url('blog/delete/'.$blog['id']); ?>"
                                        onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i
                                            class="bi bi-trash"></i></a>
                                </div>
                            </div>
                            <?php 
                        }
                        ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4 mt-3"><a class="btn btn-primary text-uppercase" href="#!">Older
                Posts →</a></div>
    </div>
    <!-- footer -->
    <?php $this->load->view('footer.php');  ?>
</body>