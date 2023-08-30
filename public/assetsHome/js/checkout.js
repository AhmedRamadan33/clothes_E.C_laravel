$(document).ready(function () {
$('.razorpay_btn').click(function (e) {
    e.preventDefault();

    var name = $('.name').val();
    var email = $('.email').val();
    var phone = $('.phone').val();
    var address = $('.address').val();
    var city = $('.city').val();
    var zip = $('.zip').val();
    var country = $('.country').val();

    if (name == "" || email == "" || phone == "" || address == "" || city == "" || zip == "" || country == "") {
        return false ;
    }
    else{

        $.ajax({
            method: "POST",
            url: "/proceed_to_pay",
            data: data = {
                'name': name,
                'email': email,
                'phone': phone,
                'address': address,
                'city': city,
                'zip': zip,
                'country': country,
            },
            success: function (response) {
                var options = {
                    "key": "rzp_test_kg9FujOlknUfEM", // Enter the Key ID generated from the Dashboard
                    "amount": 1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": response.name,
                    "description": "Thank you for choosing us",
                    "image": "https://example.com/your_logo",
                    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function (responsea){
                        alert(responsea.razorpay_payment_id)

                        $.ajax({
                            method: "POST",
                            url: "/placeOrder",
                            data: {
                                "payment_mode": "paid by razorpay",
                                "payment_id": responsea.razorpay_payment_id,
                            },
                            success: function (responseb) {
                                alert(responseb.status)
                            },
                        });
                    },
                    "prefill": {
                        "name": response.name,
                        "email": response.email,
                        "contact": response.phone,
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    }
});
});
