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


// ------------------------catagory-form now start ---------------------------------------


// called getcatagory() //
getcatagory();



// getcatagory //
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
	var dataTable;
	$(document).ready(function () {
		 	dataTable = $('#catagorytable').DataTable({
				'destroy': true,
			"processing": true,
			"serverSide": true,
			"ajax": "catagorystore.php",
				"language":	{
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

}

// called getcatagorylist //
getcatagorylist();

// Add Catagory & Sub-catgory Form //
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
				getcatagory();
				if (res.duplicatecatagory == "*"){
					$("#name_error").show();
				}else{
					$("#name_error").hide();
				}

				if (res.invaildextension == "*"){
					$("#is_file_error").show();
				}else{
					$("#is_file_error").hide();
				}

				if (res.invailltype == "*"){
					$("#is_serial_error").show();
				}else{
					$("#is_serial_error").hide();
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

	$('#catagorymodal').on('hidden.bs.modal', function () {
		document.getElementById("catagory-form").reset();
	});


})

// get Subcatagory //
function getsubcatagory(val){
	var catagoryname = val;
	$.ajax({
		url:'backendfile/getsubcatagory.php',
		type:'post',
		data:{
			catagoryname:catagoryname
		},
		success:function (res) {
			$("#sub_category").html(res);
		}
	})
}


// Add Product Form //
$(document).ready(function () {
	$("#AddProductForm").submit(function (e) {
		e.preventDefault();
		var formvalues = $("#AddProductForm").serializeArray();
		console.log(formvalues);
	})
})

// Add Multiple Image ProductSection... //
$(document).ready(function () {
	var maxinputfile = 5;
	var parentdiv = $("#picture_input1");

	// multiple image add event //
	$("#AddPictureInput").click(function () {

		if ( maxinputfile != 1 ){
			maxinputfile--;
			parentdiv.append(`<div class="child" >
                            <div class="col-sm-6">
<input class="form-control-file picture update" type="file" style="font-size: 12px" name="picture[]" data-pi_no="1" id="${maxinputfile}">
</div>
<div class="col-md-4" id="preview${maxinputfile}">
<img src="" class="d-none image_preview" id="image_preview" style="height:50px; width:80px; margin-left: 5px;margin-top: 5px; margin-bottom: 5px">
</div>
<div class="col-sm-2">
<button type="button" class="btn btn-sm btn-danger" id="deletepicture">x</button>
</div>
</div>`);
		}

	});


	// multiple image delete event
	$(parentdiv).on('click','#deletepicture',function (e) {
		maxinputfile++;
		e.preventDefault();
		$(this).closest(".child").remove();
	})

	// image preview function //
	function readURL(input,val) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {

					$iamgeobject = $("#preview"+val).find('img');
					$iamgeobject.attr('src', e.target.result);
				//	$('#image_preview').attr('src', e.target.result);



			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

	// default image preview called //
	$("#pictureDeafult").change(function() {
		readURL(this,6); // funciton called //


	});

	// dynamic image preview called //
	$(parentdiv).on('change',"input.update",function () {

	  var valu =	$(this).attr('id');
		readURL(this,valu);// funciton called //



	});





})

//// get catagory id........ ///
function getcatgoryid(val){
	var subcatagoryname = val;
	$.ajax({
		url:'backendfile/getCatagoryId.php',
		type:'post',
		data:{
			id:subcatagoryname
		},
		success:function (res) {
			$("#id").val(res);
		}
	})

}