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
                    beforeSend: function () {
                        $("#header_spinner").removeClass("d-none");
                    },
                    success: function (response) {
                        if (response.trim() == "your data has been saved successfully") {
                            var design = '<div class="alert alert-success mt-3">  ' + response + ' <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                            $("#category_msg").html(design);
                        }
                        else if (response.trim() = "your data has not, please try again later !") {
                            var design = '<div class="alert alert-warning mt-3">  ' + response + ' <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                            $("#category_msg").html(design);
                        }
                        else {
                            var design = '<div class="alert alert-warning mt-3"> somthing went wrong plese contact your administrator   <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                            $("#category_msg").html(design);
                        }
                        $("#header_spinner").addClass("d-none");
                        setTimeout(function () {
                            $("#category_msg").html("");
                            $("#category_form").trigger("reset");
                            $("#add_input").html("");
                        }, 4000)
                    }
                })
            })
        }
    })
}
// retrive category list
setTimeout(function () {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "php/category_list.php",
            success: function (response) {
                var category_list = JSON.parse(response);
                for (var i = 0; i < category_list.length; i++) {
                    var id = category_list[i].id;
                    var cat_name = category_list[i].category_name;
                    $(".category_list").append('<div clas="list-group">  <div class="list-group-item my-2">  <span class="mr-3"> ' + id + ' </span> ' + cat_name + '  <span class="fa fa-trash close mx-2" style="font-size:20px"> </span> <span class="fa fa-edit close mx-2" style="font-size:20px"> </span>  </div> </div>');
                }
            }
        });
    })
}, 200)