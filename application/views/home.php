<main class="home-page">
    <div class="">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($bannerlist as $banner): ?>
                    <div class="item <?= $banner->active_status === '1' ? 'active' : '' ?>">
                        <img src="<?= base_url() . $banner->image ?>" alt="Chicago" style="object-fit: cover;">
                        <div class="">
                            <div class="carousel-caption carousel-caption1">
                                <h1 class="text-left margin-bottom-20 " data-paira-animation="fadeInLeft"
                                    data-paira-animation-delay="0.2s">
                                </h1>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="left carousel-control " href="#myCarousel" data-slide="prev" data-paira-animation="fadeIn"
                data-paira-animation-delay="0.0ms">
                <span>PR<br>EV</span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next" data-paira-animation="fadeIn"
                data-paira-animation-delay="0.10ms">
                <span>NE<br>XT</span></a>
            <!-- <ol class="carousel-indicators">
                <li data-target="#Carousel" data-slide-to="0" class="active">01</li>
            </ol> -->
            <!-- <span class="carousel-indicators-total"></span> -->
        </div>
    </div>
    <marquee class="html-marquee" direction="left" behavior="scroll" scrollamount="12" style="background-color: #023020;color: white;font-size: x-large;">
        <?php if (!empty($newslist)): ?>
            <?php foreach ($newslist as $news): ?>
                <i class="fa fa-check-circle"></i> <?= $news->title ?> <i class="fa fa-check-circle"></i>
            <?php endforeach; ?>
        <?php else: ?>
            <div><p><i class="fa fa-check-circle"></i> WELCOME TO CREATIVE HANDS OF INDIA <i class="fa fa-check-circle"></i></p></div>
        <?php endif; ?>
    </marquee>

    <section class="banner-small paira-margin-bottom-2 " style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="banner-small-back">
                        <img src="<?= base_url() ?>assets/images/icon.png" alt="" class="img-responsive pull-left">
                        <h4 class="margin-clear text-capitalize margin-bottom-5"><a href="<?= base_url() ?>artist">250+
                                artists</a>
                        </h4>
                        <p class="margin-bottom-0 margin-top-5">Verum tamen cum de rebus grand</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="banner-small-back">
                        <img src="<?= base_url() ?>assets/images/icon-2.png" alt="" class="img-responsive pull-left">
                        <h4 class="margin-clear text-capitalize margin-bottom-5"><a href="Painting Arts.html">1000+
                                arts</a></h4>
                        <p class="margin-bottom-0 margin-top-5">Verum tamen cum de rebus grand</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="banner-small-back last">
                        <img src="<?= base_url() ?>assets/images/icon-3.png" alt="" class="img-responsive pull-left">
                        <h4 class="margin-clear text-capitalize margin-bottom-5"><a href="about.html">Recognised
                                In
                                India</a>
                        </h4>
                        <p class="margin-bottom-0 margin-top-5">Verum tamen cum de rebus grand</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="latest-blog paira-margin-bottom-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-title margin-bottom-15">
                    <h2 class="text-capitalize margin-clear "><span>About Us</span></h2>
                </div>
                <section class="single-product paira-margin-bottom-3">
                    <div class="">

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="product-detles">

                                    <!--=================== tab content Section ===================-->
                                    <div class="tabs margin-bottom-30">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs single-product-tabs product-tabs ">
                                            <li class="active"><a href="#" class="" data-toggle="tab">
                                                    <h3> Unleash your creativity on our artist
                                                        platform –</h3>A canvas for your imagination, where your
                                                    passion
                                                    transforms into captivating masterpieces.
                                                </a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active margin-top-20" id="description">
                                                <p class="rale-light margin-bottom-0">Creative Hands of India
                                                    was initiated by Joe Dodani in Ahmedabad Gujarat. CHOI
                                                    wishes to help new & budding artists and gives them
                                                    international exposure. We invite art in all forms and we
                                                    would like to connect them to various organizations &
                                                    communities all over the world. As part of the initiative,
                                                    we are launching a simple directory where the artist can
                                                    create their professional profile and can connect with the
                                                    artist community worldwide. The directory in the current
                                                    form is free.
                                                </p>
                                                <p>
                                                    artworks at an art fair, show or festival? We actively
                                                    participate in art scene events and display artworks that
                                                    are specially selected for each art show and the thematic
                                                    surroundings of the event. </p>
                                                <ul class="list-unstyled lists margin-top-10">
                                                    <li>>> Request artwork collections for your event</li>
                                                    <li>>> Companies can offset rental fees against tax</li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="<?= base_url() ?>view-about">
                                            <button class="btn btn-success" type="button" style="border-radius: 20px;">
                                                Read more
                                            </button>
                                        </a>
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="paira-product" style="padding-top: 50px;">
                                    <div class="position-r pull-left paira-single-product-image-wrp  margin-bottom-40">
                                        <div class=" paira-single-product-image">
                                            <iframe width="600" height="500"
                                                src="https://www.youtube.com/embed/VS1sa-F-UxE?si=grUBe8BHMKYPecGn">
                                            </iframe>
                                        </div>
                                    <div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
    <section class="latest-picture paira-margin-bottom-2">
        <div class="gallery-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-title">
                        <h2 class="text-capitalize margin-clear pull-left"><span>Painting Arts</span></h2>
                        <a href="view-painting" class="text-uppercase pull-right margin-top-10">View
                            All</a>
                    </div>
                    <?php if (!empty($paintingArt)): ?>
                        <?php
                            $i=0;
                            foreach ($paintingArt as $paiting):
                                if ($i==8) {
                                    break;
                                }
                                $i++;
                        ?>
                            <div class="col-sm-3 col-md-3 col-xs-12 margin-top-10">
                                <div class="product text-center">
                                    <div class="product-image ">
                                        <div class=""></div>
                                        <img src="<?= isset($paiting->mainimage) ? base_url().$paiting->mainimage : base_url().'assets/images/artist/6.jpg' ?>" alt="" class="img-responsive" style="height:300px;object-fit: cover;">
                                        <h3><?= $paiting->title ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>



    <section class="latest-picture paira-margin-bottom-2">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-title">
                        <h2 class="text-capitalize margin-clear pull-left"><span>Our Lastest Arts</span></h2>
                        <a href="view-shop" class="text-uppercase pull-right margin-top-10">View All</a>
                    </div>
                    <?php if (!empty($shoplist)): ?>
                        <?php
                            $i=0;
                            foreach ($shoplist as $shop):
                                if ($i==4) {
                                    break;
                                }
                                $i++;
                        ?>
                        <div class="col-sm-3 col-md-3 col-xs-12 margin-top-30">
                            <div class="product text-center">
                                <div class="product-image ">
                                    <a href="#">
                                        <div class=""></div>
                                        <img src="<?=base_url().$shop->mainimage?>" alt="" class="Shop img-responsive" style="height:250px;object-fit: cover;">>
                                    </a>
                                    <h6 class="">₹<?= $shop->price ?></h6>
                                    <h3 class=""><?= $shop->title ?></h3>
                                    <a href="<?= base_url('addToCart/' . (int)str_replace(',', '', $shop->price) . '/' . $shop->id) ?>" class="product-cart-con btn btn-primary btn-lg text-capitalize margin-bottom-30">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-picture paira-margin-bottom-2">
        <div class="gallery-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-title">
                        <h2 class="text-capitalize margin-clear pull-left"><span>Hand Made Arts</span></h2>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="product-detles">

                            <!--=================== tab content Section ===================-->
                            <div class="tabs margin-bottom-30">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active margin-top-20" id="description">
                                        <p class="rale-light margin-bottom-0">Creative Hands
                                            of India
                                            was initiated by Joe Dodani in Ahmedabad
                                            Gujarat. CHOI
                                            wishes to help new & budding artists and gives
                                            them
                                            international exposure. We invite art in all
                                            forms and we
                                            would like to connect them to various
                                            organizations &
                                            communities all over the world. As part of the
                                            initiative,
                                            we are launching a simple directory where the
                                            artist can
                                            create their professional profile and can
                                            connect with the
                                            artist community worldwide. The directory in the
                                            current
                                            form is free.



                                        </p>
                                        <p>
                                            artworks at an art fair, show or festival? We
                                            actively
                                            participate in art scene events and display
                                            artworks that
                                            are specially selected for each art show and the
                                            thematic
                                            surroundings of the event. </p>
                                        <ul class="list-unstyled lists margin-top-10">
                                            <li>>> Request artwork collections for your
                                                event</li>
                                            <li>>> Companies can offset rental fees against
                                                tax</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <div class="">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">


                                <div class="carousel-inner">
                                    <div class=" item active">
                                        <img src="<?= base_url() ?>assets/images/slider/4.jpg" alt="Los Angeles">

                                    </div>

                                    <div class="item">
                                        <img src="<?= base_url() ?>assets/images/slider/5.jpg" alt="Chicago">

                                    </div>

                                    <div class="item">
                                        <img src="<?= base_url() ?>assets/images/slider/6.jpg" alt="New york">

                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>


                </div>
    </section>

    <section class="latest-picture paira-margin-bottom-2">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-title">
                        <h2 class="text-capitalize margin-clear pull-left"><span>Our Hand Made Arts
                                Products</span>
                        </h2>
                        <a href="hand-made-art" class="text-uppercase pull-right margin-top-10">View All</a>
                    </div>
                    <?php if (!empty($handArt)): ?>
                        <?php
                            $i=0;
                            foreach ($handArt as $hand):
                                if ($i==4) {
                                    break;
                                }
                                $i++;
                        ?>
                        <div class="col-sm-3 col-md-3 col-xs-12 margin-top-30">
                            <div class="product text-center">
                                <div class="product-image ">
                                    <a href="#">
                                        <div class=""></div>
                                        <img src="<?= isset($hand->mainimage) ? base_url().$hand->mainimage : base_url().'assets/images/artist/6.jpg' ?>" alt="" class="img-responsive" style="height:300px;object-fit: cover;">
                                    </a>
                                    <h3 class=""><?= $hand->title ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="latest-picture paira-margin-bottom-2">
    <div class="picture-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-title">
                    <h2 class="text-capitalize margin-clear pull-left"><span>Best Selling Arts</span></h2>
                </div>
                <?php if (!empty($bestsellerlist)): ?>
                <?php
                    $i=0;
                    foreach ($bestsellerlist as $bastseller):
                        if ($i==3) {
                            break;
                        }
                        $i++;
                ?>
                    <div class="col-sm-4 col-md-4 col-xs-12 margin-top-30">
                        <div class="product text-center">
                            <div class="product-image position-r">
                                <a href="#">
                                    <div class=""></div>
                                    <img src="<?= isset($bastseller->mainimage) ? base_url().$bastseller->mainimage : base_url().'assets/images/artist/6.jpg' ?>" alt="" class="img-responsive" style="height:300px;object-fit: cover;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?> 
            </div>
        </div>
        <div class="product-container"></div>
    </div>
</section>
<section class="latest-collection paira-margin-bottom-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">


                <div class="col-md-12 heading-title margin-bottom-40 margin-top-40">
                    <h2 class="text-capitalize margin-clear pull-left "><span>Events</span>
                    </h2>
                    <a href="<?=base_url()?>view-event" class="text-uppercase pull-right margin-top-10">View All</a>
                </div>
                <?php foreach ($eventlist as $event): ?>
                    <div class="col-md-4 col-sm-6 item">
                        <div
                            style="border-radius: 6px;background-image: url(assets/images/artist/banner/17.jpg);">
                            <div style="margin-bottom: 100px;">
                                <h5>
                                <?= ($event->date > date('Y-m-d')) ? 
                                        '<button class="btn" style="background-color:transparent;border-color: black;color: #c66b15;">Upcoming</button>' : 
                                        '<button class="btn" style="background-color:transparent;border-color: black;color: #c66b15;">Past</button>' ?>
                                </h5>
                            </div>
                            <div class="row" style="padding-left:5px;">
                                <div class="col-md-7" style="bottom: -25px;">
                                    <a href="<?=base_url('EventController/viewEventDetail/' . $event->id)?>">
                                        <h5><?= $event->name ?></h5>
                                    </a>
                                </div>
                                <div class="col-md-5" style="bottom: -30px;">
                                    <i class="fa fa-calendar"></i>
                                    <a href=""><?= date('d/m/Y', strtotime($event->date)) ?></a>
                                </div>
                            </div>
                            <hr>
                            <div style="display: flex;justify-content: space-between; padding-left: 10px;padding-right: 10px; ">
                                <h5>
                                    <i class="fa fa-map-marker"></i>
                                    <?= $event->address ?>
                                </h5>
                                <!-- <h4>$20</h4> -->
                                <h6><i class="fa fa-user"></i>
                                <?= $event->artistname ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("september 10, 2024 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo1").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo2").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo3").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo4").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo5").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>


</section>
<section class="gallery paira-margin-bottom-2">
    <div class="gallery-background margin-top-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-title">
                    <h2 class="text-capitalize margin-clear"><span>Meet Our Artist</span></h2>
                </div>
                <div class="col-md-3 col-xs-6 col-sm-6 margin-top-30">
                    <div class="instragram-desc text-left">
                        <!-- <h4 class="margin-top-0 margin-bottom-10">Images</h4> -->
                        <!-- <a href="#" class="margin-bottom-10">@ Email</a> -->
                        <p class="margin-bottom-15">Lorem ipsum dolor sit amet, consectetuer adipiscing
                            elit, sed diam nonummy.</p>
                        <a href="<?= base_url() ?>artist"> <button href="#" class="btn btn-primary btn-lg">View All
                                Artist</button>
                        </a>
                    </div>
                </div>
                <?php if (!empty($artistlist)): ?>
                <?php
                    $i=0;
                    foreach ($artistlist as $artist):
                        if ($i==3) {
                            break;
                        }
                        $i++;
                ?>
                    <div class="col-md-3 col-xs-6 col-sm-6 margin-top-30">
                        <div class="instragram">
                            <div class="instragram-image position-r">
                                <a href="artist detail.html">
                                    <div class=""></div>
                                    <img src="<?=base_url().$artist->profileimage?>" onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'" class="img-responsive" style="height:350px;object-fit: cover;">
                                </a>
                                <h3><?= $artist->name ?></h3>
                                <h6>Artist</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>
<section class="latest-blog paira-margin-bottom-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading-title">
                <h2 class="text-capitalize margin-clear pull-left"><span>Blog</span></h2>
                <a href="<?=base_url()?>view-blog" class="text-uppercase pull-right margin-top-10">View All</a>
            </div>

            <?php foreach ($bloglist as $blog): ?>
                <div class="col-md-4 col-xs-12 col-sm-6 margin-top-30">
                    <div class="blog">
                        <div class="blog-image position-r">
                            <a href="#">
                                <div class="background-overlay"></div>
                                <img src="<?= base_url() . $blog->image ?>" alt="" class="img-responsive" style="height:300px;object-fit: cover;">
                            </a>
                        </div>
                        <div class="blog-hover">
                            <a href="<?= base_url('BlogController/viewblogdetails/' . $blog->id) ?>"
                                class="margin-top-10">- See The blog -</a>
                        </div>
                        <div class="margin-top-15 text-left">
                            <p class="margin-bottom-5">
                                <?= date('M d,Y', strtotime($blog->date)) ?>
                            </p>
                            <h4 class="margin-top-0 margin-bottom-10"><a href="<?= base_url() ?>viewblogdetails">
                                    <?= $blog->name ?>
                                </a></h4>
                            <a href="<?= base_url('BlogController/viewblogdetails/' . $blog->id) ?>"
                                class="text-uppercase read-more">Read More<i
                                    class="fa fa-long-arrow-right margin-left-5"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="latest-picture paira-margin-bottom-2">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-title">
                    <h2 class="text-capitalize margin-clear pull-left"><span>We are Promotive </span>
                    </h2>
                </div>
                <?php foreach ($promotivelist as $promotive): ?>
                    <div class="col-sm-3 col-md-4 col-xs-12 margin-top-30">
                        <div class="product text-center">
                            <div class="product-image ">
                                <a href="<?= $promotive->link ?>" target="_blank">
                                    <div class=""></div>
                                    <img src="<?= base_url() . $promotive->image ?>" alt="" class="img-responsive" style="width: 350px;height:300px;object-fit: cover;">
                                </a>
                                <h3 class=""><?= $promotive->name ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
</main>