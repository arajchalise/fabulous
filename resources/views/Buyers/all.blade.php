@extends('layouts.admin_header')

@section('content')
<div><a href="#" style="float: right;" onclick="PrintDiv();" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Print Data</a></div>
<div id="buyers">
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No</th>
      <th scope="col">Address</th>
      <th scope="col">Office Name</th>
      <th scope="col">Office Type</th>
    </tr>
  </thead>
  <tbody>
    @foreach($buyers as $user)
        <tr>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->contact_no }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->office_name }}</td>
            <td>{{ $user->office_type }}</td>
            <!-- -->
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
<script type="text/javascript">   
    function PrintDiv() {    
       var divToPrint = document.getElementById('buyers');
       var popupWin = window.open('', '_blank');
       popupWin.document.open();
       var str = '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head><body onload="window.print()">';
          popupWin.document.write(str+ divToPrint.innerHTML + '</body></html>');
          popupWin.document.close();

            }
</script>
