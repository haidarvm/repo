    <div class="site-section">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">

          <div class="col-12">
                    <div class="heading mb-4">
                        <h2>Browse by Subject</h2>
                        <p>Please select a value to browse from the list below.</p>
                    </div>
                </div>
            </div>
        <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12">
                    <div class="categories">
                        <?php foreach ($subjects as $subject) { ?>
                        <li><a
                                href="<?=site_url() . 'browse/subject/' . $subject->subject_id;?>"><?=ucfirst($subject->subject_name). ' ('. $subject->total.')'?></a>
                        </li>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>