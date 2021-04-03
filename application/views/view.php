<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-dark"><?=$repo->title;?></h2>
                <p><?=$repo->author;?>, <?=year($repo->date);?> <em><?=$repo->title;?></em>
                    <?=ucfirst($repo->subject_name);?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="box small h-100 mb-4">
                    <?php foreach($files as $file) { ?>
                        <div class="d-flex align-items-center mb-2">
                            <div class="img"><img src="<?=base_url().'assets/img/'.strtoupper(fileExt($file->file_ext)).'.png';?>" alt="doc">
                            </div>
                            <div class="text">
                                <?php  if($this->session->userdata('login')) { ?>
                                    <?php  if(strtolower($file->file_ext) == ".pdf") { ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#preview_<?=$file->file_id; ?>">Preview</button>
                                    <?php  } ?>
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
                        <?php  if(strtolower($file->file_ext) == ".pdf") {?>
                        <!-- Modal -->
                            <div class="modal fade" id="preview_<?=$file->file_id;?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?=$file->original_name;?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <a class="btn btn-primary"
                                                href="<?=site_url().'browse/download/'.$file->file_id;?>">Download</a>
                                            <br />
                                            <object data="<?=site_url().'browse/previews/'.$file->file_id;?>"
                                                type="application/pdf" width="750px" height="650px">
                                                <embed src="<?=site_url().'browse/previews/'.$file->file_id;?>"
                                                    type="application/pdf">
                                                <p>This browser does not support PDFs. Please download the PDF to view it: <a
                                                        href="<?=site_url().'browse/previews/'.$file->file_id;?>">Download
                                                        PDF</a>.</p>
                                                </embed>
                                            </object>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a class="btn btn-primary"
                                                href="<?=site_url().'browse/download/'.$file->file_id;?>">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }  ?>
                    <?php } ?>
                </div>
                <!-- Button trigger modal -->
            </div>
            <div class="col-lg-8">
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
                    <div class="col-10">
                        <?=$repo->author;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Item Type:
                    </div>
                    <div class="col-10">
                        <?=$repo->name;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Subject:
                    </div>
                    <div class="col-10">
                        <?=$repo->subject_name;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Date:
                    </div>
                    <div class="col-10">
                        <?=year($repo->date);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>