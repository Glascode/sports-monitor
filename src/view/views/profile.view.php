<div class="container-md m-auto">
    <h1 class="mb-5"><?= $this->pageTitle ?></h1>

    <div>
        <h2>Your RSS feeds</h2>
        <?php if (empty($this->rssFeeds)): ?>
            <p>You're not subscribed to any RSS feeds.</p>
        <?php endif; ?>

        <form onChange="this.submit()">
            <?php foreach ($this->availableRssFeeds as $rssFeed): ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="rssFeedId" value="<?= $rssFeed['id'] ?>">
                        <?= $rssFeed['name'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
