    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Search Repository</h3>
                <form action="<?=site_url();?>search/post" method="post" enctype="multipart/form-data" >  
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="inputTitle" >
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
                                        <input class="form-check-input" type="checkbox" name="type_id" id="type_id"
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
                        <label for="inputTitle" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <?php foreach($prodis as $prodi) { ?>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="prodi_id" id="prodi_id"
                                            value="<?=$prodi->prodi_id;?>">
                                        <label class="form-check-label" for="prodi_name">
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
                                        <input class="form-check-input" type="checkbox" name="subject_id" id="subject_id"
                                            value="<?=$subject->subject_id;?>" >
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
                            <input type="text" data-date-format="yyyy" name="date" value=""
                                class="form-control yearpicker" id="inputTitle">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAbstract" class="col-sm-2 col-form-label">Abstract</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="abstract" id="inputAbstract">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>