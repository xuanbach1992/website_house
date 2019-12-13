function showPassword() {
    for (i = 0; i <= 1; i++) {
        let x = document.getElementsByClassName("password_show")[i];
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
}
Dropzone.options.dropzone =
    {
        maxFilesize: 10,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };
