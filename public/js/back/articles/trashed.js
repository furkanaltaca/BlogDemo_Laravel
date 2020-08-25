$(document).ready(function () {
    //ARRANGE
    var trashedArticleDatatable = $("#trashedArticleDatatable").DataTable({
        // dom: "Bfrtip",
        // processing: true,
        // serverSide: true,
        // responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        ajax: {
            type: "GET",
            url: urlGetAllTrashedArticle,
            data: {},
            dataType: "json",
        },
        columns: [
            { data: "image" },
            { data: "title" },
            { data: "category.name" },
            { data: "hit" },
            { data: "created_at" },
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
    var btnRecoverArticle = '[data-event="RecoverArticle"]';
    var btnHardDeleteArticle = '[data-event="HardDeleteArticle"]';
    //END ARRANGE
    //-------------------------------------------------------------------------
    //EVENT
    trashedArticleDatatable.on('click', btnRecoverArticle, function () {
        var params = {
            id: $(this).data("article-id")
        };

        $.ajax({
            type: "PATCH",
            url: urlRecoverArticle,
            data: params,
            dataType: 'json'
        }).done(function (result) {
            toastr.success(result.message, result.messageTitle);
        }).fail(function (result) {
            toastr.error(result.message, "Hata");
        }).always(function(){
            reloadDatatable();
        });
    });

    trashedArticleDatatable.on("click", btnHardDeleteArticle, function () {
        var params = {
            id: $(this).data('article-id')
        };

        $.ajax({
            type: "DELETE",
            url: urlHardDeleteArticle,
            data: params,
            dataType: "json",
        }).done(function (result) {
            toastr.success(result.message, result.messageTitle);
        }).fail(function (result) {
            toastr.error(result.responseJSON.message, "Hata");
        }).always(function () {
            reloadDatatable();
        });
    });
    //END EVENT
    //-------------------------------------------------------------------------
    //FUNCTIONS
    function reloadDatatable() {
        trashedArticleDatatable.ajax.reload();
    }
    //END FUNCTIONS
    //-------------------------------------------------------------------------
});
