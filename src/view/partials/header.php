<?php if ($this->session->isUserLoggedIn()): ?>
    <header class="header">
        <div class="header-inner">
            <h4 class="m-0 mr-5 flex-shrink-0">
                <a class="header-link" href="/"><?= SITE_TITLE ?></a>
            </h4>
            <nav class="header-nav">
                <?php foreach ($this->menu as $item): ?>
                    <h5 class="header-nav-item font-weight-normal">
                        <a class="header-nav-link btn btn-primary font-weight-normal"
                           href="<?= $item['url'] ?>">
                            <?= $item['title'] ?>
                        </a>
                    </h5>
                <?php endforeach; ?>
            </nav>
            <h5 class="mb-0 mr-3"><?= $this->me ?></h5>
            <div class="btn-group">
                <button class="btn bmd-btn-icon dropdown-toggle" type="button"
                        id="ex2" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </button>
                <div class="dropdown-menu dropdown-menu-left"
                     aria-labelledby="ex2">
                    <a class="dropdown-item" href="/profile">Preferences</a>
                    <a class="dropdown-item disabled" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
