<div class="d-flex">
    <aside class="container-xs w-100">
        <h6 class="text-uppercase">Feeds</h6>
        <div class="list-group">
            <a class="list-group-item list-group-item-action"
               href="/feeds">All</a>
            <a class="list-group-item list-group-item-action"
               href="?src=bbc-sport">BBC Sport</a>
            <a class="list-group-item list-group-item-action"
               href="?src=lequipe">L'Équipe</a>
        </div>
    </aside>

    <article class="container-md pl-5">
        <?php if (empty($this->feeds)): ?>
            <h2 class="mb-5 google-sans">Your RSS feeds</h2>

            <p>Subscribe to RSS feeds from your <a href="/profile">profile
                    preferences</a> to see live news from your favourite sport!
            </p>
        <?php else: ?>
            <h2 class="mb-5 google-sans"><?= $this->feeds['title'] ?></h2>
            <div class="mb-4 text-secondary text-uppercase">Today</div>

            <?php foreach ($this->feeds['item'] as $item): ?>
                <a class="mb-5 d-flex" href="<?= $item['link'] ?>">
                    <div class="mr-4">
                        <?php if (key_exists('thumbnail', $item)): ?>
                            <?php $itemThumbnail = $item['thumbnail']['@attributes']; ?>
                            <img class="rss-item-img"
                                 src="<?= $itemThumbnail['url'] ?>"
                                 width="<?= $itemThumbnail['width'] ?>"
                                 height="<?= $itemThumbnail['url'] ?>"
                                 alt="illustration">
                        <?php elseif (key_exists('enclosure', $item)): ?>
                            <?php $itemEnclosure = $item['enclosure']['@attributes']; ?>
                            <img class="rss-item-img"
                                 src="<?= $itemEnclosure['url'] ?>"
                                 alt="illustration">
                        <?php endif ?>
                    </div>
                    <div>
                        <h5 class="mb-2"><?= $item['title'] ?></h5>
                        <div class="mb-2 text-muted">
                            <time datetime="<?= $item['pubDate'] ?>"
                                  title="<?= 'Published: ' . $item['pubDate'] ?>">
                                <?= $this->formatPublishedTime(strtotime($item['pubDate'])) ?>
                            </time>
                        </div>
                        <div class="text-muted"><?= $item['description'] ?></div>
                    </div>
                </a>
            <?php endforeach ?>
        <?php endif ?>
    </article>
</div>
