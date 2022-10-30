@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless">
                    <thead class="items rounded-3" >
                    <tr class="underline">
                        <th></th>
                        <th class="my-5 py-3 h6 fw-bold">Sent Email</th>
                        <th class="my-5 py-3 h6 fw-bold">Name</th>
                        <th class="my-5 py-3 h6 fw-bold">Phone</th>
                        <th class="my-5 py-3 h6 fw-bold">Control</th>
                        <th></th>
                    </tr>
                    </thead>

{{--                    {{ \App\Models\Store::where("receiveUser",\Illuminate\Support\Facades\Auth::user()->email) }}--}}

                    <tbody>
                    @forelse($stores as $store)

                        {{ json_encode($store)  }}

{{--                        {{$store["shareContact"]}}--}}
                        <tr class="show" >
                            <td class="d-flex align-items-center my-1" >
                                <div class="d-flex align-items-center">
                                    <div class="form-check form me-3 ">
                                        <input class="form-check-input"  type="checkbox" name="multipleFormCheck[]"  form='multipleFormCheck' value="{{ $store->id }}" id="formName{{$store->id}}">
                                    </div>

                                    <div class="me-4 show-inverse">
                                        @if(isset($store->image))
                                            <img src="{{ asset("storage/".$store->image) }}" width="36px" height="36px" id="inputImageFile" class="rounded rounded-circle " alt="">
                                        @else
                                            <div class="rand" style="background:{{\App\Models\Contact::randBackgroundColor()}} ">{{ \Illuminate\Support\Str::substr($store->firstName, 0, 1) }}</div>
                                        @endif
                                    </div>
                                </div>
                                <label onClick=handleClick("{{route('contact.show',$store->id)}}")>{{ ucfirst($store->firstName) }}  {{ ucfirst($store->lastName) }}</label>
                            </td>
                            <td  class=" my-1" onClick=handleClick("{{route('store.show',$store->id)}}")>
                                {{ $store->sendUser }}
                            </td>

{{--                            @foreach($contacts as $contact)--}}
                            <td  class=" my-1" onClick=handleClick("{{route('store.show',$store->id)}}")>
                            </td>
                            <td  class=" my-1" onClick=handleClick("{{route('store.show',$store->id)}}")>
                                {{ $store->company }}
                            </td>

                            <td  class=" my-1 d-flex">
                                <a href="" class="btn btn-sm btn-danger me-3">
                                    Decline
                                </a>
                                <a href="" class="btn btn-sm btn-success">
                                    Accept
                                </a>
                            </td>
                    @empty

                        <tr>
                            <td colspan=4 class="text-center">There is no Content</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="">
{{--                    {{ $stores->onEachSide(2)->links() }}--}}
                </div>
            </div>
        </div>
    </div>
@stop
