<hr>
<h5>Explore Other Post</h5>
<hr>
<?php foreach ($blogs as $key=>$bg):?>
<div class="card mb-3" style=" box-shadow: 1px 1px  #4267B2">
    <div class="row ">
        <div class=" col-md-4">
            <img src="<?php echo base_url().'uploads/'.$bg['thumbnail']; ?>" width="100%" height="100%" alt="">
        </div>
        <div class="col-md-8 p-0">
            <a href="<?php echo site_url('blog/detail/' . $bg['id']); ?>">
                <h6 class="post-title mt-2 mx-3 p-0"><?php echo $bg['title']; ?></h6>
            </a>
            <p class="p-0 m-3">Description for all the post will be shown here too ada ada saja wkwkwk yuk tulis disini
                yaaa</p>
            <!-- <p class="post  "><?php echo $bg['content']; ?></p> -->
        </div>
    </div>
</div>
<?php endforeach; ?>