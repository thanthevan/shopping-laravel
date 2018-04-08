(function($){
  var lib ={
    editcategory: function edit() {
    	       $('.ud').each(function() {
               $(this).click(function() {
             id= $(this).attr('data-id');
             parent_id=$(this).attr('data-parent-id');
             url ="cp_admin/category/"+id+"/edit";
                $.ajaxSetup({
                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                });

                $.get(url, function(data) {
               
                     $('#category_name').val(data.name);

                     

                       
                            $('#category').html('');
                            if(parent_id==0)
                            {
                                $('#form2').attr('action', "cp_admin/category/"+id);
                                $('#category').html("<option selected value='0'>ROOT</option>");
                            }else
                            {     html ='';
                                $.each(data.choice,function(index,item) {
                                    if(parent_id==item.id)
                                    {
                                     $('#form2').attr('action', "cp_admin/category/"+id);
                                     html+= "<option selected value='"+item.id+"'>"+item.name+"</option>";
                                    }else
                                    {
                                        $('#form2').attr('action', "cp_admin/category/"+id);
                                       html+= "<option  value='"+item.id+"'>"+item.name+"</option>";
                                    }
                                    
                                });
                                $('#category').html(html);
                            }
                            
                            $('#modal-edit').modal('show'); 
                   
                });

             });
        });
    },
    editcategorypost: function editpost() {
               $('.udk').each(function() {
               $(this).click(function() {
             id= $(this).attr('data-id');
             parent_id=$(this).attr('data-parent-id');
             url ="cp_admin/categorypost/"+id+"/edit";
                $.ajaxSetup({
                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                });

                $.get(url, function(data) {
               
                     $('#category_name').val(data.name);

                     

                       
                            $('#category').html('');
                            if(parent_id==0)
                            {
                                $('#form2').attr('action', "cp_admin/categorypost/"+id);
                                $('#category').html("<option selected value='0'>ROOT</option>");
                            }else
                            {     html ='';
                                $.each(data.choice,function(index,item) {
                                    if(parent_id==item.id)
                                    {
                                     $('#form2').attr('action', "cp_admin/categorypost/"+id);
                                     html+= "<option selected value='"+item.id+"'>"+item.name+"</option>";
                                    }else
                                    {
                                        $('#form2').attr('action', "cp_admin/categorypost/"+id);
                                       html+= "<option  value='"+item.id+"'>"+item.name+"</option>";
                                    }
                                    
                                });
                                $('#category').html(html);
                            }
                            
                            $('#modal-edit').modal('show'); 
                   
                });

             });
        });
    },
    notification: function notification(type,message) {
             horiz="right";
             verti="top"  ; 
             if(type==="error"){
            message="<i class='fa fa-frown-o' style='padding-right:6px'></i>" +message;
         jError(message, {
                    HorizontalPosition: horiz,
                    VerticalPosition: verti,
                    ShowOverlay: false,
                    TimeShown:  3000,
                    OpacityOverlay:  0.5,
                    MinWidth: 250
                });
            }
             else{
            message="<i class='fa fa-check-square-o' style='padding-right:6px'></i>" +message; 
       jSuccess(message, {
                    HorizontalPosition: horiz,
                    VerticalPosition: verti,
                    ShowOverlay: false,
                    TimeShown:  3000,
                    OpacityOverlay:  0.5,
                    MinWidth: 250
                });
             }
           
           
              

    },
  }
  

  window.mylib = lib;

})(this.jQuery);

$(function() {
	mylib.editcategory();
    mylib.editcategorypost();
    
    
});