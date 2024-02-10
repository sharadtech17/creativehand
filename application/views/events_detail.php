<!--=================== Main Content Container ===================-->
<main class="blog-page">
<section class="breadcrumb-container paira-margin-bottom-3">
            <div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
                <div class="container-fluid padding-fix">

                    <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                        <h1 class="" style="color:white;">Event Details</h1>
                        <li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
                                    class="fa fa-angle-right"></i></a>
                        </li>
                        <li class="" style="color:#c66b15;">Event Details</li>
                    </ul>
                </div>
            </div>
        </section>
    <section class="latest-blog paira-margin-bottom-3">
        <div class="container ">
            <div class="row">
                <section class="single-product paira-margin-bottom-3">
                    <div class="">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12 picture-container"
                                style="border-radius: 8px; padding: 30px;">
                                <div class="paira-product" style="border-color: black;">
                                    <div class="position-r pull-left  margin-bottom-40">
                                        <div class="col-md-12">
                                            <h3><?=$event->name?></h3>
                                            <h6><?=$event->event_type?></h6>
                                            <hr>
                                            <h6><i class="fa fa-user"></i> <?=$event->artistname?></h6>
                                        </div>
                                        <div class="paira-single-product-image">
                                            <img src="<?= base_url().$event->event_image?>" alt=""
                                                class="paira-product-image img-responsive" width="500px" height="auto">
                                        </div>
                                        <div>
                                            <h3 class="text-capitalize">Events Details</h3>
                                            <br>
                                            <?= $event->event_details ?>
                                        </div>
                                        <br>
                                        <div class="pull-left small-verient-product">
                                            <h3 class="text-capitalize">Gallery images</h3>
                                            <div class="col-md-12">
                                                <div style="display:flex ;gap: 2px; justify-content: space-evenly;margin-top: 20px;">
                                                    <?php
                                                        $galleryimage_arr=json_decode($event->product_image);
                                                        if (!empty($galleryimage_arr)) {
                                                            foreach ($galleryimage_arr as $value) {
                                                                ?>
                                                                <div>
                                                                    <a>
                                                                        <img onclick="showPopup(this.src)" src="<?=base_url().$value?>" alt="product-14" class="img-responsive center-block" />
                                                                    </a>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-6 ">

                                <div class="creat-account picture-container" style="padding: 5px !important;background-color:
                                             #c66b15;border-radius: 8px;">
                                    <br>
                                    <h3 style="text-align: left;">Event Video</h3>
                                    <hr>
                                    <div class="paira-product" style="padding-top: 50px;">
                                        <div class="position-r pull-left paira-single-product-image-wrp  margin-bottom-40">
                                            <div class="paira-single-product-image">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $event->youtube_link ?>" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p style="text-align: left; padding: 10px;">
                                            <?=$event->youtube_video_desc?>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="creat-account picture-container"
                                    style="padding: 10px !important; text-align: left;border-radius: 2%;">
                                    <h6>Price : <span> ₹<?=$event->ticket_price?></span></h6>
                                    <hr>
                                    <h6>Date : <span> <?= date('M d,Y', strtotime($event->date)) ?>
                                        </span></h6>
                                    <hr>
                                    <h6>Time :<span>
                                    <?=$event->time?></span></h6>
                                    <hr>
                                    <h6>Reg. Deadline : <span>June 1, 2023</span></h6>
                                    <hr>
                                    <h6>Address :<span> <?=$event->address?> </span></h6>
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">
                                            Register
                                        </button>
                                    </span>
                                </div>
                                <br>
                                <div>
                                    <iframe src="<?=$event->goolge_location_link?>" width="370" height="310" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <br>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
</main>