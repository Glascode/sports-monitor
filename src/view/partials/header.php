<header class="header">
    <div class="header-inner">
        <h4 class="m-0 mr-5 flex-shrink-0">
            <a class="header-link" href="/">Sports Monitor</a>
        </h4>
        <nav class="header-nav">
            <?php foreach ($this->menu as $item): ?>
                <h6 class="header-nav-item font-weight-normal">
                    <a class="header-nav-link btn btn-primary"
                       href="<?= $item['url'] ?>">
                        <?= $item['title'] ?>
                    </a>
                </h6>
            <?php endforeach; ?>
        </nav>
        <div class="dropdown">
            <button class="header-nav-link btn btn-primary dropdown-toggle"
                    type="button" data-toggle="dropdown">
                <?= $this->me ?>
            </button>
            <div class="dropdown-menu"> <!-- form -->
                <a class="dropdown-item" href="/profile">Profile</a>
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</header>