<div style="max-width: 400px; margin: auto; border: 1px solid lightgray;
            border-radius: .5rem; padding: 3rem;">
    <h1 style="text-align: center; margin-top: 0; margin-bottom: 3rem;">
        <?= $this->pageTitle ?>
    </h1>

    <div> <!-- form -->
        <div class="mdc-text-field mdc-text-field--outlined"
             style="display: flex; margin-bottom: 1rem;">
            <input type="text" id="login" class="mdc-text-field__input">
            <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                    <label for="login" class="mdc-floating-label">
                        Login
                    </label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
            </div>
        </div>
        <div class="mdc-text-field mdc-text-field--outlined"
             style="display: flex; margin-bottom: 3rem;">
            <input type="password" id="password" class="mdc-text-field__input">
            <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                    <label for="password" class="mdc-floating-label">
                        Password
                    </label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
            </div>
        </div>
        <button class="mdc-button mdc-button--raised"
                style="display: flex; margin-left: auto">
            Next
        </button>
    </div>
</div>