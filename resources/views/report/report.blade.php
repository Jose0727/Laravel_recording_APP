@extends('layouts.app')

@section('content')
  <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
    <div class="spinner-grow text-primary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  
  <div class="internet-connection-status" id="internetStatus"></div>
  <div class="page-content-wrapper"></div>
  <div class="py-4"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('layouts.flash')
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card bg-info mb-3 shadow-sm bg-gradient direction-rtl">
          <div class="card-body">
            <h3 class="text-white mb-4 text-center">Report a Contributor to Burnout</h3>
            <div class="card bg-dark mb-3 shadow-sm bg-gradient direction-rtl">
              <div class="card-body">
                <h3 class="text-white text-center">Important Reminders:</h3>
                <h6 class="text-white text-center">Observe HIPAA rules</h6>
                <h6 class="text-white text-center">Do not use this to report illegal acts</h6>
                <!--
                <a class="btn btn-danger d-flex justify-content-center" href="tel:123-456-7890"><i>
                  To report a crime, call 123-456-7890 or tap here</i></a>
                -->
              </div>
            </div>
            <a class="btn btn-warning d-flex justify-content-center" href="{{ url('/rec') }}" style="height: 6em; align-items: center;"><i
                class="bi bi-mic"><span>&nbsp;</span> RECORD A CONFIDENTIAL VOICE MESSAGE</i></a>
            <span>&nbsp;</span>
            <a class="btn btn-light d-flex justify-content-center" href="{{ url('/post') }}" style="height: 6em; align-items: center;"><i
                class="bi bi-chat-text"><span>&nbsp;</span> SEND A CONFIDENTIAL TEXT MESSAGE</i></a>
          </div>
          <p>&nbsp;</p>
          <p class="text-white mb-4 text-center" style="padding: 20px;">Messages are confidential to SG Collaborative Solutions and anonymous to Brigham and Women's Hospital unless they involve an illegal act or imminent threat. You may post as many messages as needed.</p>
        </div>
      </div>
    </div>
  </div>
  
@endsection