<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom style -->
        <link rel="stylesheet" href="<?= base_url('assets/css/laporan-admin_.css')?>">
</head>
<body>
<div class="my-5 page" size="A4">
        <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                        <div class="logo">
                                <img src="<?= base_url('assets/images/logo.png')?>" alt="" class="img-fluid">
                                <h1>B I-<span>S T I R</span></h1>
                        </div>
                        <div class="top-left">
                                <div class="graphic-path">
                                        <p>Invoice</p>
                                </div>
                                <div class="position-relative">
                                        <p>Invoice No. <span>XXXX</span></p>
                                </div>
                        </div>
                </section>

                <section class="store-user mt-5">
                        <div class="col-10">
                                <div class="row bb pb-3">
                                        <div class="col-7">
                                                <p>Supplier,</p>
                                                <h2>Your Store Name</h2>
                                                <p class="address"> 777 Brockton, Avenue <br> Abington MA 2351, <br> Vestavia Hills AL</p>
                                                <div class="txn mt-52"> TXN : XXXXX</div>
                                        </div>
                                        <div class="col-5">
                                                <p>Client,</p>
                                                <h2>Sabur Ali</h2>
                                                <p class="address"> 777 Brockton, Avenue <br> Abington MA 2351, <br> Vestavia Hills AL</p>
                                                <div class="txn mt-52"> TXN : XXXXX</div>
                                        </div>
                                </div>
                                <div class="row extra-info pt-3">
                                        <div class="col-7">
                                                <p>Payment Method : 
                                                        <span>bKash</span>
                                                </p>
                                                <p>Order Number : 
                                                        <span>#868</span>
                                                </p>
                                        </div>
                                        <div class="col-5">
                                                <p>Deliver Date : 
                                                        <span>10-02-2021</span>
                                                </p>
                                        </div>
                                </div>
                        </div>
                </section>

                <section class="product-area mt-4">
                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <td>Item description</td>
                                                <td>Price</td>
                                                <td>Quantity</td>
                                                <td>Total</td>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td>
                                                <div class="media">
                                                                <img src="<?= base_url('assets/images/iphone4.jpg')?>" class="mr-3 img-fluid" alt="Product 01">
                                                                <div class="media-body">
                                                                        <p class="mt-0 title">
                                                                                Media Heading
                                                                        </p>
                                                                        Lorem ipsum  Culpa, possimus?
                                                                </div>
                                                        </div>
                                                </td>
                                                <td>200$</td>
                                                <td>1</td>
                                                <td>200$</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="media">
                                                                <img src="<?= base_url('assets/images/iphone5.jpg')?>" class="mr-3 img-fluid" alt="Product 01">
                                                                <div class="media-body">
                                                                        <p class="mt-0 title">
                                                                                Media Heading
                                                                        </p>
                                                                        Lorem ipsum dolorlit. Culpa, possimus?
                                                                </div>
                                                        </div>
                                                </td>
                                                <td>200$</td>
                                                <td>1</td>
                                                <td>200$</td>
                                        </tr>
                                </tbody>
                        </table>

                </section>

                <section class="balance-info">
                        <div class="row">
                                <div class="col-8">
                                        <p class="m-0 font-weight-bold"> Note :</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, quaerat iusto id optio similique consequatur?</p>
                                </div>
                                <div class="col-4">
                                        <table class="table table-hover">
                                                <tr>
                                                        <td>Sub total</td>
                                                        <td>800$</td>
                                                </tr>
                                                <tr>
                                                        <td>Tax :</td>
                                                        <td>15$</td>
                                                </tr>
                                                <tr>
                                                        <td>Deliver :</td>
                                                        <td>10$</td>
                                                </tr>
                                                <tr>
                                                        <td>Total :</td>
                                                        <td>857$</td>
                                                </tr>
                                        </table>
                <!-- signature  -->

                                <div class="col-12">
                                        <img src="<?= base_url('assets/images/sign.png')?>" class="img-fluid" alt="">
                                        <p class="text-center m-0"> Directur Signature</p>
                                </div>
                                 </div>
                        </div>
                </section>

                <footer>
                        <hr>
                        <p class="m-0 text-center">
                                View this  invoice online At - <a href="#!"> invoice/saburbd.com/# </a>
                        </p>
                        <div class="social pt-3">
                                <span class="pr-2">
                                        <i class="fas fa-mobile-alt"></i>
                                        <span>0123456789</span>
                                </span>
                                <span class="pr-2">
                                        <i class="fas fa-envelope"></i>
                                        <span>me@saburali.com</span>
                                </span>
                                <span class="pr-2">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>/sabur.1234</span>
                                </span>
                                <span class="pr-2">
                                        <i class="fab fa-youtube"></i>
                                        <span>/abdusabur</span>
                                </span>
                                <span class="pr-2">
                                        <i class="fab fa-github"></i>
                                        <span>/example</span>
                                </span>
                        </div>
                </footer>
        </div>
</div>
</body>
</html>