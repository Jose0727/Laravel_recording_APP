@extends('layouts.app')

@section('content')
   <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
<div class="spinner-grow text-primary" role="status">
  <div class="sr-only">Loading...</div>
</div>
</div>

<div class="internet-connection-status" id="internetStatus"></div>
<div class="page-content-wrapper"></div>
 <div class="container">
  
    <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Contact Form-->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="mb-3 text-center">Confidential Text Message</h5>
            <p></p>
            <div class="contact-form">
              <form action="">
                <div class="form-group mb-3">
                  <textarea class="form-control" name="textarea" cols="30" rows="10"
                    placeholder="Click/tap here to report a contributor to burnout. Please describe in as much detail as possible, and be careful to protect patient confidentiality. Your submissions are confidential and you can submit as many times as needed."></textarea>
                </div>
                <button class="btn btn-warning w-100 d-flex align-items-center justify-content-center" type="button" onclick="window.location.href='{{ url("/report") }}'">Send Message
                  <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/></svg>
                </button>
                &nbsp;
                
                <!--
                <div class="mb-3">
                  <div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show" role="alert">
                    <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                      <path fill-rule="evenodd"
                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg> Your confidential message was received. Thank you.
                    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
                      aria-label="Close"></button>
                  </div>
                </div>
                -->

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection