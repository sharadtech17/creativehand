<div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Arts</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form  accept-charset="UTF-8" action="<?=base_url()?>editArtShopPost" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="artshop_id" value="<?= $artshop->id ?>">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title mb-0">Art Title :</h5>
                                    <input type="text" class="form-control" id="product-title-input" name="title"
                                        placeholder="Enter Art title" required value="<?= $artshop->title ?>">
                                    <div class="invalid-feedback">Please Enter a Art title.</div>
                                </div>
                                <div>
                                    <h5 class="card-title mb-0">Arts Description :</h5>
                                    <textarea class="form-control" name="description" id="ckeditor-classic">
                                        <?= $artshop->description ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arts Gallery</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">Arts Image</h5>
                                    <p class="text-muted">Add Arts main Image.</p>
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Select Image">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" value="" name="mainimage" id="product-image-input"
                                                    type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="<?=base_url().$artshop->mainimage?>" alt="" height="45">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="fs-14 mb-1">Arts Gallery</h5>
                                    <p class="text-muted">Add Arts Gallery Images.</p>

                                    <div class="dropzone">
                                        <div class="fallback">
                                            <input type="file" name="image_gallry[]" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                        <?php
                                            $galleryimage_arr=json_decode($artshop->galleryimage);
                                            if (!empty($galleryimage_arr)) {
                                                foreach ($galleryimage_arr as $value) {
                                                    ?>
                                                    <img src="<?=base_url().$value?>" alt="" height="45">
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    <!-- end dropzon-preview -->
                                </div>
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arts Categories</h5>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="stocks-input">Select Arts category</label>
                                <select class="form-select" id="categorySelect" name="category">
                                    <option value="" selected disabled>Select Arts category</option>
                                    <?php foreach($categorylist as $category): ?>
                                        <option value="<?=$category->id?>"  <?= $category->id==$artshop->category ? 'selected' : '' ?>><?=$category->categoriesname?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Sub Catagary</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select" id="subcategory" name="subcategory">
                                <option value="" selected disabled>Select Arts sub category</option>
                                    <?php foreach($subcategorylist as $subcategory): ?>
                                        <option value="<?=$subcategory['id']?>"  <?= $subcategory['id']===$artshop->subcategories ? 'selected' : '' ?>><?=$subcategory['subcategoriesname']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Artist selection</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select" name="artist_id" data-choices data-choices-search-false>
                                    <option value="" selected disabled>Select Artist</option>
                                    <?php foreach($artistlist as $artist): ?>
                                        <option value="<?=$artist->id?>"  <?= $artist->id==$artshop->artist_id ? 'selected' : '' ?>><?=$artist->name?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Feature Product</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select" id="feature_status" name="feature_status" data-choices data-choices-search-false>
                                    <option value="0"  <?= $artshop->feature_status==='0' ? 'selected' : '' ?>>No</option>
                                    <option value="1" <?= $artshop->feature_status==='1' ? 'selected' : '' ?>>Yes</option>
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Best Seller</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select" id="best_seller_status" name="best_seller_status" data-choices data-choices-search-false>
                                    <option value="0"  <?= $artshop->best_seller_status==='0' ? 'selected' : '' ?>>No</option>
                                    <option value="1" <?= $artshop->best_seller_status==='1' ? 'selected' : '' ?>>Yes</option>
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arts Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <input class="form-control" data-choices data-choices-multiple-remove="true"
                                            placeholder="Enter tags" type="text" name="tags" value="<?= $artshop->tags ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Price:</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <input class="form-control" name="price" data-choices data-choices-multiple-remove="true"
                                            placeholder="Enter Price" type="text" value="<?= $artshop->price ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Size:</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <input class="form-control" name="size" value="<?= $artshop->size ?>" data-choices data-choices-multiple-remove="true"
                                            placeholder="Enter Size" type="text" />
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Arts Short Description</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-2">Add short description for Arts</p>
                                <textarea class="form-control" name="shortdesc" placeholder="Must enter minimum of a 100 characters"
                                    rows="3"><?= $artshop->shortdescription ?></textarea>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </form>
        </div>