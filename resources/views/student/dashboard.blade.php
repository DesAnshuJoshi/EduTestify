@extends('layouts/student-layout')

@section('space-work')

<div class="container-fluid">
    <!-- row -->
    <div class="row">
       {{-- Data Table --}}
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Free Exams</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Exam Name</th>
                                <th>Subject Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Your Attempts</th>
                                <th>Total Attempts</th>
                                <th>Copy Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($exams) > 0)
                                @php $count = 1; @endphp
                                @foreach ($exams as $exam)

                                    @php 
                                        $exam->id;
                                        $package = json_decode(json_encode($exam->package), true);
                                        $expires = '';
                                        foreach($package as $data){
                                            $expires = $data['expiry'];
                                        }
                                    @endphp
                                    @if($exam->is_package_exam != true || date('Y-m-d') > $expires)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $exam->exam_name }}</td>
                                            <td>{{ $exam->subjects[0]['subject'] }}</td>
                                            <td>{{ $exam->date }}</td>
                                            <td>{{ $exam->time }} Mins</td>
                                            <td>{{ $exam->attempt_counter }}</td>
                                            <td>{{ $exam->attempt }} Time(s)</td>
                                            <td><a href="#" class="btn btn-primary shadow btn-xs sharp copy" data-code="{{ $exam->enterance_id }}"><i class="fa fa-copy"></i></a></td>
                                        </tr>
                                    @else
                                        @if($exam->is_paid)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $exam->exam_name }}</td>
                                                <td>{{ $exam->subjects[0]['subject'] }}</td>
                                                <td>{{ $exam->date }}</td>
                                                <td>{{ $exam->time }} Hrs</td>
                                                <td>{{ $exam->attempt }} Time</td>
                                                <td>{{ $exam->attempt_counter }}</td>
                                                <td><a href="#" class="btn btn-primary shadow btn-xs sharp copy" data-code="{{ $exam->enterance_id }}"><i class="fa fa-copy"></i></a></td>
                                            </tr>
                                        @endif
                                    @endif  
                                @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-muted">No Exams Found!</td>
                            </tr>
                            @endif
                        </tbody>
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
    $(document).ready(function () {
        $(document).on('click', '.copy', function () {
            var $this = $(this);

            // Replace the icon with a checkmark
            $this.find('i').removeClass('fa-copy').addClass('fa-check');

            // Change the button color to btn-success
            $this.removeClass('btn-primary').addClass('btn-success');

            var code = $this.attr('data-code');
            var url = "{{URL::to('/')}}/exam/" + code;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            // Set a timeout to revert the icon, class, and color after 1 second
            setTimeout(function () {
                $this.find('i').removeClass('fa-check').addClass('fa-copy');
                $this.removeClass('btn-success').addClass('btn-primary');
            }, 1000);
        });
    });


</script>
@endsection