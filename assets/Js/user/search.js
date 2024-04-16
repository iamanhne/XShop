const searchInput = document.getElementById('input');
const searchResults = document.getElementById('searchResults');

// Thêm sự kiện nhập liệu vào ô input
searchInput.addEventListener('keyup', function() {
    // Lấy từ khóa tìm kiếm từ ô input
    const query = searchInput.value.trim();

    // Kiểm tra xem từ khóa có ít nhất 1 ký tự không
    if (query.length > 0) {
        // Gửi yêu cầu tìm kiếm đến máy chủ và nhận kết quả
        fetch(`search.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                // Xóa kết quả tìm kiếm trước đó
                searchResults.innerHTML = '';

                // Hiển thị kết quả tìm kiếm
                data.forEach(product => {
                    const productLink = document.createElement('a');
                    productLink.textContent = product.name;
                    productLink.href = `product.php?id=${product.id}`;
                    searchResults.appendChild(productLink);
                    searchResults.appendChild(document.createElement('br'));
                });
            })
            .catch(error => console.error('Error:', error));
    } else {
        // Nếu ô input rỗng, xóa kết quả tìm kiếm
        searchResults.innerHTML = '';
    }
});