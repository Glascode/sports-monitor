<h1><?= $this->pageTitle ?></h1>

<div>
    <div class="mdc-text-field mdc-text-field--outlined">
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
    <div class="mdc-text-field mdc-text-field--outlined">
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
    <button class="mdc-button mdc-button--raised">Login</button>
</div>
