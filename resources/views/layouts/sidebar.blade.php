<div class="sidebar">
    <div class=" rounded my-3 mx-4 py-2 px-4 rounded-pill ">
        <a class="list-group-item list-group-item-action d-flex align-items-center ps-3 shadow px-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus fs-1"></i>
            <span class="h6 fw-bold m-0 p-0 letter-spacing">Create New</span>
        </a>
    </div>


    <div class="list-group mb-3 underline">
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="">
            <i class="bi bi-box fs-4 me-3"></i>
            <span class="h6 my-1">Receive</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="{{route('sent.index')}}">
            <i class="bi bi-send fs-4 me-3 "></i>
            <span class="h6 my-1">Sent</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 mb-3" href="">
            <i class="bi bi-star fs-4 me-3"></i>
            <span class="h6 my-1">Starred</span>
        </a>
    </div>

    <div class="list-group mb-3 underline">
{{--        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="">--}}
{{--            <i class="bi bi-archive fs-4 me-3"></i>--}}
{{--            <span class="h6 my-1">Other contacts</span>--}}
{{--        </a>--}}
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 mb-3" href="">
            <i class="bi bi-trash fs-4 me-3"></i>
            <span class="h6 my-1">Trash</span>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</div>



