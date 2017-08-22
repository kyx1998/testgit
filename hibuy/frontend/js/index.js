
function showLunBoImg() {
    // 获取浏览器的宽度
    var client_width = document.body.clientWidth;
    console.log(client_width);
    var lunbo_img_div = document.getElementsByClassName('lunbo-img')[0];
    //lunbo_img_div.style.width = client_width + 'px';

}

window.onload = function () {
    showLunBoImg();
};

window.onresize = function () {
    showLunBoImg();
};