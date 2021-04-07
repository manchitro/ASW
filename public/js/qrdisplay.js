function qrbuttonclick(lectureeid) {
    console.log(lectureeid);
    $.ajax({
        type: "post",
        url: "getqr",
        data: {
            lectureeid: lectureeid,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            console.log(data);
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 512,
                height: 512,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H,
            });

            qrcode.makeCode(data);
            $("#qrModal").modal({
                show: true,
            });

            $.ajax({
                type: "POST",
                url: "recordstart",
                data: {
                    lectureeid: lectureeid,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(
                        "Couldn't record QRcode display start time. Error occurred: " +
                            errorThrown
                    );
                },
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Couldn't get QR Code. Error occurred: " + errorThrown);
        },
    });
    $("#qrModal").on("hide.bs.modal", function () {
        $("#qrcode").empty();
        $.ajax({
            type: "POST",
            url: "recordend",
            data: {
                lectureeid: lectureeid,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(
                    "Couldn't record QRcode display end time. Error occurred: " +
                        errorThrown
                );
            },
        });
    });
}

// $("#qrcode").on("click", function (e) {
//     $("#qrModal").modal("hide");
// $("#qrcode").empty();
// });
