<div class="container-md m-auto">
    <h1 class="mb-5"><?= $this->pageTitle ?></h1>

    <div>
        <h2 class="mb-4">Your RSS feeds</h2>

        <form onChange="this.submit()" method="POST">
            <?php foreach ($this->allRssFeeds as $rssFeed): ?>
                <div class="checkbox">
                    <span><?= $rssFeed['name'] ?></span>
                    <?php if (!empty($this->rssFeedsStorage->getUserRssFeed($this->userId, $rssFeed['id']))): ?>
                        <button class="btn btn-primary" name="unfollow"
                                value="<?= $rssFeed['id'] ?>"
                                type="submit">Unfollow</button>
                    <?php else: ?>
                        <button class="btn btn-primary" name="follow"
                                value="<?= $rssFeed['id'] ?>"
                                type="submit">Follow</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
