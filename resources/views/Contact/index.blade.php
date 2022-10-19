@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless">
                    <thead class="underline">
                    <tr>
                        <th class="my-5 py-3" h6 fw-bold">Name</th>
                        <th class="my-5 py-3" h6 fw-bold">Email</th>
                        <th class="my-5 py-3" h6 fw-bold">Phone Number</th>
                        <th class="my-5 py-3" h6 fw-bold">Job Title and Company</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($contacts as $contact)
                        <a href="{{ route('contact.show',$contact->id) }}">
                            <tr class="show">
                                <td class="d-flex align-items-center my-1">
                                    <div class="me-4">
                                        @if(isset($contact->image))
                                            <img src="{{ asset("storage/".$contact->image) }}" width="36px" height="36px" id="inputImageFile" class="rounded rounded-circle " alt="">
                                        @else
                                            <img src="https://ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"  id="inputImageFile" width="36px" height="36px" class="rounded rounded-circle " alt="">
                                        @endif
                                    </div>
                                    {{ $contact->firstName }}  {{ $contact->lastName }}
                                </td>
                                <td  class=" my-1">
                                    {{ $contact->email }}
                                </td>
                                <td  class=" my-1">
                                    {{ $contact->phone }}
                                </td>
                                <td  class=" my-1">
                                    {{ $contact->company }}
                                </td>
                                <td  class=" my-1 d-flex justify-content-between show-none">
                                    <a href="{{ route('contact.edit',$contact->id) }}">
                                        <i class="bi bi-pencil text-black"></i>
                                    </a>

                                    <div class="dropdown">
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

                                            <form action="{{ route('contact.destroy',$contact->id) }}" class="d-block" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3">
                                                    <i class="bi bi-trash fs-6 me-1"></i>
                                                    <span class="my-1">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td>

                            @empty

                                <tr>
                                    <td colspan=5 class="text-center">There is no menu</td>
                                </tr>
                                </tr>
                        </a>
                    @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $contacts->onEachSide(2)->links() }}
                </div>
            </div>
        </div>
    </div>



@stop
