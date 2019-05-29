$(document).ready(function() {
    setTimeout(function() {
        hideAlert();
    }, 5000);
});

function alertExists() {
    if ($(".alert")) {
        return true;
    }
}

function hideAlert() {
    if (alertExists()) {
        $(".alert").slideUp(500);
    }
}
