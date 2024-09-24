<!DOCTYPE html>
<html>
<head>
	<title>Paytabs | Managed Form Integration | PHP</title>
	<script src="https://secure.paytabs.com/payment/js/paylib.js"></script>
</head>
<body>
	<form id="payform" method="post">
		<span id="paymentErrors"></span>
		<div class="row">
 			<label>Card Number</label>
 			<input type="text" data-paylib="number" size="20">
		</div>
		<div class="row">
	 		<label>Expiry Date (MM/YYYY)</label>
	 		<input type="text" data-paylib="expmonth" size="2">
	 		<input type="text" data-paylib="expyear" size="4">
		</div>
		<div class="row">
	 		<label>Security Code</label>
	 		<input type="text" data-paylib="cvv" size="4">
		</div>
		<input type="submit" value="Place order">
	</form>
	<script type="text/javascript">
		var myform = document.getElementById('payform');
		paylib.inlineForm({
			'key': 'CBKM7P-MGQG6G-GV7B7K-RHNHKD',
			'form': myform,
			'autoSubmit': false, // Disable automatic form submission
			'callback': function(response) {
				document.getElementById('paymentErrors').innerHTML = '';

				if (response.error) {
					paylib.handleError(document.getElementById('paymentErrors'), response);
				} else {
					console.log(response);
				}
			}
		});

		// Add event listener to prevent default form submission
		myform.addEventListener('submit', function(event) {
			event.preventDefault();
		});
	</script>
</body>
</html>
