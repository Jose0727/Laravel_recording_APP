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
            <a class="btn btn-lg btn-danger btn-success p-4 btn-call-cancel" href="javascript:void(0);"><i class="bi bi-mic"></i></a>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('after-scripts')
  <script src="{{ asset('js/mic-recorder-to-mp3/index.js') }}"></script>
    <script>
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
          const button = document.querySelector('.btn-call-cancel');
          const recorder = new MicRecorder({
            bitRate: 128
          });

          button.addEventListener('click', startRecording);
          function startRecording() {
            recorder.start().then(() => {
              button.classList.toggle('btn-danger');
              button.removeEventListener('click', startRecording);
              button.addEventListener('click', stopRecording);
            }).catch((e) => {
              console.log('e: ', e);
            });
          }

          function stopRecording() {
            recorder.stop().getMp3().then(([buffer, blob]) => {
              const file = new File(buffer, 'music.mp3', {
                type: blob.type,
                lastModified: Date.now()
              });
              var formData = new FormData();
              formData.append('audio',file);

              $.ajax({
                  url:  '{{ url('/audio-report') }}',
                  type: 'post',
                  dataType: 'json',
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                    button.classList.toggle('btn-danger');
                    button.removeEventListener('click', stopRecording);
                    button.addEventListener('click', startRecording);
                    if(response == true) {
                      window.location.href = '{{ url('/')}}';
                      toastr.options.progressBar = true;
                      toastr.success('Report submitted');
                    } else {
                      toastr.options.progressBar = true;
                      toastr.warning('Failed to submit report');
                    }
                  },
              });
            }).catch((e) => {
              console.log('e: ', e);
              
            });
          }
    </script>
@endpush