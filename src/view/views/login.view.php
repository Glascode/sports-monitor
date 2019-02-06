<div class="m-auto p-5"
     style="max-width: 400px; border: 1px solid lightgray; border-radius: .5rem;">
    <h1 class="text-center">
        <?= $this->pageTitle ?>
    </h1>

    <div> <!-- form -->
        <div class="form-group">
            <label for="login" class="bmd-label-floating">Login</label>
            <input type="text" class="form-control" id="login">
        </div>
        <div class="form-group mb-5">
            <label for="password" class="bmd-label-floating">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary btn-raised">Next</button>
    </div>
</div>