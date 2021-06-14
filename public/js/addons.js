$(document).ready(function(){
    $(document).on('click','.edit',function(){



           var id = $(this).attr("data-componentId");

           
            $.ajax({
                url:"/pages/component",
                method:'GET',
                data:{id:id},
                dataType:'text',
                success:function(data)
                {
                    $('#edit_component_body').html(data);
                    $('#edit_component_modal').modal('show');
                }
            })
    }); 




    $(document).on('click','.edit_card',function(){



           var id = $(this).attr("data-cardId");

           
            $.ajax({
                url:"card",
                method:'GET',
                data:{id:id},
                dataType:'text',
                success:function(data)
                {
                    $('#edit_card_body').html(data);
                    $('#edit_card_modal').modal('show');
                }
            })
    }); 









    function iterate(item) {
      if(item.type === "text" || item.type === "textarea")
      {
         $("#elt_"+item.id).html(item.content);
      }
      if(item.type === "img")
      {
         $("#elt_"+item.id).attr('src',item.content);
      } 
    }  


    $('.update_component_form').submit(function(e){

      e.preventDefault();
        


            $.ajax({
                url:"/pages/component",
                method:'POST',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData : false,
                dataType:'json',
                success:function(data)
                {
                    $('#edit_component_modal').modal('hide'); 
                    data.forEach(iterate); 
                    
                },error:function(data)
                {


                }
            })


    }); 


    $(document).on('change', '.change_photo', function(){
        
        $(this).parent('.update_component_form').submit();
        
    });



    function iteratecrd(item) {
      if(item.type === "text")
      {
         $("#crd_"+item.id).html(item.content);
      }
      if(item.type === "img")
      {
         $("#crd_"+item.id).attr('src',item.content);
      }      
    }  



    $('.update_card_form').submit(function(e){

      e.preventDefault();
        


            $.ajax({
                url:"card/update",
                method:'POST',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData : false,
                dataType:'json',
                success:function(data)
                { 

                    $('#edit_card_modal').modal('hide');
                    data.forEach(iteratecrd); 

                },error:function(data)
                {


                }
            })


    }); 







    $(document).on('click','.card_remove',function(){

           var id = $(this).attr("data-cardId");
           
            $.ajax({
                url:"card/destroy",
                method:'GET',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {
                    if (data['status'] == 'success')
                    {
                        $('#'+id+'_card').remove();
                    }
                }
            })
    });








    $(document).on('click','.add_card',function(){



           var cardName = $(this).attr("data-cardName");

           
            $.ajax({
                url:"card/create",
                method:'GET',
                data:{cardName:cardName},
                dataType:'text',
                success:function(data)
                {
                    $('#add_card_body').html(data);
                    $('#add_card_modal').modal('show');
                }
            })
    });




    $('.add_card_form').submit(function(e){

      e.preventDefault();
        
            $.ajax({
                url:"card/store",
                method:'POST',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData : false,
                dataType:'json',
                success:function(data)
                {  
                    $('#add_card_modal').modal('hide');
                },error:function(data)
                {


                }
            })


    }); 





    $(document).on('click','.clientDel',function(){
           var clientId = $(this).attr("data-clientId");
           
           
            $.ajax({
                url:"client/remove",
                method:'GET',
                data:{clientId:clientId},
                dataType:'text',
                success:function(data)
                {
                    $('#'+clientId+'_client').remove();
                }
            })
    });



    function clientIterate(item) {

      if(item.clientType === "Banking" )
      {
            console.log('baaaannnkkkkk')
        var client = '<li class="edit-section parent"><i class="fas fa-times-circle edit2 text-danger remove_item" data-id="'+item.id+'"></i><a ><img src="/'+item.image+'" alt=""></a></li>'
        $(".banking_li").append(client)

      }
      if(item.clientType === "Retail" )
      {
        console.log('retaaaaaaiiiilll')
        var client = '<li class="edit-section parent"><i class="fas fa-times-circle edit2 text-danger remove_item" data-id="'+item.id+'"></i><a ><img src="/'+item.image+'" alt=""></a></li>'
        $(".retail_li").append(client)

      } 
    }  

    $('.clientStore').submit(function(e){

      e.preventDefault();
        
            $.ajax({
                url:"client/store",
                method:'POST',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData : false,
                dataType:'json',
                success:function(data)
                {  
                    $('#clients_modal').modal('hide');
                    data.forEach(clientIterate); 

                },error:function(data)
                {


                }
            })


    });


    $(document).on('click','.client-check',function(){
           
            $.ajax({
                url:"client/check",
                method:'GET',
                dataType:'text',
                success:function(data)
                {
                    $('.tabs').html(data);
                    $('#client_check_modal').modal('show');
                }
            })
    });


    $(document).on('click','.product-check',function(){
           
            $.ajax({
                url:"product/check",
                method:'GET',
                dataType:'text',
                success:function(data)
                {
                    $('.tabs').html(data);
                    $('#client_check_modal').modal('show');
                }
            })
    });



 	// CHANGE PHOTOS 
	
     $(document).on('change', '.change_photo', function(){
		
		$(this).parent('.upload_form').submit();
		
    });	

    // RELOAD BUTTON 
	$(document).on('click', '.reload', function(){
		
		$('.modal').modal('hide');
		location.reload();
	
    });
 

});
