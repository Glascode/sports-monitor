<div class="container-sm w-100 frame m-auto p-5">
    <h1 class="text-center mb-5">Log in</h1>
    <?php include __DIR__ . '/../partials/message.php' ?>
    <form method="POST">
        <div class="form-group">
            <label for="login" class="bmd-label-floating">Login</label>
            <input type="text" class="form-control" name="username" id="login">
        </div>
        <div class="form-group mb-5">
            <label for="password" class="bmd-label-floating">Password</label>
            <input type="password" class="form-control" name="password"
                   id="password">
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href="/register"
               style="margin-left: -14px;">
                Create profile
            </a>
            <button type="submit" class="btn btn-primary btn-raised">
                Login
            </button>
        </div>
    </form>
</div>
