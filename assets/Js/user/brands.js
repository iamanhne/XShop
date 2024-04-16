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
    console.log(id);
}