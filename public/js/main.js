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
