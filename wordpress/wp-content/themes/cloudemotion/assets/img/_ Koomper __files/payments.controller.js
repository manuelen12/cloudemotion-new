koomper.controller('PaymentsController',PaymentsController)
koomper.controller('StatusPaymentsController',StatusPaymentsController)

PaymentsController.$inject=["$scope","SessionService","PaymentsService"]
StatusPaymentsController.$inject=["$scope","$stateParams","SessionService","PaymentsService"]

function PaymentsController ($scope,SessionService,PaymentsService) {
    console.log('PaymentsController');

    var vm=this;
    angular.extend(vm,{
        paginator:{helper:PaymentsService.getPay,current:1,count:10,sorting:true,filter:vm.userType},
        opts:opts,
        usertype:new Array(3),
        filter:{},
        stats:{average_income:0,total_u:0,user_pay:0}
    })

    this.$onInit=function() {
        PaymentsService.getStadistics().then(function(response) {
            console.log(response); 
            vm.stats=response.data;
        }, function(error) {
            console.log(error);    
            
        });
    }

        var opts = {
            env: 'production',
            client: {
                sandbox:    'AWi18rxt26-hrueMoPZ0tpGEOJnNT4QkiMQst9pYgaQNAfS1FLFxkxQuiaqRBj1vV5PmgHX_jA_c1ncL',
                production: 'AVZhosFzrnZ5Mf3tiOxAD0M6NHv8pcB2IFNHAfp_h69mmbd-LElFYkJUSII3Y0FPbm7S7lxBuqWImLbl'
            },
            payment: function() {
                var env    = this.props.env;
                var client = this.props.client;
                return paypal.rest.payment.create(env, client, {
                    transactions: [
                        {
                            amount: { total: '1.00', currency: 'USD' }
                        }
                    ]
                });
            },
            commit: true, // Optional: show a 'Pay Now' button in the checkout flow
            onAuthorize: function(data, actions) {
                // Optional: display a confirmation page here
                return actions.payment.execute().then(function() {
                    // Show a success page to the buyer
                });
            }
        };

 }
        
        
function StatusPaymentsController ($scope,$stateParams,SessionService,PaymentsService) {
    console.log("StatusPaymentsController");

    var vm=this;
    angular.extend(vm,{
        statusPayment:$stateParams
    })
    vm.statusPayment.pay_out=vm.statusPayment.pay_out=='true'?true:false;
    console.log(vm.statusPayment);

 }