<section class="breadcrumb-container paira-margin-bottom-3">
    <div class=" breadcrumb"
        style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?= base_url() ?>assets/images/banner/home-banner-big.jpg); ">
        <div class="container-fluid padding-fix">

            <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                <h1 class="" style="color:white;">Cart</h1>
                <li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
                            class="fa fa-angle-right"></i></a>
                </li>
                <li class="" style="color:#c66b15;">Cart</li>
            </ul>
        </div>
    </div>
</section>
<!--=================== Main Content Container ===================-->
<main class="product-page">
    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-7">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SHOPPING BAG</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">SUBTOTAL</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal=0; if($cartlist): ?>
                                    <?php foreach ($cartlist as $cart): ?>
                                        <form  accept-charset="UTF-8" action="<?=base_url()?>updateCart" method="POST" enctype="multipart/form-data">
                                            <input name="cart_id" value="<?= $cart->cart_id ?>" type="hidden">
                                            <input name="price" value="<?= $cart->price ?>" type="hidden">
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url().$cart->mainimage?>" class="img-fluid rounded-3" style="width: 70px;" alt="Book">
                                                    </div>
                                                </th>
                                                <td class="align-items-center">
                                                    <p class="" style="font-weight: 500;margin-top:30px;"><?= $cart->title ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="row">
                                                        <button class="btn btn-link px-2 col-lg-3" type="button" style="margin-top:30px;"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fa fa-minus"></i>
                                                        </button>

                                                        <input id="form1" min="1" name="quantity" value="<?= $cart->qty ?>" type="number"
                                                            class="form-control form-control-sm col-lg-3"
                                                            style="width: 50px;margin-top:30px;" />

                                                        <button class="btn btn-link px-2 col-lg-3" type="button" style="margin-top:30px;"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;margin-top:30px;"> ₹<?= $cart->total_amount ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <button style="font-weight: 500;margin-top:30px;" type="submit" class="btn"><i class="fa fa-edit"></i></button> 
                                                    <a href="<?=base_url('cartproduct/remove/' . $cart->cart_id)?>" style="font-weight: 500;margin-top:30px;" class="btn"><i class="fa fa-trash"></i></a> 
                                                </td>
                                            </tr>
                                        </form>
                                        <?php
                                            $subtotal+=$cart->total_amount;
                                        ?>
                                    <?php endforeach ?>
                                    <?php endif ?> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-5 px-5 py-4">
                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Cart totals</h3>
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-grow-1 ms-3 row">
                            <h5 class="col-lg-6">Subtotal</h5>
                            <h5 class=" col-lg-6 text-right">₹<?= $subtotal ?></h5>
                        </div>
                        <hr class="mb-4" style="height: 2px; background-color: black; opacity: 1;">
                        <div class="flex-grow-1 ms-3 row">
                            <h5 class="col-lg-6">Shipping</h5>
                            <h5 class=" col-lg-6 text-right">Flat Rate: ₹40.00 <br>
                                Shipping to 18-Badrinarayan society,visnagar 384315, Gujarat.
                                Change address</h5>
                        </div>
                    </div>
                    <hr class="mb-4" style="height: 2px; background-color: black; opacity: 1;">
                    <div class="d-flex justify-content-between p-2 mb-2 row" style="">
                        <h5 class="fw-bold mb-0 col-lg-6">Total:</h5>
                        <h5 class="fw-bold mb-0 col-lg-6 text-right"> ₹<?= $subtotal ?></h5>
                    </div>
                    <div class="margin-top-20 margin-bottom-20 text-center">
                        <span class="input-group-btn">
                                <?php if($cartlist): ?>
                                <a href="<?=base_url()?>view-checkout" class="product-cart-con btn
                                                btn-primary btn-lg text-capitalize margin-bottom-30">Proceed
                                    To Checkout </a>
                                    <?php endif ?> 
                            </span>
                        </div>
                </div>
            </div>
        </div>
    </section>
</main>