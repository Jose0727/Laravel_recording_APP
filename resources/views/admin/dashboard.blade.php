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
            @include('layouts.flash')
        </div>
        <div class="container">
            <!-- Element Heading-->
            <div class="element-heading mt-3">
                <h6>Risk Reports</h6>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped table-reports">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col"  class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $item)
                                <tr>
                                    <th scope="row">{{ $item->user->passcode }}</th>
                                    <td scope="row">{{ date('d-M-Y H:i:s', strtotime($item->created_at)) }}</td>
                                    <th scope="row">{{ $item->type }}</th>
                                    <td scope="row" class="text-center">
                                        <div class="col-md-12 text-center" role="toolbar">
                                            @if((new \Jenssegers\Agent\Agent())->isDesktop())
                                                <div class="btn-group" role="group">
                                                    <a href="javascript:void(0)" type="button"
                                                        class="btn btn-sm btn-dark"
                                                        onclick="downloadFile({{ $item->id }})">download</a>
                                                    <a href="javascript:void(0)" type="button"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="deleteFile({{ $item->id }})">delete</a>
                                                </div>
                                            @endif
                                            @if((new \Jenssegers\Agent\Agent())->isMobile())
                                            <div class="btn-group" role="group">
                                                <a href="javascript:void(0)" type="button"
                                                    class="btn btn-sm btn-dark btn-icon"
                                                    onclick="downloadFile({{ $item->id }})"><i
                                                        class="fa fa-download"></i></a>
                                                <a href="javascript:void(0)" type="button"
                                                    class="btn btn-sm btn-danger btn-icon"
                                                    onclick="deleteFile({{ $item->id }})"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                            @endif
                                            <form style="display: none" method="get" id="downloadFile-{{ $item->id }}"
                                                action="{{ route('report.download', $item->id) }}">
                                            </form>
                                            <form style="display: none" method="POST" id="deleteFile-{{ $item->id }}"
                                                action="{{ route('report.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/sweet-alert/sweetalert2.all.min.js') }}"></script>
    <script>
        $('.table-reports').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false
        });

        function deleteFile(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButtonColor: '#00c292',
                    cancelButton: 'btn btn-danger mt-0'
                },
                buttonsStyling: true
            });
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! ⚠️",
                cancelButtonColor: "#AF0000",
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteFile-' + id).submit();
                }
            })
        }

        function downloadFile(id) {
            event.preventDefault();
            document.getElementById('downloadFile-' + id).submit();
        }
    </script>
@endpush
