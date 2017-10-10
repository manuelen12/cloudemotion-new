koomper.controller('PaymentsClientController',PaymentsClientController)

PaymentsClientController.$inject=["$scope","$filter","SessionService","PaymentsService","ENDPOINT"]

function PaymentsClientController ($scope,$filter,SessionService,PaymentsService,ENDPOINT) {
	console.log('PaymentsClientController');

    var vm=this,
    opts = {

            env: 'sandbox', // sandbox | production

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function() {

                // Set up a url on your server to create the payment
                var CREATE_URL = ENDPOINT+'/payment_plans/';

                // Make a call to your server to set up the payment
                return paypal.request.post(CREATE_URL)
                .then(function(res) {
                    return res.paymentID;
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Set up a url on your server to execute the payment
                var EXECUTE_URL = '/demo/checkout/api/paypal/payment/execute/';

                // Set up the data you need to pass to your server
                var data = {
                    paymentID: data.paymentID,
                    payerID: data.payerID
                };

                // Make a call to your server to execute the payment
                return paypal.request.post(EXECUTE_URL, data)
                .then(function (res) {
                    window.alert('Payment Complete!');
                });
            }

        }

        angular.extend(vm,{
        	filter:{status_payment:false},
        	opts:opts,
        	paginator:{helper:PaymentsService.getPay,current:1,count:10,sorting:true},
            setPayment:setPayment,
            deletePayment:deletePayment,
        })

        function deletePayment(pay) {
            PaymentsService.deletePaymentMethod(pay).then(function(response) {
                console.log(response);
                vm.paginator.table.reload();
            }, function(error) {
                console.log(error);
            });            
        }

        function setPayment(pay) {
            var data={user_plans_id:pay.id}
            PaymentsService.setPayment(data).then(function(response) {
                window.open(response.data);
                console.log(response);
            },function(error) {
                console.log(error);
            })
        }

        console.log(vm.paginator);

        this.$onInit=function() {
        }
    }

