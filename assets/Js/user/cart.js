// Chọn lại số lượng mua hàng
const deQuantity = document.querySelectorAll('.decrease');
const inQuantity = document.querySelectorAll('.increase');
const text = document.querySelectorAll('.id');
// Tính đơn giá
const unitPrice = document.querySelectorAll('.unit-price');
const price = document.querySelectorAll('.price');

// Tính tổng tiền 1 hàng với số lượng chọn bất kì
price.forEach((item, index) => {
    unitPrice[index].innerHTML = Number(item.textContent) * parseInt(text[index].textContent);
})

deQuantity.forEach(function(decrease,index) {
    decrease.addEventListener('click',()=> {
        const Yes = document.getElementById('OK');
        const No = document.getElementById('No');
        let i = parseInt(text[index].textContent);
        if (i<=1) {
            const notifi = document.querySelector('.noti-container');
            notifi.style.display = 'block';
            Yes.addEventListener('click', ()=> {

            })
            No.addEventListener('click', ()=> {
                notifi.style.display = 'none';
            })
        }
        else {
            i--;
            text[index].innerHTML = i;
            unitPrice[index].innerHTML = Number(price[index].textContent) * i;
        }
        let total = 0; // Khởi tạo tổng số tiền

        checkItems.forEach(function(checkbox, idx) {
            if (checkbox.checked) {
                total += parseFloat(unitPrice[idx].textContent);
            }
        });
        totalMoney.innerHTML = total;
    })
})
inQuantity.forEach(function (increase,index) {
    const data_max = parseInt(inQuantity[index].getAttribute('data-max'));
    increase.addEventListener('click',() => {
        let i = parseInt(text[index].textContent);
        if (i<data_max) {
            i++;
            text[index].innerHTML = i;
            unitPrice[index].innerHTML = Number(price[index].textContent) * i;
            let total = 0; // Khởi tạo tổng số tiền
            let checkedCount = 0; // Khởi tạo số checkbox được chọn

            checkItems.forEach(function(checkbox, idx) {
                if (checkbox.checked) {
                    total += parseFloat(unitPrice[idx].textContent);
                    checkedCount++;
                }
            });
            totalMoney.innerHTML = total;
        }
        console.log(1)
    })
})

// Handle show re-select
const chooses = document.querySelectorAll('.chooseType');
const selecs = document.querySelectorAll('.selection');
const rotates = document.querySelectorAll('#animation');
const backs = document.querySelectorAll('.back');
const buttonConfirm = document.querySelectorAll('.accept');
const firstSize = document.querySelectorAll('.first_choose');
const afterSize = document.querySelectorAll('.after_choose');
let value_temporary = 0;
// var currentValueSize = document.getElementById("product_size").value;
afterSize.forEach(function(li) {
    li.addEventListener('click', function() {
        // Loại bỏ lớp 'activeChoose' từ tất cả các phần tử trong danh sách
        afterSize.forEach(function(item) {
            item.classList.remove('active_choose');
        });
        // Thêm lớp 'activeChoose' vào phần tử được nhấp vào
        this.classList.add('active_choose');
        value_temporary = this.textContent.trim();
    });
});

const toggleSelect = (index) => {
    selecs[index].classList.toggle('checkShow');
    rotates[index].classList.toggle('rotate');
};
chooses.forEach((choose, index) => {
    choose.addEventListener('click', () => {
        toggleSelect(index);
    });
});
backs.forEach((back, index) => {
    back.addEventListener('click', () => {
        toggleSelect(index);
    }); 
});
buttonConfirm.forEach((accept, index)=> {
    accept.addEventListener('click',()=> {
        firstSize[index].innerHTML = value_temporary;
        toggleSelect(index);
    })
})


// scroll window 
const addClass = document.querySelector('.cart-content-mid');
const scrollThreshold = 100; // Độ dài cần cuộn để thực hiện hành động (đơn vị là pixel)

let lastScrollTop = 0;

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
        // Cuộn xuống
        // Loại bỏ class
        // Ví dụ: document.getElementById('elementId').classList.remove('className');
        addClass.classList.remove('box-shadow');
    } else if (scrollTop < lastScrollTop && scrollTop < scrollThreshold) {
        // Cuộn lên
        // Thêm class
        // Ví dụ: document.getElementById('elementId').classList.add('className');
        addClass.classList.add('box-shadow');

    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Đảm bảo không âm khi cuộn lên đầu trang
}, false);


// Chọn tất cả các sản phẩm + hiện giá tiền
const checkAllItems = document.querySelectorAll('.selectAll');
const checkItems = document.querySelectorAll('.select-item');
const seeAll = document.querySelector('.seAll');
const allItems = document.querySelector('.allItem');
const totalMoney= document.querySelector('.total');
seeAll.innerHTML = checkItems.length;

function toggleCheckboxes(checked) {
    checkItems.forEach(function(item) {
        item.checked = checked;
        if(item.checked ===true) {
            allItems.innerHTML = checkItems.length;
        }
        else {
            allItems.innerHTML = 0;
        }
    });
}
function toggleCheckAll (checked) {
    checkAllItems.forEach(function(item) {
        item.checked = checked;
        let total = 0; // Khởi tạo tổng số tiền
        let checkedCount = 0; // Khởi tạo số checkbox được chọn

        checkItems.forEach(function(checkbox, idx) {
            if (checkbox.checked) {
                total += parseFloat(unitPrice[idx].textContent);
                checkedCount++;
            }
        });
        totalMoney.innerHTML = total
    })
}
checkItems.forEach(function(item) {
    item.addEventListener('change', function() {
        const checkedCounts = Array.from(checkItems).reduce((count, item) => {
            return count + (item.checked ? 1 : 0);
        }, 0);
        let total = 0; // Khởi tạo tổng số tiền
        let checkedCount = 0; // Khởi tạo số checkbox được chọn

        checkItems.forEach(function(checkbox, idx) {
            if (checkbox.checked) {
                total += parseFloat(unitPrice[idx].textContent);
                checkedCount++;
            }
        });
        totalMoney.innerHTML = total;
        allItems.innerHTML = checkedCounts;
        
    })
})
checkAllItems.forEach(function(allItem) {
    allItem.addEventListener('change', function() {
        toggleCheckboxes(allItem.checked);
        toggleCheckAll(allItem.checked);
    });
});

// Xác định hàm để gửi yêu cầu xoá dữ liệu
function deleteCartItem(id) {
    // Tạo yêu cầu XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xác định phương thức và URL của yêu cầu
    xhr.open("POST", "./logic/deleteItemonCart.php", true);

    // Thiết lập tiêu đề Content-Type
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý phản hồi từ máy chủ (nếu cần)
            console.log(xhr.responseText);
            // Sau khi xoá thành công, có thể cập nhật giao diện người dùng mà không cần tải lại trang
            var productElement = document.getElementById("product-" + id);
            if (productElement) {
                productElement.remove();
            }
            const checkItems = document.querySelectorAll('.select-item');
            const seeAll = document.querySelector('.seAll');
            seeAll.innerHTML = checkItems.length;
        }
    };

    // Gửi yêu cầu với dữ liệu id của mục cần xoá
    xhr.send("id=" + id);
}




