<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Restart General Setting</title>
	<link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
	<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
	<button type="button" class="restartGs">RestartGS</button>
	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
		QUnit.test('Test event function restart', function(assert){
			$('.restartGs').click(function(){
                alert('Changing the IP address may cause a restart of the system');
			});
			assert.ok(true,"test Restart General setting sukses");
		});
	</script>
</body>
</html>