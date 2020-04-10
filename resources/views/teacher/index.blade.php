@extends('layouts.teacher')

@section('content')
    @include('teacher.statusBand')

    <section class="pb-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <h2 class="card-header text-primary">Dashboard</h2>
                  <div class="card-body">
                      <p>Trang dành riêng cho giáo viên</p>
                  </div>
              </div>
          </div>
      </div>
    </section>

    <!-- <section class="pb-5">
      <div class="row">
        <div class="col-lg-7 mb-4 mb-lg-0">
          <div class="card">
            <div class="card-header">
              <h2 class="h6 text-uppercase mb-0">Current server uptime</h2>
            </div>
            <div class="card-body">
              <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <div class="chart-holder">
                <canvas id="lineChart1" style="max-height: 14rem !important;" class="w-100"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 mb-4 mb-lg-0 pl-lg-0">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row align-items-center flex-row">
                <div class="col-lg-5">
                  <h2 class="mb-0 d-flex align-items-center"><span>86.4</span><span class="dot bg-green d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Work hours</span>
                  <hr><small class="text-muted">Lorem ipsum dolor sit</small>
                </div>
                <div class="col-lg-7">
                  <canvas id="pieChartHome1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center flex-row">
                <div class="col-lg-5">
                  <h2 class="mb-0 d-flex align-items-center"><span>1.724</span><span class="dot bg-violet d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Server time</span>
                  <hr><small class="text-muted">Lorem ipsum dolor sit</small>
                </div>
                <div class="col-lg-7">
                  <canvas id="pieChartHome2"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-5">
      <div class="row text-dark">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="card rounded credit-card bg-hover-gradient-violet">
            <div class="content d-flex flex-column justify-content-between p-4">
              <h1 class="mb-5"><i class="fab fa-cc-visa"></i></h1>
              <div class="d-flex justify-content-between align-items-end pt-3">
                <div class="text-uppercase">
                  <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
                </div>
                <h4 class="mb-0">$417.78</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="card rounded credit-card bg-hover-gradient-blue">
            <div class="content d-flex flex-column justify-content-between p-4">
              <h1 class="mb-5"><i class="fab fa-cc-mastercard"></i></h1>
              <div class="d-flex justify-content-between align-items-end pt-3">
                <div class="text-uppercase">
                  <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
                </div>
                <h4 class="mb-0">$124.17</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="card rounded credit-card bg-hover-gradient-green">
            <div class="content d-flex flex-column justify-content-between p-4">
              <h1 class="mb-5"><i class="fab fa-cc-discover"></i></h1>
              <div class="d-flex justify-content-between align-items-end pt-3">
                <div class="text-uppercase">
                  <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
                </div>
                <h4 class="mb-0">$568.00</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
@endsection