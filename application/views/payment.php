<div id="paypal-button-container"></div>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $clientID;?>"></script>
<script>
  // Initialize PayPal SDK
  paypal.Buttons({
    createOrder: function(data, actions) {
      // Set up the transaction details
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '10.00' // Set the transaction amount here
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds when the buyer approves the transaction
      return actions.order.capture().then(function(details) {
		console.log(details);
      });
    }
  }).render('#paypal-button-container');

</script>
