// request dynamic pages
$(document).ready(function () {
    $(".sidebar ul li").each(function () {
        $(this).click(function () {
            var url = $(this).attr("data-url");
            requestPages(url);
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
        }
    })
}