const slide = document.querySelector('#slide_show')
let listSlideImage = [
    "../hinh/Rectangle 62.png",
    "../hinh/img11 1.png",
    "../hinh/img12 1.png",
    "../hinh/img13 1.png",
    "../hinh/img14 1.png"
]
var i = 0

function handleImage() {
    slide.setAttribute("src", listSlideImage[i])
    i++
    if (i == listSlideImage.length) {
        i = 0
    }
}
setInterval(handleImage, 2000)