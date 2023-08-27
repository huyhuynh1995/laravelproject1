<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	
	<title>Smart Watch- HNH Shop</title>
	@livewireStyles
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	<style>
		.wrapper{
			padding-top:30px;
		}

		.contact-in{
			width: 80%;
			display: flex;
			flex-wrap: wrap;
			padding: 10px;
			height: 58%;
			margin: 52px auto;
			border-radius: 10px;
			background: #E6F1D8;
			box-shadow: 0px 0px 10px 0px #666;
		}
		.contact-map{
			margin-top: 20px;
			width: 100%;
			height: auto;
			flex: 50%;
		}
		.contact-form{
			width: 100%;
			height: auto;
			flex: 50%;
			margin-bottom: 30px;
		}
		.contact-form h1{
			text-align: center;
			margin-bottom: 15px auto;
		}
		.contact-form-txt{
			width: 90%;
			height: 25px;
			color: #000;
			border: 1px solid #bcbcbc;
			border-radius: 50px;
			outline: none;
			margin-bottom: 20px;
			padding: 15px;
		}
		.contact-form-textarea{
			width: 90%;
			height: 130px;
			color: #000;
			border: 1px solid #bcbcbc;
			border-radius: 50px;
			outline: none;
			margin-bottom: 20px;
			padding: 15px;
		}
		.contact-form-submit{
			padding: 0 20px;
			border-radius: 10px;
			background: #AFD788;
			cursor: pointer;
			font-size: x-large;
			font-weight: bold;
			color: whitesmoke;
			margin-left:235px;
		}
		h1{
			text-align: center;
		}
		
	</style>
	@include('layouts.inc.frontend.navbar')	
	<div class="wrapper">
		<div>
			<h1>Trang Liên Hệ</h1>
		</div>
		
		<div class="contact-in">
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.55321952911!2d106.79161107465968!3d10.845462757917284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527157c90def5%3A0x8cfc6a3a0cf54e6d!2zTMOqIFbEg24gVmnhu4d0LCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1687583229410!5m2!1sen!2s" width="98%" height="77%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="contact-form">
				<h1>Liên Hệ Chúng Tôi</h1>
				<form action="" action="POST">
					<input type="text" placeholder="Tên bạn..." class="contact-form-txt">
					<input type="text" placeholder="Email..." class="contact-form-txt">>
					<textarea name="" id="" cols="50" rows="10" placeholder="Nội dung yêu cầu..." class="contact-form-textarea"></textarea>
					<input id="send" type="submit" value="GỬI" name="gui" class="contact-form-submit">
				</form>
			</div>
		</div>
		
		<div class="clear"></div>
		
	</div>
	@include('layouts.inc.frontend.footer')
</body>
</html>
