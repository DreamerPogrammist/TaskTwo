
$('.inputFile input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).closest('.inputFile').find('.inputFileTxt').html(file.name);
});