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
        <input type="hidden" class="form-control" name="artist_id" value="<?= $this->session->userdata['creativehandsartist']['usr_id']; ?>">
        <input type="hidden" class="form-control" name="is_artist" value="1">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-name-input">Event Title</label>
                                    <input type="text" class="form-control" name="name" id="manufacturer-name-input" placeholder="Event Title">
                                </div>
                            </div>
                            <div class="col-lg-9">
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
                                <label class="form-label" for="stocks-input">Start Date</label>
                                <input type="date" class="form-control" id="stocks-input" name="start_date" placeholder="Stocks" required>
                                <div class="invalid-feedback">Please Enter a product stocks.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">End Date</label>
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
                        <div class="col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="product-discount-input">City</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="city" placeholder="City" aria-label="discount" aria-describedby="product-discount-addon">
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
                                <label class="form-label" for="orders-input">Event Banner</label>
                                <input type="file" class="form-control" id="orders-input" name="banner_image" placeholder="Banner Event" required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Google Loction Link</label>
                                <input type="link" class="form-control" id="orders-input" name="goolge_location_link" placeholder="Google Loction Link"
                                    required>
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub Link</label>
                                <input type="link" class="form-control" id="orders-input" name="youtube_link" placeholder="Link">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub video Details</label>
                                <input type="link" class="form-control" id="orders-input" name="youtube_video_desc">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <div>
                        <h5 class="fs-14 mb-1">Product Gallery</h5>
                        <p class="text-muted">Add Product Gallery Images.</p>
                        <input name="product_image[]" class="form-control" type="file" multiple="multiple">
                    </div>
                    <div class="flex-shrink-0 m-2">
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