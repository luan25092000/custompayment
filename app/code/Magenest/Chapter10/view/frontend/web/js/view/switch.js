define(
    [
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Magenest_Chapter10/switch'
            },
            //add here your logic to display step,
            isVisible: ko.observable(true),
            /**
             *
             * @returns {*}
             */
            initialize: function () {
                this._super();
                stepNavigator.registerStep(
                    'authentication_code',
                    null,
                    'Authentication',
                    this.isVisible,
                    _.bind(this.navigate, this),
                    9
                );
                return this;
            },
            /**
             * @returns void
             */
            navigateToNextStep: function () {
                stepNavigator.next();
            },
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
            }
        });
    }
);
