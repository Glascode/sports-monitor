<h1>Twitter trends</h1>

<div>
    <?php foreach ($this->tweets as $tweet): ?>
        <div>
            <div>
                <span class="font-weight-bold"><?= $tweet['user']['name'] ?></span>
                <span class="text-muted">@<?= $tweet['user']['screen_name'] ?></span>
            </div>
            <div><?= $tweet['text'] ?></div>
            <div>
                <div>
                    <i class="material-icons">repeat</i>
                    <?= $tweet['retweet_count'] ?>
                </div>
                <div>
                    <i class="material-icons">favorite</i>
                    <?= $tweet['favorite_count'] ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- Debug -->
<code><?php var_dump($this->tweets) ?></code>
