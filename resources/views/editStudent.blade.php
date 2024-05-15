<?php
use Illuminate\Support\Facades\DB;

?>
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
<h2>Edit Student</h2>

<form action="{{ route('updateStudent', $student->id)}}" method="post">
    @csrf
    @method('put')
  <label for="fname">Student name:</label><br>
  <input type="text" id="studentname" name="studentname" value="<?php echo $student->studentname?>"><br>
  <label for="lname">Age:</label><br>
  <input type="text" id="age" name="age" value="<?php echo $student->age?>"><br><br>
  
  <input type="submit" value="Update">
  
    <a href="{{ route('students') }}"><input type="button" value="Cancel"></a>
</form> 
</div>


</body>
</html>