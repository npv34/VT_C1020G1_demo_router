$(document).ready(function () {
    $('.user-item').hover(function (){
        $(this).css('backgroundColor','red')
    }, function () {
        $(this).css('backgroundColor','white')

    });

    $('#hide-image').click(function () {
        $('.user-image').toggle();
    });

    // tim kiem user su dung ajax
    $('#search-user').keyup(function () {
        let keyword = $(this).val();
        let origin = window.origin;
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

});
