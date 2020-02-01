@extends('layouts.admin_header')
@section('content')

            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome {{ Auth::user()->name }}!</h1>
                </div>
            </div>
            @if(Auth::user()->department->name != 'IT')
             <form class="form-inline" method="post" action="{{ route('filterOrderList') }}">
                {{ csrf_field() }}
                <input type="text" name="status" value="100" hidden>
            <div class="row">
              <div class="form-group mb-2 col-lg-4">
                <label for="staticEmail2" class="sr-only">Start Date</label>
                <input type="date" class="form-control" id="staticEmail2" placeholder="Enter your search Keyword" style="width: 100%;" name="key">
              </div>
              <div class="form-group mx-sm-3 mb-2 col-lg-4">
                <label for="inputPassword2" class="sr-only">End Date</label>
                <input type="date" class="form-control" id="staticEmail2" placeholder="Enter your search Keyword" style="width: 100%;" name="key_type">
              </div>
              <button type="submit" class="btn btn-success mb-2 col-lg-3">Search/Filter Tnx</button>
              </div>
</form>
            <!-- /.row -->
    <div class="row">
        <h1 style="text-align: center;">Charts and Graphs </h1>
        <div class="col-lg-6">
            <canvas id="myChart" width="200" height="200"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="myLine" width="200" height="200"></canvas>
        </div>
    </div>
@endif
<script>
     <?php
         $c = new \App\Order();
         $v = $c->getSales();
         for ($i=1; $i <= 7; $i++) {  ?>
             var data<?php echo $i; ?> = <?php echo $v['data'][$i]; ?>;
             var label<?php echo $i; ?> = '<?php echo $v['date'][$i]; ?>';
        <?php } ?>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [label1, label2, label3, label4, label5, label6, label7],
        datasets: [{
            label: 'Weekly Sales Growth',
            data: [data1, data2, data3, data4, data5, data6, data7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
<script>
     <?php
         $b = new \App\Buyer();
         $vb = $b->getClients();
         for ($i=1; $i <= 7; $i++) {  ?>
             var data<?php echo $i; ?> = <?php echo $vb['data'][$i]; ?>;
             var label<?php echo $i; ?> = '<?php echo $vb['date'][$i]; ?>';
        <?php } ?>
var ctx = document.getElementById('myLine').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [label1, label2, label3, label4, label5, label6, label7],
        datasets: [{
            label: 'Weekly Clients Engagement',
            data: [data1, data2, data3, data4, data5, data6, data7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
@endsection
