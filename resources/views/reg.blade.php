<html>
<head>
<title> Register Form</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{asset('css/test.css')}}"  rel="stylesheet"/>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row">
        <div class="col-md-4">
            <div class="form_main">
                    <h4 class="heading"><strong>Quick </strong> Register <span></span></h4>
                    <div class="form">
                    <form action="contact_send_mail.php" method="post" id="contactFrm" name="contactFrm">
                        <input type="text" required="" placeholder="Please input your Name" value="" name="" class="txt">
                        <input type="text" required="" placeholder="Please input Age" value="" name="age" class="txt">
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <textarea placeholder="Your Address" name="mess" type="text" class="txt_3"></textarea>
                        <input type="submit" value="submit" name="submit" class="txt2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>