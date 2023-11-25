@extends('layouts/admin-layout')
@section('space-work')
<div class="container-fluid">
    <!-- row -->
        <div class="row">
            {{-- Modal Button & Box --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bootstrap-modal">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addPackageModal">Add Package</button>
                            <!-- Modal Add Exam -->
                            <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('addPackage') }}" method="POST" id="addPackage">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addPackageModalLabel">Add Package</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="package_name" class="form-control input-default" placeholder="Enter Package Name" required><br>

                                                @if(count($exams) > 0)
                                                    @foreach($exams as $exam)
                                                        @php $id = $exam->id; @endphp
                                                        @if($exam->check_in_exists_package == false)
                                                            <input type="checkbox" name="exams[]" value="{{ $id }}" class="exams">&nbsp;&nbsp;{{ $exam->exam_name }}<br>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <input type="date" name="expiry" min="{{ date('Y-m-d') }}" required class="form-control input-default mt-3"><br>
                                                <input type="number" name="price_inr" min="0" required placeholder="Price(INR)" class="form-control input-default"><br>              
                                                <input type="number" name="price_usd" min="0" required placeholder="Price(USD)" class="form-control input-default"><br>
                                                <p class="error m-0" style="color:red;"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Package</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Add Exam -->
                            <div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('editPackage') }}" method="POST" id="editPackage">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPackageModalLabel">Edit Package</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="package_id" id="package_id">
                                                <input type="text" name="package_name" id="package_name" class="form-control input-default" placeholder="Enter Package Name" required><br>

                                                @if(count($exams) > 0)
                                                    @foreach($exams as $exam)
                                                        @php $id = $exam->id; @endphp
                                                        @if($exam->check_in_exists_package == false)
                                                            <input type="checkbox" name="exams[]" value="{{ $id }}" class="exams">&nbsp;&nbsp;{{ $exam->exam_name }}<br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                <div class="package_exams">

                                                </div><br>

                                                <input type="date" name="expiry" id="expiry" min="{{ date('Y-m-d') }}" required class="form-control input-default"><br>
                                                <input type="number" name="price_inr" id="price_inr" min="0" required placeholder="Price(INR)" class="form-control input-default"><br>              
                                                <input type="number" name="price_usd" id="price_usd" min="0" required placeholder="Price(USD)" class="form-control input-default"><br>
                                                <p class="error m-0 text-danger"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($packages) > 0)
                                    @php $x=1; @endphp
                                    @foreach ($packages as $package)
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
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editPackage" data-bs-toggle="modal" data-bs-target="#editPackageModal" data-obj="{{ $package }}"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger shadow btn-xs sharp deletePackage" data-id="{{ $package->id }}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Exams Found!</td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
</div>



<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
<script>
    $(document).ready(function(){

        $('#addPackage').submit(function(event){

            var checked =  false;
            var lgt = $('.exams').length;

            for(let i = 0; i < lgt; i++){

                if($('.exams:eq('+i+')').prop('checked') == true){
                    checked = true;
                    break;
                }

            }

            if(checked == false){
                event.preventDefault();
                $('.error').text('Please select any one exam!');
            }

        });

        $('.deletePackage').click(function(){

            var obj = $(this);
            var id = $(this).attr('data-id');

            $.ajax({
                url:"{{ route('deletePackage') }}",
                type:"GET",
                data:{id:id},
                success:function(response) {
                    if(response){
                        $(obj).parent().parent().remove();
                        alert(response.msg);
                        location.reload();
                    }
                    else{
                        alert(response.msg);
                    }
                }
            });

        });

        $('.editPackage').click(function(){

            var obj = JSON.parse($(this).attr('data-obj'));

            $('#package_id').val(obj.id);
            $('#package_name').val(obj.name);

            var exams = obj.exam_id;
            var html = '';
            for(let i = 0; i< exams.length;i++){
                html +=`
                <input type="checkbox" name="exams[]" checked value="`+exams[i]['id']+`" class="editexams">&nbsp;&nbsp;`+exams[i]['exam_name']+`<br>
                `;
            }

            $('.package_exams').html(html);

            var price = JSON.parse(obj.price);

            $('#price_inr').val(price['INR']);
            $('#price_usd').val(price['USD']);
            $('#expiry').val(obj.expiry); min="{{ date('Y-m-d') }}"
            });


            $('#editPackage').submit(function(event){

            var checked =  false;
            var lgt = $('.editexams').length;

            for(let i = 0; i < lgt; i++){

                if($('.editexams:eq('+i+')').prop('checked') == true){
                    checked = true;
                    break;
                }

            }

            if(checked == false){
                event.preventDefault();
                $('.error').text('Please select any one exam!');
            }

            });
    });
</script>
@endsection