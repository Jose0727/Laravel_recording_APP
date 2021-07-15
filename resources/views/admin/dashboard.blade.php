@extends('layouts.app')

@section('content')
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Header Area-->

    <div class="page-content-wrapper py-3">
      
      <div class="container">
        <!-- Element Heading-->
        <div class="element-heading mt-3">
          <h6>Risk Reports</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <table class="table mb-0 table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Date</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">123</th>
                  <td>dd/mm/yyyy 00:00:00 GMT</td>
                  <td><a class="btn m-1 btn-sm btn-dark" href="#">download</a></td>
                  <td><a class="btn m-1 btn-sm btn-danger" href="#">delete</a></td>
                </tr>
                <tr>
                  <th scope="row">223</th>
                  <td>dd/mm/yyyy 00:00:00 GMT</td>
                  <td><a class="btn m-1 btn-sm btn-dark" href="#">download</a></td>
                  <td><a class="btn m-1 btn-sm btn-danger" href="#">delete</a></td>
                </tr>
                <tr>
                  <th scope="row">323</th>
                  <td>dd/mm/yyyy 00:00:00 GMT</td>
                  <td><a class="btn m-1 btn-sm btn-dark" href="#">download</a></td>
                  <td><a class="btn m-1 btn-sm btn-danger" href="#">delete</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection