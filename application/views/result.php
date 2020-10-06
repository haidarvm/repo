    <div class="site-section " id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Browse</h3>
                <?php foreach($results as $result) { ?>
                    <p><?=$result->author;?>, <?=year($result->date);?> <a href="<?=site_url().'view/'.$result->repo_id;?>"><?=$result->title;?></a> <?=ucfirst($result->subject_name);?></p>
                <?php } ?>
            </div>
        </div>
    </div>