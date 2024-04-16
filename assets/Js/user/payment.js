const paymentQR = document.querySelector('.delivery-control.select');

paymentQR.addEventListener('change',()=> {
    const QRimg = document.querySelector(".QR-payment");
    if (paymentQR.value==="Thanh toán qua mã QR") {
        QRimg.style.display = 'block';
    }
    else {
        QRimg.style.display = 'none';
    }
})