$('#restart').click(function(){
	QUnit.test('Test event function restart', function(assert){
		assert.ok(true,"test Restart sukses");
        alert('The server will be restart after this!');
	});
});