<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.7.0.js"></script>
    <title>Document</title>
</head>
<body> 
    <h1>payment method</h1>
    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=AV-pW4-8aoU0V_VF-eODSI8iGQ1cMQNTd1ETR6sx-uPykg0OLktUN2hDd9EZkeuOPUfBIhQ1K5ZbjE9F"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value:'299.99'
                        }
                    }]
                });
            },
            onApprove: function(data,actions){
                return actions.order.capture().then(function(details){
                    console.log(details)
                })
            }
        }).render('#paypal-button-container')
    </script>
</body>
</html>