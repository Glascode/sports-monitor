<h1 class="title-lg">Twitter trends</h1>
<h4 class="text-muted mb-5">Popular tweets</h4>

<div>
    <?php foreach ($this->feed as $item): ?>
        <div>
            <h4><?= $item['title'] ?></h4>
            <p class="text-muted"><?= $item['pubDate'] ?></p>
            <p><?= $item['description'] ?></p>
        </div>
    <?php endforeach ?>
</div>

<!-- Debug -->
<!--<code>--><?php //var_dump($this->tweets) ?><!--</code>-->
