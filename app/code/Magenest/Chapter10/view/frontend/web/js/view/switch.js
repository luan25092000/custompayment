define(
    [
        'ko',
        'Magento_Tax/js/view/checkout/summary/shipping',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'mage/url'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        url,
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Magenest_Chapter10/switch'
            },
            /**
             * @returns void
             */
            navigateToNextStep: function () {
                stepNavigator.next();
            },
            //Comeback page
            navigateToPreviousStep: function () {
                let cart = url.build('checkout/cart/');
                let authentication = url.build('checkout/#authentication_code');
                let shipping = url.build('checkout/#shipping');
                let payment = url.build('checkout/#payment');
                let currentUrl = window.location.href;
                if (currentUrl === authentication) {
                    location.replace(cart);
                } else if (currentUrl === shipping) {
                    location.replace(authentication);
                } else if (currentUrl === payment) {
                    location.replace(shipping);
                }
            },
            showTotal: function () {
                let authentication = url.build('checkout/#authentication_code');
                let shipping = url.build('checkout/#shipping');
                let payment = url.build('checkout/#payment');
                let currentUrl = window.location.href;
                if (currentUrl === authentication || currentUrl === shipping) {
                    return Math.round(this.total);
                }
            },
            showButton: function(){
                let payment = url.build('checkout/#payment');
                let currentUrl = window.location.href;
                return currentUrl === payment;
            }
        });
    }
);

