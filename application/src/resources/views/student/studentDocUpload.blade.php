@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">

        @include('student.studentProfile')

        <style>
            p>.docInput {
                width: 200px !important;
            }

            .form-submit-link {
                pointer-events: none;
                /* Add any other styling you want for the disabled link */
                text-decoration: none;
                background-color: #dddddd;
                /* Specify the desired background color */

                cursor: default;
                cursor: not-allowed;
            }

            .btn-success{
                background-color: #385c4d !important;
            }

        </style>

        <div class="container-fluid">

            <div class="nav-wrapper position-relative my-2">
                <ul class="nav nav-pills nav-fill p-1">

                    <li class="nav-item">
                        <div class="mb-0 px-0 py-1 ">
                            <i class="ni ni-laptop text-sm me-2"></i> Registration
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link mb-0 px-0 py-1 active">
                            <i class="ni ni-laptop text-sm me-2"></i> Upload Documents
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="mb-0 px-0 py-1">
                            <i class="ni ni-laptop text-sm me-2"></i> Preview And Payment
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Documents to be uploded</h3>
                            @php $ALLDOC_COUNT = 0 @endphp
                            @php $TOTAL_DOCS = 0 @endphp
                        </div>

                        <div class="card-body pt-2">
                            {{-- <span  class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span> --}}
                            <a href="javascript:;" class="card-title h5 d-block text-darker">
                                NOTE: Candidates must be cautious while uploading the documents.
                            </a>

                            <div class="card m-3">

                                {{-- <form role="form" method="POST" action={{ route('studentDocsSave') }}
                                    enctype="multipart/form-data">
                                    @csrf --}}


                                <div class="card-body px-3 py-0">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">

                                            <tbody>
                                                <form role="form" method="POST" action={{ route('studentDocsSave') }}
                                                    enctype="multipart/form-data">
                                                    @csrf <input type="hidden" name="id" value="{{ $form->id }}">

                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">Scanned Photograph of
                                                                the candidate :
                                                                <br>(Photo should be clearly visible)
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0 d-flex">
                                                                <input required type="file" accept="image/jpeg, image/png" class="form-control docInput"
                                                                    name="profile_pic"
                                                                    onchange="validateTypeAndSizeForImg(this,'profilePicImgPreview','profilePicErrorMsg')">
                                                            </p>
                                                            <p>
                                                                <span id="profilePicErrorMsg"
                                                                    class="error text-danger text-sm"
                                                                    style="display: none;">
                                                                </span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="form-text text-danger text-sm"> Only
                                                                Jpg,Png,Jpeg(Max Size:- 100kb)</p>

                                                        </td>
                                                        <td class="text-end">
                                                            <div
                                                                class="d-flex gap-2 justify-content-end align-items-center">
                                                                <button class="btn btn-sm btn-primary mt-2"
                                                                type="submit">Upload</button>
                                                                @if (!$form->profile_pic)

                                                                @else
                                                                    <a target="_blank" class="btn btn-sm btn-success mt-2"
                                                                        href="{{ $form->imageUrl($form->profile_pic) }}">
                                                                        View
                                                                    </a>
                                                                    @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                @endif

                                                                <img id="profilePicImgPreview"
                                                                    src="{{ $form->imageUrl($form->profile_pic) }}"
                                                                    Height="50px" Width="50px">

                                                            </div>
                                                        </td>
                                                    </tr>


                                                </form>

                                                <form role="form" method="POST" action={{ route('studentDocsSave') }}
                                                    enctype="multipart/form-data">
                                                    @csrf <input type="hidden" name="id" value="{{ $form->id }}">

                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">Scanned Signature of
                                                                the candidate :
                                                                <br>(Signature should not be in CAPITAL/BLOCK letters)
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0"><input required
                                                                    type="file" accept="image/jpeg, image/png" class="form-control docInput"
                                                                    name="signature"
                                                                    onchange="validateTypeAndSizeForImg(this,'sigImgPreview','sigErrorMsg')">
                                                            </p>
                                                            <p>
                                                                <span id="sigErrorMsg" class="error text-danger text-sm"
                                                                    style="display: none;"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="form-text text-danger text-sm"> Only
                                                                Jpg,Png,Jpeg(Max Size:- 100kb)</p>

                                                        </td>

                                                        <td class="text-end">
                                                            <div
                                                                class="d-flex gap-2 justify-content-end align-items-center">
                                                                <button class="btn btn-sm btn-primary mt-2"
                                                                        type="submit">Upload</button>
                                                                @if (!$form->signature)

                                                                @else
                                                                    <a target="_blank" class="btn btn-sm btn-success mt-2"
                                                                        href="{{ $form->imageUrl($form->signature) }}">
                                                                        View
                                                                    </a>
                                                                    @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                @endif

                                                                <img id="sigImgPreview"
                                                                    src="{{ $form->imageUrl($form->signature) }}"
                                                                    Height="50px" Width="50px">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>



                                                @if ($form->tenth_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }} enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">High School/10th
                                                                    Marksheet
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="tenth_document"
                                                                        onchange="validateTypeAndSize(this,'tenthImgPreview','tenthErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="tenthErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">


                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                            type="submit">Upload</button>

                                                                    @if (!$form->tenth_document)

                                                                    @else
                                                                        <a target="_blank" class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->tenth_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="tenthImgPreview" Height="50px"
                                                                        @if ($form->tenth_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </form>
                                                @endif

                                                @if ($form->twelveth_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Higher
                                                                    Secondary/12th Marksheet
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="twelveth_document"
                                                                        onchange="validateTypeAndSize(this,'twelvethImgPreview','twelvethErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="twelvethErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->twelveth_document)

                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->twelveth_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="twelvethImgPreview" Height="50px"
                                                                        @if ($form->twelveth_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>


                                                        </tr>

                                                    </form>
                                                @endif

                                                @if ($form->diploma_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Diploma
                                                                    Certificate
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="diploma_document"
                                                                        onchange="validateTypeAndSize(this,'diplomaImgPreview','diplomaErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="diplomaErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->diploma_document)

                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->diploma_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="diplomaImgPreview" Height="50px"
                                                                        @if ($form->diploma_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </form>
                                                @endif

                                                @if ($form->bachelor_degree_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Bachelor Degree
                                                                    Marksheet
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="bachelor_degree_document"
                                                                        onchange="validateTypeAndSize(this,'bachlorImgPreview','bachelorErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="bachelorErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                            type="submit">Upload</button>
                                                                    @if (!$form->bachelor_degree_document)

                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->bachelor_degree_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="bachlorImgPreview" Height="50px"
                                                                        @if ($form->bachelor_degree_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif

                                                @if ($form->master_degree_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Master Degree
                                                                    Marksheet
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="master_degree_document"
                                                                        onchange="validateTypeAndSize(this,'masterImgPreview','masterErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="masterErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>
                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->master_degree_document)

                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->master_degree_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="masterImgPreview" Height="50px"
                                                                        @if ($form->master_degree_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif

                                                @if ($form->category == 'ST' || $form->category == 'SC' || $form->category == 'OBC' || $form->category == 'EWS')
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Category
                                                                    Certificate
                                                                    :
                                                                    <!-- <br>
                                                                                    <p class="text-danger">
                                                                                        Attach valid self-attested certificate
                                                                                    </p> -->
                                                                    <!--  @if ($form->category == 'ST' || $form->category == 'SC')
    <a href="{{ asset('annex/Annexure-IX.pdf') }}" class="text-danger">
                                                                                        Attach certificate as annexed at IX
                                                                                    </a>
@elseif ($form->category == 'EWS')
    <a href="{{ asset('annex/Annexure-II.pdf') }}" class="text-danger">
                                                                                        Attach certificate as annexed at II
                                                                                    </a>
@elseif ($form->category == 'OBC')
    Attach certificate as <a href="{{ asset('annex/Annexure-VII.pdf') }}" class="text-danger">annexed at VI </a>& <a href="{{ asset('annex/Annuexure-VIII.pdf') }}" class="text-danger"> annexed at VIII</a>
    @endif -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="category_document"
                                                                        onchange="validateTypeAndSize(this,'categoryImgPreview','categoryErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="categoryErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                            type="submit">Upload</button>
                                                                    @if (!$form->category_document)

                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->category_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="categoryImgPreview" Height="50px"
                                                                        @if ($form->category_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif

                                                @if ($form->pwd == 'Yes')
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $form->id }}">


                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">PwBD Certificate :
                                                                    <br>
                                                                    <!-- <a href="{{ asset('annex/Annexure-X.pdf') }}" class="text-danger">
                                                                                        Attach certificate as annexed at X
                                                                                    </a> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="pwd_document"
                                                                        onchange="validateTypeAndSize(this,'pwdImgPreview','pwdErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="pwdErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>
                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                            type="submit">Upload</button>
                                                                    @if (!$form->pwd_document)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->pwd_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="pwdImgPreview"
                                                                        @if ($form->pwd_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Height="50px" Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </form>
                                                @endif

                                                @if ($form->exsm == 'Yes')
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">


                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Ex-servicemen
                                                                    Certificate :
                                                                    <!-- <br>
                                                                                       <span class="text-danger">As per
                                                                                        <a href="{{ asset('annex/Annexure-I(b).pdf') }}" class="text-danger">Annexure-I(b)</a> and <a href="{{ asset('annex/Annexure-I(c).pdf') }}" class="text-danger"> Annexure-I(c)</span></a> -->

                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="exsm_document"
                                                                        onchange="validateTypeAndSize(this,'exsmImgPreview','exsmErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="exsmErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>
                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->exsm_document)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->exsm_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="exsmImgPreview" Height="50px"
                                                                        @if ($form->exsm_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>


                                                        </tr>
                                                    </form>
                                                @endif

                                                {{-- @if ($form->ews == 'Yes')
                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">EWS Certificate
                                                                    :
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="ews_document"
                                                                        onchange="validateTypeAndSize(this,'ewsImgPreview','ewsErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="ewsErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>
                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">
                                                                    @if (!$form->ews_document)
                                                                        <button class="btn btn-sm btn-primary mt-2"
                                                                            type="submit">Upload</button>
                                                                            @else
                                                                            @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="ewsImgPreview" Height="50px"
                                                                        @if ($form->ews_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </form>
                                                @endif --}}




                                                @if ($form->other_roll_no)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Other Relevent
                                                                    Document
                                                                    :
                                                                    <!-- <br><span class="text-danger">
                                                                                        Attach self-attested copy of the document
                                                                                     </span> -->
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="other_document"
                                                                        onchange="validateTypeAndSize(this,'ohterImgPreview','ohterErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="ohterErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->other_document)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->other_document) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="ohterImgPreview" Height="50px"
                                                                        @if ($form->other_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif


                                                @if ($workExperience_count)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">Work Experience
                                                                    Certificate
                                                                    :
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="exp_certificate"
                                                                        onchange="validateTypeAndSize(this,'exp_certificatePreview','exp_certificateErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="exp_certificateErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->exp_certificate)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->exp_certificate) }}">
                                                                            View
                                                                        </a>
                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif
                                                                    <img id="exp_certificatePreview" Height="50px"
                                                                        @if ($form->exp_certificate) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif


                                                @if ($fivePerWei_count && ($form->is_five_per_weightage == 'Yes'))
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    5 percent weightage certificate
                                                                    :
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="five_per_weightage_certificate"
                                                                        onchange="validateTypeAndSize(this,'five_per_weightage_certificatePreview','five_per_weightage_certificateErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="five_per_weightage_certificateErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->five_per_weightage_certificate)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->five_per_weightage_certificate) }}">
                                                                            View
                                                                        </a>

                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif

                                                                    <img id="five_per_weightage_certificatePreview"
                                                                        Height="50px"
                                                                        @if ($form->five_per_weightage_certificate) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif



                                                @if ($form->working_in_icmr_project == 'Yes' && $icmrExperience_count)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    ICMR’s certificate
                                                                    :
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="icmr_project_certificate"
                                                                        onchange="validateTypeAndSize(this,'icmr_project_certificatePreview','icmr_project_certificateErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="icmr_project_certificateErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->icmr_project_certificate)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->icmr_project_certificate) }}">
                                                                            View
                                                                        </a>

                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif

                                                                    <img id="icmr_project_certificatePreview"
                                                                        Height="50px"
                                                                        @if ($form->icmr_project_certificate) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif

                                                @if ($form->previous_experiences == 'Yes' && $prevexps_count)
                                                    @php $TOTAL_DOCS =  $TOTAL_DOCS + 1 @endphp

                                                    <form role="form" method="POST"
                                                        action={{ route('studentDocsSave') }}
                                                        enctype="multipart/form-data">
                                                        @csrf <input type="hidden" name="id"
                                                            value="{{ $form->id }}">

                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    Govt. Servants certificate
                                                                    :
                                                                    <!--  <br><span class="text-danger">Attach certificate annexed at
                                                                                        <a href="{{ asset('annex/Annexure-I(a).pdf') }}" class="text-danger"><u>Annexure-I(a)</u></a> and <br> NOC in the foramat annexed at<a href="{{ asset('annex/Annexure-V.pdf') }}" class="text-danger"><u> Annexure-V</u></span></a> -->

                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0"><input required
                                                                        type="file" accept="application/pdf" class="form-control docInput"
                                                                        name="previous_experiences_certificate"
                                                                        onchange="validateTypeAndSize(this,'previous_experiences_certificatePreview','previous_experiences_certificateErrorMsg')">
                                                                </p>
                                                                <p>
                                                                    <span id="previous_experiences_certificateErrorMsg"
                                                                        class="error text-danger text-sm"
                                                                        style="display: none;">
                                                                    </span>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="form-text text-danger text-sm"> Only
                                                                    PDF (Max Size:- 500kb)</p>

                                                            </td>

                                                            <td class="text-end">
                                                                <div
                                                                    class="d-flex gap-2 justify-content-end align-items-center">

                                                                    <button class="btn btn-sm btn-primary mt-2"
                                                                    type="submit">Upload</button>
                                                                    @if (!$form->previous_experiences_certificate)
                                                                    @else
                                                                        <a target="_blank"
                                                                            class="btn btn-sm btn-success mt-2"
                                                                            href="{{ $form->imageUrl($form->previous_experiences_certificate) }}">
                                                                            View
                                                                        </a>

                                                                        @php $ALLDOC_COUNT = $ALLDOC_COUNT + 1 @endphp
                                                                    @endif

                                                                    <img id="previous_experiences_certificatePreview"
                                                                        Height="50px"
                                                                        @if ($form->previous_experiences_certificate) src="{{ asset('img/pdf.png') }}" @endif
                                                                        Width="50px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </form>
                                                @endif
                                                <form role="form" method="POST"
                                                    action={{ route('studentDocsSave') }}
                                                    enctype="multipart/form-data">
                                                    @csrf <input type="hidden" name="id"
                                                        value="{{ $form->id }}">

                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">Other Document if any (Optional):</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0"><input required
                                                                    type="file" accept="application/pdf" class="form-control docInput"
                                                                    name="any_other_document"
                                                                    onchange="validateTypeAndSize(this,'anyotherImgPreview','anyotherErrorMsg')">
                                                            </p>
                                                            <p>
                                                                <span id="anyotherErrorMsg"
                                                                    class="error text-danger text-sm"
                                                                    style="display: none;">
                                                                </span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="form-text text-danger text-sm"> Only
                                                                PDF (Max Size:- 500kb)</p>

                                                        </td>

                                                        <td class="text-end">
                                                            <div
                                                                class="d-flex gap-2 justify-content-end align-items-center">

                                                                <button class="btn btn-sm btn-primary mt-2"
                                                                type="submit">Upload</button>
                                                                @if (!$form->any_other_document)
                                                                @else
                                                                    <a target="_blank"
                                                                        class="btn btn-sm btn-success mt-2"
                                                                        href="{{ $form->imageUrl($form->any_other_document) }}">
                                                                        View
                                                                    </a>
                                                                @endif
                                                                <img id="ohterImgPreview" Height="50px"
                                                                    @if ($form->any_other_document) src="{{ asset('img/pdf.png') }}" @endif
                                                                    Width="50px">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer">

                                    <p> <span class="text-danger">Required Documents:</span> {{ $TOTAL_DOCS }}</p>
                                    <p> <span class="text-danger">Uploded Documents:</span>{{ $ALLDOC_COUNT }}</p>
                                    <div class="text-end">

                                        <a href="{{ route('stuEditForm', ['form_id' => $form->form_id, 'id' => $form->id]) }}"
                                            class="btn btn-primary">Back</a>


                                        <a href="{{ route('studentFormPreview', ['id' => $form->id]) }}"
                                            class="btn btn-primary @if (!($TOTAL_DOCS === $ALLDOC_COUNT)) form-submit-link @endif">Preview
                                            and
                                            Submit
                                        </a>

                                    </div>

                                </div>

                                {{-- </form> --}}


                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </main>

    <script type="text/javascript">
        //Validate image size before upload
        function validateTypeAndSize(uploadCtrl, imgPreId, ErrorId) {
            // Get uploaded file extension
            var extension = $(uploadCtrl).val().split('.').pop().toLowerCase();
            // Create array with the files extensions that we wish to upload

            var validFileExtensions = ['pdf'];

            //Check file extension in the array.if -1 that means the file extension is not in the list.
            if ($.inArray(extension, validFileExtensions) == -1) {
                $(`#${ErrorId}`).text("Sorry!! Upload only pdf file").show();
                // Clear fileuload control selected file
                $(uploadCtrl).replaceWith($(uploadCtrl).val('').clone(true));
                //Disable Submit Button
                $('#btnSubmit').prop('disabled', true);
                //Clear Image preview
                // $(`#${imgPreId}`).prop('src', '');
                $(`#${imgPreId}`).html('');

            } else {
                // Check and restrict the file size to 32 KB.
                if ($(uploadCtrl).get(0).files[0].size < (5000)) {
                    $(`#${ErrorId}`).text("Sorry!! Min allowed PDF size is 5 kb").show();
                    // Clear fileuload control selected file
                    $(uploadCtrl).replaceWith($(uploadCtrl).val('').clone(true));
                    //Disable Submit Button
                    $('#btnSubmit').prop('disabled', true);
                    //Clear Image preview
                    $(`#${imgPreId}`).html('');
                }
                if ($(uploadCtrl).get(0).files[0].size > (500768)) {
                    $(`#${ErrorId}`).text("Sorry!! Max allowed PDF size is 500 kb").show();
                    // Clear fileuload control selected file
                    $(uploadCtrl).replaceWith($(uploadCtrl).val('').clone(true));
                    //Disable Submit Button
                    $('#btnSubmit').prop('disabled', true);
                    //Clear Image preview
                    $(`#${imgPreId}`).html('');
                } else {
                    //Clear and Hide message span
                    $(`#${ErrorId}`).text('').hide();
                    //Enable Submit Button
                    $('#btnSubmit').prop('disabled', false);
                    //Preview Image if valid
                    previewPdf(uploadCtrl, imgPreId);
                }
            }
        }

        //Preview image before upload
        function previewPdf(input, imgPreId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(`#${imgPreId}`)
                        // .attr('src', e.target.result)
                        // .attr('class', 'avatar')
                        .width(50)
                        .html('&check;')
                        .height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function validateTypeAndSizeForImg(uploadCtrl, imgPreId, ErrorId) {
            // Get uploaded file extension
            var extension = $(uploadCtrl).val().split('.').pop().toLowerCase();
            // Create array with the files extensions that we wish to upload

            var validFileExtensions = ['jpeg', 'jpg', 'png'];

            //Check file extension in the array.if -1 that means the file extension is not in the list.
            if ($.inArray(extension, validFileExtensions) == -1) {
                $(`#${ErrorId}`).text("Sorry!! Upload only jpg, jpeg, png image").show();
                // Clear fileuload control selected file
                $(uploadCtrl).replaceWith($(uploadCtrl).val('').clone(true));
                //Disable Submit Button
                $('#btnSubmit').prop('disabled', true);
                //Clear Image preview
                $(`#${imgPreId}`).prop('src', '');
            } else {
                // Check and restrict the file size to 32 KB.
                if ($(uploadCtrl).get(0).files[0].size > (150768)) {
                    $(`#${ErrorId}`).text("Sorry!! Max allowed image size is 100 kb").show();
                    // Clear fileuload control selected file
                    $(uploadCtrl).replaceWith($(uploadCtrl).val('').clone(true));
                    //Disable Submit Button
                    $('#btnSubmit').prop('disabled', true);
                    //Clear Image preview
                    $(`#${imgPreId}`).prop('src', '');
                } else {
                    //Clear and Hide message span
                    $(`#${ErrorId}`).text('').hide();
                    //Enable Submit Button
                    $('#btnSubmit').prop('disabled', false);
                    //Preview Image if valid
                    previewImage(uploadCtrl, imgPreId);
                }
            }
        }

        function previewImage(input, imgPreId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(`#${imgPreId}`)
                        .attr('src', e.target.result)
                        .attr('class', 'avatar')
                        .width(50)
                        .height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
