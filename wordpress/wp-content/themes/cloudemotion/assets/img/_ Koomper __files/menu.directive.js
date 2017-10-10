koomper.directive('customMenu', MenuCustom);
MenuCustom.$inject=["$http","$filter","$rootScope"]
function MenuCustom($http,$filter,$rootScope) {	
	return {
		restrict: 'E', 
		templateUrl: './components/commons/directives/views/menu.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {


			var admin=[
			{name:"Dashboard",iconClass:"fa fa-home",route:"admin.dashboard"},
			{name:"Users Management",iconClass:"fa fa-users",route:"admin.users.user"},
			{name:"Payments",iconClass:"fa fa-clone",next:[
			{name:"Payment Management",route:"admin.plans.payments"},
			{name:"Payment Statistics",route:"admin.payments"}
			]},
			{name:"My plans",iconClass:"fa fa-bank",next:[
			{name:"List of Plans",route:"admin.myplans"},
			]},
			{name:"Analytics",iconClass:"fa fa-bar-chart-o",route:"client.analytics.list"},
			]

			var client=[
			{name:"Dashboard",iconClass:"fa fa-home",route:"client.dashboard"},
			{name:"Banner Rotators",iconClass:"fa fa-clone",next:[
			{options:{banner:''},name:"New Banner Rotator",route:"admin.rotator.new"},
			{name:"My Library",route:"admin.rotator.library"}
			]},
			{name:"Analytics",iconClass:"fa fa-bar-chart-o",route:"client.analytics.list"},
			{name:"My plans",iconClass:"fa fa-dollar",next:[
			{name:"Change Plan",route:"client.plans.change"},
			{name:"Pending payments",route:"client.plans.payments"},
			{name:"Payment history",route:"client.plans.payments_history"},
			]},
			{name:"Users",iconClass:"fa fa-user",route:"admin.users.user"},
			{name:"Support",iconClass:"fa fa-mobile",route:"client.support"}
			]

			if ($rootScope.user.plans_id!=2) delete client[4];

			$scope.menu=$scope.user.level==1?admin:client;




			var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
			$BODY = $('body'),
			$MENU_TOGGLE = $('#menu_toggle'),
			$SIDEBAR_MENU = $('#sidebar-menu'),
			$SIDEBAR_FOOTER = $('.sidebar-footer'),
			$LEFT_COL = $('.left_col'),
			$NAV_MENU = $('.nav_menu'),
			$FOOTER = $('footer');
			var setContentHeight = function () {

				var bodyHeight = $BODY.outerHeight(),
				footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
				leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
				contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

				contentHeight -= $NAV_MENU.height() + footerHeight;

			};

			$SIDEBAR_MENU.on('click','a', function(ev) {
				console.log('clicked - sidebar_menu');
				var $li = $(this).parent();

				if ($li.is('.active')) {
					$li.removeClass('active active-sm');
					$('ul:first', $li).slideUp(function() {
						setContentHeight();
					});
				} else {
					if (!$li.parent().is('.child_menu')) {
						$SIDEBAR_MENU.find('li').removeClass('active active-sm');
						$SIDEBAR_MENU.find('li ul').slideUp();
					}else
					{
						if ( $BODY.is( ".nav-sm" ) )
						{
							$SIDEBAR_MENU.find( "li" ).removeClass( "active active-sm" );
							$SIDEBAR_MENU.find( "li ul" ).slideUp();
						}
					}
					$li.addClass('active');

					$('ul:first', $li).slideDown(function() {
						setContentHeight();
					});
				}
			});

			$MENU_TOGGLE.on('click', function() {
				console.log('clicked - menu toggle');

				if ($BODY.hasClass('nav-md')) {
					$SIDEBAR_MENU.find('li.active ul').hide();
					$SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
				} else {
					$SIDEBAR_MENU.find('li.active-sm ul').show();
					$SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
				}

				$BODY.toggleClass('nav-md nav-sm');

				setContentHeight();

				$('.dataTable').each ( function () { $(this).dataTable().fnDraw(); });
			});



			$(window).on("resize",function(){  
				setContentHeight();
			});

			setContentHeight();


			if ($.fn.mCustomScrollbar) {
				$('.menu_fixed').mCustomScrollbar({
					autoHideScrollbar: true,
					theme: 'minimal',
					mouseWheel:{ preventDefault: true }
				});
			}


		}
	};

}
