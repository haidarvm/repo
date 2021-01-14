    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Input Repository</h3>
                <form action="<?=site_url();?>admin/save/<?=$repo_id;?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="inputTitle"
                                value="<?php echo !empty($repo->title) ?  $repo->title : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" id="inputTitle"
                                value="<?php echo !empty($repo->author) ?  $repo->author : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <?php foreach($types as $type) { ?>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type_id" id="type_id"
                                            value="<?=$type->type_id;?>"
                                            <?php echo !empty($repo->type_id) &&  $type->type_id == $repo->type_id ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="type_id">
                                            <?=$type->name;?>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <?php foreach($prodis as $prodi) { ?>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="prodi_id" id="prodi_id"
                                            value="<?=$prodi->prodi_id;?>"
                                            <?php echo !empty($repo->prodi_id) &&  $prodi->prodi_id == $repo->prodi_id ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="type_id">
                                            <?=$prodi->prodi_name;?>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <?php foreach($subjects as $subject) { ?>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject_id" id="subject_id"
                                            value="<?=$subject->subject_id;?>"
                                            <?php echo !empty($repo->subject_id) &&  $subject->subject_id == $repo->subject_id ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="subject_id">
                                            <?=$subject->subject_name;?>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="text" data-date-format="yyyy-mm-dd" name="date"
                                value="<?php echo !empty($repo->date) ?  $repo->date : date("Y-m-d"); ?>"
                                class="form-control datepicker" id="inputTitle">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Abstract</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="abstract" rows="6"
                                name="abstract"><?php echo !empty($repo->abstract) ?  $repo->abstract : ""; ?></textarea>
                        </div>
                    </div>
                    <?php if(!empty($files)){ ?>
                    <div class="col-lg-4 mb-3">
                        <div class="box small h-100">
                            <?php foreach($files as $file) { ?>
                            <div class="d-flex align-items-center mb-2">
                                <div class="img"><img src="<?=base_url();?>assets/img/DOC.png" alt="doc">
                                </div>
                                <div class="text">
                                    <a href="#" class="category"><?=$file->file_ext;?></a>
                                    <h3><a href="#"><?=$file->original_name;?></a></h3>
                                    <p><a href="<?=site_url().'browse/download/'.$file->file_id;?>">Download</a></h3>
                                    <p><a href="<?=site_url().'admin/delete_file/'.$file->file_id. '/'. $file->repo_id;?>">Delete</a></h3>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group row">
                    <input type="file" name="files" id="files" multiple data-repo_id="<?=$repo_id;?>"
                        onchange="uploadFile()"><br>
                    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                    <p id="report"></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>