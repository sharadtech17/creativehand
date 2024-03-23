<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Subscription</h4>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
<?php include('flash-message.php'); ?>
    <div class="col-lg-5">
        <div class="text-center mb-4 pb-2">
            <h4 class="fw-semibold fs-22">Subscription Plan</h4>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-xl-9">
        <div class="row">
            <?php foreach ($Subscriptionlist as $Subscription): ?>
                <div class="col-lg-4">
                    <div class="card pricing-box">
                        <div class="card-body p-4 m-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fw-semibold">
                                        <?= $Subscription->name ?>
                                    </h5>
                                    <p class="text-muted mb-0">
                                        <?= $Subscription->type ?>
                                    </p>
                                </div>
                                <h2>
                                    <?= $Subscription->qty_value ?> <span class="fs-13 text-muted">/
                                        <?= $Subscription->type == 'Artist Subscription' ? 'Yearly' : 'Event' ?>
                                    </span>
                                </h2>
                            </div>
                            <div class="pt-4">
                                <h2><small>$
                                        <?= $Subscription->amount ?>
                                    </small></h2><span>
                                    <?= $Subscription->type == 'Artist Subscription' ? $Subscription->qty_art . ' total arts upload' : '' ?>
                                </span>
                            </div>
                            <hr class="my-4 text-muted">
                            <div>
                                <ul class="list-unstyled text-muted vstack gap-3">
                                    <?php
                                    $desc_Arr = explode(',', $Subscription->description);

                                    foreach ($desc_Arr as $value) {

                                        ?>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 text-success me-1">
                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <?= $value ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="mt-4">
                                    <a href="<?= base_url() . 'addSubscription/' . $Subscription->id ?>"
                                        class="btn btn-soft-success w-100 waves-effect waves-light">Let's Start</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!--end row-->
    </div>
    <!--end col-->
</div>