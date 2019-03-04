<h1 class="title-lg">Twitter trends</h1>
<h4 class="text-muted mb-5">Popular tweets</h4>

<div>
    <?php foreach ($this->tweets as $tweet): ?>
        <div>
            <div>
                <span class="font-weight-bold"><?= $tweet['user']['name'] ?></span>
                <span class="text-muted">@<?= $tweet['user']['screen_name'] ?></span>
            </div>
            <p><?= $tweet['text'] ?></p>
        </div>
    <?php endforeach ?>
</div>

<!-- Debug -->
<!--<code>--><?php //var_dump($this->tweets) ?><!--</code>-->
