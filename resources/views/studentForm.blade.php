<html>
<body>
<h2>HTML Forms</h2>
<form action="{{ route('insertstudent')}}" method="post">
    @csrf
  <label for="fname">Student name:</label><br>
  <input type="text" id="name" name="name" value=""><br>
  <label for="lname">Age:</label><br>
  <input type="text" id="age" name="age" value=""><br><br>
  
  <input type="submit" value="Submit">
</form> 
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
</body>
</html>