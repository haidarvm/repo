<link rel="stylesheet" href="<?=base_url();?>assets/css/datatables.min.css">
<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.dataTables.min.css">
<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row">
            <h4 class="card-title">Repository</h4>
            <table id="repo" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($repos as $repo) { ?>
                    <tr>
                        <td><?=$repo->author;?></td>
                        <td><?=$repo->title;?></td>
                        <td><?=$repo->subject_name;?></td>
                        <td><?=$repo->date;?></td>
                        <td>Edit</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>