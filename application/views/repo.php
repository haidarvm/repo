    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Input Repository</h3>
                <form action="<?=site_url();?>admin/insert" method="post" enctype="multipart/form-data" >  
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="inputTitle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" id="inputTitle">
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
                                            value="<?=$type->type_id;?>">
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
                        <label for="inputTitle" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <?php foreach($subjects as $subject) { ?>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject_id" id="subject_id"
                                            value="<?=$subject->subject_id;?>">
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
                            <input type="text" data-date-format="yyyy-mm-dd" name="date" value="2020-08-01"
                                class="form-control datepicker" id="inputTitle">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Abstract</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="abstract" rows="6" name="abstract"></textarea>
                        </div>
                    </div>
                    <input type="file" name="files" id="files" multiple data-repo_id="1" onchange="uploadFile()"><br>
                    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                    <p id="report"></p>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>