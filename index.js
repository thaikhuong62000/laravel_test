var orderList = []

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,
        center: true,
        // autoHeight: true,
        dot: true,
        dotsEach: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 800,
        responsive:{
            0: {
                items:1,
                stagePadding: 0,
            },
            1024:{
                items:2,
                stagePadding: -100,
            }
        }
    });

    $(".preorder").click(function(event) {
        let product = event.target.parentElement;
        let product_id = product.getAttribute("product_id");
        if (orderList.includes(product_id))
        {
            let index = orderList.indexOf(product_id);
            if (index > -1) {
                orderList.splice(index, 1);
            }
            product.getElementsByClassName("preorder")[0].innerText = "Pre-order";
        }
        else {
            orderList.push(product_id);
            product.getElementsByClassName("preorder")[0].innerText = "Hủy pre-order";
            }
        updateIndicator();
    })
});

function updateIndicator() {
    $(".indicator")[0].innerHTML = orderList.length;
}

$(function() {
    $('input').keypress(function(e) {
        console.log(e.which);
        if(e.which == 13) {
            console.log(this);
        }
    });
});

