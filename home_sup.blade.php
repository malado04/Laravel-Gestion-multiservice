@extends('adminlte::page')
@section('content_header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />

    <h4 class="m-0 text-dark">
          <b> Tableau de bord</b>
        <span class="float-right">
        </span>
    </h4>
@stop
@section('content')
    <div class="container mt-5">
        <div id="hight-chart"></div>
        <?php echo json_encode($citoyens) ?>;    
        <?php echo $citoyens; ?>;

    </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    // var users =  <?php echo json_encode($citoyens) ?>;
    var users = JSON.parse(`<?php echo $citoyens; ?>`);

    Highcharts.chart('hight-chart', {
        chart: {
        plotBorderWidth: 1,
        marginLeft: 80,
        marginBottom : 100 // this to make room for title under axis
    },
    title: {
        text: 'Citoyens',
        align: 'center',
        y: 340 //  this to move y-coordinate of title to desired location
    },
        subtitle: {
            text: 'Source: websolutionstuff.com'
        },
    xAxis: {
        // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        //categories: users.cni_rgi

    },
    series: [{
        // data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]        
        data: users     
    }]
});

</script> 

@endsection
