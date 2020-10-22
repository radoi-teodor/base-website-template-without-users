@extends('layouts.administrator')

@section('title', 'Statistics')

@section('dependencies-addons')
  <link rel="stylesheet" href="{{ asset('administrator-assets/css/chartjs.css') }}">
@endsection

@section('content')

  <h3>Orders sent by month</h3>
  <canvas id="orders-sent" width="400" height="100"></canvas>

  <br>

  <h3>Messages sent by month</h3>
  <canvas id="messages" width="400" height="100"></canvas>

@endsection

@section('dependencies-addons-down')

  <script type="text/javascript" src="{{ asset('administrator-assets/js/chartjs.js') }}">
  </script>

  <script type="text/javascript">

    var orders_sent = document.getElementById('orders-sent');
    var orders_sent_chart = new Chart(orders_sent, {
        type: 'bar',
        data: {
            labels: [
              'Rosu', 'Galben', 'Albastru',
            ],
            datasets: [{
                label: 'count of orders sent (by month)',
                data: [
                  12,14,15
                ],
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

    var messages = document.getElementById('messages');
    var messages_chart = new Chart(messages, {
        type: 'bar',
        data: {
            labels: [
              'Rosu', 'Galben', 'Albastru',
            ],
            datasets: [{
                label: 'count of messages (by month)',
                data: [
                  4,20,15,
                ],
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
