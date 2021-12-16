function countDownClock() {
    let days = $(".item__number")[0];
    let hours = $(".item__number")[1];
    let minutes = $(".item__number")[2];

    let days_number = parseInt(days.innerHTML);
    let hours_number = parseInt(hours.innerHTML);
    let minutes_number = parseInt(minutes.innerHTML);

    if (days_number <= 0 && minutes_number <= 0 && hours_number <= 0) {
        return;
    }

    let reminder = 0;

    if (minutes_number == 0) {
        minutes_number = 60;
        reminder = 1;
    }
    minutes_number -= 1;

    if (reminder == 1) {
        if (hours_number == 0) {
            hours_number = 60;
            reminder = 1;
        }
        hours_number -= 1;
    }

    if (reminder == 1) {
        if (days_number > 0) {
            days_number -= 1;
        }
    }

    if (days_number < 10) {
        days_number = "0" + days_number;
    }
    if (hours_number < 10) {
        hours_number = "0" + hours_number;
    }
    if (minutes_number < 10) {
        minutes_number = "0" + minutes_number;
    }

    days.innerHTML = days_number;
    hours.innerHTML = hours_number;
    minutes.innerHTML = minutes_number;
}
setInterval(countDownClock, 60000);

function checkNullField(field) {
    if ($("#" + field)[0].value === "") {
        if ($("#" + field + "_error").is(":hidden")) {
            $("#" + field + "_error").toggle("show-block");
            $("#" + field).css("border", "1px solid rgb(255, 68, 0)");
        }
        return false;
    }
    if ($("#" + field + "_error").is(":visible")) {
        $("#" + field).css("border", "1px solid #298243");
        $("#" + field + "_error").toggle("show-block");
    }
}

function toggleField(field, isFalse) {
    if (isFalse) {
        if ($("#" + field + "_error").is(":hidden")) {
            $("#" + field).css("border", "1px solid rgb(255, 68, 0)");
            $("#" + field + "_error").toggle("show-block");
        }
    } else {
        if ($("#" + field + "_error").is(":visible")) {
            $("#" + field).css("border", "1px solid #298243");
            $("#" + field + "_error").toggle("show-block");
        }
    }
}

function validate() {
    let checked = true;

    // Validate name
    checked &= !checkNullField("name");
    // Validate CMND
    let number = $("#cmnd")[0].value;
    let isFalse =
        number.match(/[0-9]*/g) == null ||
        number.match(/[0-9]*/g)[0].length != number.length ||
        (number.length != 9 && number.length != 12);
    checked &= !isFalse;
    toggleField("cmnd", isFalse);

    // Validate SDT
    number = $("#phone")[0].value;
    isFalse =
        number.match(/0[0-9]*/g) == null ||
        number.match(/0[0-9]*/g)[0].length != number.length ||
        number.length < 10 ||
        number.length > 11;
    checked &= !isFalse;
    toggleField("phone", isFalse);

    // Validate mail
    let mailRegex =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    isFalse = !mailRegex.test($("#email")[0].value);
    checked &= !isFalse;
    toggleField("email", isFalse);

    // Validate address
    checked &= !checkNullField("address");

    // Validate address
    let placeholder = $("#tp")[0].getAttribute("placeholder");
    isFalse = placeholder === "TP";
    toggleField("tp", isFalse);
    checked &= !isFalse;

    // Validate address
    placeholder = $("#quan")[0].getAttribute("placeholder");
    isFalse = placeholder === "Quận";
    toggleField("quan", isFalse);
    checked &= !isFalse;

    // Validate address
    placeholder = $("#phuong")[0].getAttribute("placeholder");
    isFalse = placeholder === "Phường";
    toggleField("phuong", isFalse);
    checked &= !isFalse;

    checked &= $("#checkbox")[0].checked;

    return checked;
}

// function find address from list
function findAddress(arr, name) {
    return arr.find(function (element) {
        return element.name == name;
    });
}

$(document).ready(function () {
    // Clear Choose Input
    $(".choosable").on("blur", function (event) {
        event.target.value = "";
    });
    console.log(1);
});

document
    .getElementsByClassName("choosable")[0]
    .addEventListener("focus", function (event) {
        // Init province --------------------------------------------------------
        let drop = document.getElementsByClassName("dropdown")[0];
        provinces.map(function (province) {
            let dropItem = document.createElement("div");
            dropItem.classList.add("dropdown__item");
            dropItem.innerHTML = province.name;
            drop.appendChild(dropItem);
        });
        $(".dropdown__item").on("click", function (event) {
            let input =
                event.target.parentElement.parentElement.getElementsByTagName(
                    "input"
                )[0];
            if (input.getAttribute("placeholder") !== event.target.innerHTML) {
                $(".choosable")[1].setAttribute("placeholder", "Quận");
                $(".dropdown")[1].innerHTML = "";
                $(".choosable")[2].setAttribute("placeholder", "Phường");
                $(".dropdown")[2].innerHTML = "";
            }
            input.setAttribute("placeholder", event.target.innerHTML);
        });
    });

var districts = [];
document
    .getElementsByClassName("choosable")[1]
    .addEventListener("focus", function (event) {
        // Init district --------------------------------------------------------
        let city = document
            .getElementsByClassName("choosable")[0]
            .getAttribute("placeholder");
        districts = findAddress(provinces, city).districts;
        let drop = document.getElementsByClassName("dropdown")[1];
        districts.map(function (district) {
            let dropItem = document.createElement("div");
            dropItem.classList.add("dropdown__item");
            dropItem.innerHTML = district.name;
            drop.appendChild(dropItem);
        });

        $(".dropdown__item").on("click", function (event) {
            let input =
                event.target.parentElement.parentElement.getElementsByTagName(
                    "input"
                )[0];
            if (input.getAttribute("placeholder") !== event.target.innerHTML) {
                $(".dropdown")[2].innerHTML = "";
                $(".choosable")[2].setAttribute("placeholder", "Phường");
            }
            input.setAttribute("placeholder", event.target.innerHTML);
        });
    });

document
    .getElementsByClassName("choosable")[2]
    .addEventListener("focus", function (event) {
        // Init wards --------------------------------------------------------
        let district = document
            .getElementsByClassName("choosable")[1]
            .getAttribute("placeholder");
        let wards = findAddress(districts, district).wards;
        let drop = document.getElementsByClassName("dropdown")[2];
        wards.map(function (ward) {
            let dropItem = document.createElement("div");
            dropItem.classList.add("dropdown__item");
            dropItem.innerHTML = ward;
            drop.appendChild(dropItem);
        });

        $(".dropdown__item").on("click", function (event) {
            let input =
                event.target.parentElement.parentElement.getElementsByTagName(
                    "input"
                )[0];
            if (input.getAttribute("placeholder") !== event.target.innerHTML) {
                $(".choosable")[2].setAttribute("placeholder", "Phường");
            }
            input.setAttribute("placeholder", event.target.innerHTML);
        });
    });

document
    .getElementsByTagName("button")[0]
    .addEventListener("click", function (event) {
        event.preventDefault();
        if (validate()) {
            $("button").prop("disabled", true);
            var formData = new FormData($("form")[0]);
            formData.delete("tp");
            formData.delete("quan");
            formData.delete("phuong");
            formData.append("tp", $("#tp")[0].getAttribute("placeholder"));
            formData.append("quan", $("#quan")[0].getAttribute("placeholder"));
            formData.append(
                "phuong",
                $("#phuong")[0].getAttribute("placeholder")
            );
            $.ajax({
                url: "/submit",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    $(".modal").css({
                        display: "block",
                        transform: "translate(-50%, -50%) scale(1)",
                        opacity: "1",
                    });
                    $("button").prop("disabled", false);
                    console.log(data);
                    if (data.status == 201) {
                        $(".modal")[0].innerHTML = "Đăng ký thành công";
                    } else {
                        $(".modal")[0].innerHTML = "Đăng ký thất bại";
                    }
                },
                error: function (data) {
                    $(".modal").css({
                        display: "block",
                        transform: "translate(-50%, -50%) scale(1)",
                        opacity: "1",
                    });
                    $("button").prop("disabled", false);
                    $(".modal")[0].innerHTML = "Đăng ký thất bại";
                },
            });
        }
    });

window.onclick = function (event) {
    if (event.target != $("button")[0]) {
        $(".modal").css({
            transform: "translate(-50%, -50%) scale(0)",
            opacity: "0",
        });
    }
};
