@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.client.index')}}">Clients</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$act}} Client</li>
@endsection

@section('content')

<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    {{(isset($client) ? 'Update' : 'Add')}} Client
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->

    <form class="m-form m-form--fit m-form--label-align-right" method="POST"
        action="@if(isset($client)) {{route('admin.client.update', $client->id)}} @else {{route('admin.client.store')}} @endif"
        enctype="multipart/form-data" accept-charset="utf-8">
        @csrf
        @if(isset($client))
            @method('PUT')
        @endif
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">

                    <label class="col-lg-2 col-form-label">
                        Name:
                    </label>
                    <div class="col-lg-3">
                        <input type="text" name="name" class="form-control m-input" value="{{@$client->name}}"
                            placeholder="Enter Full Name" required autofocus>
                        @error('name')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label class="col-lg-2 col-form-label">
                        Address:
                    </label>
                    <div class="col-lg-4">
                        <input type="text" name="address" value="{{@$client->address}}" class=" form-control m-input"
                            placeholder="Enter Address" required autofocus>
                        @error('address')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-form__group row">

                    <label class="col-lg-2 col-form-label">
                        Email:
                    </label>
                    <div class="col-lg-3">
                        <input type="email" name="email" value="{{@$client->email}}" class=" form-control m-input"
                            placeholder="Enter Email" required autofocus>
                        @error('email')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label class="col-lg-2 col-form-label">
                        Phone:
                    </label>
                    <div class="col-lg-4">
                        <input type="number" name="phone" value="{{@$client->phone}}" max="9999999999" min="9700000000"
                            class="form-control m-input" placeholder="Enter Phone Number" required autofocus>
                        @error('phone')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-form__group row">

                    <label class="col-lg-2 col-form-label">
                        Description:
                    </label>
                    <div class="col-lg-9">
                        <textarea class="summernote form-control m-input" name="description" id="exampleTextarea"
                            rows="5" required>{{ @$client->phone }}</textarea>

                        @error('description')
                        <span class="m-form__help" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">
                        Training Name:
                    </label>
                    <div class="col-lg-3">
                        <input type="text" name="training_name" class="form-control m-input"
                            placeholder="Enter Training Namme" value="{{@$client->training_name}}" required autofocus>
                        @error('training_name')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="col-lg-2 col-form-label">
                        Training Duration (in month):
                    </label>
                    <div class="col-lg-3">
                        <input type="number" min="1" max="100" name="duration" class="form-control m-input"
                            placeholder="Enter Duration" value="{{@$client->duration}}" required>
                        @error('duration')
                        <span role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">
                        Profile Picture/Logo:
                    </label>
                    <div class="col-lg-3">

                        <label class="custom-file">
                            <input type="file" name="profile_image" id="file2" onchange="previewImage(event)"
                                class="custom-file-input" required="">
                            <span class="custom-file-control"></span>
                        </label>
                        @error('image')
                        <span class="m-form__help" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="col-lg-2 col-form-label">
                        Response:
                    </label>
                    <div class="col-lg-5">
                        <textarea class="form-control m-input" maxlength="200" name="response" id="exampleTextarea"
                            rows="5" required>{{@$client->response}}</textarea>

                        @error('response')
                        <span class="m-form__help" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-2"></div>
                    <!-- Start Div for Image Preview -->
                    @if (isset($client, $client->profile_image) &&
                    file_exists(public_path().'/uploads/clients/'.$client->profile_image))
                    <div class="col-lg-4" id="preview_img_div">
                        <img src="{{asset('uploads/clients/'.$client->profile_image)}}" height="150" width="150"
                            id="preview_field">
                    </div>
                    @else
                    <div class="col-lg-4" id="preview_img_div" style="visibility: hidden;">
                        <img src="" id="preview_field">
                    </div>
                    @endif

                    <!-- End Div for Image Preview -->
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @if(isset($client))
                        <button type="submit" class="btn btn-success">
                            Update
                        </button>
                        @else
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                        @endif
                        <button type="reset" class="btn btn-secondary">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->

</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var x = document.getElementById('preview_img_div');
        if (x.style.visibility === 'hidden'){
            x.style.visibility = 'visible';
        }
        var reader= new FileReader();
        var imageField=document.getElementById('preview_field');
        reader.onload=function(){
        if(reader.readyState ==2){
            imageField.style.height="150px";
            imageField.style.width="150px";
            imageField.src=reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
