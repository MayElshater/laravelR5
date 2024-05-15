<?php
use Illuminate\Support\Facades\DB;
$students= DB::table('students')->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

@include('include.navs')
<div class="container">
  <h2>Students Data</h2>
  <!-- Display Success Message -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
       foreach ($students as $student)
       {
?>
      <tr>
        <td><?php echo $student->studentname ?></td>
        <td><?php echo$student->age?></td>
        <td><a href="{{route('editStudent',$student->id)}}">Edit</td>
        <td><a href="{{ route('showStudent', $student->id) }}">Show</a></td>
        <td>
    <form id="delete-form-{{$student->id}}" action="{{ route('deleteStudent', $student->id) }}" method="POST" style="display: inline;">
        <!-- Hidden input field for CSRF protection -->
        @csrf
        <!-- HTTP method spoofing for DELETE request -->
        @method('DELETE')
        <!-- Delete link -->
        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete <?php echo $student->studentname ?>? This action cannot be undone.')) { document.getElementById('delete-form-{{$student->id}}').submit(); }">
            Delete
        </a>
        <!-- Hidden input field to send student ID with the request -->
        <input type="hidden" value="{{$student->id}}" name="id">
    </form>
</td>

        
      </tr>
       <?php
       }
       ?>
    </tbody>
  </table>
</div>

</body>
</html>
