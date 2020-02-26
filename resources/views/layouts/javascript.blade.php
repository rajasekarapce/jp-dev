<script type="text/javascript">
    
     function getDropdownById(source_dropdownid,dropdown_id,route,text_field)
    {
        console.log(source_dropdownid);
        $('#dropdown_'+source_dropdownid).on('change',function(){
    var value = $(this).val();
    if(value){
        var token = $("meta[name='csrf-token']").attr("content");
        var fullurl = '{{url('')}}/'+route;
        $.ajax({
           method:"POST",
           url: fullurl,
           data: {
              "id": value,
              "_token": token
          },
           success:function(res){               
            if(res){
               $("#dropdown_"+dropdown_id).empty();
                 $("#dropdown_"+dropdown_id).prepend('<option selected value>Please select</option>'); 
                $.each(res,function(key,value){
                    var  text = value.name;    
                    $("#dropdown_"+dropdown_id).append('<option value="'+value.id+'">'+text+'</option>');
                });
                
            
            }else{
               $("#dropdown_"+dropdown_id).empty();
            }
           }
        });
    }else{
        $("#dropdown_"+dropdown_id).empty();
        $("#dropdown_"+dropdown_id).removeAttr('required');
        $("#dropdown_"+dropdown_id).append('<option value="1" selected>All</option>');
    }
        
   });
    }
</script>