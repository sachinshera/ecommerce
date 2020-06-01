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
// request dyanmic pages pages 
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
            if (url == "create_category_design.php") {
                show_category_list();
            }
            // add catogories input field 
            $(".add_field_btn").click(function () {
                $("#add_input").append(' <input type="text" class="form-control my-2" placeholder="Mobiles">');
            });
            // add catogories input field 
            // add brand input field
            $(".add_brand_btn").click(function () {
                $("#add_brand_fields").append('<input type="text" class="form-control mb-3" placeholder="Nokia">');
            });
            // cteate products page coding 
            $(".selected_category").on("change", function (e) {
                var selected = $(this).val();
                $(".create_brand_list").html("");
                $.ajax({
                    type: "POST",
                    url: "php/show_brand.php",
                    data: { category: selected },
                    cache: false,
                    beforeSend: function () { },
                    success: function (response) {
                        $(".create_brand_list").append('<option>Choose brands</option>');
                        var json = JSON.parse(response);
                        for (i = 0; i < json.length; i++) {
                            var brand_name = json[i].brand_name;
                            $(".create_brand_list").append('<option>' + brand_name + '</option>');
                        }
                    }

                })
            });
            $("#create_product_form").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "php/create_product.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function () { },
                    success: function (response) {
                        alert(response);
                    }
                })
            })
            // cteate products page coding 

            // add brand input field
            // sending data to create category.php page 
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
                            show_category_list();
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
            });
            // sending data to create category.php page 
            // create brand list  and sending data to create_brand.php page 
            $("#create_brand_form").submit(function (event) {
                event.preventDefault();
                var category = $(".selected_brand").val();
                if (category == "") {
                    var design = '<div class="alert alert-warning mt-3">  You have to choose a category <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                    show_category_list();
                    $("#brand_msg").html(design);
                    setTimeout(function () {
                        $("#brand_msg").html("");
                    }, 4000)

                }
                else {
                    var values = [];
                    var i;
                    for (i = 0; i < $("#create_brand_form input").length; i++) {
                        values[i] = $("#create_brand_form input")[i].value;
                    };
                    var obj = JSON.stringify(values);
                    $.ajax({
                        type: "POST",
                        url: "php/create_brand.php",
                        data: {
                            data: obj, category: category
                        },
                        cache: false,
                        beforeSend: function () {
                            $("#header_spinner").removeClass("d-none");
                        },
                        success: function (response) {
                            $("#header_spinner").addClass("d-none");
                            if (response.trim() == "your data has been saved successfully") {
                                var design = '<div class="alert alert-success mt-3">  ' + response + ' <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                                show_category_list();
                                $("#brand_msg").html(design);
                            }
                            else if (response.trim() = "your data has not, please try again later !") {
                                var design = '<div class="alert alert-warning mt-3">  ' + response + ' <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                                $("#brand_msg").html(design);
                            }
                            else {
                                var design = '<div class="alert alert-warning mt-3"> somthing went wrong plese contact your administrator   <i class="fa fa-times close float-right" data-dismiss="alert"> </i> </div>';
                                $("#brand_msg").html(design);
                            }

                            setTimeout(function () {
                                $("#brand_msg").html("");
                                $("#create_brand_form").trigger("reset");
                                $("#add_brand_fields").html("");
                            }, 4000)
                        }
                    })
                }

            });
            // create brand list and sendng data to create_brand.php page 
            // show brand ist and category 
            $(".selected_brand").on("change", function () {
                var selected = $(this).val();
                var all_option = $(this).html().replace('			<option value="" choose="" category"="">Choose Category</option>', '').replace('<option value="' + selected + '"> ' + selected + ' </option>', '');

                $.ajax({
                    type: "POST",
                    url: "php/show_brand.php",
                    data: { category: selected },
                    cache: false,
                    beforeSend: function () {

                    },
                    success: function load_content(response) {
                        $(".show_brand_list").html("");
                        var json = JSON.parse(response);
                        var table = $(".show_brand_list");
                        var brand_name_td = document.createElement("td");
                        brand_name_td.innerHTML = "<b> Brand name </b>";
                        var category_name_td = document.createElement("td");
                        category_name_td.innerHTML = "<b> Category name </b>";
                        var edit_brand_icon = document.createElement("td");
                        edit_brand_icon.innerHTML = "<b> Edit </b>";
                        var delete_brand_icon = document.createElement("td");
                        delete_brand_icon.innerHTML = "<b> Delete </b>";
                        table.append(brand_name_td);
                        table.append(category_name_td);
                        table.append(edit_brand_icon);
                        table.append(delete_brand_icon);
                        for (i = 0; i < json.length; i++) {
                            var category_name = json[i].category_name;
                            var brand_name = json[i].brand_name;
                            var trr = document.createElement("tr");
                            var brand_name_list = document.createElement("td");
                            brand_name_list.className = "brand_name_list";
                            brand_name_list.innerHTML = brand_name;
                            var category_name_list = document.createElement("td");
                            category_name_list.className = "category_name_list";
                            category_name_list.innerHTML = category_name;
                            var brand_edit = document.createElement("td");
                            brand_edit.innerHTML = "<i class='fa fa-edit'data-brand='" + brand_name + "' data-category='" + category_name + "'> </i>";
                            brand_edit.style.cursor = "pointer";
                            var brand_save = document.createElement("i");
                            brand_save.className = "fa fa-save d-none save_brand";
                            brand_edit.append(brand_save);
                            var brand_delete = document.createElement("td");
                            brand_delete.innerHTML = "<i class='fa fa-trash'> </i>";
                            brand_delete.style.cursor = "pointer";
                            trr.append(brand_name_list);
                            trr.append(category_name_list);
                            trr.append(brand_edit);
                            trr.append(brand_delete);
                            table.append(trr);
                            // delete brand function 
                            brand_delete.onclick = function () {
                                var parent = this.parentElement;
                                var brand_name = parent.getElementsByClassName("brand_name_list")[0];
                                var category_name = parent.getElementsByClassName("category_name_list")[0];
                                $.ajax({
                                    type: "POST",
                                    url: "php/delete_brand.php",
                                    data: { category: category_name.innerHTML, brand: brand_name.innerHTML },
                                    cache: false,
                                    success: function (response) {
                                        parent.remove();
                                    }
                                })
                            }
                            // delete brand function 
                            // edit brand and category
                            brand_edit.onclick = function edit_brand() {
                                var parent = this.parentElement;
                                var this_icon = this.getElementsByTagName("i")[0];
                                var brand_name = parent.getElementsByClassName("brand_name_list")[0];
                                var category_name = parent.getElementsByClassName("category_name_list")[0];
                                brand_name.contentEditable = true;
                                brand_name.focus();
                                this.innerHTML = "<i class='fa fa-save'data-brand='" + brand_name.innerHTML + "' data-category='" + category_name.innerHTML + "'> </i>";
                                var attr_brand = this_icon.getAttribute("data-brand");
                                var attr_category = this_icon.getAttribute("data-category");
                                category_name.innerHTML = "<select id='edit_select' class='w-100'> <option> " + selected + " </option>" + all_option + " </select>";
                                this.onclick = function () {
                                    var edit_sel = $("#edit_select").val();
                                    brand_name.contentEditable = false;
                                    brand_name.blur();
                                    category_name.innerHTML = edit_sel;
                                    this.innerHTML = "<i class='fa fa-edit'data-brand='" + brand_name.innerHTML + "' data-category='" + category_name.innerHTML + "'> </i>";
                                    category_name.innerHTML = edit_sel;
                                    $.ajax({
                                        type: "POST",
                                        url: "php/edit_brand.php",
                                        data: {
                                            new_brand: brand_name.innerHTML, old_brand: attr_brand,
                                            new_category: edit_sel, old_category: attr_category
                                        },
                                        cache: false,
                                        success: function (response) {
                                            alert(response);


                                        }
                                    })

                                }
                            }
                            // edit brand and category
                        }


                    }

                })
            })
            // show brand ist and category
        }
    })
}
// retrive category list
setTimeout(function () { show_category_list(); }, 200)
// show category function 
function show_category_list() {
    $(".category_list").html("");
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
                    // delete category function 
                }
            }
        });
    })
};
// show category function