<footer id="footer2" class="d-flex position-relative bt">
    <div class="position-absolute top-100 w-100">
        <div class="container-lg pt-4 pb-3 mb-1">
            <a href="/policy" class="Forma-1-copy-13">Privacy policy</a><br>
            <!-- <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#popup22">contact us</a> -->
        </div>
    </div>
</footer>
<div id="popup22" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header pb-0 border-bottom-0">
                <p class="mb-0 fs20">contact Us</p>
                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
            </div>
            <form class="m-0" method="post" enctype="multipart/form-data">
                <div class="modal-body pb-0">
                    <p class="mb-1">Name*</p>
                    <input type="text" class="popup" name="" value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}" disabled>
                    <p class="mb-1 mt-3">Email Address*</p>
                    <input type="email" class="popup" name="" value="{{Auth::user()->email}}" disabled>
                    <p class="mb-1 mt-3">Subject*</p>
                    <input type="text" class="popup" name="subject" placeholder="Enter your subject">
                    <p class="mb-1 mt-3">Message*</p>
                    <textarea class="popup1" rows="4" name="message" placeholder="Enter your message"></textarea>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                    </button>
                    <button type="submit" name='contact' class="col-example7" data-bs-dismiss="modal">Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>