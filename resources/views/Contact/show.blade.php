@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact detail</li>
                    </ol>
                </nav>
            </div>

                <div class="col-6">
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="me-4 show-inverse">
                                @if(isset($contact->image))
                                    <img src="{{ asset("storage/".$contact->image) }}" width="162px" height="162px" id="inputImageFile" class="rounded rounded-circle " alt="">
                                @else
                                    <div class="rand-two" style="background:{{\App\Models\Contact::randBackgroundColor()}} ">{{ \Illuminate\Support\Str::substr($contact->firstName, 0, 1) }}</div>
                                @endif
                            </div>
                            <div class="">
                                <h2>{{ ucfirst($contact->firstName) }}  {{ ucfirst($contact->lastName) }}</h2>
                                <h5>{{ $contact->company }}</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end mb-3">
                            <div>
                                <div class="dropdown me-3">
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                    </a>

                                    <div class="dropdown-menu border-0 shadow py-2 px-1">
                                        <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" href="">
                                            <i class="bi bi-printer fs-6 me-1"></i>
                                            <span class="my-1">Print</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" href="">
                                            <i class="bi bi-cloud-arrow-down fs-6 me-1"></i>
                                            <span class="my-1">Export</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2 show ps-3 mb-3" href="">
                                            <i class="bi bi-archive fs-6 me-1"></i>
                                            <span class=" my-1">Hide From Contact</span>
                                        </a>

                                        <button class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" form="multipleFormCheck">
                                            <i class="bi bi-trash fs-6 me-1"></i>
                                            <span class="my-1">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('contact.edit',$contact->id) }}" class="btn btn-primary ">

                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="underline my-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">Contact details</h5>
                       <div class="d-flex align-items-center my-2">
                           <i class="bi bi-envelope fs-5 text-black-50 me-3"></i>
                           <h5 class="m-0">{{ $contact->email }}</h5>
                       </div>
                        <div class="d-flex align-items-center my-2">
                            <i class="bi bi-telephone fs-5 text-black-50 me-3"></i>
                            <h5 class="m-0">{{ $contact->phone }}</h5>
                        </div>

                        @if($contact->birthday == null )
                            <div class="d-flex align-items-center my-2">
                                <i class="bi bi-calendar3-event text-black-50 me-3"></i>
                                <a href="{{ route('contact.edit',$contact->id) }}"><span class="h5 text-black-50">Add Birthday</span></a>
                            </div>
                        @else
                            <div class="d-flex align-items-center my-2">
                                <i class="bi bi-calendar3-event text-black-50 me-3"></i>
                                <h5 class="m-0">{{ $contact->birthday }}</h5>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
