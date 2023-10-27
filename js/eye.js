const password = document.getElementById("password")
const eye = document.getElementById("eye")

function showHide() {
    if(password.type === "password") {
        password.setAttribute("type", "text")
        eye.src = "image/icon/hide.png"
    }else {
        password.setAttribute("type", "password")
        eye.src = "image/icon/show.png"
    }
}