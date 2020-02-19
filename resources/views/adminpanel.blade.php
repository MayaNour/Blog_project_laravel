@extends('layout')

@section('content')
{{-- <h3>Number of users</h3>    
<p>{{ $users_count }}</p>

<h3>Number of posts</h3>
<p>{{ $posts_count }}</p>

<h3>Number of users that registered last week</h3>
<p>{{ $last_week_users_count }}</p>

<h3>Number of posts that added last week</h3>
<p>{{ $last_week_posts_count }}</p> --}}

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Charts</b></div>
            <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>

var url = "{{url('adminpanel/chart')}}";
var i = 1;
var Months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var Labels = new Array();
$(document).ready(function(){
$.get(url, function(response){
    console.log(response);
    var userCounts = response.user_result;
    var postCounts = response.post_result;
    var commentCounts = response.comment_result;
    var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:Months,
            datasets: [{
                label: 'Registered users counts per month',
                data: userCounts,
                backgroundColor: "#3e95cd",
                borderWidth: 1
            },{
                label: 'Articles counts per month',
                backgroundColor: "#8e5ea2",
                data: postCounts,
                borderWidth: 1
            },{
                label: 'Comments counts per month',
                backgroundColor: "#3cba9f",
                data: commentCounts,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
});
</script>

@endsection