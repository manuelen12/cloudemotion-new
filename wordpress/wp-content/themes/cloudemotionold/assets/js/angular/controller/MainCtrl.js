Gifto.controller("MainCtrl", MainCtrl)
MainCtrl.$inject = ["$scope","ValidatorService","CookieService","messageService","ENDPOINT","STATIC","$http"];

function MainCtrl($scope,ValidatorService,CookieService,messageService,ENDPOINT,STATIC,$http) {
	var vm = this;
	var custom_vc_js = function () {
		vc_rowBehaviour();
		tpath_vc_rowBehaviour();
		jQuery( document ).trigger( 'custom_vc_js' );
	};
	var tpath_vc_rowBehaviour = function () {
		var local_function = function () {
			var $elements = jQuery( '[data-vc-full-width="true"]' );
			jQuery.each( $elements, function ( key, item ) {
				var $el = jQuery( this );
				$el.addClass("vc_hidden");
				var $el_full = $el.next( '.vc_row-full-width' );

				var el_margin_left = parseInt( $el.css( 'margin-left' ), 10 );
				var el_margin_right = parseInt( $el.css( 'margin-right' ), 10 );  

				if( jQuery('body').hasClass('boxed') ) {
					var width = jQuery( '#tpath_wrapper' ).width();
					var offset = 0;
				} else {
					var width = jQuery( window ).width();
					var offset = 0 - $el_full.offset().left - el_margin_left;
				}

				$el.css({
					position: "relative",
					left: offset,
					"box-sizing": "border-box",
					width: width
				});    

				if ( ! $el.data( 'vcStretchContent' ) ) {
					var padding = (- 1 * offset);
					if ( padding < 0 ) {
						padding = 0;
					}
					var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
					if ( paddingRight < 0 ) {
						paddingRight = 0;
					}
					$el.css( { 'padding-left': padding + 'px', 'padding-right': paddingRight + 'px' } );
				}
				$el.attr( "data-vc-full-width-init", "true" );
				$el.removeClass("vc_hidden");
			} );
		};
		local_function();
		jQuery( window ).unbind( 'resize.tpath_vc_rowBehaviour' ).bind( 'resize.tpath_vc_rowBehaviour', local_function );
	}
	var onLoad = {
		init: function(){
			"use strict";
			if( jQuery('body').hasClass('boxed') ) {
				jQuery('.boxed-layout > a').addClass('active');
			} else {
				jQuery('.fullwidth-layout > a').addClass('active');
			}


			jQuery('.switcher-options.layout-select li').on('click', 'a', function(e) {
				e.preventDefault();

				jQuery('.layout-select li > a').removeClass('active');
				jQuery(this).addClass('active');
				var selected_layout = jQuery(this).data('mode');

				if( selected_layout === "boxed" ) {
					jQuery("body").removeClass('fullwidth');
					jQuery("body").addClass('boxed');
				} else if( selected_layout === "fullwidth" ) {
					jQuery("body").removeClass('boxed');
					jQuery("body").addClass('fullwidth');
					jQuery("body").removeAttr('style');
				}

				custom_vc_js();

				jQuery("body").find('.vc_row.wpb_row .vc-match-height-row').each(function(){
					var $this = jQuery(this);
					var $column_height_wrapper = $this.find('.wpb_column.vc_main_column');
					$column_height_wrapper.trigger( "resize" );
				});  

				jQuery("body").find('.forcefullwidth_wrapper_tp_banner').each(function(){
					var $this = jQuery(this);
					var $slider_wrapper = $this.find('.rev_slider_wrapper');

					if( $slider_wrapper.hasClass('fullwidthbanner-container') || $slider_wrapper.hasClass('fullscreen-container') ) {
						var width = jQuery( '#tpath_wrapper' ).width();
						if( selected_layout === "boxed" ) {
							$slider_wrapper.css({ "max-width": width + 'px', "left": 0, "right": 0 });
						} else {
							$slider_wrapper.css({ "max-width": "none", "left": 0, "right": 0 });
						}
					}
				});  

				jQuery("body").find('.tpath-portfolio').each(function(){
					var $this = jQuery(this);
					var $portfolio_container = $this.find('.portfolio-container');
					$portfolio_container.isotope('destroy');
					tpath_PortfolioInit();
				});

				jQuery("body").find('.tpath-posts-container.grid-layout').each(function(){
					jQuery(this).masonry('destroy');
					tpath_initBlogGrid();
				});

			});

			jQuery('.image-patterns li').on('click', 'a', function(e) {
				e.preventDefault();
				var bg_img = jQuery(this).data('image'),
				bg_repeat = jQuery(this).data('repeat'),
				bg_url = jQuery('.image-patterns').data('bgpath');            

				jQuery(this).parent().parent().find('a.active').removeClass('active');
				jQuery('body').css('background', 'url('+bg_url+bg_img+') '+bg_repeat+' center top fixed');
				jQuery(this).addClass('active');
			});

			jQuery('.color-presets li').on('click', 'a', function(e) {

				e.preventDefault();
				var title = jQuery(this).attr('title');

				jQuery('body').find(".pageloader").slideDown(100);
				jQuery('#volunteer-color-scheme-style-css').attr('href', volunteer_js_vars.volunteer_template_uri + '/color-schemes/' + title + '.css');
				jQuery(this).parent().parent().find('a.active').removeClass('active');
				jQuery(this).addClass('active');
				jQuery('body').find(".pageloader").delay(1000).slideUp("slow");

			});

		}
	};

	onLoad.init;

	function revslider_showDoubleJqueryError(sliderID) {
		var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
		errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
		errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
		errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
		errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
		jQuery(sliderID).show().html(errorMessage);
	}
	vm.message = "hola";

	this.$onInit=function() {
		jQuery('body').find(".pageloader").delay(1000).slideUp("slow");
		setTimeout(function() {
			jQuery('.owl-carousel2').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				animateOut: 'slideOutDown',
				animateIn: 'fadeIn',
				autoplay:true,
				navText: [
				"<i class='fa fa-chevron-left'></i>",
				"<i class='fa fa-chevron-right'></i>"
				],
				responsiveClass:true,
				autoplayTimeout:10000,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})
			

			jQuery('.owl-carousel3').owlCarousel({
				nav:false,
				navText: [
				"<i class='fa fa-chevron-left'></i>",
				"<i class='fa fa-chevron-right'></i>"
				],
				responsiveClass:true,
				autoplayTimeout:10000,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:3
					},
					1500:{
						items:3
					}
				}
			})

		}, 1000);
	}
	var options={
		chart: {
			type:"area",
			backgroundColor: 'transparent',
		},
		title: {
			text: 'Calcula en tiempo real tus beneficios a largo y medio plazo con GIFTO'
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			verticalAlign: 'top',
			x: 100,
			y: 100,
			floating: true,
			borderWidth: 1,
		},
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}]
		},

		xAxis: {
			type: 'category',
		},
		yAxis: {
			title: {
				text: 'Ahorros'
			},
			min: 0,
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			series:{
				turboThreshold:70000,

			},
		},
		series:[
		{
			name:"Aportes de Opener",
			data:
			[{"name":"Inicio","y":548},{"name":"Año #1","y":1124},{"name":"Año #2","y":1741},{"name":"Año #3","y":2401},{"name":"Año #4","y":3107},{"name":"Año #5","y":3862},{"name":"Año #6","y":4681},{"name":"Año #7","y":5547},{"name":"Año #8","y":6473},{"name":"Año #9","y":7464},{"name":"Año #10","y":8524},{"name":"Año #11","y":9659},{"name":"Año #12","y":10873},{"name":"Año #13","y":12183},{"name":"Año #14","y":13573},{"name":"Año #15","y":15061},{"name":"Año #16","y":16653},{"name":"Año #17","y":18357}]}]
		}



		var arrayGiver=[
		{type_name:"Propios",type:"2",aportes:10,aportantes:1,class:"op",frecuencia:7},
		{type_name:"Abuelos",type:"3",aportes:null,limit:4,count:"",class:"ab",img:"abuelas.png"},
		{type_name:"Padres",type:"4",aportes:null,limit:2,count:"",class:"pa",img:"padres.png"},
		{type_name:"Tios",type:"5",aportes:null,limit:10,count:"",class:"ti",img:"amigos.jpg"},
		{type_name:"Familiares",type:"6",aportes:null,limit:10,count:"",class:"he",img:"hermanas.png"},
		{type_name:"Amigos",type:"7",aportes:null,limit:20,count:"",class:"am",img:"amigas.png"}],
		steps=[
		{title:"Unite a GIFTO",description:"Se parte de nuestra plataforma con un solo clic."},
		{title:"Dás futuro a los que más querés",description:"Elegís cuanto, cuando y como..."},
		{title:"Recibís Gift para donar a los que hoy te necesitan",description:"Hay muchas instituciones educativas, financieras y ONG que estarán felices de recibir tu donación."},
		]


		angular.extend(vm,	{
			chart:"",
			modalbox:"",
			total:0,
			giversTitle:[],
			steps:steps,
			name:"",
			baseurl:ENDPOINT,
			givers:{content:arrayGiver,aporte:"",age:""},
			optionsChart:options,
			setChartOptions:setChartOptions,
			setGivers:setGivers,
			seeGarbash:seeGarbash,
		})


		angular.element("body").on("keypress","input[validateInp]",function(e) {
			var chart=String.fromCharCode(e.charCode),
			element=this,
			type=angular.element(this).attr("data-type"),
			max=angular.element(this).attr("data-max"),
			min=angular.element(this).attr("data-min"),
			max=type?parseFloat(max):parseInt(max);
			min=min?(type?parseFloat(min):parseInt(min)):0;
			value=angular.element(this).val()+chart;
			value=type?parseFloat(value):parseInt(value);


			if (time) clearTimeout(time);
			var time=setTimeout(function() {
				if (min>value) angular.element(element).val("");
			},1000)
			if (isNaN(chart) || value>max) {
				e.preventDefault();
			}
		})

		function setGivers(data,status) {
			if (!status) {
				data.aportantes="";
				data.aportes="";
				data.frecuencia="";
			}
		}
		
		function seeGarbash(data) {
			if (!data || !data.aportantes && !data.aportes && !data.frecuencia ) {
				data.dirty=false;
			}else data.dirty=true;
		}

		var before=0;
		function setFrecuenlyMonth(month,numY) {
			var actualYear=parseInt(moment().format("YYYY")),
			year=(actualYear-numY);
			return moment(year+"-"+month,"YYYY-MM").daysInMonth();
		}

		function calculateFrecuency(data,auto_in,day){

			var freg=(data.frecuencia==7?365:(data.frecuencia==30?365:(data.frecuencia==365?365:1)))
			elevado = Math.pow(Math.pow(1.05,(1/365)), auto_in)
			if (!(auto_in % data.frecuencia)){
				return data.aportes*elevado*data.aportantes;
			}else{
				return 0;
			}

		}


		function sendData(email,seriesVal,count) {
			console.log(count);
			setTimeout(function() {
				var send={
					"email": email,
					"nombre": (messageService.getname()),
					"edad": vm.givers.age,
					"frecuencia": vm.givers.content[0].frecuencia,
					"aportes": vm.givers.content[0].aportes,
					"aportantes": [],
				}

				jQuery.map(seriesVal,function(val,ind) {
					send.aportantes.push(
					{
						"tipo": val.type,
						"cantidad": val.aportes,
						"aportes_promedio": val.cantidad,
						"frecuencia": val.frecuencia,
						"aportantes": val.aportantes
					}
					)
				})
				send.aportantes=JSON.stringify(send.aportantes);
				var options={
					url:ENDPOINT+"/new/api.php",
					method:"GET",
					params:send
				}
				$http(options).then(function(response) {
					count=count?(count+1):1;
					CookieService.createCookie("question",count,1);
					messageService.success("¡Excelente!","Te hemos enviado un Correo Electronico con toda la información a detalle.");
					vm.givers={content:arrayGiver,aporte:"",age:""};
					messageService.getname(true)
				}, function (error) {
					messageService.error("¡Lo sentimos!","Ha ocurrido un error - Intentelo de nuevo mas tarde.");
				})
			},1000)
		}

		function setChartOptions() {
			if (ValidatorService.graphics(vm.givers)) {
				chart=angular.copy(vm.optionsChart)

				clearTimeout(vm.modalbox);
				var target=angular.copy(vm.givers.content),
				openAccount=false,
				account=[],
				seriesVal=[],
				calc=0,
				flag=0,
				aporteAsumar=0,
				ret_anual=0.05,
				vol_anual=0.05,
				arrayYears=new Array((18-(vm.givers.age))),
				cartera_diaria=0,
				cartera=0,
				bandaInferior=0,
				bandaSuperior=0;
				chart.series=[];
				jQuery.map(target, function(valContent, inda) {
					cartera=0;
					cartera_diaria=0;
					seriesVal.push({indexYear:"",series:[],lastValue:0});
					valContent.aportantes=parseInt(valContent.aportantes);
					valContent.aportes=parseInt(valContent.aportes);
					valContent.frecuencia=parseInt(valContent.frecuencia);
					x = 0;
					jQuery.map(arrayYears,function(val, indi) {
						if (valContent.aportantes && valContent.aportes && valContent.frecuencia) {	
							aporteAsumar=valContent.aportes*valContent.aportantes;
							flag=0;
							jQuery.map(new Array(Math.round(365)),function(val,ind) {								
								flag++;
								var month=Math.round((ind+1)/365);
								month=!month?1:month;
								cartera_diaria+= cartera_diaria*(Math.pow(1.05,(1/365))-1)
								if (!(x % valContent.frecuencia)){
									cartera+=aporteAsumar;
									cartera_diaria+=aporteAsumar
								}
								x = x + 1;
								flag=0;

							})
							seriesVal[inda].series.push({name:(!indi?"Inicio":"Año #"+(indi)),y: cartera_diaria.toFixed(2),amount:parseFloat(cartera)});
							seriesVal[inda].cantidad=cartera_diaria.toFixed(2);
							seriesVal[inda].object=cartera_diaria.toFixed(2);
							seriesVal[inda].type=valContent.type;
							seriesVal[inda].aportes=valContent.aportes;
							seriesVal[inda].frecuencia=valContent.frecuencia;
							seriesVal[inda].aportantes=valContent.aportantes;
						}else if (valContent.dirty) {
							messageService.info("¡Atencion!","Ten en cuenta que debes llenar Aportantes, Aportes y frecuencia para que el Aportante sea reflejado en la grafica .");
						}
					})
				})
				console.log(seriesVal);
				vm.total=0;
				seriesVal=seriesVal.sort(sortSeries);
				seriesVal=seriesVal.filter(filterEmptySeries);
				seriesVal=seriesVal.reverse();
				var series=[[0],[0]]

				jQuery.map(seriesVal,function (val,ind) {
					if (val.aportes && val.frecuencia) {	
						jQuery.map(val.series,function (val2,ind2) {
							if (!series[0][ind2]) {series[0][ind2]={y:0}}
								if (!series[1][ind2]) {series[1][ind2]={y:0}}

									series[0][ind2].name="Año #"+(ind2+1);
								series[1][ind2].name="Año #"+(ind2+1);
								series[0][ind2].y+=parseFloat(val2.y);
								series[1][ind2].y+=parseFloat(val2.amount);
							});
					}
				})
				vm.total=series[0][(series[0].length-1)].y;
				series[0].unshift({name:"Inicio",y:0})
				series[1].unshift({name:"Inicio",y:0})
				chart.series.push({name:"Financiado - Gifto",data:series[0],threshold: null});
				chart.series.push({name:"Ahorros sin Gifto",data:series[1],threshold: null});
				vm.optionsChart=chart;
				vm.modalbox=setTimeout(function(argument) {
					if (CookieService.readCookie("question")==3) return false;	
					var count=CookieService.readCookie("question");
					messageService.confirmGraphic().then(function(email,element) {
						sendData(email,seriesVal,count);
					}, function(error) {
						sendData(null,seriesVal,count);
					})
				},1000)
			}
		}


		function sortSeries(a,b) {
			if (a.series[0] && b.series[0]) {
				return a.series[0].y-b.series[0].y
			}
		}
		function filterEmptySeries(a) {
			return a.series[0]
		}

		jQuery(window).resize(function(e) {
			if (vm.chart) {

				var target= jQuery("#resizer");
				vm.chart.setSize(
					target.width() - 20,
					false
					);
			}

		});

	}
