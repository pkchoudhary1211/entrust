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
            {{$post}}
				<form action="{{ route('post_form_update')}}" method="post">
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
                                    <input type="hidden" value="{{$post->id}}" name="post_id"/>
                                    <input type="text" name="title" value="{{$post->title}}" class="input">
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
									<textarea name="details" class="input">{{$post->description}}</textarea>
									@if($errors->has('details'))
										<span class="custom_error"> {{$errors->first('details')}}</span>
									@endif
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<input type="submit" name="" class="button" value="Update">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
</body>
</html>