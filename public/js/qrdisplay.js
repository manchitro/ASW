function qrbuttonclick(lectureeid) {
    console.log(lectureeid);
    $.ajax({
        type: "post",
        url: "/faculty/getqr",
        data: {
            lectureeid: lectureeid,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            console.log(data);
            var qr = new QRious({
                element: document.getElementById("qrcode"),
                size: 512,
                value: "https://studytonight.com",
            });
            qr.set({
                foreground: "black",
                size: 512,
                // value: '{sn:"OOP2[H]",lid:2,date:"2021-02-03",st:2,et:4,ct:"theory"}',
                value: data
            });
            // var qrcode = new QRCode(document.getElementById("qrcode"), {
            //     width: 512,
            //     height: 512,
            //     colorDark: "#000000",
            //     colorLight: "#ffffff",
            // });

            // qrcode.makeCode(data);

            $("#qrModal").modal({
                show: true,
            });

            $.ajax({
                type: "POST",
                url: "/faculty/recordstart",
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
            url: "/faculty/recordend",
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
        $("#todays-list").empty();
        loadtodaysclasses();
    });
}

// $("#qrcode").on("click", function (e) {
//     $("#qrModal").modal("hide");
// $("#qrcode").empty();
// });
