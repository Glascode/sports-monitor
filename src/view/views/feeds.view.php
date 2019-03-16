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
        <?php if (empty($this->userRssFeeds)): ?>
            <h2 class="mb-5 google-sans">RSS feeds</h2>

            <p>Subscribe to RSS feeds from your <a href="/profile">profile
                    preferences</a> to see live news from your favourite sport!
            </p>
        <?php else: ?>
            <?php foreach ($this->userRssFeeds as $userRssFeed): ?>
                <?php $rssFeed = $this->getRssChannel($userRssFeed['url']) ?>

                <h2 class="mb-5 google-sans"><?= $rssFeed['title'] ?></h2>
                <div class="mb-4 text-secondary text-uppercase">Today</div>

                <?php foreach ($rssFeed['item'] as $item): ?>
                    <a class="mb-5 d-flex" href="<?= $item['link'] ?>">
                        <?php if (key_exists('thumbnail', $item)): ?>
                            <?php $itemThumbnail = $item['thumbnail']['@attributes']; ?>
                            <div class="mr-4">
                                <img class="rss-item-img"
                                     src="<?= $itemThumbnail['url'] ?>"
                                     width="<?= $itemThumbnail['width'] ?>"
                                     height="<?= $itemThumbnail['url'] ?>"
                                     alt="illustration">
                            </div>
                        <?php elseif (key_exists('enclosure', $item)): ?>
                            <?php $itemEnclosure = $item['enclosure']['@attributes']; ?>
                            <div class="mr-4">
                                <img class="rss-item-img"
                                     src="<?= $itemEnclosure['url'] ?>"
                                     alt="illustration">
                            </div>
                        <?php endif ?>
                        <div>
                            <h5 class="mb-2"><?= $item['title'] ?></h5>
                            <div class="mb-2 text-muted">
                                <time datetime="<?= $item['pubDate'] ?>"
                                      title="<?= 'Published: ' . $item['pubDate'] ?>">
                                    <?= $this->formatPublishedTime(strtotime($item['pubDate'])) ?>
                                </time>
                            </div>
                            <div class="text-muted rss-item-description">
                                <?= $item['description'] ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endif ?>
    </article>
</div>
