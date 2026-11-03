@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Attendance Sheet'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Generate Attendance Sheet</h6>
                        <div class="d-flex">
                            <form id="" method="POST" action="{{ route('admin.generate_attendance_sheet') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label form="exam_center"> Exam Center</label>
                                            <select name="exam_center" id="exam_center" class="form-select">
                                                <option value="">Select</option>
                                                @if(!empty($exam_centers))
                                                    @foreach($exam_centers as $key => $value)
                                                        <option value="{{$value->exam_center}}">{{$value->exam_center}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label form="exam_date_and_time"> Exam Date And Time</label>
                                            <select name="exam_date_and_time" id="exam_date_and_time" class="form-select">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label form="post"> Post</label>
                                            <select name="post" id="post" class="form-select">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 23px;">Generate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#exam_center").on("change", function(){
                $("#exam_date_and_time").html('<option value="">Select</option>');
                $("#post").html('<option value="">Select</option>');

                if($(this).val()){
                    $.ajax({
                        url: '{{ route('admin.get_exam_center_date_time') }}',
                        type: "GET",
                        data: {
                            exam_center: $(this).val()
                        },
                        beforeSend: function() {},
                        success: function(data) {
                            $("#exam_date_and_time").html(data);
                        },
                        error: function(xhr) { // if error occured
                        },
                        complete: function() {
                        }
                    });
                }
            })
            $("#exam_date_and_time").on("change", function(){
                $("#post").html('<option value="">Select</option>');

                if($(this).val()){
                    $.ajax({
                        url: '{{ route('admin.get_exam_center_date_time_post') }}',
                        type: "get",
                        data: {
                            exam_center: $("#exam_center").val(),
                            exam_date_and_time: $(this).val(),
                        },
                        beforeSend: function() {},
                        success: function(data) {
                            $("#post").html(data);
                        },
                        error: function(xhr) { // if error occured
                        },
                        complete: function() {
                        }
                    });
                }
            })
        })
    </script>
@endsection
