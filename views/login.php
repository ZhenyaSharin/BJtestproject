<div class="d-flex justify-content-center">
    <form action="/login" method="POST">
        <div class="modal-body">
            <div class="form-group td-center">
                <label class="login-title" for="exampleInputEmail1">Login:</label>
                <input type="login" class="form-control <?php echo $model->hasError('login') ? 'is-invalid' : '';?> txt-center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter login" name="login">
                <div class="invalid-feedback">
                    <?php echo $model->getFirstError('login'); ;?>
                </div>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group td-center">
                <label class="login-title" for="exampleInputPassword1">Password:</label>
                <input type="password" class="form-control <?php echo $model->hasError('password') ? 'is-invalid' : '';?> txt-center" id="exampleInputPassword1" placeholder="Password" name="password">
                <div class="invalid-feedback">
                    <?php echo $model->getFirstError('password'); ;?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success  btn-lg btn-block">
                LOGIN
            </button>
        </div>
    </form>
</div>