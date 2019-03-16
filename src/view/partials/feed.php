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
<?php endforeach; ?>

