<!DOCTYPE html>
<html>
<head>
	<title>Pay Using Bank Account</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			    <br>
			    <br>
			    <a style="color:orange;font-weight:bolder;" onclick="return confirm('Do you really want to cancel this payment ?');" href="{{ url('cancel-bank-payment').'/'.$vin.'/'.$receipt->id.'/'.$bank->id }}" class="pull-right"><i class="fa fa-chevron-left"></i> Cancel Payment</a>
				<div class="card" style="border:2px solid #eee;margin-top:30px;border-radius:10px;">
					<div style="padding:10px;color:white;border-top-right-radius:10px;border-top-left-radius:10px;background-color:orange;text-align:center;">
					    <h4><img style="width:30px;" src="{{ asset('usa.png') }}"> <img style="width:30px;" src="{{ asset('canada.png') }}"> <img style="width:30px;" src="{{ asset('loading.gif') }}"> Bank Payment Confirmation</h4>
					</div>
					<div style="padding:20px;">
					    <br>
					    <p class="pull-right"><b>Remaining time : </b> <span id="remaining_time"></span></p>
					    <p><b>VIN : </b> #{{ $vin }}</p>
					    <p><b>Invoice No : </b> #{{ $receipt->id }}</p>
					    <p><b>Amount : </b> {{ $receipt->currency_code.' '.$receipt->amount }}</p>
					    <hr>
					    <br>
					    <p>
					        {!! $bank->bank_info !!}
    					</p>
    					<br>
    					<hr>
    					<br>
    					<form method="post" enctype="multipart/form-data">
    					    @csrf
    					    <label>Payment Screenshot :</label>
    					    <br>
    					        
    					    <input type="file" accept="image/*" class="input form-control" name="screenshot" required>
    					    <br>
    					    <center>
    					    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Submit</button>
    					    </center>
    					</form>
    					<br>
    					<br>
					</div>
					
					<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * {{ $bank->waiting_time }},
        display = document.querySelector('#remaining_time');
    startTimer(fiveMinutes, display);
};
					</script>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>