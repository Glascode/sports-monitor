// Enable ripple effect
mdc.ripple.MDCRipple.attachTo(document.querySelector('.mdc-button'));

// Enable text fields
[].forEach.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    mdc.textField.MDCTextField.attachTo(el);
});
