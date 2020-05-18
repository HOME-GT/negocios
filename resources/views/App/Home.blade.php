@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-3 bg-white shadow-sm rounded mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4" style="height: 180px; background-image: url(https://images.unsplash.com/photo-1540857650430-e405679aa267?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9); background-size: cover; background-position: center;">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Negocios agregados</h5>
                          <p class="card-text"><h1 class="text-primary">2</h1></p>
                          <p class="card-text"><small class="text-muted">Fecha de última búsqueda: 22/11/2020 10:00:00PM</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Estadísticas de la última semana</label>
                <canvas id="myChart" height="80px"></canvas>
            </div>
        </div>
    </div>
@endsection


@section('css')

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
