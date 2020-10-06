<div class="site-section bg-light pb-0">
    <div class="container">
        <div class="row align-items-stretch overlap">
            <div class="col-lg-8">
                <div class="box h-100">
                    <div class="d-flex align-items-center">
                        <div class="img"><img src="<?=base_url();?>assets/img/logounla.png" class="img-fluid"
                                alt="Image"></div>
                        <div class="text">
                            <a href="#" class="category">Repository</a>
                            <h3><a href="#">Selamat Datang Repository Universitas Langlangbuana</a></h3>
                            <p>Selamat Datang Repository Universitas Langlangbuana Pencarian data Repository berdasarkan subject, judul, author</p>
                            <p class="meta">
                                <span class="mr-2 mb-2"><?=date('Y-m-d')?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box small h-100">
                    <?php 
                    $i = 0;
                    foreach ($repos as $repo) {
                        if ($i++ < 3) {?>
                    <div class="d-flex align-items-center mb-2">
                        <div class="img"><img src="<?=base_url();?>assets/img/DOC.png" alt="doc">
                        </div>
                        <div class="text">
                            <a href="#" class="category"><?=$repo->name;?></a>
                            <h3><a href="#"><?=$repo->title;?></a></h3>
                        </div>
                    </div>
                    <?php }
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="heading mb-4">
                    <span class="caption">Subject Repository</span>
                    <h2>Cari Subject</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-stretch">

        <?php 
        $i = 0;
        foreach ($subjects as $subject) {
            if ($i++ < 6) {?>
            <div class="col-lg-2">
                <a href="<?=site_url().'browse/subject/'.$subject->subject_id;?>" class="course">
                <div class="img"><img src="<?=base_url();?>assets/img/DOC.png" alt="doc">
                        </div>
                    <h3><?=ucfirst($subject->subject_name);?></h3>
                </a>
            </div>
            <?php }
        }?>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form action="<?=site_url();?>search/post" class="d-flex search-form">
                    <span class="icon-"></span>
                    <input type="text" name="title" class="form-control mr-2" placeholder="Search subjects">
                    <input type="submit" class="btn btn-primary px-4" value="Search">
                </form>
            </div>
            <div class="col-lg-6 text-lg-right">
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="mr-4">Share:</span>
                    <a href="#" class="mx-2 subject_namesocial-item"><span class="icon-facebook"></span></a>
                    <a href="#" class="mx-2 social-item"><span class="icon-twitter"></span></a>
                    <a href="#" class="mx-2 social-item"><span class="icon-linkedin"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="heading mb-4">
                    <span class="caption">Latest</span>
                    <h2>Repository</h2>
                </div>
            </div>
            <div class="col-12">
                <?php 
                $i = 0; 
                foreach ($repos as $repo) {
                    if ($i++ < 10) {?>
                <div class="d-flex tutorial-item mb-4">
                    <div class="img-wrap">
                        <a href="#"><img src="<?=base_url();?>assets/img/DOC2.png" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="#"><?=$repo->subject_name;?></a></h3>
                        <p><?=$repo->title;?></p>
                        <p class="meta">
                            <span class="mr-2 mb-2"><?=$repo->date;?></span>
                        </p>
                        <p><a href="<?=site_url(),'view/' . $repo->repo_id;?>" class="btn btn-primary custom-btn">View</a>
                        </p>
                    </div>
                </div>
                <?php }
                } ?>
                <div class="custom-pagination">
                    <ul class="list-unstyled">
                        <li><a href="#"><span>1</span></a></li>
                        <li><span>2</span></li>
                        <li><a href="#"><span>3</span></a></li>
                        <li><a href="#"><span>4</span></a></li>
                        <li><a href="#"><span>5</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center mb-5">
                <div class="heading">
                    <span class="caption">Repoistory</span>
                    <h2>Repository Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
                $i = 0; 
                foreach ($repos as $repo) {
                    if ($i++ < 3) {?>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-2">
                    <h3 class="h5"><?=$repo->subject_name;?></h3>
                    <blockquote class="mb-4">
                        <p><?=$repo->title;?></p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                        <img src="<?=base_url();?>assets/img/DOC2.png" alt="repo">
                        <div class="author-name">
                            <span class="d-block"><?=$repo->author;?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                } ?>
        </div>
    </div>
</div>