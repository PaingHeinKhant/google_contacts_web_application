@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <div class="row">

                <div class="mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Contacts</li>
                        </ol>
                    </nav>
                </div>

                <form action="{{ route('contact.update',$contact->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

{{--                    {{ $contact }}--}}
                   <div class="col-6">
                       <div class="mb-3  d-flex justify-content-between">
                           <div class="">

                               @if(isset($contact->image))
                                   <img src="{{ asset("storage/".$contact->image) }}" width="162px" height="162px" id="inputImageFile" class="rounded rounded-circle  mb-4" alt="">
                               @else
                                   <img src="https://ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"  id="inputImageFile" width="162px" height="162px" class="rounded rounded-circle  mb-4" alt="">
                               @endif

                               <input type="file" name="image" id="fileInput" class="" hidden>
                           </div>
                           <div class="d-flex align-items-end mb-3">

                               <a href="{{ route('contact.index') }}" class="btn btn-secondary ">Cancel</a>
                           </div>
                       </div>
                   </div>

                    <div class="underline my-3"></div>

                    <div class="col-6">
                        <div class="form-floating ">
                            <input type="text"
                                   class="form-control"
                                   id="floatingInput"
                                   name="firstName"
                                   value="{{ old('firstName',$contact->firstName) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control"
                                   id="floatingInput"
                                   name="lastName"
                                   value="{{ old('lastName',$contact->lastName) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control"
                                   id="floatingInput"
                                   name="company"
                                   value="{{ old('company',$contact->company) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Company Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email"
                                   class="form-control"
                                   id="floatingInput"
                                   name="email"
                                   value="{{ old('email',$contact->email) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control"
                                   id="floatingInput"
                                   name="phone"
                                   value="{{ old('phone',$contact->phone) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date"
                                   class="form-control"
                                   id="floatingInput"
                                   name="birthday"
                                   value="{{ old('birthday',$contact->birthday) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Birthday</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control"
                                   id="floatingInput"
                                   name="note"
                                   value="{{ old('note',$contact->note) }}"
                                   placeholder="name@example.com">
                            <label for="floatingInput" class="text-black-50">Note</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-3">Update</button>
                </form>
        </div>
    </div>



@stop
