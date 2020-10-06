    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row">
                <h3>Browse by Subject</h3>
            </div>
            <div class="row">
                <div class="categories">
                    <?php foreach ($subjects as $subject) { ?>
                    <li><a
                            href="<?=site_url() . 'browse/subject/' . $subject->subject_id;?>"><?=ucfirst($subject->subject_name);?></a>
                    </li>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>