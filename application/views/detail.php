<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
    <!-- Navigation-->
    <?php $this->load->view('header.php') ?>
    <!-- Page Header-->
    <?php 
        $cover = base_url().'uploads/'.$blog['cover'];
    ?>
    <header class="masthead" style="background-image: url('<?php echo $cover; ?>')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1><?php echo $blog['title']; ?></h1>
                        <span class="meta">
                            Posted by
                            <?php echo $blog['date']; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="m-5 ">
            <div class="row  justify-content-center">
                <div class="col-md-7">
                    <p class="meta m-0">
                        <i class="bi bi-person-fill"></i>
                        The Creator
                        <i class="bi bi-clock ps-2"></i>
                        <?php echo $blog['date']; ?>
                    </p>
                    <h1 class="mb-3"><?php echo $blog['title']; ?></h1>
                    <?php echo $blog['content'] ?>
                </div>
                <div class="col-md-5">
                    <?php $this->load->view('other_post.php') ?>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
    <?php $this->load->view('footer.php') ?>
</body>

</html>