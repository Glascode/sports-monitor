<div class="container-sm m-auto">
    <h1 class="mb-5"><?= $this->pageTitle ?></h1>

    <div>
        <h2 class="mb-4">Subscribe to RSS feeds</h2>

        <form onChange="this.submit()" method="POST">
            <?php foreach ($this->allRssFeeds as $rssFeed): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0"><?= $rssFeed['name'] ?></h5>
                            <?php if (!empty($this->rssFeedsStorage->getUserRssFeed($this->userId, $rssFeed['id']))): ?>
                                <button class="btn btn-primary" name="unfollow"
                                        value="<?= $rssFeed['id'] ?>"
                                        type="submit">Following
                                </button>
                            <?php else: ?>
                                <button class="btn btn-primary" name="follow"
                                        value="<?= $rssFeed['id'] ?>"
                                        type="submit">Follow
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
