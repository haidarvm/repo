    <div class="site-section" id="contact-section">
        <div class="container">
            <div class="row mb-4">
                <h3>Login</h3>
                <form action="<?=site_url();?>auth/login" method="post"  >  
                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="inputTitle" >
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputTitle">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>