<div class="site-section">
    <div class="container ">
        <div class="row ">
            <h5><?=$repo->title;?></h5>
        </div>
        <div class="col-lg-4">
            <div class="box small h-100 mb-4">
                <?php foreach($files as $file) { ?>
                <div class="d-flex align-items-center mb-2">
                    <div class="img"><img src="<?=base_url();?>assets/img/DOC.png"  alt="doc">
                    </div>
                    <div class="text">
                        <a href="#" class="category"><?=$file->file_ext;?></a>
                        <h3><a href="#"><?=$file->original_name;?></a></h3>
                        <p><a href="<?=site_url().'browse/download/'.$file->file_id;?>">Download</a></h3>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <p>Abstract</p>
        </div>
        <div class="row">
            <p><?=$repo->abstract;?></p>
        </div>
        <div class="row">
            <div class="col-2">
                Author:
            </div>
            <div class="col-6">
                <?=$repo->author;?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Item Type:
            </div>
            <div class="col-6">
                <?=$repo->name;?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Subject:
            </div>
            <div class="col-6">
                <?=$repo->subject_name;?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Date:
            </div>
            <div class="col-6">
                <?=year($repo->date);?>
            </div>
        </div>
    </div>
</div>