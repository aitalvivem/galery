<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo e(asset('img/app.png')); ?>" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        #logo {
            height : 2.5em;
        }
        .galerieItem {
            border: 1px solid rgba(149, 147, 147, 0.44) !important;
        }
        .galerieItem:hover {
            box-shadow: 1px 1px 1px 1px gray;
        }
        .gallery
        {
            display: inline-block;
            margin-top: 20px;
        }
        .close-icon{
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom border-secondary sticky-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('img/logosnav3.png')); ?>" id="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('galleries.index')); ?>" >Galeries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('photos.index')); ?>" >Photos</a>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('tags.index')); ?>" >Tags</a>
                        <li>
                        <?php endif; ?>
                    <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(url('/home')); ?>">Home</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="<?php echo e(route('photos.create')); ?>" class="nav-link">Ajouter une photo</a>
                                    <a class="dropdown-item" href="<?php echo e(route('galleries.create')); ?>" class="nav-link">Créer une galerie</a>
                                    <a class="dropdown-item" href="<?php echo e(route('tags.create')); ?>" class="nav-link">Ajouter des tag</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="<?php echo e(route('/')); ?>" class="nav-link">Changer de section</a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-secondary">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none",
                padding: [0,0,0,0],
                closeBtn: false,
                helpers : { 
                    title : { type : 'outside' }
                },
                beforeLoad: function() {
                    this.title = '<div class=" bg-dark p-2 mt-0">' + $(this.element).attr('title') +'<span class="float-right">' + (this.index + 1) + ' / ' + this.group.length + '</span></div>';
                }
            });
        });
        function deplie(h_ico, s_ico){
            // var divpsw = document.getElementById(div);
            var hid = document.getElementById(h_ico)
            var show = document.getElementById(s_ico)

            if(hid.style.display == "none"){
                hid.style.display = "inline-block";
            }else{
                hid.style.display = "none";
            }

            if(show.style.display == "none"){
                show.style.display = "inline-block";
            }else{
                show.style.display = "none";
            }
        }
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</body>
</html>
<?php /**PATH /var/www/html/ivry-galery/resources/views/layouts/app.blade.php ENDPATH**/ ?>