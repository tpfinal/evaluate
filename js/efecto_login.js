$(document).ready(function() {
							
					  $("#tooltip_usuario").mouseover(function(){
						 eleOffset = $(this).offset();
						  
						$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().hide();
						});
						
						 $("#tooltip_password").mouseover(function(){
						 eleOffset = $(this).offset();
						  
						$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().hide();
						});
						
						
			
			});		