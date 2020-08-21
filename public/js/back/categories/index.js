$(document).ready(function () {
    $('[data-event="CategoryStatusSwitch"]').on("change", function () {
        var id = $(this)[0].getAttribute("category-id");
        var status = $(this).prop("checked");
        $.get(
            route("admin.kategoriler.updateStatus"),
            { id: id, status: status },
            function (data, status) {
                toastr.success("Durum güncellendi.", "Başarılı");
            }
        );
    });

    $('[data-event="CategoryEdit"]').on("click", function () {
        var id = $(this)[0].getAttribute("category-id");
        alert("category edit clicked. id: " + id);
        $.get(route("admin.kategoriler.edit"), { id: id }, function (
            data,
            status
        ) {
            // toastr.success("Durum güncellendi.", "Başarılı");
        });
    });

    // $('[data-event="ArticleDelete"]').on("click", function () {
    //     var id = $(this)[0].getAttribute("article-id");
    //     $.get(
    //         "delete/",
    //         { id: id },
    //         function (data, status) {
    //             toastr.success("Makale silindi.", "Başarılı");
    //         }
    //     );
    // });
});
