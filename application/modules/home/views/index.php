<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Carousel Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/home/'); ?>bootstrap.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="<?= base_url('assets/home/'); ?>carousel.css" rel="stylesheet"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Halaman Utama
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Web GIS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Download</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">Menu Utama</a>
                        <a href="#" class="list-group-item list-group-item-action">Profil Alsintan</a>
                        <a href="#" class="list-group-item list-group-item-action">Kontak</a>
                        <a href="#" class="list-group-item list-group-item-action">Pencarian</a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="marketing">
                        <div class="row ">
                            <div class="col-lg-4">
                                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                </svg>
                                <h2>Heading</h2>
                                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                            </div><!-- /.col-lg-4 -->
                            <div class="col-lg-4">
                                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                </svg>
                                <h2>Heading</h2>
                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                            </div><!-- /.col-lg-4 -->
                            <div class="col-lg-4">
                                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                </svg>
                                <h2>Heading</h2>
                                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                            </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->

                        <hr class="featurette-divider">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="<?= base_url('assets/home/'); ?>img/blank_image.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <a href="">
                                            <h4><strong>Rektor Institute</strong></h4>
                                        </a>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr class="featurette-divider">

                        <!-- /END THE FEATURETTES -->

                    </div><!-- /.container -->


                </div>
            </div>
        </div>

    </main>
    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>



</body>

<script>
    window.jQuery || document.write('<script src="<?= base_url('assets/home/'); ?>jquery.slim.min.js"><\/script>')
</script>
<script src="<?= base_url('assets/home/'); ?>bootstrap.bundle.js"></script>

</html>