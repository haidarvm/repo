<div class="site-section">
    <div class="container h-100">
        <div class="row mb-4">
            <div class="col-6">
                <div class="heading">
                    <h2>Browse </h2>
                </div>
            </div>
        </div>
        <?php 
        if (count($results) > 0) {
            foreach ($results as $result) { ?>
        <p><?=$result->author;?>, <?=year($result->date);?> <em><a
                    href="<?=site_url() . 'view/' . $result->repo_id;?>"><?=$result->title;?></a></em>
            <?=ucfirst($result->subject_name);?></p>
        <?php }
        } else {?>

        <h2>No Result </h2>
        <?php } ?>
    </div>
</div>