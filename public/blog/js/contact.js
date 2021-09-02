$(function () {
    // Get the form.
    var form = $("#ajax_form");

    // Get the messages div.
    var formMessages = $("#form-messages");

    // Set up an event listener for the contact form.
    $(form).submit(function (event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();
        // Submit the form using AJAX.
        $.ajax({
            type: "POST",
            url: $(form).attr("action"),
            data: formData,
        })
            .done(function (response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass("alert-danger");
                $(formMessages).addClass("alert-success");

                // Set the message text.
                $(formMessages).text("Ваш комментарий успешно добавлен");

                // Clear the form.
                $("#name").val("");
                $("#email").val("");
                $("#message").val("");
            })
            .fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass("alert-success");
                $(formMessages).addClass("alert-danger");

                // Set the message text.
                if (data.responseText !== "") {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text(
                        "Oops! An error occured and your message could not be sent."
                    );
                }
            });
    });

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
                        }
                    });
                },
            });
        } else $("#select").empty();
    });

    $("#more").on("click", function () {
        var count = $("#comments-list li").size();
        $.ajax({
            type: "GET",
            url: "/more/" + count,
            success: function (data) {
                $(data).each(function (i) {
                    $("#comments-list").append(
                        "<li><div class='comment-box'><div class='comment-head'><h6 class='comment-name by-author'>" + data[i].user.login +
                            "</h6></div><div class='comment-content'>" +
                            data[i].message +
                            "</div></div></li>"
                    );
                });
            },
        });
    });
});
