$(function () {
    var form = $("#ajax_form");
    var formMessages = $("#form-messages");
    $(form).on("submit", function (event) {
        event.preventDefault();
        var formData = $(form).serialize();
        $.ajax({
            type: "POST",
            url: $(form).attr("action"),
            data: formData,
        })
            .done(function (response) {
                $(formMessages).removeClass("alert-danger");
                $(formMessages).addClass("alert-success");
                $(formMessages).text("Ваш комментарий успешно добавлен");
                $("#name").val("");
                $("#email").val("");
                $("#message").val("");
                getData("get", "all");
            })
            .fail(function (data) {
                $(formMessages).removeClass("alert-success");
                $(formMessages).addClass("alert-danger");

                $(formMessages).text("Oops! Произошла какая-то ошибка!");
            });
    });

    /////////////////////////////////////////////////

    function getData(url, flug = null) {
        var count = $("#comments-list li").size();
        var limit = 3;
        if (flug == "all") {
            limit = count;
            count = 0;
        }
        var author = $("#filter").val();
        $.ajax({
            type: "GET",
            url: url,
            data: {
                skip: count,
                take: limit,
                author: author,
            },
            success: function (data) {
                if (flug == "all") $("#comments-list").empty();
                $(data).each(function (i) {
                    $("#comments-list").append(
                        "<li><div class='comment-box'><div class='comment-head'><h6 class='comment-name by-author'>" +
                            data[i].user.login +
                            "</h6></div><div class='comment-content'>" +
                            data[i].message.replace(/\n+/g, "<br>") +
                            "</div></div></li>"
                    );
                });
            },
        });
    }

    /////////////////////////////////////////////////

    $("#filter").on("input", function () {
        var enter = $(this).val();
        if (enter.length >= 3) {
            $.ajax({
                type: "GET",
                url: "/filter",
                data: "enter=" + enter,
                success: function (data) {
                    $("#select").empty();
                    $(data).each(function (i) {
                        $("#select").append("<option>" + data[i] + "</option>");
                        if (enter === data[i]) {
                            $("#select").empty();
                            getData("get", "all");
                            return false;
                        }
                    });
                },
            });
        } else $("#select").empty();
    });

    $("#more").on("click", function () {
        getData("get");
    });
});
