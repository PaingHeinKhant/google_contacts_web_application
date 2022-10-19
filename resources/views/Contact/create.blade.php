@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Contacts</li>
                    </ol>
                </nav>
            </div>

            <form action="{{ route('contact.store') }}" id="" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="col-6">
                      <div class="mb-3 d-flex justify-content-between">
                          <div class="">
                              <img src="https://ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"  id="inputImageFile" width="162px" height="162px" class="rounded rounded-circle  mb-4" alt="">
                              <input type="file"
                                     class="form-control @error('image') is-invalid @enderror"
                                     name="image" id="fileInput"
                                     hidden>
                              @error('image')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="d-flex align-items-end mb-3">
                              <button type="submit" class="btn btn-primary me-3">Save</button>
                              <a href="{{ route('contact.index') }}" class="btn btn-secondary ">Cancel</a>

                          </div>
                      </div>
                  </div>

                    <div class="underline my-3"></div>

                   <div class="col-6">
                       <div class="form-floating mb-3">
                           <input type="text"
                                  class="form-control @error('firstName') is-invalid @enderror"
                                  id="floatingInput"
                                  name="firstName"
                                  placeholder="name@example.com">
                           @error('firstName')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">First Name</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="text"
                                  class="form-control  @error('lastName') is-invalid @enderror"
                                  id="floatingInput"
                                  name="lastName"
                                  placeholder="name@example.com">
                           @error('lastName')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Last Name</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="text"
                                  class="form-control  @error('company') is-invalid @enderror"
                                  id="floatingInput"
                                  name="company"
                                  placeholder="name@example.com">
                           @error('company')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Company Name</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="email"
                                  class="form-control  @error('email') is-invalid @enderror"
                                  id="floatingInput"
                                  name="email"
                                  placeholder="name@example.com">
                           @error('email')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Email address</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="number"
                                  class="form-control  @error('phone') is-invalid @enderror"
                                  id="floatingInput"
                                  name="phone"
                                  placeholder="name@example.com">
                           @error('phone')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Phone Number</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="date"
                                  class="form-control  @error('birthday') is-invalid @enderror"
                                  id="floatingInput"
                                  name="birthday"
                                  placeholder="name@example.com">
                           @error('birthday')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Birthday</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="text"
                                  class="form-control  @error('note') is-invalid @enderror"
                                  id="floatingInput"
                                  name="note"
                                  placeholder="name@example.com">
                           @error('note')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <label for="floatingInput" class="text-black-50">Note</label>
                       </div>
                   </div>
                </form>
        </div>
    </div>



@stop
