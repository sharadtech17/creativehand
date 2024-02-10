 <!--=================== Main Content Container ===================-->
 <main class="product-page">
         <section class="breadcrumb-container paira-margin-bottom-3">
            <div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
                <div class="container-fluid padding-fix">

                    <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                        <h1 class="" style="color:white;">Hand Made Arts Details</h1>
                        <li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
                                    class="fa fa-angle-right"></i></a>
                        </li>
                        <li class="" style="color:#c66b15;">Hand Made Arts Details</li>
                    </ul>
                </div>
            </div>
        </section>
    <!--=================== Product Section ===================-->
    <section class="single-product paira-margin-bottom-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="paira-product single-varients-product">
                        <div class="position-r pull-left full-width margin-bottom-40">
                            <div class="single-product-image paira-single-product-image">
                                <img src="<?=base_url().$hand_art->mainimage?>" alt=""
                                    class="paira-product-image img-responsive">
                            </div>
                            <div class="single-product-container"></div>
                        </div>
                        <div class=" pull-left small-verient-product">
                            <div class="col-md-12">
                                <div style="display:flex ;gap: 2px; justify-content: space-evenly;margin-top: 20px;">
                                <?php
                                    $galleryimage_arr=json_decode($hand_art->galleryimage);
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
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-detles">
                        <h3 class="full-width text-capitalize margin-bottom-15 margin-clear"><?= $hand_art->title ?></h3>
                        <div class="pull-left full-width margin-bottom-15">
                            <span style="font-size: small;"><?= $hand_art->shortdescription ?><span>
                        </div>
                        <div class="full-width pull-left margin-bottom-15">

                            <h3 class="margin-left-5 pull-left margin-top-0 margin-bottom-0">₹<?= $hand_art->price ?></h3>
                        </div>
                        <div class="pull-left full-width margin-bottom-15">
                            <label class="margin-bottom-10 pull-left full-width">Size :<span
                                    style="font-size: small;"><?= $hand_art->size ?><span></span></label>
                        </div>

                        <div class=" sicoal-share-widget margin-top-10  full-width pull-left">
                            
                            <!-- <label class="pull-left ">Arts :</label> -->
                            <ul class="social-li list-inline">
                                
                        <li> <h4 class="list-group full-width text-capitalize margin-bottom-15 
                            margin-clear">Tag:</h4></li>

                                <li class="list-group-item list-group-item-primary "><?= $hand_art->tags ?></li>
                            </ul>
                        </div>

                        <div class="sicoal-share-widget margin-top-10  full-width pull-left">
                            <label class=" pull-left">Category :</label>
                            <ul class="social-li list-inline">
                                <li><a>
                                <?= $hand_art->categoriesname?>
                                    </a></li>
                            </ul>
                        </div>

                        <div class="sicoal-share-widget margin-top-10  full-width pull-left">
                            <label class=" pull-left">Artist :</label>
                            <ul class="social-li list-inline">
                                <li><a>
                                    <?= $hand_art->name ?>
                                    </a></li>
                                <li><a href="tel:<?= $hand_art->numbervisibly == 1 ? $hand_art->number : ''; ?>"><i class="fa fa-phone"
                                            style="color: black;"></i>
                                            <?= $hand_art->number ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--=================== tab content Section ===================-->
                    <div class="tabs margin-bottom-30">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs single-product-tabs product-tabs text-center">
                            <li class="active"><a href="#description" class="text-capitalize"
                                    data-toggle="tab">Description</a></li>
                            <li><a href="#shippingreturns" data-toggle="tab" class="text-capitalize">Artist
                                    Details</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active margin-top-20" id="description">
                                    <?= $hand_art->art_desc ?>
                            </div>
                            <div class="tab-pane margin-top-20" id="shippingreturns">
                                <?php echo $hand_art->artist_desc ?>
                            </div>
                        </div>
                    </div>
                    <div class="social-share-widget margin-top-10 full-width pull-left">
                        <label class="pull-left">Copy Link:</label>
                        <div>
                            <input type="text" id="urlInput" class="form-control" value="<?= base_url($this->input->server('REQUEST_URI')) ?>" readonly>
                            <button id="copyButton" class="btn btn-primary">Copy URL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <section class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="paira-widget paira-subscribe">
                        <h3 class="text-center margin-clear text-uppercase">Inquiry Form</h3>
                        <hr class="margin-bottom-40 margin-top-15">
                        <form accept-charset="UTF-8" action="<?=base_url()?>addInquiry" class="contact-form" method="post">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon" id="basic-addon13">Subject</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon3" name="subject">
                                    <input type="hidden" class="form-control" aria-describedby="basic-addon3" name="artist_id" value="<?= $hand_art->artist_id ?>">
                                </div>
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon" id="basic-addon14">Message</span>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                                <div class="text-center full-width margin-bottom-10">
                                    <button type="submit" class="btn btn-primary btn-lg">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
$(document).ready(function(){
    $("#copyButton").click(function(){
        // Select the text in the input field
        $("#urlInput").select();

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Alert the user that the URL has been copied
        alert("URL copied to clipboard: " + $("#urlInput").val());
    });
});
</script>