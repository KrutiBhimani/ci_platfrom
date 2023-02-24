@extends('layouts.admin_header')

@section('content')
<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Story</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" method="post" enctype="multipart/form-data">
            <div style="border: 2px solid #dee2e6; border-radius:5px;">
                <div class="input-group">
                    <span class="input-group-text" style="background-color:transparent; border:none;">
                    <img src="/storage/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" placeholder="search" class="form-control" style="border:none;border-radius:5px;background-color:transparent;">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Story Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Full Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">gbbb</td>
                            <td class="p-3 pe-0" style="font-size:13px;">hardi bhimani</td>
                            <td class="p-3 pe-0" style="font-size:13px;">Education Supplies for Every Pair of Shoes Sold</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="story?source=view_story&amp;view=NDJTRUNSRVRfU1RVRkY=" class="col-example13" style="background-color: white;">View</a>
                                <a onclick="javascript:return confirm('Are you sure to change status to approve?');" href="story?source=approve_story&amp;user=29&amp;edit=NDJTRUNSRVRfU1RVRkY="><i class="fa fa-check-circle-o pe-2" style="color: #14c506;" aria-hidden="true"></i></a>
                                <a onclick="javascript:return confirm('Are you sure to change status to decline?');" href="story?source=decline_story&amp;user=29&amp;edit=NDJTRUNSRVRfU1RVRkY="><i class="fa fa-times-circle-o text-danger pe-2" aria-hidden="true"></i></a>
                                <div id="popup42" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete </p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <div class="modal-body pb-0">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer mt-3 justify-content-center" style="border-top:0 ;">
                                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                </button>
                                                <a href="story?source=delete_story&amp;delete=NDJTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup42"><i class="fa fa-trash-o text-dark" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0" style="font-size:13px;">hardi bhimani</td>
                            <td class="p-3 pe-0" style="font-size:13px;">Grow Trees – On the path to environment sustainability</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="story?source=view_story&amp;view=NDNTRUNSRVRfU1RVRkY=" class="col-example13" style="background-color: white;">View</a>
                                <a onclick="javascript:return confirm('Are you sure to change status to approve?');" href="story?source=approve_story&amp;user=29&amp;edit=NDNTRUNSRVRfU1RVRkY="><i class="fa fa-check-circle-o pe-2" style="color: #14c506;" aria-hidden="true"></i></a>
                                <a onclick="javascript:return confirm('Are you sure to change status to decline?');" href="story?source=decline_story&amp;user=29&amp;edit=NDNTRUNSRVRfU1RVRkY="><i class="fa fa-times-circle-o text-danger pe-2" aria-hidden="true"></i></a>
                                <div id="popup43" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete </p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <div class="modal-body pb-0">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer mt-3 justify-content-center" style="border-top:0 ;">
                                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                </button>
                                                <a href="story?source=delete_story&amp;delete=NDNTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup43"><i class="fa fa-trash-o text-dark" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pager justify-content-end">
                        <li class="page-item"><a class="page-link active text-center" href="story?page=1" style="border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;"><b>1</b></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection