@extends('adminlte::page')

@section('content')
<br>
<div class="row">
  @role('admin')
  <div class="col-md-3">
    <div class="small-box bg-danger">
      <div class="inner">
        <p>Utilisateurs</p>
        <h3>{{ $userCount }}</h3> 
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="users" class="small-box-footer"></a>
    </div>
  </div>
  @endrole

  <div class="col-md-3">
    <div class="small-box bg-success">
      <div class="inner">
        <p>Productions</p>
        <h3>{{ $productionCount }}</h3>
      </div>
      <div class="icon">
        <i class="fas fa-cubes"></i>
      </div>
      <a href="productions" class="small-box-footer"></a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="small-box bg-warning">
      <div class="inner">
        <p>Articles</p>
        <h3>{{ $articleCount }}</h3>
      </div>
      <div class="icon">
        <i class="fas fa-cube"></i>
      </div>
      <a href="articles" class="small-box-footer"></a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="small-box bg-info">
      <div class="inner">
        <p>Arrêts déclarés</p>
        <h3>{{ $arretCount }}</h3>
      </div>
      <div class="icon">
        <i class="fas fa-fw fa-clock"></i>
      </div>
      <a href="arrets" class="small-box-footer"></a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              Taux de production du mois de : <span id="currentMonth">{{ \Carbon\Carbon::now()->format('F') }}</span>
          </div>
          <div class="card-body">
              <canvas id="productionYieldChart" width="400" height="200"></canvas>
          </div>
      </div>
  </div>

  <div class="col-md-4">
      <div class="card">
          <div class="card-header">
              Taux de rendement de production mensuel
          </div>
          <div class="card-body">
              <canvas id="monthlyProductionYieldChart" width="200" height="200"></canvas>
          </div>
      </div>
  </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
  var ctx = document.getElementById('productionYieldChart').getContext('2d');
  var ctxMonthly = document.getElementById('monthlyProductionYieldChart').getContext('2d');
  
  // Données pour les TRS journaliers récupérées de la base de données
  var trsData = @json(array_values($dailyTrs));
  var trsLabels = @json(array_keys($dailyTrs));

  var productionYieldChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: trsLabels,
          datasets: [{
              label: 'Taux de rendement de production (%)',
              data: trsData,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgb(75, 192, 192)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true,
                  max: 100
              }
          }
      }
  });

  // Données pour le diagramme circulaire TRS
  var trsPieData = @json(array_values($trsData));
  var trsPieLabels = @json(array_keys($trsData));

  var trsPieChart = new Chart(document.getElementById('monthlyProductionYieldChart').getContext('2d'), {
      type: 'pie',
      data: {
          labels: trsPieLabels,
          datasets: [{
              label: 'Répartition du TRS',
              data: trsPieData,
              backgroundColor: [
          'rgba(255, 206, 86, 0.2)', 
          'rgba(75, 192, 192, 0.2)'   
      ],
      borderColor: [
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'   
      ],
              borderWidth: 1
          }]
      },
      options: {
scales: {
  y: {
      beginAtZero: true,
      max: 100
  }
},
plugins: {
  legend: {
      display: true,
      position: 'right'
  }
},
colors: [
  'rgba(255, 206, 86, 0.2)', 
  'rgba(75, 192, 192, 0.2)'   
]
}
  });
</script>
@endpush