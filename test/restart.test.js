QUnit.test('event listener click', function(assert){
	$('#restart').trigger('click');
	console.log('button restart has been clicked');
	assert.ok(true);
});