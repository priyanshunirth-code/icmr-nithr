@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="bg-primary mt-1">
            <div class="p-3">
                <div class="row gx-4 justify-content-between">
                    <div class="col-auto">
                        <div class="">
                            <img src="{{ asset('img/icmr-new-logo.jpg') }}" alt="">

                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                @if ($form->payment_status == 'SUCCESS')
                                <h4>Thank You, Your payment for Rs. <?php echo $form->amount; ?> is <?= $form->payment_status ?>. You
                                    can have your application by clicking on print button given below. </h4>
                                    @endif

                                @if ($form->payment_status == 'FAILED')
                                    <h4 class="text-danger">Payment failed, Please login the account and pay again!</h4>
                                @endif

                            </div>
                            <div class="col-md-12 col-sm-12 text-center">

                                @if ($form->process == 3 && $form->payment_status == 'SUCCESS')
                                    <button type="button" class="btn btn-success"
                                        onclick="print_application('{{ $form->id }}');">Print Application</button>
                                @endif

                                <a href="{{ route('login') }}" class="mx-2 btn btn-success">
                                    Login
                                </a>
                                {{-- <a href="{{route('downloadapplication',['id'=>$form->id])}}" class="btn btn-success">Download Application</a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script type="text/javascript">
        function print_application(id) {

            $.ajax({
                url: '{{ route('printapplication') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    popup(data.page);
                },

                error: function(xhr) { // if error occured
                    alert("");
                },
                complete: function() {}
            });
        }

        function popup(data) {
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
            frameDoc.document.write('<title></title>');
            frameDoc.document.write(
                '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />');
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

            }, 500);

            return true;
        }
    </script>
@endsection
