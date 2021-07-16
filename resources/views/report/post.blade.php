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
                            <form method="post" action="{{ url('/text-report') }}" id="textReportForm">
                                @csrf
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="text_report" cols="30" rows="10"
                                        placeholder="Click/tap here to report a contributor to burnout. Please describe in as much detail as possible, and be careful to protect patient confidentiality. Your submissions are confidential and you can submit as many times as needed."></textarea>
                                </div>
                                <button
                                    class="btn btn-warning w-100 d-flex align-items-center justify-content-center submit-text-report"
                                    type="button">Send Message
                                    <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </button>
                                &nbsp;
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="https://unpkg.com/mic-recorder-to-mp3@2.2.1/dist/index.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(document).off('click', '.submit-text-report').on('click', '.submit-text-report', function(e) {
            e.preventDefault();
            var form = $(this).closest("form");
            // var form = $("#textReportForm"); 
            var formData = new FormData(form[0]);
            $.ajax({
                url: '{{ url('/text-report') }}',
                type: 'post',
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == true) {
                        window.location.href = '{{ url('/') }}';
                        toastr.options.progressBar = true;
                        toastr.success('Report submitted');
                    } else {
                        toastr.options.progressBar = true;
                        toastr.warning('Failed to submit report');
                    }
                },
            });

        })
    </script>
@endpush
