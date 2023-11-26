@extends('layouts/admin-layout')
@section('chart-head')
	<title>Payments | Admin EduTestify</title>
@endsection
@section('space-work')
    <div class="container-fluid">
         <!-- row -->
         <div class="row">
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Exam Name</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($paymentDetails) > 0)
                                        @php $x=0; @endphp
                                        @foreach($paymentDetails as $payment)
                                            <tr>
                                                <td>{{ ++$x }}</td>
                                                <td>{{ $payment->user[0]['name'] }}</td>
                                                <td>{{ $payment->exam[0]['exam_name'] }}</td>
                                                <td>
                                                    <a href="#" class="badge badge-rounded light badge-md badge-primary showDetails" data-details="{{ $payment->payment_details }}" data-bs-toggle="modal" data-bs-target="#showDetailsModal">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">No payments found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="showDetailsModal" tabindex="-1" aria-labelledby="showDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showDetailsModalLabel">View Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="paymentDetails"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.showDetails', function () {
                var details = $(this).attr('data-details');
                details = JSON.parse(details);
                var html = '<div class="table-responsive">';
                html += '<table class="table table-bordered">';
                Object.keys(details).forEach((key) => {
                    html += '<tr>';
                    html += '<td><b>' + key + ':</b></td>';
                    html += '<td>' + details[key] + '</td>';
                    html += '</tr>';
                });
                html += '</table>';
                html += '</div>';
                $('.paymentDetails').html(html);
            });
        });
    </script>
@endsection