
<div class="site-section bg-light">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="heading mb-4">
                    <!-- <span class="caption">Latest</span> -->
                    <h2> Selamat Datang di Repository FISIP UNLA </h2>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="<?=site_url();?>browse/latest"><img src="<?=base_url();?>assets/img/DOC.png" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="<?=site_url();?>browse/latest">Latest Additions</a></h3>
                        <p> View items added to the repository in the past week. </p>
                    </div>
                </div>
                <?php foreach($prodis as $prodi) { ?>
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="<?=site_url();?>browse"><img src="<?=base_url();?>assets/img/browse.png" width="50" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="<?=site_url();?>browse/prodi/<?=$prodi->prodi_id;?>">Prodi <?=$prodi->prodi_name;?></a></h3>
                        <p>  Browse the items in the repository by <?=$prodi->prodi_name;?>. </p>
                    </div>
                </div>
                <?php } ?> 
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="<?=site_url();?>search"><img src="<?=base_url();?>assets/img/search.png" width="50" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="<?=site_url();?>search">Search Repository</a></h3>
                        <p>  Search the repository using a full range of fields. Use the search field at the top of the page for a quick search.  </p>
                    </div>
                </div>
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="<?=site_url();?>browse"><img src="<?=base_url();?>assets/img/browse.png" width="50" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="<?=site_url();?>browse">Browse Repository</a></h3>
                        <p>  Browse the items in the repository by subject. </p>
                    </div>
                </div>
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="<?=site_url();?>about"><img src="<?=base_url();?>assets/img/about.png" width="50" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="<?=site_url();?>about">About This Repository</a></h3>
                        <p>   More information about this site.  </p>
                    </div>
                </div>
                <div class="d-flex tutorial-item mb-2">
                    <div class="img-wrap">
                        <a href="#"><img src="<?=base_url();?>assets/img/policy.png" alt=" Doc"></a>
                    </div>
                    <div>
                        <h3><a href="#">Repository Policies</a></h3>
                        <p>  Policy for use of material in this repository.  </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
