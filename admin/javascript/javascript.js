function updateTagId() {
    const subcategorySelect = document.getElementById('subcategory_id');
    const selectedOption = subcategorySelect.options[subcategorySelect.selectedIndex];
    const categoryId = selectedOption.getAttribute('data-category-id');

    const tagSelect = document.getElementById('tag_id');
    tagSelect.innerHTML = ''; // Xóa các tùy chọn hiện tại

    if (categoryId) {
        // Thực hiện truy vấn AJAX để lấy thể loại chính dựa trên category_id
        fetch(`get_tags.php?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                tagSelect.innerHTML = '<option value="">Chọn thể loại</option>'; // Reset
                data.forEach(tag => {
                    tagSelect.innerHTML += `<option value="${tag.tag_id}">${tag.tag_name}</option>`;
                });
            });
    } else {
        tagSelect.innerHTML = '<option value="">Chọn thể loại</option>'; // Reset
    }
}