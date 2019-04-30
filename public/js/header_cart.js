<script>
		$(document).ready(function(){
			$('.multiple-add-to-cart').click(function(e){
				
				e.preventDefault();
				var ele = $(this);
				
				$.ajax({
					url: '{{url('multiple-add-to-cart')}}',
					method: 'get',
					data: {id: ele.attr("data-id"), quantity: ele.attr("quantity")},
					success: function(response){
						$.notify("Add product successfully to cart", "success");
						$('.header-cart').html(response.html)
					}
				});
			});
	
			$('body').on('click', '.remove-from-cart', function(e){
				e.preventDefault();
				var ele = $(this);
	
				$.ajax({
					url: '{{url('remove-from-cart')}}',
					method: "delete",
					data: {_token: '{{csrf_token()}}', id: ele.attr("data-id")},
					success: function(response){
						$('.header-cart').html(response.html);
					}
				});
			});
		});
	</script>