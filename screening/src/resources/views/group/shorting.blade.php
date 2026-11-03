@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Shorting'])
    <div class="container-fluid mt-3 py-4">
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{$subject_group}}
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                Total Applications: {{$total_form}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Complete Screening: {{$complete_shorting}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Screening: {{$pending_shorting}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($group->status == 1)
        <div class="row mt-4">
            <div class="col-md-3 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="numbers text-center">
                            <h5 class="font-weight-bolder text-danger">
                                All screening marked completed
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row mt-4">
            @for($i = 1;$i<=$total_tab; $i++)
                @php
                    $count = $i*env('LIMIT');
                    $total = ($count < $total_form) ? env('LIMIT') : ($total_form - (($i-1)*env('LIMIT')));

                    $limit = env("LIMIT");

                    $offset = $group->from_sno + (($i-1)*env("LIMIT"));

                    $diff = $group->to_sno - $offset + 1;

                    if($diff<$limit){
                        $limit = $diff;
                    }

                    $completed_count = App\Models\Group::getTotalApplicationsLimitOffset($group->form_id, $offset, $limit, '');

                    $background_color = "";

                    if($total == $completed_count){
                        $background_color = "background-color: lightgreen;";
                    }
                    elseif($total > $completed_count && $completed_count != 0){
                        $background_color = "background-color: lightpink;";
                    }
                @endphp
                <div class="col-md-2 mb-xl-0 mb-4 mt-4">
                    {{--<a href="{{route('group.processshorting',['slot'=>$i])}}" target="_blank">--}}
                    <a href="{{route('group.slotshortinglist',['slot'=>$i])}}">
                        <div class="card">
                            <div class="card-body p-3" style="{{$background_color}}">
                                <div class="numbers text-center">
                                    <h5 class="font-weight-bolder">
                                        Slot: {{$i}}
                                    </h5>
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total: {{$total}}</p>
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Completed Screening: {{$completed_count}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-sm" onclick="mark_all_screening_complete();">Mark All Screening Complete</button>
            </div>
        </div>
        @endif
        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        function mark_all_screening_complete(){
            if(confirm("Are your sure to mark all screeing complete?")){
                window.location.href = "{{ route('group.markallscreeingcomplete')}}";
            }
        }
    </script>
@endsection