<div class="site-section">
    <div class="container h-100">
        <div class="row mb-4">
            <div class="col-6">
                <div class="heading">
                    <h2>Browse by <?=$title;?></h2>
                </div>
            </div>
        </div>
        <?php foreach($repos as $repo) { ?>
        <p><?=$repo->author;?>, <?=year($repo->date);?> <em><a
                    href="<?=site_url().'view/'.$repo->repo_id;?>"><?=$repo->title;?></a></em>
            <?=ucfirst($repo->subject_name);?></p>
        <?php } ?>
    </div>
</div>