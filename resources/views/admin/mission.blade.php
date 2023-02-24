@extends('layouts.admin_header')

@section('content')
<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Mission</a>
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
        <a class="col-example1" href="add_mission" style="font-size:calc(12px + 0.15vw); padding-top: 7px;">
        <i class="fa fa-plus me-2" aria-hidden="true"></i>
        Add
        </a>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Type</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Start Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">End Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">Grow Trees – On the path to environment sustainability</td>
                            <td class="p-3 pe-0" style="font-size:13px;">TIME</td>
                            <td class="p-3 pe-0" style="font-size:13px;">2019-01-10 17:46:59</td>
                            <td class="p-3 pe-0" style="font-size:13px;">2023-02-24 17:47:31</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_mission"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete91" type="button" style="border:none;background-color:white;">
                                <i class="fa fa-trash-o text-dark" aria-hidden="true"></i>
                                </button>
                                <div id="popupdelete91" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="91" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer" style="border-top:0 ;">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="mission?source=delete_mission&amp;delete=OTFTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">Education Supplies for Every Pair of Shoes Sold</td>
                            <td class="p-3 pe-0" style="font-size:13px;">TIME</td>
                            <td class="p-3 pe-0" style="font-size:13px;">2019-01-10 17:53:07</td>
                            <td class="p-3 pe-0" style="font-size:13px;">2023-02-24 17:53:26</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_mission"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete92" type="button" style="border:none;background-color:white;">
                                <i class="fa fa-trash-o text-dark" aria-hidden="true"></i>
                                </button>
                                <div id="popupdelete92" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="92" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer" style="border-top:0 ;">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="mission?source=delete_mission&amp;delete=OTJTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">Nourish the Children in African country</td>
                            <td class="p-3 pe-0" style="font-size:13px;">TIME</td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_mission"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete93" type="button" style="border:none;background-color:white;">
                                <i class="fa fa-trash-o text-dark" aria-hidden="true"></i>
                                </button>
                                <div id="popupdelete93" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="93" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer" style="border-top:0 ;">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="mission?source=delete_mission&amp;delete=OTNTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">CSR initiative stands for Coffee and Farmer Equity</td>
                            <td class="p-3 pe-0" style="font-size:13px;">TIME</td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_mission"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete94" type="button" style="border:none;background-color:white;">
                                <i class="fa fa-trash-o text-dark" aria-hidden="true"></i>
                                </button>
                                <div id="popupdelete94" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="94" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer" style="border-top:0 ;">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="mission?source=delete_mission&amp;delete=OTRTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">Animal welfare &amp; save birds campaign</td>
                            <td class="p-3 pe-0" style="font-size:13px;">GOAL</td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0" style="font-size:13px;"></td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_mission"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete95" type="button" style="border:none;background-color:white;">
                                <i class="fa fa-trash-o text-dark" aria-hidden="true"></i>
                                </button>
                                <div id="popupdelete95" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="95" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer" style="border-top:0 ;">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="mission?source=delete_mission&amp;delete=OTVTRUNSRVRfU1RVRkY=" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pager justify-content-end">
                        <li class="page-item"><a class="page-link active text-center" href="mission?page=1" style="border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;"><b>1</b></a></li>
                        <li class="page-item"><a class="page-link text-center" href="mission?page=2" style="border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px; color:black;">2</a></li>
                        <li class="page-item"><a class="page-link" href="mission?page=2" style="border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;"><img src="/storage/images/arrow.png" alt=""></a></li>
                        <li class="page-item"><a class="page-link" href="mission?page=2" style="border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;"><img src="/storage/images/next.png" alt=""></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection