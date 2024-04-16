
// Chọn kích thước giày 
const sizeActive = document.querySelectorAll('.product-content-right-product-size li');
var currentValueSize = document.getElementById("product_size").value;
sizeActive.forEach(function(li) {
    li.addEventListener('click', function() {
        // Loại bỏ lớp 'activeChoose' từ tất cả các phần tử trong danh sách
        sizeActive.forEach(function(item) {
            item.classList.remove('activeChoose');
        });
        // Thêm lớp 'activeChoose' vào phần tử được nhấp vào
        this.classList.add('activeChoose');
        currentValueSize = this.textContent.trim();
        const check = document.querySelector('.product-content-right-product-quantity .check');
        check.style.display = 'none';
    });
});

// Chọn số lượng mua, đưa thông báo nếu chưa chọn kích thước đã chọn số lượng
const deQuantity = document.querySelector('.decrease');
const inQuantity = document.querySelector('.increase');
const text = document.querySelector('.id');
document.addEventListener('DOMContentLoaded', function() {
    let i = parseInt(text.getAttribute('data-current')); // Lấy giá trị ban đầu của số lượng từ thuộc tính data-current
    deQuantity.addEventListener('click', () => {
        if (i>0) {
            i--;
            text.innerHTML = i;
            text.setAttribute('data-current', i); // Cập nhật giá trị mới của số lượng vào thuộc tính data-current
            //document.getElementById('selected-quantity').value = i;
        }
    })
    inQuantity.addEventListener('click',() => {
        const sizeActiveArray = Array.from(sizeActive);
        const max = parseInt(inQuantity.getAttribute('data-max')); // Lấy giá trị tối đa từ thuộc tính data-max
        const isActive = sizeActiveArray.every(function(li) {
            return li.classList.contains('activeChoose')
        }) 
        if (isActive===false) {
            const check = document.querySelector('.product-content-right-product-quantity .check');
            check.style.display = 'block';
        }
        sizeActive.forEach(function(li) {
            const isAct = li.classList.contains('activeChoose');
            if (isAct) {
                if (i<max) {
                    i++;
                    text.innerHTML = i;
                    text.setAttribute('data-current', i);
                    //document.getElementById('selected-quantity').value = i;
                }
                const check = document.querySelector('.product-content-right-product-quantity .check');
                check.style.display = 'none';
            }
        })
    })


    //handle
    const addCart = document.getElementById("add-to-cart-btn");
    const quickPay = document.getElementById("add-to-cart-btn2");
    const handlePay = function(isAddToCart) {
        var currentValueQuantity = parseInt(text.getAttribute('data-current'));
        var currentValueId = document.getElementById('product_id').value;
        var currentValueImg = document.getElementById('product_img').value;
        var currentValuePrice = document.getElementById('product_price').value;
        var productAllSize = document.getElementById('product_allsize').value;
        var productMaxQtt = document.getElementById('product_maxqtt').value;
        
        const showMessage = document.querySelector('.content-notify');
        const notify = document.querySelector('.notify-container');
        const iconNotify = document.querySelector('.icon-notify');
        const checkOp = document.getElementById('pay_quick"');
        if (currentValueSize == 0 && currentValueQuantity == 0) {
            iconNotify.innerHTML = '<i class="fa-solid fa-exclamation" style="color: #f6131e;"></i>'
            showMessage.innerHTML = "<p>Vui lòng cung cấp lựa chọn!!!</p>"
            notify.style.display ='block';
            const exit = document.querySelector ('.exit');
            exit.addEventListener('click',()=> {
                notify.style.display ='none';
            })
        }
        else {
            if (currentValueQuantity>0) {
                var productData = {
                    product_id: currentValueId,
                    product_img: currentValueImg,
                    product_size: currentValueSize,
                    product_allsize: JSON.stringify(productAllSize),
                    product_price: currentValuePrice,
                    product_quantity: currentValueQuantity,
                    product_maxqtt: productMaxQtt
                };
                if (isAddToCart) {
                    iconNotify.innerHTML = '<i class="fa-solid fa-check" style="color: #0feb29;"></i>'
                    showMessage.innerHTML = "<p>Sản phẩm đã được thêm vào giỏ hàng!!!</p>"
                    notify.style.display ='block';
                    const exit = document.querySelector ('.exit');
                    exit.addEventListener('click',()=> {
                        notify.style.display ='none';
                    })
                }  
            }
            else {
                iconNotify.innerHTML = '<i class="fa-solid fa-exclamation" style="color: #f6131e;"></i>'
                showMessage.innerHTML = "<p>Vui lòng chọn số lượng!!!</p>"
                notify.style.display ='block';
                const exit = document.querySelector ('.exit');
                exit.addEventListener('click',()=> {
                    notify.style.display ='none';
                })
            }
        }
    
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./logic/add-to-cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(JSON.stringify(productData));
        console.log(productData);
    }

    // Xử lý khi người dùng nhấn vào nút "Thêm vào giỏ hàng"
    addCart.addEventListener("click", function () {
        handlePay(true)
    });

    // Xử lý khi người dùng bấm nút "Mua ngay"
    quickPay.addEventListener("click", function () {
        handlePay(false)
    });
})


// Xem chi tiet
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const tabs = $$('.tab-item');
const panes = $$('.product-content-right-bottom-content-chitiet');
            
const tabActive = $('.tab-item.active');
const tabActiveLine = $('.product-content-right-bottom-content-title .line');

tabActiveLine.style.left = tabActive.offsetLeft + 'px';
tabActiveLine.style.width = tabActive.offsetWidth + 'px';

tabs.forEach((tab,index) => {
    const pane = panes[index];

    tab.onclick =  function () {
        $('.product-content-right-bottom-content-chitiet.activePane').classList.remove('activePane');
        $('.tab-item.active').classList.remove('active');
        tabActiveLine.style.left = this.offsetLeft + 'px';
        tabActiveLine.style.width = this.offsetWidth + 'px';
        this.classList.add('active');
        pane.classList.add('activePane');  
    }
})

function postData(url, id) {
    // Tạo một biểu mẫu ẩn
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", url);

    // Tạo trường input để chứa dữ liệu id
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "id");
    input.setAttribute("value", id);

    // Thêm trường input vào biểu mẫu
    form.appendChild(input);

    // Thêm biểu mẫu vào body của trang web và tự động submit
    document.body.appendChild(form);
    form.submit();
}
