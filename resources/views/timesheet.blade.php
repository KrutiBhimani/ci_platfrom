@extends('layouts.home_header2')
@section('content')
    <div id="popup1" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-header pb-0 border-bottom-0">
                    <p class="mb-0 fs20">Please input below Volunteering Hours</p>
                    <img class="text-end mt-2 mb-2 h13 pe-auto" src="mvc/Assets/images/cancel1.png" data-bs-dismiss="modal">
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body pb-0">
                        <p class="mb-1">Mission</p>
                        <select class="popup pt-0 pb-0" name="mission_id">
                            <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                            <option value="91">Grow Trees – On the path to environment sustainability</option>
                            <option value="92">Education Supplies for Every Pair of Shoes Sold</option>
                            <option value="93">Nourish the Children in African country</option>
                            <option value="94">CSR initiative stands for Coffee and Farmer Equity</option>
                            <option value="97">Grow Trees – On the path to environment sustainability</option>
                            <option value="98">Education Supplies for Every Pair of Shoes Sold</option>
                            <option value="99">Nourish the Children in African country</option>
                        </select>
                        <p class="mb-1 mt-3">Date Volunteered</p>
                        <input type="date" name="date_volunteered" class="popup" value="Select date">
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 mt-3">Hours</p>
                                <input type="number" class="popup" name="h" placeholder="Enter Spent Hours">
                            </div>
                            <div class="col">
                                <p class="mb-1 mt-3">Minute</p>
                                <input type="number" class="popup" name="m" placeholder="Enter Spent Minutes">
                            </div>
                        </div>
                        <p class="mb-1 mt-3">Message</p>
                        <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="submit" name="add_hours" class="col-example7" data-bs-dismiss="modal">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="popup2" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-header pb-0 border-bottom-0">
                    <p class="mb-0 fs20">Please input below Volunteering Goal</p>
                    <img class="text-end mt-2 mb-2 h13 pe-auto" src="mvc/Assets/images/cancel1.png" data-bs-dismiss="modal">
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body pb-0">
                        <p class="mb-1">Mission</p>
                        <select class="popup pt-0 pb-0" name="mission_id">
                            <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                            <option value="95">Animal welfare &amp; save birds campaign</option>
                            <option value="96">Plantation and Afforestation program</option>
                        </select>
                        <p class="mb-1 mt-3">Date Volunteered</p>
                        <input type="date" name="date_volunteered" class="popup">
                        <p class="mb-1 mt-3">Action</p>
                        <input type="text" class="popup" name="action" placeholder="Enter Action">
                        <p class="mb-1 mt-3">Message</p>
                        <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="submit" name="add_goals" class="col-example7" data-bs-dismiss="modal">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <p class="fs-2 fw-light pt-5">Volunteering Timesheet</p>
        <div class="row">
            <div class="col m-2 pb-5 brbs">
                <div class="d-flex justify-content-between mb-4 mt-4">
                    <p class="ps-3 m-0">Volunteering Hours</p>
                    <button data-bs-toggle="modal" data-bs-target="#popup1" type="button"
                        class="col-example7 ps-2 pe-2 pt-1 pb-1">
                        <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                        Add
                    </button>
                </div>
                <div id="popupdelete9" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-2">
                            <div class="modal-header pb-0 border-bottom-0">
                                <p class="mb-0 fs20">Confirm Delete</p>
                                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                            </div>
                            <form method="post" enctype="multipart/form-data"></form>
                            <input type="text" value="16" name="timesheet_id" hidden="">
                            <div class="modal-body pb-0">
                                <p class="mb-1">Are you sure you want to delete this item?</p>
                            </div>
                            <div class="modal-footer border-top-0">
                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                </button>
                                <button type="submit" name="delete_hours" class="col-example7"
                                    data-bs-dismiss="modal">Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popupedit9" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-2">
                            <div class="modal-header pb-0 border-bottom-0">
                                <p class="mb-0 fs20">Please input below Volunteering Hours</p>
                                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                            </div>
                            <form method="post" enctype="multipart/form-data"></form>
                            <input type="text" value="16" name="timesheet_id" hidden="">
                            <div class="modal-body pb-0">
                                <p class="mb-1">Mission</p>
                                <select class="popup pt-0 pb-0" name="mission_id">
                                    <option value="none" selected="" disabled="" hidden="">Select your
                                        mission</option>
                                    <option value="91">Grow Trees – On the path to environment sustainability</option>
                                    <option value="92">Education Supplies for Every Pair of Shoes Sold</option>
                                    <option value="93">Nourish the Children in African country</option>
                                    <option value="94">CSR initiative stands for Coffee and Farmer Equity</option>
                                    <option value="97">Grow Trees – On the path to environment sustainability</option>
                                    <option value="98">Education Supplies for Every Pair of Shoes Sold</option>
                                    <option value="99">Nourish the Children in African country</option>
                                    <option value="">df</option>
                                    <option value="">df</option>
                                    <option value="">gfd</option>
                                </select>
                                <p class="mb-1 mt-3">Date Volunteered</p>
                                <input type="date" name="date_volunteered" value="2023-02-01" class="popup">
                                <div class="row">
                                    <div class="col">
                                        <p class="mb-1 mt-3">Hours</p>
                                        <input type="number" class="popup" name="h" value="05"
                                            placeholder="Enter Spent Hours">
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 mt-3">Minute</p>
                                        <input type="number" class="popup" name="m" value="30"
                                            placeholder="Enter Spent Minutes">
                                    </div>
                                </div>
                                <p class="mb-1 mt-3">Message</p>
                                <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                            </div>
                            <div class="modal-footer border-top-0">
                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                </button>
                                <button type="submit" name="edit_hours" class="col-example7"
                                    data-bs-dismiss="modal">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="w-100">
                    <thead>
                        <tr>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Mission
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Date
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Hours
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Minutes
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pt-3 ps-0 fs111">Nourish the Children in African country</td>
                            <td class="pt-3 ps-2 fs111">29/01/2023</td>
                            <td class="pt-3 ps-2 fs111">02h</td>
                            <td class="pt-3 ps-2 fs111">45min</td>
                            <td class="pt-3 ps-2 fs111">
                                <button class="p-0 border-0 bgw" data-bs-toggle="modal" data-bs-target="#popupedit9"
                                    type="button">
                                    <i class="fa fa-pencil-square-o co fs20" aria-hidden="true"></i>
                                </button>
                                <button class="p-0 border-0 bgw" data-bs-toggle="modal" data-bs-target="#popupdelete9"
                                    type="button">
                                    <i class="fa fa-trash-o text-dark fs20" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col m-2 pb-5 brbs">
                <div class="d-flex justify-content-between mb-4 mt-4">
                    <p class="ps-3 m-0">Volunteering Goals</p>
                    <button data-bs-toggle="modal" data-bs-target="#popup2" type="button"
                        class="col-example7 ps-2 pe-2 pt-1 pb-1">
                        <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                        Add
                    </button>
                </div>
                <div id="popupdelete4" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-2">
                            <div class="modal-header pb-0 border-bottom-0">
                                <p class="mb-0 fs20">Confirm Delete</p>
                                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                            </div>
                            <form method="post" enctype="multipart/form-data"></form>
                            <input type="text" value="15" name="timesheet_id" hidden="">
                            <div class="modal-body pb-0">
                                <p class="mb-1">Are you sure you want to delete this item?</p>
                            </div>
                            <div class="modal-footer border-top-0">
                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                </button>
                                <button type="submit" name="delete_hours" class="col-example7"
                                    data-bs-dismiss="modal">Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popupedit4" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-2">
                            <div class="modal-header pb-0 border-bottom-0">
                                <p class="mb-0 fs20">Please input below Volunteering Goal</p>
                                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                            </div>
                            <form method="post" enctype="multipart/form-data"></form>
                            <input type="text" value="15" name="timesheet_id" hidden="">
                            <div class="modal-body pb-0">
                                <p class="mb-1">Mission</p>
                                <select class="popup pt-0 pb-0" name="mission_id">
                                    <option value="none" selected="" disabled="" hidden="">Select your
                                        mission</option>
                                    <option value="95" selected="">Animal welfare &amp; save birds campaign
                                    </option>
                                    <option value="96">Plantation and Afforestation program</option>
                                </select>
                                <p class="mb-1 mt-3">Date Volunteered</p>
                                <input type="date" name="date_volunteered" value="2023-02-01" class="popup">
                                <p class="mb-1 mt-3">Action</p>
                                <input type="text" class="popup" name="action" value="2"
                                    placeholder="Enter Action">
                                <p class="mb-1 mt-3">Message</p>
                                <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">rfdg</textarea>
                            </div>
                            <div class="modal-footer border-top-0">
                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                </button>
                                <button type="submit" name="edit_goals" class="col-example7"
                                    data-bs-dismiss="modal">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="w-100">
                    <thead>
                        <tr>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Mission
                            </td>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Date
                            </td>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Action
                            </td>
                            <td class="pt-3 ps-3 pb-1 pe-3 font-weight-bold fs14" scope="col">
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pt-3 ps-3 fs111">Animal welfare &amp; save birds campaign</td>
                            <td class="pt-3 ps-3 fs111">02/02/2023</td>
                            <td class="pt-3 ps-3 fs111">3</td>
                            <td class="pt-3 ps-3 fs111">
                                <button class="p-0 border-0 bgw" data-bs-toggle="modal" data-bs-target="#popupedit4"
                                    type="button">
                                    <i class="fa fa-pencil-square-o co fs20" aria-hidden="true"></i>
                                </button>
                                <button class="p-0 border-0 bgw" data-bs-toggle="modal" data-bs-target="#popupdelete4"
                                    type="button">
                                    <i class="fa fa-trash-o text-dark fs20" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
