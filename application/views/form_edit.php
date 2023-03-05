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
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- summernote -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body style="background-color: #EEF1FF">
    <!-- Navigation-->
    <?php $this->load->view('header.php') ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Edit Artikel</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 rounded" style="background-color: #D2DAFF">
                <h1>Edit Artikel</h1>
                <div class="alert alert-warning">
                    <?php echo validation_errors(); ?>
                </div>
                <?php echo form_open_multipart() ?>
                <div class="form-group">
                    <label for="">Judul</label>
                    <?php echo form_input('title',set_value('title',$blog['title'] ) , 'class="form-control"'); ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Thumbnail</label>
                        <?php echo form_upload('thumbnail', set_value('thumbnail',$blog['thumbnail'] ) , 'class="form-control"'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="">Banner</label>
                        <?php echo form_upload('cover', set_value('cover',$blog['cover'] ) , 'class="form-control"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Url</label>
                    <?php echo form_input('url', set_value('url',$blog['url'] ) , 'class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="">Konten</label>
                    <?php echo form_textarea('content', set_value('content',$blog['content'] ) , 'class="form-control" id="summernote" cols="30" rows="10"'); ?>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary my-3 " type="submit">Edit Artikel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php $this->load->view('footer.php') ?>

    <script>
    $('#summernote').summernote({
        placeholder: 'mengetik..',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
</body>

</html>