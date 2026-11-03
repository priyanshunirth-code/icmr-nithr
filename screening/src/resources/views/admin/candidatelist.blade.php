@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Candidates'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Candidates</h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div id="datatable-title" style="display: none;">Candidates</div>
                            <table class="table table-hover align-items-center mb-0" id="example4">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Mobile No</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Total Apply</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Apply In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($forms))
                                        @foreach ($forms as $key => $form)
                                            <tr>
                                                <td class="text-sm text-center">
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->firstname . " " . $form->middlename . " " . $form->lastname }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->email }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->mobile_no }}
                                                    </p>
                                                </td>
                                                <td>
                                                	@php
                                                	$form_ids = explode(",", $form->form_ids);
                                                	@endphp
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ count($form_ids) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        @foreach($form_ids as $fkey => $form_id)
                                                        	{{($fkey+1) . ". " . $subjects[$form_id]}}<br>
                                                        @endforeach
                                                    </p>
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
@endsection
