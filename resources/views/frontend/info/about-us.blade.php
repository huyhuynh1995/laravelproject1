<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Smart Watch - HNH Shop</title>
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	@livewireStyles
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
	.wrapper{
		
		padding-top:30px;
		width: 960px;
		margin: 0 auto;
		
	}
	h1{
		text-align: center;
	}
</style>
<body>
	@include('layouts.inc.frontend.navbar')
	<div class="wrapper">
		<h1>Giới thiệu</h1>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Perspiciatis, eius fugiat voluptatem reprehenderit aut. Sunt, minima ut eius reprehenderit maxime tempore accusamus facere atque a soluta est officiis, impedit, magni!</p>
		<h2>Cửa hàng chúng tôi</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam sequi esse magni. Non ex ipsa facere iusto reprehenderit dolores dolorum, ducimus incidunt, nemo. Autem officiis quae, commodi, architecto velit ad?
		Quo, libero eveniet obcaecati, iusto omnis quidem praesentium distinctio. Sed fugiat iusto quis veritatis aspernatur necessitatibus perferendis delectus, quod fuga, inventore quam! Maiores laboriosam, sit sapiente velit autem consectetur natus.</p>
		<h2>Sản phẩm của chúng tôi</h2>
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores ad soluta adipisci assumenda consectetur! Quaerat aliquid repellendus tempore temporibus cumque impedit, veniam quidem, eaque. Ea explicabo repellendus pariatur est architecto?</p>
		<img src="https://www.shefinds.com/files/2023/01/samsung-tech-watches-on-display.jpg" alt="" width="960px" height="auto">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio aspernatur nostrum, eos nemo maiores ducimus, libero placeat maxime modi labore ad impedit corrupti necessitatibus, ipsum nam voluptatibus perferendis esse enim.</p>
		<h2>Chính sách</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Accusantium aspernatur a aliquid perferendis aut culpa voluptatibus quis exercitationem repellendus explicabo ad quos, illo, velit nulla quasi eaque eius porro rerum?
		Id minima quibusdam totam aut. Nihil unde ad iusto quisquam non accusantium beatae, accusamus voluptatum, aspernatur delectus sint, iste velit corrupti eveniet dolorem maxime facilis mollitia cum rerum, consequuntur cumque.</p>
	</div>
	@include('layouts.inc.frontend.footer')
</body>
</html>