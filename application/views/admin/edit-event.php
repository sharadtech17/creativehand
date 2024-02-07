<div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Events</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form  accept-charset="UTF-8" action="<?=base_url()?>EditEventPost" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="event_id" value="<?=$event->id?>">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-name-input">Event Title</label>
                                    <input type="text" class="form-control" name="name" id="manufacturer-name-input" value="<?=$event->name?>" placeholder="Event Title">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <label class="form-label" for="stocks-input">Artist Name</label>
                                <select class="form-select" id="choices-category-input" name="artist_id" data-choices data-choices-search-false>
                                    <option value="" selected disabled>Select Artist</option>
                                    <?php foreach($artistlist as $artist): ?>
                                        <option value="<?=$artist->id?>" <?=$artist->id==$event->artist_id ? 'selected' : '' ?>><?=$artist->name?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-brand-input">Event Details</label>
                                    <textarea class="form-control" id="ckeditor-classic" name="event_details" placeholder="Enter your Details" rows="3"><?=$event->event_details?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">Start Date</label>
                                <input type="date" class="form-control" id="stocks-input" name="start_date" placeholder="Stocks" required value="<?=$event->start_date ?>">
                                <div class="invalid-feedback">Please Enter a product stocks.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">End Date</label>
                                <input type="date" class="form-control" id="stocks-input" name="date" placeholder="Stocks" required value="<?=$event->date ?>">
                                <div class="invalid-feedback">Please Enter a product stocks.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="product-price-input">Time</label>
                                <div class="input-group has-validation mb-3">
                                    <input type="time" class="form-control" id="product-price-input" name="time"
                                        placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon"
                                        required value="<?=$event->time ?>">
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
                                        aria-describedby="product-discount-addon" value="<?=$event->address ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Type</label>
                                <input type="text" class="form-control" id="orders-input" name="event_type" placeholder="Event Type" required value="<?=$event->event_type ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Total Seat</label>
                                <input type="number" class="form-control" id="orders-input" name="total_seat" placeholder="Total Seat"
                                    required value="<?=$event->total_seat ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Ticket Price</label>
                                <input type="number" class="form-control" id="orders-input" name="ticket_price" placeholder="Ticket Price"
                                    required value="<?=$event->ticket_price ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Status</label>
                                <input type="number" class="form-control" id="orders-input" name="event_status" placeholder="Event Status"
                                    required value="<?=$event->event_status ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Event Banner</label>
                                <input type="file" class="form-control" id="orders-input" name="event_image" placeholder="Banner Event">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                            <img src="<?=base_url().$event->event_image?>" alt="" height="45">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">Google Loction Link</label>
                                <input type="link" class="form-control" id="orders-input" name="goolge_location_link" placeholder="Google Loction Link"
                                    required value="<?=$event->goolge_location_link ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub Link</label>
                                <input type="link" class="form-control" id="orders-input" name="youtube_link" placeholder="Link" required value="<?=$event->youtube_link ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="orders-input">YouTub video Details</label>
                                <input type="link" class="form-control" id="orders-input" name="youtube_video_desc" required value="<?=$event->youtube_video_desc ?>">
                                <div class="invalid-feedback">Please Enter a product orders.</div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <div>
                        <h5 class="fs-14 mb-1">Product Gallery</h5>
                        <p class="text-muted">Add Product Gallery Images.</p>
                                <input name="product_image[]" type="file" class="form-control" multiple="multiple">
                            <?php
                                $product_img_arr=json_decode($event->product_image);
                                if (!empty($product_img_arr)) {
                                    foreach ($product_img_arr as $value) {
                                        ?>
                                        <img src="<?=base_url().$value?>" alt="" height="45">
                                        <a class="btn btn-info" href="<?= base_url().'EventController/deleteGalleryImg/'.$event->id.'/0/'.$value ?>"><i class="ri-delete-bin-fill"></i></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="col-lg-3 col-sm-6 p-2">
                            <label class="form-label" for="stocks-input">Event Status</label>
                            <select class="form-select" id="choices-category-input" name="status" data-choices data-choices-search-false>
                                <option value="1" <?= $event->status==='1' ? 'selected' : '' ?>>Pandding</option>
                                <option value="0" <?= $event->status==='0' ? 'selected' : '' ?>>Approved</option>
                            </select>
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