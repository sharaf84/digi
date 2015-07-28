/**
 * Dev Class
 * @description Functions written by developers
 * @author Ahmed Sharaf (sharaf.developer@gmail.com)
 * @copyright (c) 2015 Digitree (http://digitreeinc.com), All Right Reserved.
 * @version 1.0.0
 */

/**
 * Global Namespace
 * @type {Object}
 */
var Dev = Dev || {};

/**
 * Runs when document is ready
 * @author Ahmed Sharaf (sharaf.developer@gmail.com)
 */
Dev.onReady = function () {
    Dev.mainInit();
    
    /**
     * Auto submit product form
     */
    $('body').on('change', '#productForm select', function(){
        $('#productForm').submit();
    });
};

/**
 * Re Initialize some components after ajax event.
 * @author Ahmed Sharaf (sharaf.developer@gmail.com)
 * @todo Find more smart solution
 */
Dev.reInit = function () {};

/**
 * Initialize main components required to run the application
 * @author Ahmed Sharaf (sharaf.developer@gmail.com)
 */
Dev.mainInit = function () {};


$(document).ready(function () {
    Dev.onReady();
});
