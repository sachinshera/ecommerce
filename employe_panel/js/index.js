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
            show_category_list();
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
setTimeout(function () { show_category_list(); }, 200)

function show_category_list() {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "php/category_list.php",
            success: function (response) {
                var category_list = JSON.parse(response);
                for (var i = 0; i < category_list.length; i++) {
                    var id = category_list[i].id;
                    var cat_name = category_list[i].category_name;
                    var list_group = document.createElement("div");
                    list_group.className = "list-group";
                    var list_item = document.createElement("div");
                    list_item.className = "list-group-item my-2";
                    var id_span = document.createElement("span");
                    id_span.className = "mr-3 id";
                    id_span.innerHTML = id;
                    var name_span = document.createElement("span");
                    name_span.innerHTML = cat_name;
                    name_span.className = "name";
                    var del_span = document.createElement("span");
                    del_span.className = "fa fa-trash  del_icon close mx-2 text-primary";
                    var edit_span = document.createElement("span");
                    edit_span.className = "fa fa-edit  edit close mx-2 text-danger";
                    var save_span = document.createElement("span");
                    save_span.className = "fa fa-save d-none save close mx-2 text-danger";
                    list_group.append(list_item);
                    list_item.append(id_span);
                    list_item.append(name_span);
                    list_item.append(del_span);
                    list_item.append(edit_span);
                    list_item.append(save_span);
                    $(".category_list").append(list_group);
                    // edit category name function
                    $(edit_span).click(function () {
                        var parent = this.parentElement;
                        var this_id = parent.getElementsByClassName("id")[0].innerHTML;
                        var this_name = parent.getElementsByClassName("name")[0];
                        var save_icon = parent.getElementsByClassName("save")[0];
                        var edit_icon = parent.getElementsByClassName("edit")[0];
                        this_name.contentEditable = true;
                        this_name.focus();
                        $(save_icon).removeClass("d-none");
                        $(this).addClass("d-none");
                        this_name.style.padding = "5px 25px";
                        $(save_icon).click(function () {
                            this_name.contentEditable = false;
                            this_name.blur();
                            this_name.style.padding = "0px 0px";
                            $(this).addClass("d-none");
                            $(edit_icon).removeClass("d-none");
                            $.ajax({
                                type: "POST",
                                url: "php/edit_cate_name.php",
                                data: {
                                    id: this_id, name: this_name.innerHTML
                                },
                                cache: false,
                                success: function (response) {
                                    alert(response);
                                },
                                error: function (response) {
                                    alert(response);
                                }
                            })
                        })
                    });
                    // edit category name function
                    // category delete function 
                    $(del_span).click(function () {
                        var parent = this.parentElement;
                        var this_id = parent.getElementsByClassName("id")[0].innerHTML;
                        var this_name = parent.getElementsByClassName("name")[0];
                        $.ajax({
                            type: "POST",
                            url: "php/cate_delete.php",
                            data: {
                                id: this_id
                            },
                            cache: false,
                            success: function (response) {
                                alert(response);
                                if (response.trim() == "successfully") {
                                    parent.remove();
                                }
                            }

                        })
                    })
                }
            }
        });
    })
};