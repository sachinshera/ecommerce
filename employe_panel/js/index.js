// request dynamic pages
$(document).ready(function () {
    $(".sidebar ul li").each(function () {
        $(this).click(function () {
            $(".sidebar ul li").removeClass("active");
            var url = $(this).attr("data-url");
            requestPages(url);
            $(this).addClass("active");
        })
    })
});
// request pages
function requestPages(url) {
    $.ajax({
        type: "POST",
        url: "dynamic_pages/" + url,
        xhr: function () {
            var request = new XMLHttpRequest();
            request.onprogress = function (e) {
                var percent = parseFloat(e.loaded / e.total) * 100;
                $("#dyn_page").html('<h5 class="text-center"> <i class="fa fa-spinner fa-spin mx-2"></i> ' + percent + '% Loading....</h5>'
                );
            }
            return request;
        },
        beforeSend: function () {
            $("#dyn_page").html('<h5 class="text-center"> <i class="fa fa-spinner fa-spin mx-2"></i> 0% Loading....</h5>'
            );
        },
        success: function (response) {
            $("#dyn_page").html(response);
            $(".add_field_btn").click(function () {
                $("#add_input").append(' <input type="text" class="form-control my-2" placeholder="Mobiles">');
            });
            $("#category_form").submit(function (e) {
                e.preventDefault();
                var values = [];
                var i;
                for (i = 0; i < $("#category_form input").length; i++) {
                    values[i] = $("#category_form input")[i].value;
                };
                var obj = JSON.stringify(values);
                $.ajax({
                    type: "POST",
                    url: "php/create_category.php",
                    data: {
                        data: obj
                    },
                    success: function (response) {
                        document.write(response);
                    }
                })
            })
        }
    })
}