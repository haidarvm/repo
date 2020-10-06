    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3 class="mb-4">Browse by <?=$title;?></h3>
                <?php foreach($repos as $repo) { ?>
                <p><?=$repo->author;?><a href="<?=site_url().'view/'.$repo->repo_id;?>"><?=$repo->title;?></a>
                    <?=$repo->date;?></p>
                <?php } ?>
            </div>
        </div>