<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <style type="text/css">
	 		@media print {
		  body * {
		    visibility: hidden;
		  }
		  #section-to-print, #section-to-print * {
		    visibility: visible;
		  }
		  #section-to-print {
		    position: absolute;
		    left: 0;
		    top: 0;
		  }
		}
	 </style>
</head>
<body>
		<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
<h1> do not print this </h1>

<div id='printMe'>



</div>

<button onclick="printDiv('printMe')">Print only the above div</button>

</body>
</html>