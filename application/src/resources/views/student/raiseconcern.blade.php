@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">

        @include('student.studentProfile')

        <style>
            td>.form-group>select {
                width: 100px !important;
            }
        </style>

        @php

            $WEXDESC = 'Work Experience';
            $X = false;
            $XII = false;
            $XII_required = false;
            $DIPLOMA = false;
            $BACHELOR = false;
            $MASTER = false;
            $WORKEXP = false;
            $DIPORBACH = false;
            $APPLYFOR = '';

            if ($form->form_id == env('FORMID1') || $form->form_id == env('FORMID2')) {
                // Valid for 3
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $BACHELOR = true;
            }

            if ($form->form_id == env('FORMID3') || $form->form_id == env('FORMID4') || $form->form_id == env('FORMID5')) {
                // Diploma or Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }

            if ($form->form_id == env('FORMID5') || $form->form_id == env('FORMID6')) {
                // Diploma and Experience OR Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }
            if ($form->form_id == env('FORMID7') || $form->form_id == env('FORMID8')) {
                $APPLYFOR = 'Technician-1';

                // 10th 12th and Diploma
                $X = true;
                $XII = true;
                $XII_required = true;
                $DIPLOMA = true;
                $WORKEXP = false;
            }

            if ($form->form_id == env('FORMID9') || $form->form_id == env('FORMID10')) {
                // 10th and EXp
                $APPLYFOR = 'Lab Attendant-1';
                $X = true;
                $WORKEXP = true;
                $WEXDESC = 'One year working experience in a Govt. recognized/approved/registered Laboratory';
            }

        @endphp
        @php
            $last_date_time_for_raise_concern = '2023-11-23 23:59:59';
        @endphp

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Raise concern for the post of {{ $APPLYFOR }} </h3>
                        </div>
                        @if(!isset($concerns[0]))
                        <form role="form" method="POST" action={{ url('save-raise-concern') }}
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="form_id" value="{{ $id }}">
                            <div class="card-body">
                                {{--<p class="text-uppercase text-sm">Raise Concern</p>--}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="concern" class="form-control-label">Concern <span
                                                    class="text-danger">*</span></label>
                                                <textarea class="form-control" name="concern" id="concern" cols="30"
                                                    rows="3" required></textarea>
                                                <span>Word Limt </span><span id="wordlimit">1000</span>
                                                <p>
                                                    Note: This raise concern form will be open till 23 rd November 2023 till 11:59 p.m.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        @if(date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                        <div class="text-end">
                                            <button type="submit" id="save" value="save" name="submit" class="btn btn-primary">Save</button>
                                            <button type="submit" id="save" value="submit" name="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </form>
                        @elseif(isset($concerns[0]) && $action == 'edit')
                        <form role="form" method="POST" action={{ url('update-raise-concern') }}
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="form_id" value="{{ $id }}">
                            <div class="card-body">
                                {{--<p class="text-uppercase text-sm">Raise Concern</p>--}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="concern" class="form-control-label">Concern <span
                                                    class="text-danger">*</span></label>
                                                <textarea class="form-control" name="concern" id="concern" cols="30"
                                                    rows="3" required>{{$concerns[0]->concern}}</textarea>
                                                @php
                                                $word_length = strlen($concerns[0]->concern);
                                                $word_limit = 1000-$word_length;
                                                @endphp
                                                <span>Word Limt </span><span id="wordlimit">{{$word_limit}}</span>
                                                <p>
                                                    Note: This raise concern form will be open till 23 rd November 2023 till 11:59 p.m.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        @if(date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                        <div class="text-end">
                                            <button type="submit" id="save" value="save" name="submit" class="btn btn-primary">Update</button>
                                            <button type="submit" id="save" value="submit" name="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                    @if(isset($concerns[0]))
                        <div class="card">
                            <div class="table1">
                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                {{--<th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Status
                                                </th>--}}

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Concern
                                                </th>

                                                {{--<th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Remark
                                                </th>--}}

                                                <th>
                                                    Action
                                                </th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        
                                            @foreach($concerns as $key => $value)
                                                <tr>
                                                    <td>{{($key+1)}}</td>
                                                    {{--<td class="text-center">
                                                        @if($value->status == 0)
                                                            Pending
                                                        @elseif($value->status == 1)
                                                            Resolve
                                                        @elseif($value->status == 2)
                                                            Not-Resolve
                                                        @endif
                                                    </td>--}}
                                                    <td class="text-center">{{($value->concern)}}</td>
                                                    {{--<td class="text-center">{{($value->remark)}}</td>--}}
                                                    <td>
                                                        @if(date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                            @if($value->final_submit != 1)
                                                            <a href="{{ route('raiseconcern', ['id' => $id, 'action'=>'edit']) }}"
                                                                class="btn btn-danger btn-sm">Edit</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </main>
<script type="text/javascript">
    $(document).ready(function(){
        $("#concern").on("keyup", function(e){
            var length = $(this).val().length;

            if (length == 1000) {
                e.preventDefault();
            } else if (length > 1000) {
                // Maximum exceeded
                this.value = this.value.substring(0, 1000);
            }
            length = $(this).val().length;
            var remaining_length = parseFloat(1000)-parseFloat(length);
            $("#wordlimit").html(remaining_length);
        })
    })
</script>
@endsection
