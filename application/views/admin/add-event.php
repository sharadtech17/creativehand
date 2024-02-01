<div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Events</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form  accept-charset="UTF-8" action="<?=base_url()?>addEventPost" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-name-input">Event Title</label>
                                    <input type="text" class="form-control" name="name" id="manufacturer-name-input" required placeholder="Event Title">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <label class="form-label" for="stocks-input">Artist Name</label>
                                <select class="form-select" id="choices-category-input" name="artist_id" required data-choices data-choices-search-false>
                                    <option value="" selected disabled>Select Artist</option>
                                    <?php foreach($artistlist as $artist): ?>
                                        <option value="<?=$artist->id?>"><?=$artist->name?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-brand-input">Event Details</label>
                                    <textarea class="form-control" id="ckeditor-classic" name="event_details" placeholder="Enter your Details" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">Date</label>
                                <input type="date" class="form-control" id="stocks-input" name="date" placeholder="Stocks" required>
                                <div class="invalid-feedback">Please Enter a product stocks.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="product-price-input">Time</label>
                                <div class="input-group has-validation mb-3">
                                    <input type="time" class="form-control" id="product-price-input" name="time"
                                        placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon"
                                        required>
                                    <div class="invalid-feedback">Please Enter a product price.</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="product-discount-input">Venue / Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="product-discount-input" name="address"
                                        placeholder="Address" aria-label="discount"
                                        aria-describedby="product-discount-addon">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Type</label>
                                <input type="text" class="form-control" id="orders-input" name="event_type" placeholder="Event Type" required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Total Seat</label>
                                <input type="number" class="form-control" id="orders-input" name="total_seat" placeholder="Total Seat"
                                    required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Ticket Price</label>
                                <input type="number" class="form-control" id="orders-input" name="ticket_price" placeholder="Ticket Price"
                                    required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Status</label>
                                <input type="number" class="form-control" id="orders-input" name="event_status" placeholder="Event Status"
                                    required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Banner</label>
                                <input type="file" class="form-control" id="orders-input" name="banner_image" placeholder="Banner Event" required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Google Loction Link</label>
                                <input type="text" class="form-control" id="orders-input" name="goolge_location_link" placeholder="Google Loction Link"
                                    required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub Link</label>
                                <input type="text" class="form-control" id="orders-input" name="youtube_link" placeholder="Link" required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub video Details</label>
                                <input type="text" class="form-control" id="orders-input" name="youtube_video_desc" required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <div>
                        <h5 class="fs-14 mb-1">Product Gallery</h5>
                        <p class="text-muted">Add Product Gallery Images.</p>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="product_image[]" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->

                            </li>
                        </ul>
                        <!-- end dropzon-preview -->
                    </div>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-primary" type="submit" >Submit</button>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end tab pane -->
            </div>
        </form>
        <!-- end tab content -->
    </div>