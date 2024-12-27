@extends('backend.templates.pages')
@section('title', 'Dashboard')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Dashboard
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="container-xl">
  @php
    $passwordLastChanged = auth()->user()->password_last_changed;
    $now = \Carbon\Carbon::now();
    $passwordAge = $now->diffInMonths($passwordLastChanged);
    $isPasswordCloseToExpiration = ($passwordAge == 2 && $now->diffInDays($passwordLastChanged) >= 60);
  @endphp

  @if ($isPasswordCloseToExpiration)
  <div class="alert alert-important alert-danger" role="alert">
    Password Anda akan kadaluarsa pada tanggal <strong>{{ \Carbon\Carbon::parse(auth()->user()->password_last_changed)->addMonths(3)->format('d M Y') }}</strong>. 
    Demi keamanan akun Anda, harap segera mengubah password di bagian <a href="{{ route('admin.profile') }}" class="text-white fw-bold text-decoration-underline">Profile</a> atau melalui halaman <a href="{{ route('reset-password', ['id' => Crypt::encrypt(auth()->user()->id)]) }}" class="text-white fw-bold text-decoration-underline">Reset Password</a>.
  </div>
  @endif

  <div class="row row-cards">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total Shelter</div>
          <div class="h3 m-0">{{ $totalShelter }} Shelter</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total UMKM Ber SIP</div>
          <div class="h3 m-0">{{ $totalUMKMBerSIP }} UMKM</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total UMKM Tidak Ber SIP</div>
          <div class="h3 m-0">{{ $totalUMKMTidakBerSIP }} UMKM</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-primary text-white avatar">
                <i class="fa-solid fa-store"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM
              </div>
              <div class="text-secondary">
                {{ $totalUMKM }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-success text-white avatar">
                <i class="fa-solid fa-store"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM Aktif
              </div>
              <div class="text-secondary">
                {{ $totalUMKMAktif }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-danger text-white avatar">
                <i class="fa-solid fa-store-slash"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM Tidak Aktif
              </div>
              <div class="text-secondary">
                {{ $totalUMKMTidakAktif }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-info text-white avatar">
                <i class="fa-solid fa-folder-open"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total Produk UMKM
              </div>
              <div class="text-secondary">
                {{ $totalProducts }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card card-sm">
        <div class="card-body">
          <canvas id="umkmPieChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-8">
      <div class="card card-sm">
        <div class="card-body">
          <canvas id="umkmShelterBarChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctxPie = document.getElementById('umkmPieChart').getContext('2d');
  var umkmPieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
      labels: ['UMKM Aktif', 'UMKM Tidak Aktif'],
      datasets: [{
        label: 'Total UMKM',
        data: [{{ $totalUMKMAktif }}, {{ $totalUMKMTidakAktif }}],
        backgroundColor: ['#4299e1', '#d63939'],
        borderColor: ['#4299e1', '#d63939'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          callbacks: {
            label: function(tooltipItem) {
              return tooltipItem.label + ': ' + tooltipItem.raw + ' UMKM';
            }
          }
        }
      }
    }
  });
  var ctx = document.getElementById('umkmShelterBarChart').getContext('2d');
    var umkmShelterBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($shelterNames) !!},
            datasets: [{
                label: 'Jumlah UMKM per Shelter',
                data: {!! json_encode($umkmCounts) !!},
                backgroundColor: '#4299e1',
                borderColor: '#4299e1',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' UMKM';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah UMKM'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Shelter'
                    }
                }
            }
        }
    });
</script>
@endpush