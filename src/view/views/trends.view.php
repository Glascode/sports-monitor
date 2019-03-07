<div style="max-width: 800px; margin: auto; padding: 5rem;">
    <h2 class="mb-5 google-sans">Twitter trends</h2>
    <div class="mb-4 text-secondary text-uppercase">Popular Tweets</div>

    <div>
        <?php foreach ($this->tweets as $tweet): ?>
            <div class="mb-4">
                <div class="mb-1">
                    <span class="font-weight-bold"><?= $tweet['user']['name'] ?></span>
                    <span class="text-muted">@<?= $tweet['user']['screen_name'] ?></span>
                </div>
                <p><?= $tweet['text'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
</div>

<!-- Debug -->
<!--<code>--><?php //var_dump($this->tweets) ?><!--</code>-->
