<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> E-Commerce</a></div>
<div class="sl-sideleft">


    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="index.html" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link">Category</a></li>
            <li class="nav-item"><a href="{{route('subcategory.index')}}" class="nav-link">Sub Category</a></li>
            <li class="nav-item"><a href="{{route('brand.index')}}" class="nav-link">Brand</a></li>


        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-gear-outline tx-20"></i>
                <span class="menu-item-label">Coupon</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

            <li class="nav-item"><a href="{{route('coupon.index')}}" class="nav-link">Coupons</a></li>

        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Product</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('product.add')}}" class="nav-link">Add Product</a></li>
            <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link">All Products</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Others</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('newsletter.index')}}" class="nav-link">Newsletters</a></li>

        </ul>


    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
