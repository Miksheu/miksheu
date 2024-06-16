let pictures = document.getElementById( 'pictures' );

function AddPicture( title, img ) {
	let pic = document.createElement( 'div' );
	pic.className = 'pic';
	pic.textContent = title;

	let sex = document.createElement( 'img' );
	sex.className = 'pic_img';
	sex.src = img;

	pic.appendChild( pictures );
}

AddPicture( 'Home', 'images/kurwa.png' )
AddPicture( 'Żółt', 'images/kurwa.png' )


//<div class='pic'>
//	<span class='pic_title'>Sexexxssssssssssxxxxxxxxxxxxxxxxxxxsss</span><br>
//	<img src='images/kurwa.png' style='width: 100%; background-color: #202020; margin-top: 20px;'>
//</div>