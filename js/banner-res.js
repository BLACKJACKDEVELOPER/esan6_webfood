let banner = document.getElementById("banner")
document.body.onresize = () => {
    if(window.innerWidth <= 522) {
        banner.src = "image/banner/New Project.jpg"
    }else {
        banner.src = "image/banner/Food-Facebook-Cover-Banner-19.jpg"
    }
}
document.body.onload = () => {
    if(window.innerWidth <= 522) {
        banner.src = "image/banner/New Project.jpg"
    }else {
        banner.src = "image/banner/Food-Facebook-Cover-Banner-19.jpg"
    }
}