// ADD CATEGORY
$(document).on('click', '#addCategory', function(e) {
    e.preventDefault();

    let name = $('#name').val();
    let slug = $('#slug').val();

    $.ajax({
        url: '/category',
        method: 'POST',
        data: {
            name: name,
            slug: slug,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert('Category Added Successfully!')

            // Reset form
            $('#addCategoryForm')[0].reset();

            document.querySelector('[x-ref="categorySection"]').__x.$data.showCategoryAdd = false;

            let newRowCategory = `
                <tr>
                    <td>${response.name}</td>
                    <td>${response.slug}</td>
                    <td>Edit</td>
                </tr>
            `;

            $('#category-table tbody').append(newRowCategory);
        },
        error: function(response) {
            alert('Error: ' + (response.responseJSON?.message || 'Something went wrong.'));
            $('#addUser').prop('disabled', false).text('Add User');
        }
    });
});