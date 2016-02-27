@extends('layouts.app')

@section('content')
<style>
table, td {
    border: 1px solid black;
}
</style>

<h1> Business Plan </h1>
<table id="Business Plan">
  <tr id="c">
  </tr>
 
</table>

<div class="container">
    <!--TODO work on dashboard -->
    This is where our dashBoard page goes!
</div>


<script>
	var colums = ["Name","Description","Date","Lead","Collaborators","Budget","Project Plan","Success Measured"];
	
	for(i =0;i<colums.length;i++)
	{
		document.getElementById("c").innerHTML += "<td width>"+colums[i]+"</td>";
	}
</script>
@stop