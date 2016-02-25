<script>

var image_track = 'a';

function swap()
{
	var image = document.getElementById('SwapPic');
	
	if(image_track == 'a')
	{
		image.src = 'AboutUs.png';
		image_track = 'b';
	}
	
	else
	{
		image.src = 'c1.png';
		image_track = 'a';
	}
}

	var timer1 = setInterval('swap()', 2000);
</script>