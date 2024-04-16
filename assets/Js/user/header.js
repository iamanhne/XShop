// Thêm active cho trang được chọn để biết đang ở trang nào
const addActive = document.querySelectorAll('.menu a');
addActive.forEach(function(link) {
    link.addEventListener('click', () => {
        
    })
})

// change theme 
const changeTheme = document.querySelector('.toggle-checkbox');
const bodyStyle = document.body;
if (localStorage.getItem('theme')) {
    // Nếu đã lưu, áp dụng trạng thái được lưu vào thẻ body
    document.body.classList.add(localStorage.getItem('theme'));
};
changeTheme.addEventListener('click', () => {
    bodyStyle.classList.toggle('light');
    bodyStyle.classList.toggle('dark');
    if (document.body.classList.contains('light')) {
        localStorage.setItem('theme', 'light');
    } else {
        localStorage.setItem('theme', 'dark');
    }
});
// Lưu trạng thái của checkbox vào localStorage khi checkbox được thay đổi
changeTheme.addEventListener('change', function() {
    localStorage.setItem('isChecked', this.checked);
});
window.addEventListener('DOMContentLoaded', function() {
    const isChecked = localStorage.getItem('isChecked');
    if (isChecked === 'true') {
        changeTheme.checked = true;
    } else {
        changeTheme.checked = false;
    }
});