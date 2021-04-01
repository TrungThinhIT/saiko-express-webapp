!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){          
        $(this).find('em').toggleClass("fa-minus");      
    }); 
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
})


$("#dropdown-language li").click(function(e){
	var select_text = $(this).find("a").text();
	if(select_text == "Japanese"){
		$("#btn-language-selected").text("Ja ");
	}
	else{
		$("#btn-language-selected").text("Vi ");
	}
	$("#btn-language-selected").append("<span class='caret'></span>");
});

$(document).ready(function(){

	$(document).on('click', '#close-preview', function(){ 
		$('.image-preview').popover('hide');
		// Hover befor close the preview
		$('.image-preview').hover(
			function () {
			   $('.image-preview').popover('show');
			}, 
			 function () {
			   $('.image-preview').popover('hide');
			}
		);    
	});
	
	$(function() {
		// Create the close button
		var closebtn = $('<button/>', {
			type:"button",
			text: 'x',
			id: 'close-preview',
			style: 'font-size: initial;',
		});
		closebtn.attr("class","close pull-right");
		// Set the popover default content
		$('.image-preview').popover({
			trigger:'manual',
			html:true,
			title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
			content: "There's no image",
			placement:'bottom'
		});
		// Clear event
		$('.image-preview-clear').click(function(){
			$('.image-preview').attr("data-content","").popover('hide');
			$('.image-preview-filename').val("");
			$('.image-preview-clear').hide();
			$('.image-preview-input input:file').val("");
			$(".image-preview-input-title").text("Browse"); 
		}); 
		// Create the preview image
		$(".image-preview-input input:file").change(function (){     
			var img = $('<img/>', {
				id: 'dynamic',
				width:250,
				height:200
			});      
			var file = this.files[0];
			var reader = new FileReader();
			// Set preview image into the popover data-content
			reader.onload = function (e) {
				$(".image-preview-input-title").text("Change");
				$(".image-preview-clear").show();
				$(".image-preview-filename").val(file.name);            
				img.attr('src', e.target.result);
				$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
			}        
			reader.readAsDataURL(file);
		});  
	});
	//new post







	(function(){
		'use strict';
		var $ = jQuery;
		$.fn.extend({
			filterTable: function(){
				return this.each(function(){
					$(this).on('keyup', function(e){
						$('.filterTable_no_results').remove();
						var $this = $(this), 
							search = $this.val().toLowerCase(), 
							target = $this.attr('data-filters'), 
							$target = $(target), 
							$rows = $target.find('tbody tr');
							
						if(search == '') {
							$rows.show(); 
						} else {
							$rows.each(function(){
								var $this = $(this);
								$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
							})
							if($target.find('tbody tr:visible').size() === 0) {
								var col_count = $target.find('tr').first().find('td').size();
								var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
								$target.find('tbody').append(no_results);
							}
						}
					});
				});
			}
		});
		$('[data-action="filter"]').filterTable();
	})(jQuery);
	
	$(function(){
		// attach table filter plugin to inputs
		$('[data-action="filter"]').filterTable();
		
		$('.container').on('click', '.panel-heading span.filter', function(e){
			var $this = $(this), 
				$panel = $this.parents('.panel');
			
			$panel.find('.panel-body').slideToggle();
			if($this.css('display') != 'none') {
				$panel.find('.panel-body input').focus();
			}
		});
		$('[data-toggle="tooltip"]').tooltip();
	});//search user


	//search user
	$("#search-user").keyup(function() {
		var text = $('#search-user').val();
		$.ajax({
			type: "POST",
			url: "php/search_user.php",
			data: {
				search: text
			},
			success: function(html) {
				$("#result-users").html(html);
			}
		});
	});


	//add pin
	$("#add-pin").click(function() {
		var text = $('#new-pin').val();
		if(text.trim() != ""){
			$.ajax({
				type: "POST",
				url: "php/pin.php",
				data: {
					content_pin: text
				},
				success: function(html) {
					if(html != 0){
						$("#pin").html(html);
						$('#new-pin').val("");
					}else alert("Lỗi!");
				}
			});
		}
	});


	//add work
	$("#add-work").click(function() {
		var text = $('#new-work').val();
		if(text.trim() != ""){
			$.ajax({
				type: "POST",
				url: "php/listwork.php",
				data: {
					content_work: text
				},
				success: function(html) {
					if(html != 0){
						$("#list-work").html(html);
						$('#new-work').val("");
					}else alert("Lỗi!");
				}
			});
		}
	});

	//add worked manager
	$("#add-work-manager").click(function() {
		var text = $('#work-manager').val();
		if(text.trim() != ""){
			$.ajax({
				type: "POST",
				url: "php/add_worked.php",
				data: {
					content: text
				},
				success: function(html) {
					$("#work-done").html(html);
					$('#work-manager').val("");
				}
			});
		}
	})


	//search product
	$("#search-product").keyup(function() {
		var text = $('#search-product').val();
		$.ajax({
			type: "POST",
			url: "php/search_product.php",
			data: {
				search: text
			},
			success: function(html) {
				$("#result-products").html(html);
			}
		});
	});

	// $(".currency").keyup(function() { // 1,212,345.67
	// 	var a = $(this).val();

	// 	if(a.length > 13){
	// 		a = a.slice(0,13);
	// 		$(this).val(a);
	// 		return;
	// 	}

	// 	while (a.indexOf(".") >= 0)
	// 		a = a.replace(".","");
	// 	a = parseFloat(a);
	// 	if(isNaN(a)){
	// 		$(this).val(0);
	// 		return;	
	// 	}

	// 	a = a.toLocaleString('it-IT', {style : 'currency', currency : 'JPY'});
	// 	a = a.split(" ")[0];
	// 	$(this).val(a);
	// });

	if($(".currency")[0]){
		$('.currency').inputmask("numeric", {
			radixPoint: ".",
			groupSeparator: ",",
			digits: 2,
			autoGroup: true,
			rightAlign: false,
			oncleared: function () { self.Value(''); }
		});
	}

	if($(".scroll-bottom")[0]){
		$(".scroll-bottom").scrollTop($(".scroll-bottom")[0].scrollHeight);
	}




	




});
	