        <!--=================== Main Content Container ===================-->
        <main class="article-page">
        <section class="breadcrumb-container paira-margin-bottom-3">
            <div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
                <div class="container-fluid padding-fix">

                    <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                        <h1 class="" style="color:white;">Blog Detail</h1>
                        <li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
                                    class="fa fa-angle-right"></i></a>
                        </li>
                        <li class="" style="color:#c66b15;">Blog</li>
                    </ul>
                </div>
            </div>
        </section>
            <!--=================== Article Content Section ===================-->
            <section class="article-content paira-margin-bottom-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="article-description">
                                <img src="<?=base_url().$blog->image?>" alt=""
                                    class="img-responsive margin-bottom-30" style="width: 100%;height: auto;object-fit: cover;">
                                <p class="brand-color"><?= date('M d,Y', strtotime($blog->date)) ?></p>
                                <h1 class="margin-top-5"><?=$blog->name ?></h1>
                                <p class="margin-top-15"><?=$blog->description ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="margin-top-30 paira-margin-bottom-3 pull-left full-width">
                    <!--=================== Send Comment Section ===================-->
                    <!-- <div class="form-contact">
                        <h3 class="text-capitalize  margin-bottom-30">Leave A Comment</h3>
                        <div class="row">
                            <form accept-charset="UTF-8" action="#" class="contact-form" method="post">
                                <input name="form_type" type="hidden" value="new_comment">
                                <input name="utf8" type="hidden" value="✓">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon" id="basic-addon7">Name</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon" id="basic-addon8">Phone</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon" id="basic-addon9">Email</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon" id="basic-addon10">Subject</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon" id="basic-addon11">Comment</span>
                                        <textarea rows="10" name="contact[body]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg text-capitalize"
                                        value="Send">Send Comment</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </section>
        </main>