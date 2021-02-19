$(document).ready(function () {
    $('.user-item').hover(function (){
        $(this).css('backgroundColor','red')
    }, function () {
        $(this).css('backgroundColor','white')

    });

    $('#hide-image').click(function () {
        $('.user-image').toggle();
    });
    let origin = window.origin;
    // tim kiem user su dung ajax
    $('#search-user').keyup(function () {
        let keyword = $(this).val();
        // goi ajax
        $.ajax({
            url: origin + '/admin/users/search',
            method: 'GET',
            data: {
                name: keyword
            },
            success: function (res) {
               // xu ly du lieu tra ve thanh cong
                let users = res.data;
                let html = '';
                if (keyword) {
                    $.each(users, function (i, v) {
                        html += '<a href="#" class="list-group-item list-group-item-action">';
                        html += v.name
                        html += '</a>'
                    })
                    $('.list-user-search').html(html);
                } else {
                    $('.list-user-search').html('');
                }
            },
            error: function (err) {

            }
        })
    })

    function deleteProduct(id) {
        if (confirm('Are you sure?')) {
            $.ajax({
                url: origin + '/admin/products/' + id + '/delete',
                method: 'GET',
                success: function (res) {
                    getAllProduct();
                }
            })
        }

    }


    function getAllProduct() {
        $.ajax({
            url: origin + '/admin/products/getAll',
            method: 'GET',
            success: function (res) {
                let html = '';
                $.each(res, function (index, item){
                    html += '<tr>';
                    html += '<td>';
                    html += index + 1;
                    html += '</td>';
                    html += '<td>';
                    html += item.name;
                    html += '</td>';
                    html += '<td>';
                    html += '<img src="'+ origin + '/storage/'+ item.img +' " alt="">'
                    html += '</td>';
                    html += '<td>';
                    html += item.desc;
                    html += '</td>';
                    html += '<td>';
                    html += item.price;
                    html += '</td>';
                    html += '<td>';
                    html += item.category.name;
                    html += '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-danger delete-product" data-id="'+ item.id +'">Delete</button>';
                    html += '</td>';
                    html += '</tr>';
                })
                $('#product-list').html(html)
            }
        })
    }

    $('body').on('click','.delete-product',function (){
            let id = $(this).attr('data-id');
            deleteProduct(id)
    })

    getAllProduct();

});
