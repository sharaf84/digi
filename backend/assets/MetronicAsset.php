<?php

/**
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 * @copyright Copyright (c) 2015 Digitree
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Metronic Asset
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MetronicAsset extends AssetBundle {

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/metronic/assets/';
    public $css = [
        //BEGIN GLOBAL MANDATORY STYLES
        'global/plugins/font-awesome/css/font-awesome.min.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'global/plugins/bootstrap/css/bootstrap.min.css',
        'global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'global/plugins/uniform/css/uniform.default.css',
        //END GLOBAL MANDATORY STYLES
        //BEGIN PAGE LEVEL PLUGIN STYLES
        'global/plugins/gritter/css/jquery.gritter.css',
        'global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
        'global/plugins/fullcalendar/fullcalendar/fullcalendar.css',
        'global/plugins/jqvmap/jqvmap/jqvmap.css',
        //END PAGE LEVEL PLUGIN STYLES
        //BEGIN PAGE STYLES
        'admin/pages/css/tasks.css',
        //END PAGE STYLES
        //BEGIN THEME STYLES
        'global/css/components.css',
        'global/css/plugins.css',
        'admin/layout/css/layout.css',
        'admin/layout/css/themes/default.css',
        'admin/layout/css/custom.css',
            //END THEME STYLES
    ];

    /**
     * <!--[if lt IE 9]>
     *   <script src="assets/global/plugins/respond.min.js"></script>
     *   <script src="assets/global/plugins/excanvas.min.js"></script> 
     * <![endif]-->
     */
    public $js = [
        /** BEGIN CORE PLUGINS * */
        'global/plugins/jquery-migrate-1.2.1.min.js',
        'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'global/plugins/jquery.blockui.min.js',
        'global/plugins/jquery.cokie.min.js',
        'global/plugins/uniform/jquery.uniform.min.js',
        'global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        /** END CORE PLUGINS * */
        /** BEGIN PAGE LEVEL PLUGINS * */
        'global/plugins/jqvmap/jqvmap/jquery.vmap.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
        'global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',
        'global/plugins/flot/jquery.flot.min.js',
        'global/plugins/flot/jquery.flot.resize.min.js',
        'global/plugins/flot/jquery.flot.categories.min.js',
        'global/plugins/jquery.pulsate.min.js',
        'global/plugins/bootstrap-daterangepicker/moment.min.js',
        'global/plugins/bootstrap-daterangepicker/daterangepicker.js',
        // IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support
        'global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js',
        'global/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
        'global/plugins/jquery.sparkline.min.js',
        'global/plugins/gritter/js/jquery.gritter.js',
        /** END PAGE LEVEL PLUGINS * */
        /** BEGIN PAGE LEVEL SCRIPTS * */
        'global/scripts/metronic.js',
        'admin/layout/scripts/layout.js',
        'admin/layout/scripts/quick-sidebar.js',
        'admin/layout/scripts/demo.js',
        'admin/pages/scripts/index.js',
        'admin/pages/scripts/tasks.js',
            /** END PAGE LEVEL SCRIPTS * */
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //IMPORTANT! Load jquery-ui.js before bootstrap.js to fix bootstrap tooltip conflict with jquery ui tooltip
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
