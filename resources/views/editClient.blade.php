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
<h2>Edit Client</h2>

<form action="{{ route('updateClient', $client->id)}}" method="post">
    @csrf
    @method('put')
  <label for="fname">client name:</label><br>
  <input type="text" id="clientname" name="clientname" value="{{$client->clientname}}"><br>
  <label for="lname">phone:</label><br>
  <input type="text" id="phone" name="phone" value="{{$client->phone}}"><br><br>
  <label for="lname">email:</label><br>
  <input type="text" id="email" name="email" value="{{$client->email}}"><br><br>
  <label for="lname">website:</label><br>
  <input type="text" id="website" name="website" value="{{$client->website}}"><br><br>
  <input type="submit" value="Update">
  
    <a href="{{ route('clients') }}"><input type="button" value="Cancel"></a>
</form> 
</div>


</body>
</html>