        <!--=================== Main Content Container ===================-->
        <main class="article-page">
            <!--=================== Article Content Section ===================-->
            <section class="article-content paira-margin-bottom-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="article-description">
                                <img src="assets/images/blog/blog-big.jpg" alt=""
                                    class="img-responsive margin-bottom-30">
                                <p class="brand-color"><?= date('M d,Y', strtotime($blog->date)) ?></p>
                                <h1 class="margin-top-5"><?=$blog->name ?></h1>
                                <p class="margin-top-15"><?=$blog->description ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="margin-top-30 paira-margin-bottom-3 pull-left full-width">
                    <!--=================== Send Comment Section ===================-->
                    <div class="form-contact">
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
                    </div>
                </div>
            </section>
        </main>