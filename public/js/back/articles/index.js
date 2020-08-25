$(document).ready(function () {
    //ARRANGE
    var articleDatatable = $("#articleDatatable").DataTable({
        // dom: "Bfrtip",
        // processing: true,
        // serverSide: true,
        // responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        ajax: {
            type: "GET",
            url: urlGetAllArticle,
            data: {},
            dataType: "json",
        },
        columns: [
            { data: "image" },
            { data: "title" },
            { data: "category.name" },
            { data: "hit" },
            { data: "created_at" },
            { data: "status" },
            { data: "actions" },
        ],
        drawCallback: function () {
            $('[data-toggle="showImage-popover"]').popover({
                html: true,
                trigger: "hover",
                placement: "bottom",
                content: function () {
                    return '<img src="' + $(this).data("img") + '" / class="w-50">';
                },
            });
        }
    });
    var cbUpdateArticleStatus = '[data-event="UpdateArticleStatus"]';
    var btnDeleteArticle = '[data-event="ArticleDelete"]';
    //END ARRANGE
    //-------------------------------------------------------------------------
    //EVENT
    articleDatatable.on('change', cbUpdateArticleStatus, function () {
        var params = {
            id: $(this).data("article-id"),
            status: $(this).prop("checked")
        };

        $.ajax({
            type: "PUT",
            url: urlUpdateArticleStatus,
            data: params,
            dataType: 'json'
        }).done(function (result) {
            toastr.success(result.message, result.messageTitle);
        }).fail(function (result) {
            toastr.error(result.message, "Hata");
        });
    });

    articleDatatable.on("click", btnDeleteArticle, function () {
        var params = {
            id: $(this).data('article-id')
        };
        var ajax = $.ajax({
            type: "DELETE",
            url: urlDeleteArticle,
            data: params,
            dataType: "json",
        }).done(function (result) {
            toastr.success(result.message, result.messageTitle);
        }).fail(function (result) {
            toastr.error(result.message, "Hata");
        }).always(function () {
            reloadDatatable();
        });
    });
    //END EVENT
    //-------------------------------------------------------------------------
    //FUNCTIONS
    function reloadDatatable() {
        articleDatatable.ajax.reload();
    }
    //END FUNCTIONS
    //-------------------------------------------------------------------------
});
