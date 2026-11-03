@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pending Payment Applications'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Pending Payment Applications</h6>
                        <div class="d-flex justify-content-between ">

                            <form id="searchform" method="get" action="{{ route('admin.pendingpaymentapplications') }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="keyword" placeholder="Search..." id="keyword"
                                                class="form-control" value="{{ $keyword }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                            <form id="searchPaymentStatus" method="get" action="{{ route('admin.pendingpaymentapplications') }}">
                                <div class="row px-5">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="keyword" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Pending">Pending</option>
                                                <option value="FAILED">FAILED</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Application No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Father's<br>Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mobile No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Transaction ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Payment Date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Payment Mode</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Amonut</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Payment<br>Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Payment<br>Enquiry<br>Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($forms))
                                        @foreach ($forms as $key => $form)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->form_id }}{{ $form->application_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->firstname }}
                                                        {{ $form->middlename }} {{ $form->lastname }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->fathername }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->email }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->mobile_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->transaction_id }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->payment_date }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->payment_mode }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->amount }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->payment_status }}</p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" onclick="check_payment_status('{{$form->id}}');">Check 
                                                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0" id="enquiry_status_{{$form->id}}">{{$form->enquiry_payment_status}}</p>
                                                </td>
                                                <td>
                                                    @if($form->enquiry_payment_status == 'FAILED')
                                                        <span id="send_mail_msg_{{$form->id}}" @if(!$form->failed_mail_sent) style="display: none;" @endif>Mail sent</span>
                                                        <button type="button" class="btn btn-xs btn-primary" id="send_mail_button_{{$form->id}}" onclick="send_mail('{{$form->id}}');" @if($form->failed_mail_sent == 1) style="display: none;" @endif>Send Mail 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="send_mail_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                    @elseif($form->enquiry_payment_status == 'SUCCESS')
                                                        <button type="button" class="btn btn-xs btn-primary" onclick="update_payment_status('{{$form->id}}');">Update 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="update_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                    @elseif($form->enquiry_payment_status == 'Paymentpending')
                                                        <button type="button" class="btn btn-xs btn-primary" id="send_complete_form_mail_button_{{$form->id}}" onclick="send_complete_form_mail('{{$form->id}}');">Send Mail To Complete Application 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="send_complete_form_mail_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-xs btn-primary" id="update_button_{{$form->id}}" onclick="update_payment_status('{{$form->id}}');" style="display: none;">Update 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="update_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-xs btn-primary" id="send_mail_button_{{$form->id}}" onclick="send_mail('{{$form->id}}');" style="display: none;">Send Mail 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="send_mail_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-xs btn-primary" id="send_complete_form_mail_button_{{$form->id}}" onclick="send_complete_form_mail('{{$form->id}}');" style="display: none;">Send Mail To Complete Application 
                                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="send_complete_form_mail_spinner_{{$form->id}}" style="display: none;font-size: 10px;"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>{{ $forms->links('pagination') }}</div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">

        function check_payment_status(id){
            $("#spinner_" + id).show();
            $("#update_button_" + id).hide();
            $.ajax({
                url: '{{ route('admin.checkpaymentstatus') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    $("#spinner_" + id).hide();
                    $("#enquiry_status_" + id).html(data.status);
                    if(data.status == 'SUCCESS'){
                        $("#update_button_" + id).show();
                    }
                    if(data.status == 'Paymentpending'){
                        $("#send_complete_form_mail_button_" + id).show();
                    }
                },
                error: function(xhr) { // if error occured
                    $("#spinner_" + id).hide();
                    $("#update_button_" + id).hide();
                },
                complete: function() {
                    $("#spinner_" + id).hide();
                }
            });
        }

        function update_payment_status(id){
            $("#update_spinner_" + id).show();
            $.ajax({
                url: '{{ route('admin.updatepaymentstatus') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    $("#update_spinner_" + id).hide();
                    location.reload();
                },
                error: function(xhr) { // if error occured
                    $("#update_spinner_" + id).hide();
                },
                complete: function() {
                    $("#update_spinner_" + id).hide();
                }
            });
        }

        function send_mail(id){
            $("#send_mail_spinner_" + id).show();
            $.ajax({
                url: '{{ route('admin.sendfailedstatusmail') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    $("#send_mail_msg_" + id).show();
                    $("#send_mail_button_" + id).hide();
                    $("#send_mail_spinner_" + id).hide();
                },
                error: function(xhr) { // if error occured
                    $("#send_mail_spinner_" + id).hide();
                },
                complete: function() {
                    $("#send_mail_spinner_" + id).hide();
                }
            });
        }
    </script>
@endsection
