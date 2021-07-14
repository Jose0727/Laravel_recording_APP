@extends('layouts.app')

@section('content')
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>

    <div class="internet-connection-status" id="internetStatus"></div>

    <div class="page-content-wrapper py-3">
      <div class="container text-center">
        <h5 class="mt-3">Confidential Voicemail</h5>
        <p>
          Report a contributor to burnout. Please describe in as much detail as
          possible, and be careful to protect patient confidentiality. Your
          submissions are confidential and you can submit as many times as
          needed.
        </p>
        <p>Click or tap the microphone icon below to record a message.</p>

        <div class="container video-call-screen">
          <div class="call-btn-group">
            <a class="btn btn-lg btn-danger p-4 btn-call-cancel" href="{{ url('/report') }}"><i class="bi bi-mic"></i></a>
          </div>
        </div>
      </div>
    </div>
@endsection