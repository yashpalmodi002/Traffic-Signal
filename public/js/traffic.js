$(document).ready(function() {
    //Jquery Form Validation
    $('#traffic-form').validate({
        rules: {
            sequence_a: {
                required: true
            },
            sequence_b: {
                required: true
            },
            sequence_c: {
                required: true
            },
            sequence_d: {
                required: true
            },
            green_light_intervals: {
                required: true
            },
            yellow_light_intervals: {
                required: true
            },
        },
        messages: {
            sequence_a: {
                required: 'Please enter sequence a'
            },
            sequence_b: {
                required: 'Please enter sequence b'
            },
            sequence_c: {
                required: 'Please enter sequence c'
            },
            sequence_d: {
                required: 'Please enter sequence d'
            },
            green_light_intervals: {
                required: 'Please enter green light intervals'
            },
            yellow_light_intervals: {
                required: 'Please enter yellow light intervals'
            },
        },
        submitHandler: function(form) {
            //Check Value is Unique
            var allValue = [];
            var isUnique = true;
            $('.traffic-sequence').each(function() {
                var currentVal = this.value;
                if (allValue.indexOf(currentVal) !== -1) {
                    isUnique = false;
                    $("#error-message").show();
                    $('#error-message').html("Please enter unique sequence");
                    $("#error-message").delay(2000).fadeOut('slow');
                    $("#error-message").addClass("bg-danger text-white mt-5");
                }
                allValue.push(currentVal);
            });
            if (isUnique == false) {
                return false;
            }
            //If all validations work properly then Ajax call for insert or Update record
            var url = $("#action_name").val();
            let formData = new FormData(form);
            $.ajax({
                headers: {
                    'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    $("#start-btn").attr("disabled", "disabled");
                    $("#stop-btn").removeAttr("disabled");
                    $("#success-message").show();
                    $('#success-message').html(response.success);
                    $("#success-message").delay(2000).fadeOut('slow');
                    $("#success-message").addClass("bg-primary text-white mt-5");
                    trafficSignal();
                },
                error: function(response) {}
            });
        }
    });
});

var sequence = 1;
var interval;
//Traffic light code
function trafficSignal() {
    $('.traffic-sequence').each(function() {
        var greeLightVal = $("#green_light_intervals").val();
        var idVal = $(this).attr('id');
        var lightChar = $(this).data("id");
        if (this.value == sequence) {
            timer(lightChar, greeLightVal, "green");
        }
    });
}

//Timer Code, By passing timer value
function timer(lightChar = null, timerVal = "00", color = null, stopTimer = null) {
    var timer2 = "00:" + timerVal;
    interval = setInterval(function() {
        var timer = timer2.split(':');
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        if(minutes >='0' && seconds >= '0') {
            $('#traffic_count_' + lightChar).html(seconds);
            setLightColor(lightChar, color);
        } else {
            $('#traffic_count_' + lightChar).html('');
            if (color == "green") {
                callYellowTimer(lightChar);
            } else if (color == "yellow") {
                $("#traffic_light_" + lightChar).removeClass("yellow");
                $("#traffic_light_" + lightChar).addClass("red");
                sequence = sequence + 1;
                if (sequence == 5) {
                    sequence = 1;
                }
                trafficSignal();
            }
        }
        timer2 = minutes + ':' + seconds;
        }, 1000);
}

//Set color of the Light
function setLightColor(getLightChar, color) {
    if (color == "green") {
        $("#traffic_light_" + getLightChar).removeClass("red");
        $("#traffic_light_" + getLightChar).removeClass("yellow");
        $("#traffic_light_" + getLightChar).addClass("green");
        $("#traffic_count_" + getLightChar).css("color", "white");
    } else if (color == "yellow") {
        $("#traffic_light_" + getLightChar).removeClass("red");
        $("#traffic_light_" + getLightChar).removeClass("green");
        $("#traffic_light_" + getLightChar).addClass("yellow");
        $("#traffic_count_" + getLightChar).css("color", "black");
    } else {
        $("#traffic_light_" + getLightChar).removeClass("yellow");
        $("#traffic_light_" + getLightChar).removeClass("green");
        $("#traffic_light_" + getLightChar).addClass("red");
    }
}

//Yellow color 
function callYellowTimer(lightChar) {
    var yellowTimerVal = $("#yellow_light_intervals").val();
    timer(lightChar, yellowTimerVal, "yellow");
}

//Stop Button click
$("#stop-btn").click(function() {
    $(".traffic-light").removeClass("green");
    $(".traffic-light").removeClass("yellow");
    $(".traffic-light").addClass("red");
    clearInterval(interval);
    sequence = 1;
    $(".countdown").html('');
    $("#stop-btn").attr("disabled", "disabled");
    $("#start-btn").removeAttr("disabled");
});


