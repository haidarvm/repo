<footer class="site-footer bg-primary py-5 cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="footer-heading mb-4 text-white">Tentang Kami</h2>
                <p class="text-white">REPOSITORY FAKULTAS ILMU SOSIAL DAN ILMU POLITIK UNIVERSITAS LANGLANGBUANA </p>
            </div>
            <div class="col-lg-6 ml-auto">
                <div class="row ">
                    <div class="col-lg-3">
                        <h2 class="footer-heading mb-4 text-white">Menu</h2>
                        <ul class="list-unstyled ">
                            <li><a href="<?=site_url();?>home" class="text-white">Home</a></li>
                            <li><a href="<?=site_url();?>browse" class="text-white">Browse</a></li>
                            <li><a href="<?=site_url();?>search" class="text-white">Search</a></li>
                            <li><a href="<?=site_url();?>about" class="text-white">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <p  class="text-white">
                    Copyright &copy; <script>
                    document.write(new Date().getFullYear());
                    </script> UNIVERSITAS LANGLANGBUANA </a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="<?=base_url();?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url();?>assets/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.sticky.js"></script>
<script src="<?=base_url();?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.animateNumber.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.fancybox.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url();?>assets/js/aos.js"></script>

<script src="<?=base_url();?>assets/js/main.js"></script>
<?php if (!empty($script)) { $this->load->view('template/script'); } ?>
<script>

function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    var file = _("files").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("files", file);
    var ajax = new XMLHttpRequest();
    var repo_id = $("#files").data("repo_id");
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST",
        "<?=site_url()?>admin/upload/" + repo_id
    ); 
    ajax.send(formdata);
}

function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
    _("status").innerHTML = "";
    console.log(event.target.responseText);
    var Data = JSON.parse(event.target.responseText);
    $("#report").append(Data.upload_data.client_name);
    _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
}
</script>
</body>

</html>