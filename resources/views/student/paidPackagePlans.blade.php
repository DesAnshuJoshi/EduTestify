@extends('layouts/student-layout')

@section('space-work')

<div class="container-fluid">
    <!-- row -->
        <div class="row">
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Packages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Exams</th>
                                        <th>Prices</th>
                                        <th>Expires On</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($packages) > 0)
                                        @php $x=1; @endphp
                                        @foreach ($packages as $package)

                                            @php
                                                $exams = '';
                                                foreach($package->exam_id as $exam){
                                                    $exams .= $exam->exam_name.', ';
                                                }
                                            @endphp
                                            @if($package->isPaid == 0)
                                                <tr>
                                                    <td>{{ $x++ }}</td>
                                                    <td>{{ $package->name }}</td>
                                                    <td>
                                                        @foreach($package->exam_id as $exam)
                                                            {{ $exam->exam_name }}, 
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php $prices = json_decode($package->price); @endphp
                                                        @foreach($prices as $key => $price)
                                                            {{$key}} {{ $price }},
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $package->expiry }}</td>
                                                    <td>
                                                        @if($package->expiry >= date('Y-m-d'))
                                                            <a href="#" class="fw-bold text-danger buyNow" data-id="{{ $package->id }}" data-name="{{ $package->name }}" data-prices="{{ $package->price }}" data-bs-toggle="modal" data-bs-target="#buyModal">Buy Now</a></td>
                                                        @else
                                                            <b>Expired</b>
                                                        @endif
                                                </tr> 
                                            @endif 
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Exams Found!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="buyForm">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="buyModalLabel">Buy Package</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <select name="price" id="price" required class="form-control wide mb-3">
                                                </select>
                                                <input type="hidden" class="form-control input-default" id="package_id" name="package_id">
                                                <input type="hidden" class="form-control input-default" id="package_name" name="package_name">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning buyNowButton">Buy Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<form action="{{ env('PAYPAL_CHECKOUT_URL') }}" method="POST", id="paypalForm">

    <input type="hidden" name="business" value="{{ env('PAYPAL_BUSINESS_MAIL') }}">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" id="item_name">
    <input type="hidden" name="item_number" id="item_number">
    <input type="hidden" name="amount" id="amount">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="cancel_return" value="{{ route('paidPackagePlans') }}">
    <input type="hidden" name="return" id="return">

</form>

<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
<script>
    var isInr = false;
    $(document).ready(function () {
        $('.buyNow').click(function(){
            var prices = JSON.parse($(this).attr('data-prices'));

            var html = `
                <option value="">Select Currency(Price)</option>
                <option value="`+prices.INR+`">INR `+prices.INR+`</option>
                <option value="`+prices.USD+`">USD `+prices.USD+`</option>
            `;

            var priceSelect = document.getElementById("price"); // Reference to the select element

            // Remove existing options
            while (priceSelect.firstChild) {
                priceSelect.removeChild(priceSelect.firstChild);
            }

            // Append new options
            priceSelect.innerHTML = html;

            $('#package_id').val( $(this).attr('data-id') );
            $('#package_name').val( $(this).attr('data-name') );
        });

        $('#price').change(function(){
            var text = $('#price option:selected').text();

            if(text.includes('INR')){
                isInr = true;
            }
            else{
                isInr = false;
            }

        });

        $('#buyForm').submit(function(event){
            event.preventDefault();

            $('.buyNowButton').text('Please Wait...');

            var formData = $(this).serialize();
            var price = $('#price').val();
            var package_id = $('#package_id').val();
            var package_name = $('#package_name').val();

            if(isInr == true){
                $.ajax({
                    url:"{{ route('packagePaymentInr') }}",
                    type:"POST",
                    data:formData,
                    success:function(response){
                        if(response.success == true)
                        {
                            var options = {
                                "key": "{{ env('PAYMENT_KEY') }}", // Enter the Key ID generated from the Dashboard
                                "currency": "INR",
                                "name": "{{ auth()->user()->name }}",
                                "description": "EduTestify | Online Examination System",
                                "image": "https://dummyimage.com/800x800/886CC0/fff&text=EduTestify",
                                "order_id": response.order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                "handler": function (response){
                                    var paymentData = {
                                                package_id:package_id,
                                                razorpay_payment_id:response.razorpay_payment_id,
                                                razorpay_order_id:response.razorpay_order_id,
                                                razorpay_signature:response.razorpay_signature
                                            }

                                    $.ajax({
                                                url:"{{ route('verifyPackagePayment') }}",
                                                type:"GET",
                                                data:paymentData,
                                                success:function(response){
                                                    alert(response.msg);
                                                    location.reload();
                                                }
                                            });
                                },
                                "prefill": {
                                    "name": "{{ auth()->user()->name }}",
                                    "email": "{{ auth()->user()->email }}",
                                    "contact": "9000090000"
                                },
                                "notes": {
                                    "address": "{{ auth()->user()->email }}"
                                },
                                "theme": {
                                    "color": "#886CC0"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.on('payment.failed', function (response){
                                    alert(response.error.code);
                                    alert(response.error.description);
                                    alert(response.error.source);
                                    alert(response.error.step);
                                    alert(response.error.reason);
                                    alert(response.error.metadata.order_id);
                                    alert(response.error.metadata.payment_id);
                            });
                            rzp1.open();
                        } 
                        else
                        {
                            alert(response.msg);
                        }
                    }
                });
            } else 
            {
                $('#item_name').val(package_name);
                $('#item_number').val('1');
                $('#amount').val(price);
                $('#return').val("{{ URL::to('/') }}/package-payment-status/"+package_id);
                $('#paypalForm').submit();
            }
        });
    
        
    });


</script>
@endsection