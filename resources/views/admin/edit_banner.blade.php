@extends('layouts.admin_header')

@section('content')
<br/>
<form class="m-3" method="post" enctype="multipart/form-data">
    <table class="table table-borderless" style="border: 1px solid #dee2e6;">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Add</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <p class="mb-1" style="font-size:14px;">Title</p>
                    <input type="text" name="title" class="popup" value="Sed ut perspiciatis unde omnis<br/>iste natus voluptatem." required="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Description</p>
                    <textarea rows="5" name="text" class="popup1" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." required="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                    <p class="mb-1 mt-4" style="font-size:14px;">Sort Order</p>
                    <input type="number" name="sort_order" class="popup" value="1" required="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Image</p>
                    <img class="m-2" style="height:50px" src="mvc/Assets/uplodes/Grow-Trees-On-the-path-to-environment-sustainability-login.png">
                    <input type="file" name="image" value="">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2" href="#" style="font-size:calc(13px + 0.1vw);">
            cancel
        </a>
        <button class="col-example mt-4 mb-4" name="edit_banner" type="submit" style="font-size:calc(13px + 0.1vw);">
            save
        </button>
    </div>
</form>
@endsection