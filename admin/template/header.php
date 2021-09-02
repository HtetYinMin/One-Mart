
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/backend/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/backend/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="../../assets/backend/css/style.css">
</head>
<body>

    <section class="main container-fluid">
        <div class="row">
            <!--sidebar start-->
            <div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
                <div class="d-flex justify-content-between align-items-center py-2 mt-3 mb-3 nav-brand">
                    <div class="d-flex align-items-center">
                        <span class="bg-success p-2 rounded d-flex justify-content-center align-items-center mr-2">
                            <i class="feather-zap text-white h4 mb-0"></i>
                        </span>
                        <span class="font-weight-bolder h4 mb-0 text-uppercase text-success">My Shop</span>
                    </div>
                    <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
                        <i class="feather-x text-success" style="font-size: 2em;"></i>
                    </button>
                </div>
                <div class="nav-menu">
                    <ul>
                        <li class="menu-item">
                            <a href="dashboard.php" class="menu-item-link">
                                <span>
                                    <i class="feather-home"></i>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="menu-spacer"><hr></li>

                        <li class="menu-title">
                            <span>Manage Products</span>
                        </li>
                        <li class="menu-item">
                            <a href="item_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Items
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="item_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    Items List
                                </span>
                                <span class="badge badge-pill bg-white shadow-sm text-success p-1">12</span>
                            </a>
                        </li>
                        <hr>
                        <li class="menu-item">
                            <a href="subcategory_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Subcategory
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="subcategory_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    Subcategory List
                                </span>
                                <span class="badge badge-pill bg-white shadow-sm text-success p-1">12</span>
                            </a>
                        </li>
                        <hr>
                        <li class="menu-item">
                            <a href="category_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Category
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="category_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    Category List
                                </span>
                                <span class="badge badge-pill bg-white shadow-sm text-success p-1">8</span>
                            </a>
                        </li>
                        <hr>
                        <li class="menu-item">
                            <a href="brand_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Brand
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="brand_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    Brand List
                                </span>
                                <span class="badge badge-pill bg-white shadow-sm text-success p-1">8</span>
                            </a>
                        </li>
                        <li class="menu-spacer"><hr></li>

                        <li class="menu-title">
                            <span>Manage Users</span>
                        </li>
                        <li class="menu-item">
                            <a href="user_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    User List
                                </span>
                                <span class="badge badge-pill bg-white shadow-sm text-success p-1">8</span>
                            </a>
                        </li>
                    </ul>
    
                </div>
    
            </div>
            <!--sidebar end-->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
                <div class="row header mb-4">
                    <div class="col-12">
                        <div class="p-2 bg-success d-flex justify-content-between align-items-center rounded">
                            <button class="show-sidebar-btn btn btn-success d-block d-lg-none">
                                <i class="feather-menu text-light" style="font-size: 2em;"></i>
                            </button>
                            <form action="" method="post" class="d-none d-md-block">
                                <div class="form-inline">
                                    <input type="text" class="form-control mr-2" placeholder="Search Everything">
                                    <button class="btn btn-light">
                                        <i class="feather-search text-success"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../assets/backend/img/user/profile.jpg" class="user-img shadow-sm" alt=""> Kyaw Win Tun
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Acount Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>