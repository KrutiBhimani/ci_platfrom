@extends('layouts.home_header2')
@section('content')
<div class="container-lg">
    <p class="fs-2 fw-light pt-5">Volunteering Timesheet</p>
    <div class="row">
        <div class="col m-2 pb-5 " style="border: 1px solid #dee2e6; border-radius: 5px;">
            <div class="d-flex justify-content-between mb-4 mt-4">
                <p class="ps-3 m-0" style="font-size:13px;">Volunteering Hours</p>
                <button data-bs-toggle="modal" data-bs-target="#popup1" type="button" class="col-example7 ps-2 pe-2 pt-1 pb-1" style="font-size:13px;">
                    <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                    Add
                </button>

            </div>
            <div id="popupdelete9" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="9" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit9" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Hours</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="9" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="91">Grow Trees – On the path to environment sustainability</option>
                                                                                                        <option value="92">Education Supplies for Every Pair of Shoes Sold</option>
                                                                                                        <option value="93" selected="">Nourish the Children in African country</option>
                                                                                                        <option value="94">CSR initiative stands for Coffee and Farmer Equity</option>
                                                                                                        <option value="97">Grow Trees – On the path to environment sustainability</option>
                                                                                                        <option value="98">Education Supplies for Every Pair of Shoes Sold</option>
                                                                                                        <option value="99">Nourish the Children in African country</option>
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">gfd</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-01-29" class="popup">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Hours</p>
                                                    <input type="number" class="popup" name="h" value="02" placeholder="Enter Spent Hours">
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Minute</p>
                                                    <input type="number" class="popup" name="m" value="45" placeholder="Enter Spent Minutes">
                                                </div>
                                            </div>
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">rtf</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_hours" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupdelete13" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="13" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit13" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Hours</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="13" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="91">Grow Trees – On the path to environment sustainability</option>
                                                                                                        <option value="92">Education Supplies for Every Pair of Shoes Sold</option>
                                                                                                        <option value="93">Nourish the Children in African country</option>
                                                                                                        <option value="94" selected="">CSR initiative stands for Coffee and Farmer Equity</option>
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
                                                    <input type="number" class="popup" name="h" value="02" placeholder="Enter Spent Hours">
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Minute</p>
                                                    <input type="number" class="popup" name="m" value="01" placeholder="Enter Spent Minutes">
                                                </div>
                                            </div>
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">bgngv</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_hours" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupdelete14" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="14" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit14" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Hours</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="14" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="91">Grow Trees – On the path to environment sustainability</option>
                                                                                                        <option value="92">Education Supplies for Every Pair of Shoes Sold</option>
                                                                                                        <option value="93">Nourish the Children in African country</option>
                                                                                                        <option value="94" selected="">CSR initiative stands for Coffee and Farmer Equity</option>
                                                                                                        <option value="97">Grow Trees – On the path to environment sustainability</option>
                                                                                                        <option value="98">Education Supplies for Every Pair of Shoes Sold</option>
                                                                                                        <option value="99">Nourish the Children in African country</option>
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">gfd</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-01-30" class="popup">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Hours</p>
                                                    <input type="number" class="popup" name="h" value="02" placeholder="Enter Spent Hours">
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Minute</p>
                                                    <input type="number" class="popup" name="m" value="02" placeholder="Enter Spent Minutes">
                                                </div>
                                            </div>
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">fsfsfd</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_hours" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupdelete16" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="16" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit16" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Hours</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="16" name="timesheet_id" hidden="">
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
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">df</option>
                                                                                                        <option value="">gfd</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-02-01" class="popup">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Hours</p>
                                                    <input type="number" class="popup" name="h" value="05" placeholder="Enter Spent Hours">
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 mt-3">Minute</p>
                                                    <input type="number" class="popup" name="m" value="30" placeholder="Enter Spent Minutes">
                                                </div>
                                            </div>
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_hours" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><table class="w-100">
                <thead>
                    <tr>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:12px; font-weight: bold;">Mission
                        </td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;">Date</td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;">Hours</td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;">Minutes
                        </td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;"></td>
                    </tr>
                </thead>
                <tbody>

                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">Nourish the Children in African country</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">29/01/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">02h</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">45min</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit9" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete9" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">CSR initiative stands for Coffee and Farmer Equity</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">01/02/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">02h</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">01min</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit13" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete13" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">CSR initiative stands for Coffee and Farmer Equity</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">30/01/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">02h</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">02min</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit14" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete14" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">Animal welfare &amp; save birds campaign</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">01/02/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">05h</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">30min</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit16" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete16" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                    </tbody>
            </table>
        </div>
        <div class="col m-2 pb-5" style="border: 1px solid #dee2e6; border-radius: 5px;">
            <div class="d-flex justify-content-between mb-4 mt-4">
                <p class="ps-3 m-0" style="font-size:13px;">Volunteering Goals</p>
                <button data-bs-toggle="modal" data-bs-target="#popup2" type="button" class="col-example7 ps-2 pe-2 pt-1 pb-1" style="font-size:13px;">
                    <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                    Add
                </button>
            </div>
            <div id="popupdelete4" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="4" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit4" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Goal</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="4" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="95" selected="">Animal welfare &amp; save birds campaign</option>
                                                                                                        <option value="96">Plantation and Afforestation program</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-02-02" class="popup">
                                            <p class="mb-1 mt-3">Action</p>
                                            <input type="text" class="popup" name="action" value="3" placeholder="Enter Action">
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">hfghfgh</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_goals" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupdelete6" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="6" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit6" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Goal</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="6" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="95" selected="">Animal welfare &amp; save birds campaign</option>
                                                                                                        <option value="96">Plantation and Afforestation program</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-01-31" class="popup">
                                            <p class="mb-1 mt-3">Action</p>
                                            <input type="text" class="popup" name="action" value="1" placeholder="Enter Action">
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">rtrdtrte</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_goals" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupdelete15" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Confirm Delete</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="15" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Are you sure you want to delete this item?</p>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="delete_hours" class="col-example7" data-bs-dismiss="modal">Delete
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><div id="popupedit15" class="modal" style="--bs-modal-width:900px;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0" style="border-bottom:0 ;">
                                        <p class="mb-0" style="font-size:20px ;">Please input below Volunteering Goal</p>
                                        <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                    </div>
                                    <form method="post" enctype="multipart/form-data"></form>
                                        <input type="text" value="15" name="timesheet_id" hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1">Mission</p>
                                            <select class="popup pt-0 pb-0" name="mission_id">
                                                <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                                                                                                        <option value="95" selected="">Animal welfare &amp; save birds campaign</option>
                                                                                                        <option value="96">Plantation and Afforestation program</option>
                                                                                            </select>
                                            <p class="mb-1 mt-3">Date Volunteered</p>
                                            <input type="date" name="date_volunteered" value="2023-02-01" class="popup">
                                            <p class="mb-1 mt-3">Action</p>
                                            <input type="text" class="popup" name="action" value="2" placeholder="Enter Action">
                                            <p class="mb-1 mt-3">Message</p>
                                            <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">rfdg</textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top:0 ;">
                                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" name="edit_goals" class="col-example7" data-bs-dismiss="modal">Submit
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div><table class="w-100">
                <thead>
                    <tr>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:12px; font-weight: bold;">Mission
                        </td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;">Date</td>
                        <td class="pt-3 ps-3 pb-1" scope="col" style="font-size:13px; font-weight: bold;">Action</td>
                        <td class="pt-3 ps-3 pb-1 pe-3" scope="col" style="font-size:13px; font-weight: bold;"></td>
                    </tr>
                </thead>
                <tbody>
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">Animal welfare &amp; save birds campaign</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">02/02/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">3</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit4" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete4" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">Animal welfare &amp; save birds campaign</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">31/01/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">1</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit6" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete6" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                            <tr>
                            <td class="pt-3 ps-3" style="font-size:11px;">Animal welfare &amp; save birds campaign</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">01/02/2023</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">2</td>
                            <td class="pt-3 ps-3" style="font-size:11px;">
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupedit15" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-pencil-square-o" style="color: #f88634; font-size:15px" aria-hidden="true"></i>
                                </button>
                                <button class="p-0" data-bs-toggle="modal" data-bs-target="#popupdelete15" type="button" style="border:none;background-color:white;">
                                    <i class="fa fa-trash-o text-dark" style="font-size:15px" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
                                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection