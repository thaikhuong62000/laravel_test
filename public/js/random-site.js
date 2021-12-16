/**
 * Random number in slot items
 */
function random() {
    let slotItems = document.getElementsByClassName("slot-item");
    slotItems[0].innerHTML = Math.floor(Math.random() * 10);
    slotItems[1].innerHTML = Math.floor(Math.random() * 10);
    slotItems[2].innerHTML = Math.floor(Math.random() * 10);
}

/**
 * Show number in slot items
 *
 * @param {number} number
 */
function showNumber(number) {
    let slotItems = document.getElementsByClassName("slot-item");
    let digit3 = number % 10;
    number -= digit3;
    number /= 10;
    let digit2 = number % 10;
    number -= digit2;
    number /= 10;
    let digit1 = number % 10;
    slotItems[0].innerHTML = digit1;
    slotItems[1].innerHTML = digit2;
    slotItems[2].innerHTML = digit3;
}

var isRandomOn = false;
var account_container = document.getElementsByClassName("account-info-container")[0];

document.addEventListener('keyup', function(event) {
    if(event.keyCode == 13) {
        isRandomOn = true;
        if (account_container.style.opacity === "1") {
            account_container.style.opacity = "0";
            account_container.style.transform = "scale(0)";
        }
    }
    else if(event.keyCode == 32) {
        if (isRandomOn === true) {
            isRandomOn = false;
            $.ajax({
                url: '/random/account',
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    console.log(data["name"]);
                    document.getElementById("account-info").innerHTML = "Xin chúc mừng bạn " + data["name"] + " với số thứ tự " + data["id"] + " đã trúng thưởng!";
                    showNumber(data["id"]);
                    account_container.style.opacity = "1";
                    account_container.style.transform = "scale(1)";
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }
});

function randomNumber() {
    if (isRandomOn) {
        random();
    }
}

function getID() {
    let slotItems = document.getElementsByClassName("slot-item");
    return parseInt(slotItems[0].innerHTML) * 100
            + parseInt(slotItems[1].innerHTML) * 10
            + parseInt(slotItems[2].innerHTML);
}

setInterval(randomNumber, 80);

window.onclick = function(event) {
    if ((event.target != account_container)
        && (event.target != document.getElementById("account-info"))) {
        account_container.style.opacity = "0";
        account_container.style.transform = "scale(0)";
    }
}
