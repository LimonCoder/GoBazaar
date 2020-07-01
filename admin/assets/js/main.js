/*! --------------------------------------------------------------
# main.js
#
# Main theme js file for Options-admin template.
# This is compressed js file. You get uncompressed version with download.
--------------------------------------------------------------*/

$(function($) {
	"use strict";

	// Toggle user info on sidebar
	$('.user-info-handle').on('click', function(event){
		event.preventDefault();
		$('.user-info').toggleClass('closed');
	});

	// Toggle small sidebar
	$('.small-nav-handle').on('click', function(event){
		event.preventDefault();
		$('.left-sidebar').toggleClass('small-nav');
		$('.navbar-header').toggleClass('small-nav-header');
	});

	// Toggle Mobile Nav
	$('.mobile-nav-toggle').on('click', function(event){
		event.preventDefault();
		$('.left-sidebar').toggle();
	})

	// Toggle tooltips
	$('[data-toggle="tooltip"]').tooltip();

	// Toggle popovers
	$('[data-toggle="popover"]').popover();

	// For custom modal backdrop
	$('.modal[data-backdrop-color]').on('show.bs.modal hide.bs.modal', function () {
		$('body').toggleClass('modal-color-'+ $(this).data('backdropColor'));
	});

	// Open right sidebar
	$('.open-right-sidebar').on('click', function(event){
		event.preventDefault();
		$('.right-sidebar, .right-sidebar .sidebar-content').css('right','0px');
	});
	$('.right-sidebar .close-icon').on('click', function(event){
		event.preventDefault();
		$('.right-sidebar, .right-sidebar .sidebar-content').css('right','-400px');
	});

	// Initialize panel controls
	$('[data-panel-control]').lobiPanel();

	// Visibility of source code button
	$('.src-btn').hide();
	$('.toggle-help-handle').on('click', function(event){
		event.preventDefault();
		$('.src-btn').toggle();
	});

	// Visibility of source code button
	$('.src-code').hide();
	$('.toggle-code-handle').on('click', function(event){
		event.preventDefault();
		$('.src-code').toggle();
	});

	// Toggle full screen
	$('.full-screen-handle').on('click', function(event){
		event.preventDefault();
		if ((document.fullScreenElement && document.fullScreenElement !== null) ||
			(!document.mozFullScreen && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			}
		}
	});

	// Toggle sidebar dropdown
	$('.has-children').not('.open').find('.child-nav').slideUp('100');
	$('.has-children>a').on('click', function(event){
		event.preventDefault();
		$(this).parent().toggleClass('open');
		$(this).parent().find('.child-nav').slideToggle('500');
	});

	// For Dropdown menu animation
	var dropdownSelectors = $('.dropdown, .dropup');

	// Custom function to read dropdown data
	// =========================
	function dropdownEffectData(target) {
		// @todo - page level global?
		var effectInDefault = null,
			effectOutDefault = null;
		var dropdown = $(target),
			dropdownMenu = $('.dropdown-menu', target);
		var parentUl = dropdown.parents('ul.nav');

		// If parent is ul.nav allow global effect settings
		if (parentUl.size() > 0) {
			effectInDefault = parentUl.data('dropdown-in') || null;
			effectOutDefault = parentUl.data('dropdown-out') || null;
		}

		return {
			target: target,
			dropdown: dropdown,
			dropdownMenu: dropdownMenu,
			effectIn: dropdownMenu.data('dropdown-in') || effectInDefault,
			effectOut: dropdownMenu.data('dropdown-out') || effectOutDefault,
		};
	}

	// Custom function to start effect (in or out)
	// =========================
	function dropdownEffectStart(data, effectToStart) {
		if (effectToStart) {
			data.dropdown.addClass('dropdown-animating');
			data.dropdownMenu.addClass('animated');
			data.dropdownMenu.addClass(effectToStart);
		}
	}

	// Custom function to read when animation is over
	// =========================
	function dropdownEffectEnd(data, callbackFunc) {
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		data.dropdown.one(animationEnd, function() {
			data.dropdown.removeClass('dropdown-animating');
			data.dropdownMenu.removeClass('animated');
			data.dropdownMenu.removeClass(data.effectIn);
			data.dropdownMenu.removeClass(data.effectOut);

			// Custom callback option, used to remove open class in out effect
			if (typeof callbackFunc == 'function') {
				callbackFunc();
			}
		});
	}

	// Bootstrap API hooks
	// =========================
	dropdownSelectors.on({
		"show.bs.dropdown": function() {
			// On show, start in effect
			var dropdown = dropdownEffectData(this);
			dropdownEffectStart(dropdown, dropdown.effectIn);
		},
		"shown.bs.dropdown": function() {
			// On shown, remove in effect once complete
			var dropdown = dropdownEffectData(this);
			if (dropdown.effectIn && dropdown.effectOut) {
				dropdownEffectEnd(dropdown, function() {});
			}
		},
		"hide.bs.dropdown": function(e) {
			// On hide, start out effect
			var dropdown = dropdownEffectData(this);
			if (dropdown.effectOut) {
				e.preventDefault();
				dropdownEffectStart(dropdown, dropdown.effectOut);
				dropdownEffectEnd(dropdown, function() {
					dropdown.dropdown.removeClass('open');
				});
			}
		},
	});
});

//------------------------------ ---------------- Porject Javascript start-------

// ------------------------ catagorytable language change..................................
 $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "sProcessing":   "প্রসেসিং হচ্ছে...",
                        "sLengthMenu":   "_MENU_ টা এন্ট্রি দেখাও",
                        "sZeroRecords":  "আপনি যা অনুসন্ধান করেছেন তার সাথে মিলে যাওয়া কোন রেকর্ড খুঁজে পাওয়া যায় নাই",
                        "sInfo":         "_TOTAL_ টা এন্ট্রির মধ্যে _START_ থেকে _END_ পর্যন্ত দেখানো হচ্ছে",
                        "sInfoEmpty":    "কোন এন্ট্রি খুঁজে পাওয়া যায় নাই",
                        "sInfoFiltered": "(মোট _MAX_ টা এন্ট্রির মধ্যে থেকে বাছাইকৃত)",
                        "sInfoPostFix":  "",
                        "sSearch":       "অনুসন্ধান:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "প্রথমটা",
                            "sPrevious": "আগেরটা",
                            "sNext":     "পরবর্তীটা",
                            "sLast":     "শেষেরটা"
                        }
                    }
                });
            })

// ------------------------catagory-form now start ---------------------------------------

getcatagory();
getcatagorylist();



function getcatagory(){
 	$.ajax({
		url:'backendfile/getcatagory.php',
		type:'post',
		success:function (res) {
			$("#category").html(res);
		}
	});

}
function getcatagorylist(){
	$.ajax({
		url:'backendfile/getcatagorylists.php',
		type:'post',
		dataType:'json',
		success:function (res) {
				var serialno = 0;
				var row = '';
			$(res).each(function(index, value) {
				var sub_catagory = "";
				var serial = "";
				var show = "";
				var image = "";
				if (value.subcatagoryname != null ){
					sub_catagory = value.subcatagoryname;
				}else{
					sub_catagory = "";
				}

				if (value.catagoryicon != "NULL" ){
					image = `<img src="assets/uploadedimages/${value.catagoryicon}" alt="${value.catagoryicon}" width="50" height="50" >`;
				}else{
					image = "";
				}

				if (value.serial != null ){
					serial = value.serial;
				}else{
					serial = "";
				}
				if (value.is_show == 1 ){
					show = `<span class="badge badge-danger badge-pill">Show</span>`;
				}else{
					show = `<span class="badge badge-danger badge-pill">Hide</span>`;
				}


				row += `<tr role="row" class="odd">
                            <td>${++serialno}</td>
                            <td>${image}</td>
                            <td>${ value.catagoryname }</td>
                            <td>${ sub_catagory }</td>
                            <td>${ serial }</td>
                            <td>${ show }</td>
                            <td align="center">
                                <a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="category_edit(0)">সম্পাদন</a>
                                <a href="javascript:void(0)" class="edit btn btn-danger btn-sm" onclick="category_delete(0)">মুছুন</a>
                            </td>
                        </tr>`;

			});
			$("#getcatagorylists").html(row);

			$('#catagorytable').DataTable({
					"language": {
						"sProcessing":   "প্রসেসিং হচ্ছে...",
						"sLengthMenu":   "_MENU_ টা এন্ট্রি দেখাও",
						"sZeroRecords":  "আপনি যা অনুসন্ধান করেছেন তার সাথে মিলে যাওয়া কোন রেকর্ড খুঁজে পাওয়া যায় নাই",
						"sInfo":         "_TOTAL_ টা এন্ট্রির মধ্যে _START_ থেকে _END_ পর্যন্ত দেখানো হচ্ছে",
						"sInfoEmpty":    "কোন এন্ট্রি খুঁজে পাওয়া যায় নাই",
						"sInfoFiltered": "(মোট _MAX_ টা এন্ট্রির মধ্যে থেকে বাছাইকৃত)",
						"sInfoPostFix":  "",
						"sSearch":       "অনুসন্ধান:",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "প্রথমটা",
							"sPrevious": "আগেরটা",
							"sNext":     "পরবর্তীটা",
							"sLast":     "শেষেরটা"
						}
					}
				});


		}
	});
}


$(document).ready(function () {

	$("#catagory-form").submit(function (event) {
		event.preventDefault();
		var formdata = new FormData();
		var formvalues = $("#catagory-form").serializeArray();
		var catagoryicon = $('#icon')[0].files[0];

		$(formvalues).each(function (index,values) {
			formdata.append(values.name,values.value);
		})
		formdata.append('icon',catagoryicon);


		$.ajax({
			url:'backendfile/addcatagory.php',
			type:'post',
			data:formdata,
			processData: false,
			contentType: false,
			dataType:'json',
			success:function (res) {
				getcatagorylist()
				getcatagory();

				if (res.duplicatecatagory == "*"){
					$("#name_error").show();
				}else{
					$("#name_error").hide();
				}

				if (res.status == "success"){
					document.getElementById("catagory-form").reset();
					$('#catagorymodal').modal('hide');
					swal({
						title: "সফল !",
						text: res.massage,
						icon: "success",
						timer: 1500,
						buttons:false

					});

				}


			}
		});




	})
})