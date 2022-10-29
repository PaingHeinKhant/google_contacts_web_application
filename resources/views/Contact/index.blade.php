@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless">
                    <thead class="items rounded-3" >
                    <tr class="underline">
                        <th class=" m-0 h6 fw-bold d-flex align-items-center">
                            <form action="{{ route('multipleDestroy') }}" class="d-flex align-items-center "  id="multipleFormCheck"  method="post">
                                @csrf
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="checkbox" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                    </label>
                                </div>

                                <div class="dropdown me-3">
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-grid fs-5 text-black"></i>
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

                                        <button class=" list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" form="multipleFormCheck">
                                            <i class="bi bi-menu-button-wide-fill fs-6 me-1"></i>
                                            <span class="my-1" >Duplicate</span>
                                        </button>

                                        <button class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" form="multipleFormCheck">
                                            <i class="bi bi-trash fs-6 me-1"></i>
                                            <span class="my-1">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="">
                               Name
                           </div>
                        </th>
                        <th class="my-5 py-3 h6 fw-bold">Email</th>
                        <th class="my-5 py-3 h6 fw-bold">Phone Number</th>
                        <th class="my-5 py-3 h6 fw-bold">Job Title and Company</th>
                        <th></th>
                    </tr>
                    <span class="text-black-50">CONTACTS ( {{ \App\Models\Contact::count() }} )</span>
                    </thead>

                    <tbody>
                        @forelse($contacts as $contact)
                                <tr class="show">
                                    <td class="d-flex align-items-center my-1" >
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form me-3 ">
                                                <input class="form-check-input"  type="checkbox" name="multipleFormCheck[]"  form='multipleFormCheck' value="{{ $contact->id }}" id="formName{{$contact->id}}">
                                            </div>

                                            <div class="me-4 show-inverse">
                                                @if(isset($contact->image))
                                                    <img src="{{ asset("storage/".$contact->image) }}" width="36px" height="36px" id="inputImageFile" class="rounded rounded-circle " alt="">
                                                @else
                                                    <div class="rand" style="background:{{\App\Models\Contact::randBackgroundColor()}} ">{{ \Illuminate\Support\Str::substr($contact->firstName, 0, 1) }}</div>
                                                @endif
                                            </div>
                                            <label onClick=handleClick("{{route('contact.show',$contact->id)}}")>{{ ucfirst($contact->firstName) }}  {{ ucfirst($contact->lastName) }}</label>
                                        </div>
                                    </td>

                                    <td  class=" my-1" onClick=handleClick("{{route('contact.show',$contact->id)}}")>
                                        {{ $contact->email }}
                                    </td>
                                    <td  class=" my-1" onClick=handleClick("{{route('contact.show',$contact->id)}}")>
                                        {{ $contact->phone }}
                                    </td>
                                    <td  class=" my-1" onClick=handleClick("{{route('contact.show',$contact->id)}}")>
                                        {{ $contact->company }}
                                    </td>

                                    <td  class=" my-1 d-flex justify-content-between show-none">
                                        <a href="{{ route('contact.edit',$contact->id) }}">
                                            <i class="bi bi-pencil text-black"></i>
                                        </a>

{{--                                        <form action="{{ route('import') }}"--}}
{{--                                              method="POST"--}}
{{--                                              enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            <input type="file" name="file"--}}
{{--                                                   class="form-control">--}}
{{--                                            <br>--}}
{{--                                            <button class="btn btn-success">--}}
{{--                                                Import User Data--}}
{{--                                            </button>--}}

{{--                                        </form>--}}

                                        <div class="dropdown">
                                            <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                            </a>

                                            <div class="dropdown-menu border-0 shadow py-2 px-1">
                                                <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" href="">
                                                    <i class="bi bi-printer fs-6 me-1"></i>
                                                    <span class="my-1">Print</span>
                                                </a>
                                                <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" href="{{ route('export-contacts') }}">
                                                    <i class="bi bi-cloud-arrow-down fs-6 me-1"></i>
                                                    <span class="my-1">Export</span>
                                                </a>
                                                <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2 show ps-3 mb-3" href="">
                                                    <i class="bi bi-archive fs-6 me-1"></i>
                                                    <span class=" my-1">Hide From Contact</span>
                                                </a>


                                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class=" list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3">
                                                        <i class="bi bi-send fs-6 me-1"></i>
                                                        <span class="my-1" >Send</span>
                                                    </button>


                                                <form class="d-block" method="post"  action="{{ route('duplicate.clone',$contact->id) }}">
                                                    @csrf
                                                    <button type="submit" title="Delete"  class=" list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3">
                                                        <i class="bi bi-menu-button-wide-fill fs-6 me-1"></i>
                                                        <span class="my-1" >Duplicate</span>
                                                    </button>
                                                </form>

                                                <form class="d-block" method="POST"  action="{{ route('contact.destroy',$contact->id) }}">
                                                    @csrf
                                                   @method('delete')
                                                    <button type="submit" title="Delete"  class=" list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3">
                                                        <i class="bi bi-trash fs-6 me-1"></i>
                                                        <span class="my-1" >Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sent Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('store.store')}}" method="post">
                                                    @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="shareContact" value="{{ $contact->id }}">
                                                    <input type="email" placeholder="Sent Email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit"  class="btn btn-primary">Sent Contact</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @empty

                                    <tr>
                                        <td colspan=4 class="text-center">There is no Content</td>
                                    </tr>
                                </tr>
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
