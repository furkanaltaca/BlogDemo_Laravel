$(document).ready(function () {
    $('[data-event="ArticleStatusSwitch"]').on("change", function () {
        var id = $(this)[0].getAttribute("article-id");
        var status = $(this).prop("checked");
        $.get(
            route('admin.makaleler.updateStatus'),
            { id: id, status: status },
            function (data, status) {
                toastr.success("Durum güncellendi.", "Başarılı");
            }
        );
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

    $('[data-toggle="popover-hover"]').popover({
        html: true,
        trigger: "hover",
        placement: "bottom",
        content: function () {
            return '<img src="' + $(this).data("img") + '" / class="w-50">';
        },
    });
});