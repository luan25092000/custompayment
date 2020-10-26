define(
    [
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'Magento_Customer/js/model/customer',
        'mage/url',
        'jquery'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        customer,
        url,
        $
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Magenest_Chapter10/authentication'
            },
            /**
             * Check if customer is logged in
             *
             * @return {boolean}
             */
            isLoggedIn: function () {
                return customer.isLoggedIn();
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
            navigate: function () {
                this.isVisible(true);
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
            },
            //checkAccount
            checkAccount: function () {
                let url = "http://luan.lh.com/chapter10/index/check";
                let email = $("#email").val();
                let password = $("#password").val();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {email: email, password: password},
                    showLoader: true,
                    cache: false,
                    success: function (response) {
                        console.log(response)
                        if (response == 1) {
                            stepNavigator.next();
                        } else {
                            $("#email").val("");
                            $("#password").val("");
                            $("#error").css("display", "block");
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }
);
