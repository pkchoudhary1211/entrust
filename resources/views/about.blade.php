<html>
<head>
<style>
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
.formBox{
	margin-top: 90px;
	padding: 50px;
}
.formBox  h1{
	margin: 0;
	padding: 0;
	text-align: center;
	margin-bottom: 50px;
	text-transform: uppercase;
	font-size: 48px;
}
.inputBox{
	position: relative;
	box-sizing: border-box;
	margin-bottom: 50px;
}
.inputBox .inputText{
	position: absolute;
    font-size: 24px;
    line-height: 50px;
    transition: .5s;
    opacity: .5;
}
.inputBox .input{
	position: relative;
	width: 100%;
	height: 50px;
	background: transparent;
	border: none;
    outline: none;
    font-size: 24px;
    border-bottom: 1px solid rgba(0,0,0,.5);

}
.focus .inputText{
	transform: translateY(-30px);
	font-size: 18px;
	opacity: 1;
	color: #00bcd4;

}
textarea{
	height: 100px !important;
}
.button{
	width: 100%;
    height: 50px;
    border: none;
    outline: none;
    background: #03A9F4;
    color: #fff;
}
.custom_error{
	color:red;
}
</style>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{asset('testAsset/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('testAsset/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('testAsset/css/swiper.css')}}" rel="stylesheet">
	<link href="{{asset('testAsset/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('testAsset/css/styles.css')}}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid">
		<div class="container">
			<div class="formBox">	
			@if($errors->any())
				@foreach($errors->all() as $msg)
					{{$msg}}
				@endforeach
			@endif
				<form action="{{ route('post_insert')}}" method="post">
                @csrf
						<div class="row">
							<div class="col-sm-12">
								<h1>Post form</h1>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox ">
									<div class="inputText">Title</div>
									<input type="text" name="title" class="input">
									@if($errors->has('title'))
										<span class="custom_error"> 	{{$errors->first('title')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Details</div>
									<textarea name="details" class="input"></textarea>
									@if($errors->has('details'))
										<span class="custom_error"> {{$errors->first('details')}}</span>
									@endif
								</div>
								
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<input type="submit" name="" class="button" value="Send Message">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
<h1>	Post Data </h1>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">ACTION</th>
	  
    </tr>
  </thead>
  <tbody>
  @foreach($post as $posts)
    <tr>
		<th scope="row">1</th>
		<td>{{$posts->title}}</td>
		<td>{{$posts->description}}</td>
		<td><a href="{{route('post_update',$posts->id)}}" class="btn btn-info">Edit</a>
		<a href="{{route('remove_post',$posts->id)}}" class="btn btn-danger">Remove</a></td>
    </tr>
@endforeach
  </tbody>
</table>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
</body>
</html>