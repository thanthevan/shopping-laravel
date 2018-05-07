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

 filteruser: function fu() {
     $('#member-finder').on('keyup',function(event) {
            $.ajaxSetup({
                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                });
             keyword = $(this).val();
             if( keyword ==='')
             {
                 keyword='-';
             }
               $.post('cp_admin/filter', {keyword: keyword}, function(data) {
                 $('.result').html(data);
                mylib.edituser();
             });  
            
        });
    },
    sendmail: function sendmail() {
        $('#reply').on('click', function(event) {
            event.preventDefault();
            id=$(this).attr('data-id');
            $.ajaxSetup({
                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                });
          $.post('cp_admin/sendmail', {id: id}, function(data) {
              $('#emailto').val(data.mail);
                  $('#sendmailfb').modal('show');
          });
            
        });
    },editemployee: function ee() {
      $('.edit-employee').each(function(index) {
           $(this).click(function(event) {
             id = $(this).attr('data-id');
          
            $.get('cp_admin/showemployee/'+id, function(data) {
                
               $('.update-employee').html(data);

               $('#employee-update').modal('show');
            });

           });

       });
    },detailemployee: function ee() {
      $('#detailemployee').each(function(index) {

           $(this).click(function(event) {
             event.preventDefault();
             id = $(this).attr('data-id');
          
            $.get('cp_admin/showemployee/'+id, function(data) {
                
               $('.update-employee').html(data);

               $('#info-update').modal('show');
            });

           });

       });
    },
 filteremployee: function fe() {
     $('#employee-finder').on('keyup',function(event) {
            $.ajaxSetup({
                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                });
             keyword = $(this).val();
             if( keyword ==='')
             {
                 keyword='-';
             }
               $.post('cp_admin/filteremployee', {keyword: keyword}, function(data) {
                 $('.result').html(data);
                mylib.editemployee();
             });  
            
        });
    },tk:function tk() {
        $('.tkitem').each(function(index, el) {
            $(this).click(function(event) {

               type = $(this).attr('data-type');

               $('#kieu').attr('value', type);
            });
        });
      
    },ac:function ac() {
       $('.found').on('click', function(event) {
           event.preventDefault();
           start = $('#start').val();
           end = $('#end').val();
           type=$('#kieu').val();
           action = 'cp_admin/loc/'+start+'/'+end+'/'+type;
           $('#tkkq').attr('action', action);

        $('#tkkq').submit();
           
       });
    }
  }
  

  window.mylib = lib;

})(this.jQuery);

$(function() {
	mylib.editcategory();
    mylib.editcategorypost();
    mylib.filteruser();
    mylib.filteremployee();
    mylib.detailemployee();
    mylib.editemployee();
    mylib.sendmail();
    mylib.tk();
    mylib.ac();
});