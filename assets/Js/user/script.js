// change themes
const change = document.querySelector('.toggle-checkbox');
const styleBody = document.body;
if (localStorage.getItem('theme')) {
    // Nếu đã lưu, áp dụng trạng thái được lưu vào thẻ body
    document.body.classList.add(localStorage.getItem('theme'));
};
change.addEventListener('click', () => {
    styleBody.classList.toggle('light');
    styleBody.classList.toggle('dark');
    if (document.body.classList.contains('light')) {
        localStorage.setItem('theme', 'light');
    } else {
        localStorage.setItem('theme', 'dark');
    }
});
// Lưu trạng thái của checkbox vào localStorage khi checkbox được thay đổi
change.addEventListener('change', function() {
    localStorage.setItem('isChecked', this.checked);
});
window.addEventListener('DOMContentLoaded', function() {
    const isChecked = localStorage.getItem('isChecked');
    if (isChecked === 'true') {
        change.checked = true;
    } else {
        change.checked = false;
    }
});

// Tạo slider trượt mỗi 5s + thêm dot hiển thị index ảnh và click dot có thể đổi ảnh
const imgPosition = document.querySelectorAll('.slider-container img');
const imgContainer = document.querySelector('.slider-container');
const dotItem = document.querySelectorAll('.dot');
const arrLength = imgPosition.length;
let index =0;
imgPosition.forEach(function(image,index) {
    image.style.left = index*100 + "%";
    dotItem[index].addEventListener('click', () => {
        slider(index);
    })
})
function imgSlide () {
    index++;
    if (index>=arrLength) {
        index = 0;
    }
    slider(index);
}
function slider(index) {
    imgContainer.style.left = '-'+ index*100 + '%';
    const dotActive = document.querySelector('.activeDot');
    dotActive.classList.remove('activeDot');
    dotItem[index].classList.add('activeDot');
}
setInterval(imgSlide,5000);


