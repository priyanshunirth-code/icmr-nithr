@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Groups'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Groups</h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Screening Status</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Group</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            From</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            To</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Username</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Password</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Assign To</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Completed Screening</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Total Pass</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Total Fail</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($groups))
                                        @foreach ($groups as $key => $group)
                                            <tr @if($group->status == 1) style="background-color: lightgreen; " @endif>
                                                <td class="text-sm text-center">
                                                    {{ $key+1 }}
                                                </td>
                                                <td class="text-center text-sm">
                                                    @if($group->status == 1)
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ "Mark Completed" }}
                                                    </p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $group->subject_group }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $group->from_sno }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $group->to_sno }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $group->username }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $group->password->password_string }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="form-group text-sm">
                                                        <input type="text" name="assign_to" class="assign_to form-control" group_id="{{$group->id}}" value="{{$group->assign_to}}" tabindex="{{$key+1}}" style="width: 200px;">
                                                    </div>
                                                </td>
                                                <td class="text-center text-sm">{{$group->getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '')}}</td>
                                                <td class="text-center text-sm">{{$group->getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, 'PASS')}}</td>
                                                <td class="text-center text-sm">{{$group->getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, 'FAIL')}}</td>
                                                <td class="text-sm">
                                                    <a href="{{route('admin.group.applicants',['group_id' => $group->id])}}" class="btn btn-primary btn-xs">Candidates</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".assign_to").on("blur", function(){
                var assign_to = $(this).val();
                var group_id = $(this).attr("group_id");

                $.ajax({
                    url: '{{ route('admin.updateassignto') }}',
                    type: 'GET',
                    data: {
                        'group_id': group_id,
                        'assign_to': assign_to
                    },
                    success: function(data) {
                        if(data){

                        }
                        else{

                        }
                    },
                    error: function(err) {

                    }
                })
            })
        })
    </script>
@endsection
