@extends('layouts.general')

@section('metaSeo')
    <title>Admin Panel | Update Contact</title>
    <meta name="description" content="Admin Panel | Update Contact">
    <meta name="keywords" content='Admin Panel | Update Contact'>
@endsection

@section('content')

    @include('blocks.loader')

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('blocks.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('blocks.left-menu')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Bootstrap tab card start -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <!-- Row start -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="sub-title">Update Contact</div>
                                                                <input type="text" id="contactId" value="{{$contact['id']}}" style="visibility: hidden; display:none;">
                                                                <!-- Tab panes -->
                                                                <form id="updateContactForm" enctype='multipart/form-data'>
                                                                    @csrf
                                                                    <div class="userInformationArea">
                                                                        <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                                                            The contact has successfully added!
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 chooseImageArea">
                                                                                    <div class="inputArea selectImageHeadArea">
                                                                                        <div class="chooseImagesSection">
                                                                                            <img id="profilePhotoArea" src="/{{$contact['profile_photo_path']}}" alt="Profile Photo">
                                                                                            <input type="file" name="photo" class="form-control imageFileInput" id="profilePhoto" title="Choose Photo">
                                                                                            <label class="imageFileLabel" for="profilePhoto">
                                                                                                <i class="fal fa-cloud-upload"></i>
                                                                                            </label>
                                                                                            <div class="errorMessageArea">
                                                                                                <span class="text-danger" id="profilePhotoErrorMsg"></span>
                                                                                            </div>
                                                                                            @if($contact['profile_photo_path'] !== 'assets/images/profile-default-photo.png')
                                                                                                <a id="deleteProfilePhotoCross" class="deleteImageButton" href="javascript:void(0)" onclick="deleteImage()" title="Delete Photo">
                                                                                                    <i class="fal fa-times"></i>
                                                                                                </a>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="imageSectionButtons">
                                                                                            <label id="editPhotoButton" for="profilePhoto">
                                                                                                @if($contact['profile_photo_path'] !== 'assets/images/profile-default-photo.png')
                                                                                                    Update Photo
                                                                                                @else
                                                                                                    Add Photo
                                                                                                @endif
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <label for="firstNameForm">First Name <span>*</span></label>
                                                                                    <input type="text" name="firstName" id="firstNameForm" class="form-control" value="{{$contact['first_name']}}">
                                                                                    <div class="errorMessageArea">
                                                                                        <span class="text-danger" id="firstNameErrorMsg"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label for="lastNameForm">Last Name</label>
                                                                                    <input type="text" name="lastName" id="lastNameForm" class="form-control" value="{{$contact['last_name']}}">
                                                                                    <div class="errorMessageArea">
                                                                                        <span class="text-danger" id="lastNameErrorMsg"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <label for="companyForm">Company</label>
                                                                                    <input type="text" name="company" id="companyForm" class="form-control" value="{{$contact['company']}}">
                                                                                    <div class="errorMessageArea">
                                                                                        <span class="text-danger" id="companyErrorMsg"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label for="birthdayForm">Birthday</label>
                                                                                    <input type="date" name="birthday" id="birthdayForm" class="form-control" value="{{$contact['birthday']}}">
                                                                                    <div class="errorMessageArea">
                                                                                        <span class="text-danger" id="birthdayErrorMsg"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <label for="groupForm">Group</label>
                                                                                    <select id="groupForm" name="group" class="form-control">
                                                                                        @if($contact['group_id'] === 0)
                                                                                            <option selected value="0">None</option>
                                                                                        @else
                                                                                            <option value="0">None</option>
                                                                                        @endif
                                                                                        @foreach($groups as $group)
                                                                                            @if($group['id'] === $contact['group_id'])
                                                                                                <option selected value="{{$group['id']}}">{{$group['name']}}</option>
                                                                                            @else
                                                                                                <option value="{{$group['id']}}">{{$group['name']}}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <label for="notesForm">Notes</label>
                                                                                    <textarea class="form-control" name="notes" id="notesForm">{{$contact['notes']}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="productDetailsArea">
                                                                            <div class="subTitle">
                                                                                Phone
                                                                            </div>
                                                                            <div class="form-group productDetailsSubArea">
                                                                                <div class="tabArea">
                                                                                    <div class="tabContentArea">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active" role="tabpanel">
                                                                                                <div class="gridBody">
                                                                                                    <div id="phonesAddButtonArea" class="form-group">
                                                                                                        <div class="row">
                                                                                                            <div class="col-lg-12 flexCenter">
                                                                                                                <a id="phoneAddButtonId" href="javascript:void(0)" class="generalButton addModalButton">
                                                                                                                    <i class="far fa-plus-circle"></i> Add Phone
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="productDetailsArea">
                                                                            <div class="subTitle">
                                                                                E-mail
                                                                            </div>
                                                                            <div class="form-group productDetailsSubArea">
                                                                                <div class="tabArea">
                                                                                    <div class="tabContentArea">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active" role="tabpanel">
                                                                                                <div class="gridBody">
                                                                                                    <div id="emailsAddButtonArea" class="form-group">
                                                                                                        <div class="row">
                                                                                                            <div class="col-lg-12 flexCenter">
                                                                                                                <a id="emailAddButtonId" href="javascript:void(0)" class="generalButton addModalButton">
                                                                                                                    <i class="far fa-plus-circle"></i> Add E-mail
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="productDetailsArea">
                                                                            <div class="subTitle">
                                                                                Address
                                                                            </div>
                                                                            <div class="form-group productDetailsSubArea">
                                                                                <div class="tabArea">
                                                                                    <div class="tabContentArea">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active" role="tabpanel">
                                                                                                <div class="gridBody">
                                                                                                    <div id="addressesAddButtonArea" class="form-group">
                                                                                                        <div class="row">
                                                                                                            <div class="col-lg-12 flexCenter">
                                                                                                                <a id="addressAddButtonId" href="javascript:void(0)" class="generalButton addModalButton">
                                                                                                                    <i class="far fa-plus-circle"></i> Add Address
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="buttonAreaHeadSection">
                                                                            <div class="buttonArea">
                                                                                <button type="submit" class="generalButton updateButton">UPDATE</button>
                                                                                <a href="{{route('contacts.list')}}" class="generalButton cancelButton">CANCEL</a>
                                                                            </div>
                                                                            <div class="buttonArea">
                                                                                <a id="deleteContactButtonId" href="javascript:void(0)" class="generalButton cancelButton deleteButton">DELETE</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Row end -->
                                                    </div>
                                                </div>
                                                <!-- Bootstrap tab card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('assets/js/privateJs/updateContact.js')}}"></script>
@endsection



