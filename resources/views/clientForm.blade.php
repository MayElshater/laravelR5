<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <!--start navigation-->
   
   @include('include.nav')

<!--start navigation-->
<div class='container' style='margin-left: 30px; '>
<h2>HTML Forms</h2>

<form action="{{ route('insertclient')}}" method="post">
    @csrf
  <label for="fname">client name:</label><br>
  <input type="text" id="clientname" name="clientname" value=""><br>
  <label for="lname">phone:</label><br>
  <input type="text" id="phone" name="phone" value=""><br><br>
  <label for="lname">email:</label><br>
  <input type="text" id="email" name="email" value=""><br><br>
  <label for="lname">website:</label><br>
  <input type="text" id="website" name="website" value=""><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
</body>
</html>