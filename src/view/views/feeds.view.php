<div class="d-flex">
    <aside class="container-xs w-100">
        <h6 class="text-uppercase">Subscribed feeds</h6>
        <div class="list-group">
            <a class="list-group-item list-group-item-action"
               href="/feeds">All</a>
            <?php foreach ($this->rssFeedsStorage->getAllUserRssFeeds($this->userId) as $feed): ?>
                <a class="list-group-item list-group-item-action"
                   href="?src=<?= $feed['src'] ?>"><?= $feed['name'] ?></a>
            <?php endforeach; ?>
        </div>
    </aside>

    <article class="container-md pl-5">
        <?php if (empty($this->userRssFeed) && empty($this->userRssFeeds)): ?>
            <h2 class="mb-5 google-sans">RSS feeds</h2>

            <p>Subscribe to RSS feeds from your <a href="/profile">profile
                    preferences</a> to see live news from your favourite sport!
            </p>
        <?php else: ?>
            <?php if (!empty($this->userRssFeed)): ?>
                <?php $rssFeed = $this->getRssChannel($this->userRssFeed['url']) ?>
                <?php include __DIR__ . '/../partials/feed.php'; ?>
            <?php else: ?>
                <?php foreach ($this->userRssFeeds as $userRssFeed): ?>
                    <?php $rssFeed = $this->getRssChannel($userRssFeed['url']) ?>
                    <?php include __DIR__ . '/../partials/feed.php'; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endif; ?>
    </article>
</div>
