function validateSDT(input) {
    let number = input.value;
    if (
        number.match(/0[0-9]*/g) == null ||
        number.match(/0[0-9]*/g)[0].length != number.length ||
        number.length < 10 ||
        number.length > 11
    ) {
        input.value = "";
        input.parentNode.childNodes[5].innerHTML =
            '<span style="color:red;">Số điện thoại không hợp lệ!</span>';
        return false;
    }
    input.parentNode.childNodes[5].innerHTML = "";
    return true;
}

function validateName(input) {
    let name = input.value;
    if (name === "") {
        input.parentNode.childNodes[5].innerHTML =
            '<span style="color:red;">Họ tên không được để trống!</span>';
        return false;
    }
    input.parentNode.childNodes[5].innerHTML = "";
    return true;
}

function validateScore(input) {
    let score = input.value;
    let score_value = score.split("-");
    if (
        score_value.length !== 2 ||
        isNaN(score_value[0]) ||
        isNaN(score_value[1])
    ) {
        input.parentNode.childNodes[5].innerHTML =
            '<span style="color:red;">Tỉ số dự đoán không hợp lệ (Ví dụ: 2 - 1)!</span>';
        return false;
    }
    input.parentNode.childNodes[5].innerHTML = "";
    return true;
}

function validateNumberOfPeople(input) {
    let number_people = input.value;
    if (number_people === "") {
        input.parentNode.childNodes[5].innerHTML =
            '<span style="color:red;">Số người dự đoán không được để trống!</span>';
        return false;
    }
    input.parentNode.childNodes[5].innerHTML = "";
    return true;
}

function validateRole(input) {
    let role = document.forms["form"]["role"].value;
    if (isNaN(parseInt(role))) {
        input.childNodes[5].innerHTML =
            '<span style="color:red;">Chức vụ không được để trống!</span>';
        return false;
    }
    input.childNodes[5].innerHTML = "";
    return true;
}

function validate() {
    let isValidated = true;
    isValidated &&= validateSDT($("#sdt")[0]);
    isValidated &&= validateName($("#name")[0]);
    isValidated &&= validateRole($("#role")[0]);
    isValidated &&= validateScore($("#score")[0]);
    isValidated &&= validateNumberOfPeople($("#number_people")[0]);
    return isValidated;
}

// Get the modal
var modal = document.getElementById("myModal");

$("document").ready(function () {
    $("#sdt").blur(function () {
        $.ajax({
            url: "/info",
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                sdt: $("#sdt")[0].value,
            },
            success: function (data) {
                console.log(data);
                $("#name")[0].value = data["name"];
                document.forms["form"]["role"].value = data["role"];
            },
            error: function (data) {
                console.log("Error");
                console.log(data);
            },
        });
    });

    $("#submit_btn").click(function () {
        if (validate()) {
            $.ajax({
                url: "/submit",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    sdt: $("#sdt")[0].value,
                    name: $("#name")[0].value,
                    role: document.forms["form"]["role"].value,
                    score: $("#score")[0].value,
                    number_people: $("#number_people")[0].value,
                    match_id: $("#match_id").attr("class").split(/\s+/)[0],
                },
                success: function (data) {
                    console.log(data);
                    modal.style.display = "inline";
                    if (data["message"] === "Success") {
                        $("#model_content")[0].innerHTML =
                            "Gửi dự đoán thành công";
                    } else if (data["message"] === "Duplicated") {
                        $("#model_content")[0].innerHTML =
                            "Gửi dự đoán thất bại (Mỗi số điện thoại chỉ được gửi một lần!)";
                    } else if (data["message"] === "Not available") {
                        $("#model_content")[0].innerHTML =
                            "Hệ thống đã đóng<br>Lần mở tiếp theo: " +
                            data["remain_time"];
                    } else if (data["message"] === "Not valid") {
                        $("#model_content")[0].innerHTML =
                            "Thông tin không hợp lệ";
                    }
                },
                error: function (data) {
                    console.log(data);
                    modal.style.display = "inline";
                    $("#model_content")[0].innerHTML = "Gửi dự đoán thất bại";
                },
            });
        }
    });
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
