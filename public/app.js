$(document).ready(function () {
    $("#login-open").on("click", function () {
        $("#modal-login").attr("open", true);
    });

    $("#signup-al").on("click", function () {
        $("#modal-login").attr("open", false);
        $("#modal-signup").attr("open", true);
    });

    $("#login-al").on("click", function () {
        $("#modal-login").attr("open", true);
        $("#modal-signup").attr("open", false);
    });
});

const base64String = (image) => {
    return new Promise((a, r) => {
        const fr = new FileReader();
        fr.readAsDataURL(image);
        fr.onloadend = (e) => {
            a(e.target.result);
        };
        fr.onerror = (e) => {
            r(e);
        };
    });
};
