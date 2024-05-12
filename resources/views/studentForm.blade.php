<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <!--start navigation-->
   
   @include('include.navs')

<!--start navigation-->
<div class='container' style='margin-left: 30px; '>
<h2>HTML Forms</h2>

<form action="{{ route('insertstudent')}}" method="post">
    @csrf
  <label for="name">Student name:</label><br>
  <input type="text" id="studentname" name="studentname" value=""><br>
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age" value=""><br><br>
  
  <input type="submit" value="Submit">
</form> 
</div>
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
</body>
</html>