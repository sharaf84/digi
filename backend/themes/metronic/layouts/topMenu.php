<?php

use yii\helpers\Url;
?>
<!-- BEGIN HORIZANTAL MENU -->
<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
<!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) sidebar menu below. So the horizontal menu has 2 seperate versions -->
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
<!--        <li class="classic-menu-dropdown active">
            <a href="<?= Url::home() ?>">
                Dashboard <span class="selected">
                </span>
            </a>
        </li>-->
        <li class="classic-menu-dropdown">
            <a data-toggle="dropdown" href="javascript:;">
                Store <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
                <li>
                    <a href="<?= Url::to(['/categories']) ?>"><i class="fa fa-bookmark-o"></i> Categories </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/brands']) ?>"><i class="fa fa-bookmark-o"></i> Brands </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/sizes']) ?>"><i class="fa fa-bookmark-o"></i> Sizes </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/flavors']) ?>"><i class="fa fa-bookmark-o"></i> Flavors </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/products']) ?>"><i class="fa fa-bookmark-o"></i> Products </a>
                </li>
<!--                <li class="dropdown-submenu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope-o"></i> More options </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                Second level link </a>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                More options </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.html">
                                        Third level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                        Third level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                        Third level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                        Third level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                        Third level link </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.html">
                                Second level link </a>
                        </li>
                        <li>
                            <a href="index.html">
                                Second level link </a>
                        </li>
                        <li>
                            <a href="index.html">
                                Second level link </a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </li>
        <li>
            <a href="<?= Url::to(['/articles']) ?>"> Articles </a>
        </li>
        <li>
            <a href="<?= Url::to(['/pages']) ?>"> Pages </a>
        </li>
        <li>
            <a href="<?= Url::to(['/users']) ?>"> Users </a>
        </li>
        <li>
            <a href="<?= Url::to(['/orders']) ?>"> Orders </a>
        </li>
        <!--        <li class="mega-menu-dropdown">
                    <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                        Mega <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                             Content container to add padding 
                            <div class="mega-menu-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="mega-menu-submenu">
                                            <li>
                                                <h3>Layouts</h3>
                                            </li>
                                            <li>
                                                <a href="index_horizontal_menu.html">
                                                    Dashboard & Mega Menu </a>
                                            </li>
                                            <li>
                                                <a href="layout_horizontal_sidebar_menu.html">
                                                    Horizontal & Sidebar Menu </a>
                                            </li>
                                            <li>
                                                <a href="layout_fontawesome_icons.html">
                                                    Layout with Fontawesome</a>
                                            </li>
                                            <li>
                                                <a href="layout_glyphicons.html">
                                                    Layout with Glyphicon</a>
                                            </li>
                                            <li>
                                                <a href="layout_full_height_portlet.html">
                                                    Full Height Portlet <span class="badge badge-roundless badge-danger">new</span></a>
                                            </li>
                                            <li>
                                                <a href="layout_full_height_content.html">
                                                    Full Height Content <span class="badge badge-roundless badge-warning">new</span></a>
                                            </li>
                                            <li>
                                                <a href="layout_horizontal_menu1.html">
                                                    Horizontal Mega Menu 1 </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="mega-menu-submenu">
                                            <li>
                                                <h3>More Layouts</h3>
                                            </li>
                                            <li>
                                                <a href="layout_horizontal_menu2.html">
                                                    Horizontal Mega Menu 2 </a>
                                            </li>
                                            <li>
                                                <a href="layout_search_on_header1.html">
                                                    Search Box On Header 1 </a>
                                            </li>
                                            <li>
                                                <a href="layout_search_on_header2.html">
                                                    Search Box On Header 2 </a>
                                            </li>
                                            <li>
                                                <a href="layout_sidebar_search_option1.html">
                                                    Sidebar Search Option 1 </a>
                                            </li>
                                            <li>
                                                <a href="layout_sidebar_search_option2.html">
                                                    Sidebar Search Option 2 </a>
                                            </li>
                                            <li>
                                                <a href="layout_sidebar_reversed.html">
                                                    Right Sidebar Page </a>
                                            </li>
                                            <li>
                                                <a href="layout_sidebar_fixed.html">
                                                    Sidebar Fixed Page </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="mega-menu-submenu">
                                            <li>
                                                <h3>Even More!</h3>
                                            </li>
                                            <li>
                                                <a href="layout_sidebar_closed.html">
                                                    Sidebar Closed Page </a>
                                            </li>
                                            <li>
                                                <a href="layout_ajax.html">
                                                    Content Loading via Ajax </a>
                                            </li>
                                            <li>
                                                <a href="layout_disabled_menu.html">
                                                    Disabled Menu Links </a>
                                            </li>
                                            <li>
                                                <a href="layout_blank_page.html">
                                                    Blank Page </a>
                                            </li>
                                            <li>
                                                <a href="layout_boxed_page.html">
                                                    Boxed Page </a>
                                            </li>
                                            <li>
                                                <a href="layout_language_bar.html">
                                                    Language Switch Bar </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="mega-menu-dropdown mega-menu-full">
                    <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                        Full Mega <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                             Content container to add padding 
                            <div class="mega-menu-content ">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul class="mega-menu-submenu">
                                                    <li>
                                                        <h3>Layouts</h3>
                                                    </li>
                                                    <li>
                                                        <a href="index_horizontal_menu.html">
                                                            <i class="fa fa-angle-right"></i> Dashboard & Mega Menu </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_horizontal_sidebar_menu.html">
                                                            <i class="fa fa-angle-right"></i> Horizontal & Sidebar Menu </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_fontawesome_icons.html">
                                                            <i class="fa fa-angle-right"></i> Layout with Fontawesome</a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_glyphicons.html">
                                                            <i class="fa fa-angle-right"></i> Layout with Glyphicon</a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_full_height_portlet.html">
                                                            <i class="fa fa-angle-right"></i> Full Height Portlet <span class="badge badge-roundless badge-danger">new</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_full_height_content.html">
                                                            <i class="fa fa-angle-right"></i> Full Height Content <span class="badge badge-roundless badge-warning">new</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_horizontal_menu1.html">
                                                            <i class="fa fa-angle-right"></i> Horizontal Mega Menu 1 </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="mega-menu-submenu">
                                                    <li>
                                                        <h3>More Layouts</h3>
                                                    </li>
                                                    <li>
                                                        <a href="layout_horizontal_menu2.html">
                                                            <i class="fa fa-angle-right"></i> Horizontal Mega Menu 2 </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_search_on_header1.html">
                                                            <i class="fa fa-angle-right"></i> Search Box On Header 1 </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_search_on_header2.html">
                                                            <i class="fa fa-angle-right"></i> Search Box On Header 2 </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_sidebar_search_option1.html">
                                                            <i class="fa fa-angle-right"></i> Sidebar Search Option 1 </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_sidebar_search_option2.html">
                                                            <i class="fa fa-angle-right"></i> Sidebar Search Option 2 </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_sidebar_reversed.html">
                                                            <i class="fa fa-angle-right"></i> Right Sidebar Page </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_sidebar_fixed.html">
                                                            <i class="fa fa-angle-right"></i> Sidebar Fixed Page </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="mega-menu-submenu">
                                                    <li>
                                                        <h3>Even More!</h3>
                                                    </li>
                                                    <li>
                                                        <a href="layout_sidebar_closed.html">
                                                            <i class="fa fa-angle-right"></i> Sidebar Closed Page </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_ajax.html">
                                                            <i class="fa fa-angle-right"></i> Content Loading via Ajax </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_disabled_menu.html">
                                                            <i class="fa fa-angle-right"></i> Disabled Menu Links </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_blank_page.html">
                                                            <i class="fa fa-angle-right"></i> Blank Page </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_boxed_page.html">
                                                            <i class="fa fa-angle-right"></i> Boxed Page </a>
                                                    </li>
                                                    <li>
                                                        <a href="layout_language_bar.html">
                                                            <i class="fa fa-angle-right"></i> Language Switch Bar </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="accordion" class="panel-group">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                                            Mega Menu Info #1 </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse in">
                                                    <div class="panel-body">
                                                        Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                                            Mega Menu Info #2 </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                            Mega Menu Info #3 </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>-->
    </ul>
</div>
<!-- END HORIZANTAL MENU -->


<!-- BEGIN HEADER SEARCH BOX -->
<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
<!--<form class="search-form" action="extra_search.html" method="GET">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." name="query">
        <span class="input-group-btn">
            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
        </span>
    </div>
</form>-->
<!-- END HEADER SEARCH BOX -->