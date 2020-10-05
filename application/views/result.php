    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Browse</h3>
                <?php foreach($results as $result) { ?>
                    <p><a href="<?=site_url().'view/'.$result->repo_id;?>"><?=$result->title;?></a></p>
                <?php } ?>
            </div>
        </div>
    </div>