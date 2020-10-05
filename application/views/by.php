    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Browse by <?=$title;?></h3>
            </div>
            <ul class="list-group">
                <?php foreach($repos as $repo) { ?>
                <li class="list-group-item"><a href="<?=site_url().'view/'.$repo->repo_id;?>"><?=$repo->title;?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>