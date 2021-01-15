<div class="site-section">
    <div class="container ">
        <div class="row ">
            <div class="col">
                <h2 class="text-dark"><?=$repo->title;?></h2>
                <p><?=$repo->author;?>, <?=year($repo->date);?> <em><?=$repo->title;?></em>
            <?=ucfirst($repo->subject_name);?></p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box small h-100 mb-4">
                <?php foreach($files as $file) { ?>
                    <div class="d-flex align-items-center mb-2">
                        <div class="img"><img src="<?=base_url();?>assets/img/PDF.png" alt="doc">
                        </div>
                        <div class="text">
                            <?php  if($this->session->userdata('login')) { ?>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#preview_<?=$file->file_id; ?>">Preview</button>
                            <p><a href="<?=site_url() . 'browse/download/' . $file->file_id; ?>">Download</a></h3>
                                <?php  } else {?>
                                <?php if (notallowed($file->filename)) {  ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#preview_<?=$file->file_id; ?>">Preview</button>
                            <p><a href="<?=site_url() . 'browse/download/' . $file->file_id; ?>">Download</a></h3>
                                <?php  } }?>
                                <a href="#" class="category"><?=$file->file_ext; ?></a>
                            <h3><a
                                    href="<?=site_url() . 'browse/download/' . $file->file_id; ?>"><?=$file->original_name; ?></a>
                            </h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Abstract</p>
            </div>
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
                Prodi Type:
            </div>
            <div class="col-6">
                <?=$repo->prodi_name;?>
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