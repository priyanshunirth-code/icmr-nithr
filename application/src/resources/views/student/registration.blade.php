@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">

        @include('student.studentProfile')
        @php
            $last_date_time = '2023-08-21 23:59:59';
            $last_date_time_for_raise_concern = '2023-11-23 23:59:59';
        @endphp
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h3>
                            <b class="text-danger">Last date: 21th August 2023</b>
                        </div>

                        <div class="card-body pt-2">

                            <div class="table1">
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Technical Assistant –<span class="text-primary "> 23 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>
                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks In CBT<br>
                                                    Full Marks: 95
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks By Experience<br>
                                                    Full Marks: 05
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Total<br>
                                                    (CBT+Experience)<br>
                                                    Full Marks: 100
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Biological
                                                    Sciences)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID1')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID1'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Social
                                                    Sciences)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID2')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID2'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical) <br>
                                                    (Computer
                                                    Science/Information <br>
                                                    Technology)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID3')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID3'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Electronics <br>
                                                    &amp;
                                                    Communication <br>
                                                    Engineering)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID4')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID4'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Electrical
                                                    Engineering)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID5')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID5'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical) <br>
                                                    (Civil
                                                    Engineering)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID6')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID6'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="card-body pt-2">
                            <div class="table1">
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Technician-1 –<span class="text-primary "> 17 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>
                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks In CBT<br>
                                                    Full Marks: 95
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks By Experience<br>
                                                    Full Marks: 05
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Total<br>
                                                    (CBT+Experience)<br>
                                                    Full Marks: 100
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Technician-1
                                                </td>
                                                <td>
                                                    Group-C <br>
                                                    (Technical)
                                                    (Biological
                                                    Science)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID7')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID7'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Technician-1
                                                </td>
                                                <td>
                                                    Group-C <br>
                                                    (Technical) <br>
                                                    (Computer Science)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID8')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID8'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="card-body pt-2">
                            <div class="table1">
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Lab. Attendant-1 - <span class="text-primary "> 12 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks In CBT<br>
                                                    Full Marks: 95
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Marks By Experience<br>
                                                    Full Marks: 05
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Total<br>
                                                    (CBT+Experience)<br>
                                                    Full Marks: 100
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Lab Attendant-1
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID9')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID9'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Lab Attendant-1
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical) <br>
                                                    (Refrigeration and air
                                                    conditioning)
                                                </td>
                                                @if (App\Models\Form::check_form_submitted(env('FORMID10')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID10'));
                                                        $form = App\Models\Form::find($id);
                                                        $form_data = App\Models\FormResult::where("application_no", $form->form_id . $form->application_no)->first();
                                                    @endphp
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->cbt_mark)
                                                                {{$form_data->cbt_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->experience_mark)
                                                                {{$form_data->experience_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->total_mark)
                                                                {{$form_data->total_mark}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($form_data)
                                                            @if($form_data->result)
                                                                {{$form_data->result}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    {{-- @include('layouts.footers.guest.footer') --}}
@endsection
<script type="text/javascript">
    function print_admitcard(id){
        if(id){
            $.ajax({
                url: '{{ route('printAdmitCard') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#spinner_" + id).show();
                },
                success: function(data) {
                    popup(data.page, id);
                },

                error: function(xhr) { // if error occured
                },
                complete: function() {
                    
                }
            });
        }
    }

    function popup(data, id) {
        var base_url = '{{ url('/') }}';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[
            0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title>NIRTH-Admitcard</title>');
        frameDoc.document.write('<link rel="preconnect" href="https://fonts.googleapis.com">');
        frameDoc.document.write('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
        frameDoc.document.write('<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">');
        frameDoc.document.write('<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@700&display=swap" rel="stylesheet">');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-icons.css" rel="stylesheet" />');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-svg.css" rel="stylesheet" />');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-svg.css" rel="stylesheet" />');
        frameDoc.document.write('<link id="pagestyle" href="' + base_url +
            '/assets/css/argon-dashboard.css" rel="stylesheet" />');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
            $("#spinner_" + id).hide();
        }, 3000);

        return true;
    }
</script>