$(document).ready(function() {
   
    $("#confirm-btn").click(function() {
        var name = $("#name").val()
        var email = $("#email").val()
        var city = $("#city").val()
        var adresse = $("#adresse").val()
        var phone = $("#phone").val()
        var zipcode = $("#zipcode").val()
        var onlinePayment = $("#aa").is(":checked");
        var cashOnDelivery = $("#dd").is(":checked");
        var totalQuantity = parseInt($(".totalll h4:contains('Total Quantity')").text().split(':')[1].trim());
        var totalPrice = parseFloat($(".totalll h4:contains('Total Price')").text().split(':')[1].trim());
        


        if (!onlinePayment && !cashOnDelivery) {
            $(".paymenttt").text("Select Payment Method");
            return; 
        } else {
            $(".paymenttt").text("");
        }

        if (name.length == 0) {
            $(".name").text("This field is required");
            $("#name").addClass('error');
            return; 
        } else {
            $(".name").text("");
            $("#name").removeClass('error');
        }

        if (email.length == 0){
            $(".email").text("This field is required")
            $("#email").addClass('error');

            return;
        }else {
            $(".email").text("")
            $("#email").removeClass('error');

        }

        if (city.length == 0){
            $(".city").text("This field is required")
            $("#city").addClass('error');

            return;
        }else {
            $(".city").text("")
            $("#city").removeClass('error');


        }

        if (adresse.length == 0){
            $(".adresse").text("This field is required")
            $("#adresse").addClass('error');

            return;
        }else {
            $(".adresse").text("")
            $("#adresse").removeClass('error');

        }

        if (phone.length == 0){
            $(".phone").text("This field is required");
            $("#phone").addClass('error');

            return;
        }else {
            $(".phone").text("")
            $("#phone").removeClass('error');

        }
        
        if (zipcode.length == 0){
            $(".zipcode").text("This field is required")
            $("#zipcode").addClass('error');

            return;
        }else {
            $(".zipcode").text("")
            $("#zipcode").removeClass('error');

        }

        $("#name").val("");
        $("#email").val("");
        $("#city").val("");
        $("#adresse").val("");
        $("#phone").val("");
        $("#zipcode").val("");

        if (onlinePayment) {
            $(".confirmation-message").text("Your data has been registered. Please proceed with the payment.");
            $(".paypal-container").show();
            $(".cash-container").hide();
        } else if (cashOnDelivery) {
            $(".confirmation-message").text("Your purchase has been completed. Payment will be collected upon delivery.");
        }

        $.ajax({
        method: "POST",
        url: "insert_client_data.php", 
        data: {
            name: name,
            email: email,
            city: city,
            adresse: adresse,
            phone: phone,
            zipcode: zipcode,
            paymentMethod: onlinePayment ? "Online Payment" : "Cash on Delivery",
            totalQuantity: totalQuantity,
            totalPrice: totalPrice

            
        },
        success: function(response) {
            console.log(response);
            
        },
        error: function(xhr, status, error) {
            console.error(error);
            
        },
    });
    


        // if (name.length != 0 && email.length != 0 && city.length != 0 && adresse.length != 0 && phone.length != 0 && zipcode.length != 0) {
        
        // }

   })
    


    $("input[name=ss]").change(function() {
       if ($(this).val() === "cashOnDelivery") {
            $(".paypal-container").hide();
            $(".cash-container").show();
        }
   })



})