<!--=================== Main Content Container ===================-->

<main class="home-page">
    <section class="breadcrumb-container paira-margin-bottom-3">
        <div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
            <div class="container-fluid padding-fix">

                <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                    <h1 class="" style="color:white;">Events</h1>
                    <li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
                                class="fa fa-angle-right"></i></a>
                    </li>
                    <li class="" style="color:#c66b15;">Events</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="latest-picture paira-margin-bottom-2">
        <div>
            <div class="container-fluid">
                <section class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="col-sm-3 col-md-3 col-lg-3 ">
                            <div>
                                <h6 class="p-1 border-bottom">Filter By</h6>
                                <div id="" class=" sidebar-expanded d-none ">
                                    <ul class="list-group">
                                        <li class="list-group-item ">
                                            <div class="single-widget learts-mb-40">
                                                <div class="widget-search">
                                                    <form action="#">
                                                        <input type="text" placeholder="Search ....">
                                                        <button><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                </div>

                                <div id="" class=" sidebar-expanded d-none ">
                                    <ul class="list-group">

                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">

                                            <h3><i class="fa fa-user"></i> Artists</h3>
                                        </li>

                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">

                                            Tempera

                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            <!-- <small>MAIN MENU</small> -->
                                            Oil paints

                                        </li>

                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Acrylic Pai
                                            nting

                                        </li>

                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Watercolor Painting

                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Charcoal DraWings

                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Charcoal DraWings

                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Pastel Paintings
                                        </li>

                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Chalk
                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                 text-muted d-flex align-items-center menu-collapsed"><input
                                                type="checkbox">
                                            Graphite Pencil
                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                                text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Colored Pencil
                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                               text-muted d-flex align-items-center menu-collapsed"><input
                                                type="checkbox">
                                            Ink and Pen
                                        </li>
                                        <li class="list-group-item sidebar-separator-title
                                               text-muted d-flex align-items-center menu-collapsed">
                                            <input type="checkbox">
                                            Three-Dimensional Art Mediums
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9">
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
                </section>
            </div>
        </div>
    </section>
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
            document.getElementById("demo6").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo7").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo8").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            document.getElementById("demo9").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 margin-top-30 text-center">
                <ul class="list-inline pagination margin-clear">
                    <li><a href="#" class="next-page"><i class="fa fa-caret-left"></i></a></li>
                    <li class="active font-bold"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#" class="prev-page"><i class="fa fa-caret-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</main>