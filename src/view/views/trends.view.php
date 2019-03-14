<style>
    .tweet-icon {
        width: 1.3rem;
        height: 1.3rem;
    }

    .tweet-card pre {
        font-family: inherit;
        font-size: 100%;
        white-space: pre-wrap;
    }
</style>

<div style="max-width: 800px; margin: auto;">
    <h2 class="mb-5 google-sans">Twitter trends</h2>
    <div class="mb-4 text-secondary text-uppercase">Popular Tweets</div>

    <div>
        <?php foreach ($this->tweets as $tweet): ?>
            <a class="card tweet-card mb-4 p-3" target="_blank">
                <div class="mb-1">
                    <span class="font-weight-bold"><?= $tweet['user']['name'] ?></span>
                    <span class="text-muted">@<?= $tweet['user']['screen_name'] ?></span>
                </div>
                <pre class="w-100"><?= $tweet['full_text'] ?></pre>
                <div class="d-flex">
                    <span class="d-flex align-items-center mr-4">
                        <svg class="tweet-icon retweet-icon mr-2">
                            <use xlink:href="#retweet-icon"></use>
                        </svg>
                        <?= $tweet['retweet_count'] ?>
                    </span>
                    <span class="d-flex align-items-center">
                        <svg class="tweet-icon fav-icon mr-2">
                            <use xlink:href="#fav-icon"></use>
                        </svg>
                        <?= $tweet['favorite_count'] ?>
                    </span>
                </div>
            </a>
        <?php endforeach ?>
        <?php var_dump($this->tweets) ?>
    </div>
</div>

<svg class="icon-sprite">
    <symbol id="retweet-icon">
        <svg viewBox="0 0 24 24"
             class="rn-4qtqp9 rn-yyyyoo rn-1xvli5t rn-dnmrzs rn-bnwqim rn-m6rgpd rn-lrvibr rn-1hdv0qi">
            <g>
                <path d="M23.77 15.67a.749.749 0 0 0-1.06 0l-2.22 2.22V7.65a3.755 3.755 0 0 0-3.75-3.75h-5.85a.75.75 0 0 0 0 1.5h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22a.749.749 0 1 0-1.06 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5a.747.747 0 0 0 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22a.752.752 0 0 0 1.062 0 .749.749 0 0 0 0-1.06l-3.5-3.5a.747.747 0 0 0-1.06 0l-3.5 3.5a.749.749 0 1 0 1.06 1.06l2.22-2.22V16.7a3.755 3.755 0 0 0 3.75 3.75h5.85a.75.75 0 0 0 0-1.5z"></path>
            </g>
        </svg>
    </symbol>
    <symbol id="fav-icon">
        <svg viewBox="0 0 24 24"
             class="rn-4qtqp9 rn-yyyyoo rn-1xvli5t rn-dnmrzs rn-bnwqim rn-m6rgpd rn-lrvibr rn-1hdv0qi">
            <g>
                <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
            </g>
        </svg>
    </symbol>
</svg>

<!-- Debug -->
<!--<code>--><?php //var_dump($this->tweets) ?><!--</code>-->
