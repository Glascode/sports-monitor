<div class="d-flex">
    <aside style="width: 268px; padding-top: 5rem; padding-left: 3rem;">
        <h6 class="text-uppercase">Feeds</h6>
        <ul>
            <li><a href="/feed">All</a></li>
            <li><a href="?src=bbc-sport">BBC Sport</a></li>
            <li><a href="?src=lequipe">L'Équipe</a></li>
        </ul>
    </aside>

    <article style="max-width: 800px; padding: 5rem;">
        <h2 class="mb-5 google-sans"><?= $this->feed['title'] ?></h2>
        <div class="mb-4 text-secondary text-uppercase">Today</div>

        <?php foreach ($this->feed['item'] as $item): ?>
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
    </article>
</div>
