// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId: 'bdeiFbvXlfI',
        playerVars: {
            'playsinline': 1,
            'mute': 1,
            'modestbranding': 0,
            'controls': 0,
            'rel': 0,
            'loop': 1
        },
        events: {
        'onReady': onPlayerReady,
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}


function countDownClock() {
    let hours = $(".clock-number")[0];
    let minutes = $(".clock-number")[1];
    let seconds = $(".clock-number")[2];

    let hours_number = parseInt(hours.innerHTML);
    let minutes_number = parseInt(minutes.innerHTML);
    let seconds_number = parseInt(seconds.innerHTML);

    if (seconds_number <= 0 && minutes_number <= 0 && hours_number <= 0) {
        return;
    }

    let reminder = 0;

    if (seconds_number == 0) {
        seconds_number = 60;
        reminder = 1;
    }
    seconds_number -= 1;

    if (reminder == 1) {
        reminder = 0;
        if (minutes_number == 0) {
            minutes_number = 60;
            reminder = 1;
        }
        minutes_number -= 1;
    }

    if (reminder == 1) {
        hours_number -= 1;
    }

    if (hours_number < 10) {
        hours_number = '0' + hours_number;
    }
    if (minutes_number < 10) {
        minutes_number = '0' + minutes_number;
    }
    if (seconds_number < 10) {
        seconds_number = '0' + seconds_number;
    }

    hours.innerHTML = hours_number;
    minutes.innerHTML = minutes_number;
    seconds.innerHTML = seconds_number;
}
setInterval(countDownClock, 1000);

function checkNullField(field) {
    if ($("#"+ field)[0].value === '') {
        if ($("#"+ field +"-error").is(":hidden")) {
            $("#"+ field +"-error").toggle("show-block");
        }
        return false;
    }
    if ($("#"+ field +"-error").is(":visible")) {
        $("#"+ field +"-error").toggle("show-block");
    }
}

function validate() {
    let checked = true;

    // Validate name
    checked &= checkNullField("name");


    // Validate mail
    let mailRegex = /\S+@\S+\.\S+/;
    if (!mailRegex.test($("#email")[0].value)) {
        if ($("#email-error").is(":hidden")) {
            $("#email-error").toggle("show-block");
        }
        checked &= false;
    }
    else if ($("#email-error").is(":visible")) {
        $("#email-error").toggle("show-block");
    }

    // Validate phone
    checked &= checkNullField("phone");

    // Validate sex
    checked &= checkNullField("sex");

    // Validate job
    checked &= checkNullField("job");

    return true;
}

function register() {
    if (validate()) {
        $.ajax({
            url: '/register',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                name: $('#name')[0].value,
                email: $('#email')[0].value,
                phone: $('#phone')[0].value,
                sex: $('#sex')[0].value,
                job: $('#job')[0].value,
            },
            success: function(data) {
                console.log(data);
                if (data["status_code"] === '0') {
                    if ($("#submit-success").is(":hidden")) {
                        $("#submit-success").toggle("show-block");
                        if ($("#submit-duplicated").is(":visible")) {
                            $("#submit-duplicated").toggle("show-block");
                        }
                    }
                }
                else if (data["status_code"] === '1') {
                    if ($("#submit-duplicated").is(":hidden")) {
                        $("#submit-duplicated").toggle("show-block");
                        if ($("#submit-success").is(":visible")) {
                            $("#submit-success").toggle("show-block");
                        }
                    }
                }
                else if (data["status_code"] === '2') {
                    if ($("#submit-out-of-time").is(":hidden")) {
                        $("#submit-out-of-time").toggle("show-block");
                    }
                }
            },
            error: function(data) {
                console.log(data);

            }
        });
    }
}

$("document").ready(function() {
    $(".signin-button").click(register);
})

