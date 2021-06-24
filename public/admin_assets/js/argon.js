
/*!

=========================================================
* Argon Dashboard - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/



//
// Layout
//


$(function () 
 {
	$('[data-toggle="tooltip"]').tooltip()
 });

'use strict';

var Layout = (function() {

    function pinSidenav() {
        $('.sidenav-toggler').addClass('active');
        $('.sidenav-toggler').data('action', 'sidenav-unpin');
        $('body').removeClass('g-sidenav-hidden').addClass('g-sidenav-show g-sidenav-pinned');
        $('body').append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target='+$('#sidenav-main').data('target')+' />');

        // Store the sidenav state in a cookie session
        Cookies.set('sidenav-state', 'pinned');
    }

    function unpinSidenav() {
        $('.sidenav-toggler').removeClass('active');
        $('.sidenav-toggler').data('action', 'sidenav-pin');
        $('body').removeClass('g-sidenav-pinned').addClass('g-sidenav-hidden');
        $('body').find('.backdrop').remove();

        // Store the sidenav state in a cookie session
        Cookies.set('sidenav-state', 'unpinned');
    }

    // Set sidenav state from cookie

    var $sidenavState = Cookies.get('sidenav-state') ? Cookies.get('sidenav-state') : 'pinned';

    if($(window).width() > 1200) {
        if($sidenavState == 'pinned') {
            pinSidenav()
        }

        if(Cookies.get('sidenav-state') == 'unpinned') {
            unpinSidenav()
        }

        $(window).resize(function() {
            if( $('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
                $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
            }
        })
    }

    if($(window).width() < 1200){
      $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
      $('body').removeClass('g-sidenav-show');
      $(window).resize(function() {
          if( $('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
              $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
          }
      })
    }



    $("body").on("click", "[data-action]", function(e) {

        e.preventDefault();

        var $this = $(this);
        var action = $this.data('action');
        var target = $this.data('target');


        // Manage actions

        switch (action) {
            case 'sidenav-pin':
                pinSidenav();
            break;

            case 'sidenav-unpin':
                unpinSidenav();
            break;

            case 'search-show':
                target = $this.data('target');
                $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-showing');

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-showing').addClass('g-navbar-search-show');
                }, 150);

                setTimeout(function() {
                    $('body').addClass('g-navbar-search-shown');
                }, 300)
            break;

            case 'search-close':
                target = $this.data('target');
                $('body').removeClass('g-navbar-search-shown');

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-hiding');
                }, 150);

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-hiding').addClass('g-navbar-search-hidden');
                }, 300);

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-hidden');
                }, 500);
            break;
        }
    })


    // Add sidenav modifier classes on mouse events

    $('.sidenav').on('mouseenter', function() {
        if(! $('body').hasClass('g-sidenav-pinned')) {
            $('body').removeClass('g-sidenav-hide').removeClass('g-sidenav-hidden').addClass('g-sidenav-show');
        }
    })

    $('.sidenav').on('mouseleave', function() {
        if(! $('body').hasClass('g-sidenav-pinned')) {
            $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hide');

            setTimeout(function() {
                $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
            }, 300);
        }
    })


    // Make the body full screen size if it has not enough content inside
    $(window).on('load resize', function() {
        if($('body').height() < 800) {
            $('body').css('min-height', '100vh');
            $('#footer-main').addClass('footer-auto-bottom')
        }
    })

})();

//
// Charts
//

'use strict';

var Charts = (function() {

	// Variable

	var $toggle = $('[data-toggle="chart"]');
	var mode = 'light';//(themeMode) ? themeMode : 'light';
	var fonts = {
		base: 'Open Sans'
	}

	// Colors
	var colors = {
		gray: {
			100: '#f6f9fc',
			200: '#e9ecef',
			300: '#dee2e6',
			400: '#ced4da',
			500: '#adb5bd',
			600: '#8898aa',
			700: '#525f7f',
			800: '#32325d',
			900: '#212529'
		},
		theme: {
			'default': '#172b4d',
			'primary': '#5e72e4',
			'secondary': '#f4f5f7',
			'info': '#11cdef',
			'success': '#2dce89',
			'danger': '#f5365c',
			'warning': '#fb6340'
		},
		black: '#12263F',
		white: '#FFFFFF',
		transparent: 'transparent',
	};


	// Methods

	// Chart.js global options
	function chartOptions() {

		// Options
		var options = {
			defaults: {
				global: {
					responsive: true,
					maintainAspectRatio: false,
					defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontFamily: fonts.base,
					defaultFontSize: 13,
					layout: {
						padding: 0
					},
					legend: {
						display: false,
						position: 'bottom',
						labels: {
							usePointStyle: true,
							padding: 16
						}
					},
					elements: {
						point: {
							radius: 0,
							backgroundColor: colors.theme['primary']
						},
						line: {
							tension: .4,
							borderWidth: 4,
							borderColor: colors.theme['primary'],
							backgroundColor: colors.transparent,
							borderCapStyle: 'rounded'
						},
						rectangle: {
							backgroundColor: colors.theme['warning']
						},
						arc: {
							backgroundColor: colors.theme['primary'],
							borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
							borderWidth: 4
						}
					},
					tooltips: {
						enabled: true,
						mode: 'index',
						intersect: false,
					}
				},
				doughnut: {
					cutoutPercentage: 83,
					legendCallback: function(chart) {
						var data = chart.data;
						var content = '';

						data.labels.forEach(function(label, index) {
							var bgColor = data.datasets[0].backgroundColor[index];

							content += '<span class="chart-legend-item">';
							content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
							content += label;
							content += '</span>';
						});

						return content;
					}
				}
			}
		}

		// yAxes
		Chart.scaleService.updateScaleDefaults('linear', {
			gridLines: {
				borderDash: [2],
				borderDashOffset: [2],
				color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
				drawBorder: false,
				drawTicks: false,
				drawOnChartArea: true,
				zeroLineWidth: 0,
				zeroLineColor: 'rgba(0,0,0,0)',
				zeroLineBorderDash: [2],
				zeroLineBorderDashOffset: [2]
			},
			ticks: {
				beginAtZero: true,
				padding: 10,
				callback: function(value) {
					if (!(value % 10)) {
						return value
					}
				}
			}
		});

		// xAxes
		Chart.scaleService.updateScaleDefaults('category', {
			gridLines: {
				drawBorder: false,
				drawOnChartArea: false,
				drawTicks: false
			},
			ticks: {
				padding: 20
			},
			maxBarThickness: 10
		});

		return options;

	}

	// Parse global options
	function parseOptions(parent, options) {
		for (var item in options) {
			if (typeof options[item] !== 'object') {
				parent[item] = options[item];
			} else {
				parseOptions(parent[item], options[item]);
			}
		}
	}

	// Push options
	function pushOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].push(data);
				});
			} else {
				pushOptions(parent[item], options[item]);
			}
		}
	}

	// Pop options
	function popOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].pop();
				});
			} else {
				popOptions(parent[item], options[item]);
			}
		}
	}

	// Toggle options
	function toggleOptions(elem) {
		var options = elem.data('add');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		if (elem.is(':checked')) {

			// Add options
			pushOptions($chart, options);

			// Update chart
			$chart.update();
		} else {

			// Remove options
			popOptions($chart, options);

			// Update chart
			$chart.update();
		}
	}

	// Update options
	function updateOptions(elem) {
		var options = elem.data('update');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		// Parse options
		parseOptions($chart, options);

		// Toggle ticks
		toggleTicks(elem, $chart);

		// Update chart
		$chart.update();
	}

	// Toggle ticks
	function toggleTicks(elem, $chart) {

		if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
			var prefix = elem.data('prefix') ? elem.data('prefix') : '';
			var suffix = elem.data('suffix') ? elem.data('suffix') : '';

			// Update ticks
			$chart.options.scales.yAxes[0].ticks.callback = function(value) {
				if (!(value % 10)) {
					return prefix + value + suffix;
				}
			}

			// Update tooltips
			$chart.options.tooltips.callbacks.label = function(item, data) {
				var label = data.datasets[item.datasetIndex].label || '';
				var yLabel = item.yLabel;
				var content = '';

				if (data.datasets.length > 1) {
					content += '<span class="popover-body-label mr-auto">' + label + '</span>';
				}

				content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
				return content;
			}

		}
	}


	// Events

	// Parse global options
	if (window.Chart) {
		parseOptions(Chart, chartOptions());
	}

	// Toggle options
	$toggle.on({
		'change': function() {
			var $this = $(this);

			if ($this.is('[data-add]')) {
				toggleOptions($this);
			}
		},
		'click': function() {
			var $this = $(this);

			if ($this.is('[data-update]')) {
				updateOptions($this);
			}
		}
	});


	// Return

	return {
		colors: colors,
		fonts: fonts,
		mode: mode
	};

})();

//
// Icon code copy/paste
//

'use strict';

var CopyIcon = (function() {

	// Variables

	var $element = '.btn-icon-clipboard',
		$btn = $($element);


	// Methods

	function init($this) {
		$this.tooltip().on('mouseleave', function() {
			// Explicitly hide tooltip, since after clicking it remains
			// focused (as it's a button), so tooltip would otherwise
			// remain visible until focus is moved away
			$this.tooltip('hide');
		});

		var clipboard = new ClipboardJS($element);

		clipboard.on('success', function(e) {
			$(e.trigger)
				.attr('title', 'Copied!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')

			e.clearSelection()
		});
	}


	// Events
	if ($btn.length) {
		init($btn);
	}

})();

//
// Navbar
//

'use strict';

var Navbar = (function() {

	// Variables

	var $nav = $('.navbar-nav, .navbar-nav .nav');
	var $collapse = $('.navbar .collapse');
	var $dropdown = $('.navbar .dropdown');

	// Methods

	function accordion($this) {
		$this.closest($nav).find($collapse).not($this).collapse('hide');
	}

    function closeDropdown($this) {
        var $dropdownMenu = $this.find('.dropdown-menu');

        $dropdownMenu.addClass('close');

    	setTimeout(function() {
    		$dropdownMenu.removeClass('close');
    	}, 200);
	}


	// Events

	$collapse.on({
		'show.bs.collapse': function() {
			accordion($(this));
		}
	})

	$dropdown.on({
		'hide.bs.dropdown': function() {
			closeDropdown($(this));
		}
	})

})();


//
// Navbar collapse
//


var NavbarCollapse = (function() {

	// Variables

	var $nav = $('.navbar-nav'),
		$collapse = $('.navbar .navbar-custom-collapse');


	// Methods

	function hideNavbarCollapse($this) {
		$this.addClass('collapsing-out');
	}

	function hiddenNavbarCollapse($this) {
		$this.removeClass('collapsing-out');
	}


	// Events

	if ($collapse.length) {
		$collapse.on({
			'hide.bs.collapse': function() {
				hideNavbarCollapse($collapse);
			}
		})

		$collapse.on({
			'hidden.bs.collapse': function() {
				hiddenNavbarCollapse($collapse);
			}
		})
	}

	var navbar_menu_visible = 0;

	$( ".sidenav-toggler" ).click(function() {
		if(navbar_menu_visible == 1){
		  $('body').removeClass('nav-open');
			navbar_menu_visible = 0;
			$('.bodyClick').remove();

		} else {

		var div = '<div class="bodyClick"></div>';
		$(div).appendTo('body').click(function() {
				 $('body').removeClass('nav-open');
					navbar_menu_visible = 0;
					$('.bodyClick').remove();
					
			 });

		 $('body').addClass('nav-open');
			navbar_menu_visible = 1;

		}

	});

})();

//
// Popover
//

'use strict';

var Popover = (function() {

	// Variables

	var $popover = $('[data-toggle="popover"]'),
		$popoverClass = '';


	// Methods

	function init($this) {
		if ($this.data('color')) {
			$popoverClass = 'popover-' + $this.data('color');
		}

		var options = {
			trigger: 'focus',
			template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		};

		$this.popover(options);
	}


	// Events

	if ($popover.length) {
		$popover.each(function() {
			init($(this));
		});
	}

})();

//
// Scroll to (anchor links)
//

'use strict';

var ScrollTo = (function() {

	//
	// Variables
	//

	var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a');


	//
	// Methods
	//

	function scrollTo($this) {
		var $el = $this.attr('href');
        var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
		var options = {
			scrollTop: $($el).offset().top - offset
		};

        // Animate scroll to the selected section
        $('html, body').stop(true, true).animate(options, 600);

        event.preventDefault();
	}


	//
	// Events
	//

	if ($scrollTo.length) {
		$scrollTo.on('click', function(event) {
			scrollTo($(this));
		});
	}

})();

//
// Tooltip
//

'use strict';

var Tooltip = (function() {

	// Variables

	var $tooltip = $('[data-toggle="tooltip"]');


	// Methods

	function init() {
		$tooltip.tooltip();
	}


	// Events

	if ($tooltip.length) {
		init();
	}

})();

//
// Form control
//

'use strict';

var FormControl = (function() {

	// Variables

	var $input = $('.form-control');


	// Methods

	function init($this) {
		$this.on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus'));
    }).trigger('blur');
	}


	// Events

	if ($input.length) {
		init($input);
	}

})();

//
// Google maps
//

var $map = $('#map-default'),
    map,
    lat,
    lng,
    color = "#5e72e4";

function initMap() {

    map = document.getElementById('map-default');
    lat = map.getAttribute('data-lat');
    lng = map.getAttribute('data-lng');

    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 12,
        scrollwheel: false,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }

    map = new google.maps.Map(map, mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'Hello World!'
    });

    var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
        '<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}

if($map.length) {
    google.maps.event.addDomListener(window, 'load', initMap);
}

//
// Bars chart
//


'use strict';

//
// Sales chart
//

var SalesChart = (function() {

  // Variables

  var $chart = $('#chart-sales-dark');


  // Methods

  function init($chart) {

    var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Performance',
          data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
        }]
      }
    });

    // Save to jQuery object

    $chart.data('chart', salesChart);

  };


  // Events

  if ($chart.length) {
    init($chart);
  }

})();

//
// Bootstrap Datepicker
//

'use strict';

var Datepicker = (function() {

	// Variables

	var $datepicker = $('.datepicker');


	// Methods

	function init($this) {
		var options = {
			disableTouchKeyboard: true,
			autoclose: false
		};

		$this.datepicker(options);
	}


	// Events

	if ($datepicker.length) {
		$datepicker.each(function() {
			init($(this));
		});
	}

})();

//
// Form control
//

'use strict';

var noUiSlider = (function() {

	// Variables

	// var $sliderContainer = $('.input-slider-container'),
	// 		$slider = $('.input-slider'),
	// 		$sliderId = $slider.attr('id'),
	// 		$sliderMinValue = $slider.data('range-value-min');
	// 		$sliderMaxValue = $slider.data('range-value-max');;


	// // Methods
	//
	// function init($this) {
	// 	$this.on('focus blur', function(e) {
  //       $this.parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
  //   }).trigger('blur');
	// }
	//
	//
	// // Events
	//
	// if ($input.length) {
	// 	init($input);
	// }



	if ($(".input-slider-container")[0]) {
			$('.input-slider-container').each(function() {

					var slider = $(this).find('.input-slider');
					var sliderId = slider.attr('id');
					var minValue = slider.data('range-value-min');
					var maxValue = slider.data('range-value-max');

					var sliderValue = $(this).find('.range-slider-value');
					var sliderValueId = sliderValue.attr('id');
					var startValue = sliderValue.data('range-value-low');

					var c = document.getElementById(sliderId),
							d = document.getElementById(sliderValueId);

					noUiSlider.create(c, {
							start: [parseInt(startValue)],
							connect: [true, false],
							//step: 1000,
							range: {
									'min': [parseInt(minValue)],
									'max': [parseInt(maxValue)]
							}
					});

					c.noUiSlider.on('update', function(a, b) {
							d.textContent = a[b];
					});
			})
	}

	if ($("#input-slider-range")[0]) {
			var c = document.getElementById("input-slider-range"),
					d = document.getElementById("input-slider-range-value-low"),
					e = document.getElementById("input-slider-range-value-high"),
					f = [d, e];

			noUiSlider.create(c, {
					start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
					connect: !0,
					range: {
							min: parseInt(c.getAttribute('data-range-value-min')),
							max: parseInt(c.getAttribute('data-range-value-max'))
					}
			}), c.noUiSlider.on("update", function(a, b) {
					f[b].textContent = a[b]
			})
	}

})();

//
// Scrollbar
//

'use strict';

var Scrollbar = (function() {

	// Variables

	var $scrollbar = $('.scrollbar-inner');


	// Methods

	function init() {
		$scrollbar.scrollbar().scrollLock()
	}


	// Events

	if ($scrollbar.length) {
		init();
	}

})();

jQuery(document).ready(function($) {
	"use strict";
   


$('.draggable').draggable({ handle: ".move" });
$('.resizable').resizable();

//
//========================== START TO-DO LIST ==========================
//


	var n =  new Date();
	//var y = n.getFullYear();
	var m = n.getMonth();
	var d = n.getDate();
	var wd = n.getDay();
		
	var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	var weekdayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		
	document.getElementById("date1").innerHTML = weekdayNames[wd] + ", " + d + " " + monthNames[m];
			

	var total = 0;
	var  done  = 0;

	// WRITE THE NUMBERS OF COUNTER TASKS

	function updateText()
	{
		$('#total').text(total);
		$('#done').text(done);
		$('#remain').text(total-done);
	}

	// COUNT THE EXIST TASKS

	function todoCount()
	{
		var findTheMarkedList = $('.todo-body ul li');
		for (var i = 0; i < findTheMarkedList.length; i++)
		{
		total++;
		if ($(findTheMarkedList[i]).hasClass('done'))
		{
			done++;
		}
			updateText();
		}
	}

	todoCount();

	// SUBMIT NEW TASKS

	$('#todo-form').submit(function(e){
		
		e.preventDefault();

		var url = $(this).attr('data-url');
		
		$.ajax({
			url: 		url,
			method: 	'POST',
			dataType: 	'text',
			data:		$(this).serialize()	,
			success : function(response)
				{$('#todo_list').html(response);}
		});
		
		total += 1;
		updateText();
		$('#todo-task').val('');
		
	});


	// Click on button function list(DONE TASKS)
	$('.todo-body ul').on('click','li .check-button',function(){

	var todo_done 		= $(this).attr('data-done');
	var todo_id 			= $(this).attr('data-id');
	var todo_edit_url 	= $(this).attr('data-url');
	
	$.ajax({
			url: 		todo_edit_url,
			method: 	'POST',
			dataType: 	'text',
			data:		{done: todo_done,
						id: todo_id
						}		
		});
	
	var button = $(this).find('i');
	var checked = 'fa fa-check-circle';
	var unchecked = 'fas fa-circle-notch';

	// Save the current index of button after the click event in the "left" div.
	var index_click = $('li .check-button').index(this);
	// Use the current index of button to target the correct "li p" in the "right" div.
	var linethrough_text = $('li .todo-task').eq(index_click).find('p');

	if(button.hasClass(unchecked))
	{
	linethrough_text.addClass('line-through');
	button.removeClass(unchecked).addClass(checked);
	$(this).parent('li').addClass('done');
	$(this).attr('data-done', 1);
	done += 1;
	}
	else
	{    
	linethrough_text.removeClass('line-through');
	button.removeClass(checked).addClass(unchecked);
	$(this).parent('li').removeClass('done');
	$(this).attr('data-done', 0);
	done -= 1;
	}
	

	updateText();
	});

		
	// Click on button function and delete 'li'(REEMOVE TASKS)
	$('.todo-body ul').on('click','li .delete-button',function()
	{
		var todo_del 			= $(this).attr('data-del');
		var todo_remove_url 	= $(this).attr('data-url');
	
		$.ajax({
				url: 		todo_remove_url,
				method: 	'POST',
				dataType: 	'text',
				data:		{id: todo_del}		
			});

		total -= 1;

	if ($(this).parent('li').hasClass('done'))
			{
				done -= 1;
			}

		$(this).parent('li').remove();

		updateText();
	});

	// SHOW AND HIDE TO-DO LIST
	$('.show-todo').click(function()
	{
		$('.todo').fadeToggle('slow');
	});

	// HIDE FEATURES
	$('.close1').click(function()
	{
		$(this).parent().fadeOut('slow');
	});


	var todo_list_url 	= $('#todo_list').attr('data-url');
	var todo_user_id 	= $('#todo_list').attr('data-id');
		
	$.ajax({
		url: 		todo_list_url,
		method: 	'POST',
		dataType: 	'text',
		data:		{ id: todo_user_id }	,
		success : function(response)
			{
				$('#todo_list').html(response);
				todoCount();
			}
	});



// ========================== END TO-DO LIST ==========================


	// ========================== START NOTES APP ==========================

	// CREATE NOTE
	$('.create-note').click(function()
	{
		var loader 	= $('#loader').attr('data-load');
		$('#popup').modal('show');
		$('#modal_body').html(loader);
		tinyMCE.remove();
		
		var create_note_url 	= $(this).attr('data-url');
			
		$.ajax({
			url: 		create_note_url,
			method: 	'POST',
			dataType: 	'text',
			data:		{}	,
			success : function(response)
				{
					$('#modal_body').html(response);
				}
		});

	});
	
	// ADD NEW NOTE
	$(document).on('submit', '.Note-add-form', function(e)
	{
		e.preventDefault();
		
		var url = $(this).attr('data-url');
		
		 $.ajax({
			url: 		url,
			method: 	'POST',
			dataType: 	'text',
			data:		$(this).serialize()	,
			success : 	function(response)
				 {$('#get-notes').html(response);}
		});
		
		$('.modal').modal('hide');
		$('#Note-title').val('');
		$('#Note-text').val('');
		
	});
	
	// SHOW NOTE
	$('#get-notes').on("click",".note-edit", function(){

		var loader 	= $('#loader').attr('data-load');
		$('#popup').modal('show');
		$('#modal_body').html(loader);
		tinyMCE.remove();
		
		var show_note_url 	= $(this).attr('data-url');
		var note_id 		= $(this).attr('data-id');
			
		$.ajax({
			url: 		show_note_url,
			method: 	'POST',
			dataType: 	'text',
			data:		{id: note_id }	,
			success : function(response)
				{
					$('#modal_body').html(response);
				}
		});

	});
	
	// EDIT NOTE
	$(document).on('submit', '.Note-edit-form', function(e)
	{	
		e.preventDefault();
		var edit_note_url 	= $(this).attr('data-url');
		
		 $.ajax({
			url: 		edit_note_url,
			method: 	'POST',
			dataType: 	'text',
			data:		$(this).serialize()	,
			success : 	function(response)
				 {
					 $('#get-notes').html(response);
				 }
		});
		
		$('.modal').modal('hide');
		
	});
	
	
	// REMOVE DATE FROM CALENDAR
	$('#get-notes').on("click",".note-del", function()
	 {
	    var url 		= $(this).attr('data-url');
		var note_del 	= $(this).attr('data-id');
		
		
		 $.ajax({
			url: 		url,
			method: 	'POST',
			dataType: 	'text',
			data:		{
							id: note_del 
						}	,
			success : 	function(response)
				 {
				 }
		});

		
		$(this).parents('.note').remove();
		
		
	 });
	
	
	// SHOW AND HIDE NOTES APP
	$('.show-notes').click(function()
	{
		$('#notes').fadeToggle('slow');
	});


	var get_notes_url 	= $('#get-notes').attr('data-url');
	var note_user_id 	= $('#get-notes').attr('data-id');
		
	$.ajax({
		url: 		get_notes_url,
		method: 	'POST',
		dataType: 	'text',
		data:		{ id: note_user_id }	,
		success : function(response)
			{
				$('#get-notes').html(response);
			}
	});

	// ========================== END NOTES APP ==========================


});