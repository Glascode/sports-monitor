mdc.ripple.MDCRipple.attachTo(document.querySelector('.mdc-button'));
[].forEach.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    mdc.textField.MDCTextField.attachTo(el);
});