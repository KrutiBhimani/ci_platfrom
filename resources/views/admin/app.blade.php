@extends('layouts.admin_header')

@section('content')
<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Mission
            Application</a>
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
        <div class="table-responsive">
            <div class="tab-pane show active" id="userc">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Applied Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">Nourish the Children in African country</td>
                            <td class="p-3 pe-0" style="font-size:13px;">93</td>
                            <td class="p-3 pe-0" style="font-size:13px;">63</td>
                            <td class="p-3 pe-0" style="font-size:13px;">bansi patel</td>
                            <td class="p-3 pe-0" style="font-size:13px;">02/02/2023</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a onclick="javascript:return confirm('Are you sure to change status to approve?');" href="app?source=edit_app&amp;user=63&amp;edit=NDdTRUNSRVRfU1RVRkY="><i class="fa fa-check-circle-o pe-2" style="color: #14c506;" aria-hidden="true"></i></a>
                                <a onclick="javascript:return confirm('Are you sure to change status to decline?');" href="app?source=delete_app&amp;user=63&amp;delete=NDdTRUNSRVRfU1RVRkY="><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pager justify-content-end">
                        <li class="page-item"><a class="page-link active text-center" href="app?page=1" style="border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;"><b>1</b></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection