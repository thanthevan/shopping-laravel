(function($){
  var cart ={
    choiceimg:function choiceimg() {
     $('.img-item').each(function() {

      $(this).click(function() {
       var src = $(this).attr('hash');
       $('#showimg').attr('src', src);
       $('.img-item').removeClass('active-view');
       $(this).addClass('active-view');
     });
    });
     $('.owl-carousel').owlCarousel({
      items:6,
      loop:false,
      left:true,
      margin:10,
    });
   },
   quickview:function quickview() {
    $('.btn-quickview').each(function() {
      $(this).on('click', function(event) {
        event.preventDefault();
        var id_product = $(this).attr('data-id');
        var url = $('#router').val();
        if (id_product.length > 0) {
           $('#quickviewproduct').modal('show');
         $('.atom-spinner').fadeOut(2000,function() {
               $('.qv').html('');
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'POST',
            data: {
              id: id_product
            },
          })
          .done(function(res) {
            $('.qv').html(res);

          });
         });
        

         // setTimeout(function(){ 
        
        // },1000);

       }

     });
    });
  },
  load:function load() {
   $('.cart-ajax').html('');
   $('.tt1').hide();
   $('.tt2').hide();

   $('.qq').css('display','block');
   $('.qq').fadeOut(400);
   $('#cart-mini-content>.toolbar-dropdown').css('display', 'block');
 },
 show:function show(json, element) {

  data = json.cartcontent;
  var html = "";
  $.each(data, function(key, item) {
    html += "<div class='dropdown-product-item'><span class='dropdown-product-remove'  title='Xóa' row-id='" + item.rowId + "'><i class='icon-cross' ></i></span><a class='dropdown-product-thumb' href='chi-tiet/"+ item.options['alias']+"/"+ item.id +"'><img src='public/uploads/product/" + item.options['image'] + "' alt='Product'></a><div class='dropdown-product-info'><a class='dropdown-product-title'  href='chi-tiet/"+ item.options['alias']+"/"+ item.id +"'>" + item.name + "</a><span class='dropdown-product-details' style='color: black;'>" + item.qty + " x " + numeral(item.price).format('0.0') + " VNĐ<p><span style='color:black'>Màu sắc:</span><span style='display: inline-block;background-color:" + item.options['color'] + "; width:10px;height:10px;'></span><span style='color:black'>  Kích cỡ:</span><span style='color:black;font-weight:bold;'>" + item.options.size + "</span></p></div></div>";

  });

  element.html(html);
  $('#cart-mini-title>.count').text(json.count);
  $('#cart-mini-title>.subtotal').text(json.total + " VNĐ");
  $('.totalajax').text(json.total + " VNĐ");
  $('.close-cart').show();

  if(json.count===0)
  {
    cart.zerocart();
  }else{
   $('.cart-ajax').css('height',100);
   $('.tt1').show();
   $('.tt2').show();
 }

},
removecart:function removecart() {
  $('.remove-from-cart').each(function() {
     rowid = $(this).attr('data-rowid');
     $(this).click(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });  
      $.post('cart-ajax-delete', {rowId: rowid} , function() {
        
          location.reload();
      });
     });

  });
},
zerocart:function zerocart() {
  $('.cart-ajax').css('height',35);
  html = "<h4 style='text-align: center;'>Giỏ hàng trống<span id='out-cart' style=' cursor: pointer; color:red;text-decoration: none;' title='thoát'> x</span></h4>";
  $('.cart-ajax').html(html);

  $('.tt1').hide();
  $('.tt2').hide();
  $('.close-cart').hide();

  $("#out-cart").on('click',function(){

    $('#cart-mini-content>.toolbar-dropdown').css('display', 'none');
  });
},
carthover:function carthover() {

  $('body').on('click', '#cart-mini-title', function() {

    cart.load();
    setTimeout(function(){ 
      $.get('cart-ajax', function(data) {

        cart.show(data, $('.cart-ajax'));
        cart.removecartajax();

      });



    },500);



  });
},
d: function d(b, c){
  b.each(function() {
    var b = $(this);
  })
},
addtocartajax:function addtocartajax() {

 mylib.d($(".countdown")), $("[data-toast]").on("click", function() { 

  if($('#size').length!=0 && $('#color').length!=0 && $('#quantity').length!=0){

    color = $('#color').val();
    size  = $('#size').val();
    qty  = $('#quantity').val();
  }else
  {
    color = null;
    size  =null;
    qty  =null;
  }
  var b = $(this),
  c = b.data("toast-type"),
  d = b.data("toast-icon"),
  e = b.data("toast-position"),
  f = b.data("toast-title"),
  g = b.data("toast-message"),
  produc_id = b.data("id"),
  h = "";
  switch (e) {
    case "topRight":
    h = {
      class: "iziToast-" + c || "",
      title: f || "Title",
      message: g || "toast message",
      animateInside: !1,
      position: "topRight",
      progressBar: !1,
      icon: d,
      timeout: 2000,
      transitionIn: "fadeInLeft",
      transitionOut: "fadeOut",
      transitionInMobile: "fadeIn",
      transitionOutMobile: "fadeOut"
    };
    break;
  }

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: 'cart-ajax-add',
    type: 'POST',
    data: {id: produc_id,color: color,size: size, qty: qty },
  })
  .done(function(res) {
    mylib.show(res,$('.cart-ajax'));
    mylib.carthover();
    mylib.removecartajax();
    iziToast.show(h);

  });
});

},
updatecartajax:function updatecartajax() {

  $('.total-quanlity').each(function() {

    $(this).on('change',function(){
      rowid = $(this).attr('data-rowid');
      qty = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });  
      $.post('cart-ajax-update', {rowid: rowid, qty:qty} , function() {
        
          location.reload();
      });

    });
    
  });


},
removecartajax:function removecartajax() {
  $('.dropdown-product-remove').each(function() {
    $(this).click(function() {
      var rowid = $(this).attr('row-id');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'cart-ajax-delete',
        type: 'POST',

        data: {
          rowId: rowid
        },
      })
      .done(function(res) {
        $('#cart-mini-title').trigger('click');

      })

    });

  });
},
account:function account() {
   $('.account').mouseenter(function(event) {
      $('#cart-mini-content>.toolbar-dropdown').css('display', 'none');
     });
},
fill: function filldata() {
    var data_fill = [];
     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   $('.fill').each(function(index, el) {
       $(this).on('change',function(event) {
        if( $(this).is(":checked"))
        {
          data_fill.push($(this).val());
         
          $.get('loc-size', {data: data_fill}, function(res) {
         $(".isotope-grid").imagesLoaded(function() {
            $(".isotope-grid").isotope({
            itemSelector: ".grid-item",
            transitionDuration: "0.7s",
            masonry: {
                columnWidth: ".grid-sizer",
                gutter: ".gutter-sizer"
            }
          });});
           $('.fill-product').html(res);
          });
        }
        else
        {
         var itemtoRemove = $(this).val();
         data_fill.splice($.inArray(itemtoRemove, data_fill),1);
          $.get('loc-size', {data: data_fill}, function(res) {
             $(".isotope-grid").imagesLoaded(function() {
            $(".isotope-grid").isotope({
            itemSelector: ".grid-item",
            transitionDuration: "0.7s",
            masonry: {
                columnWidth: ".grid-sizer",
                gutter: ".gutter-sizer"
            }
          });});
             $('.fill-product').html(res);
          });
        }
          
       });
   });

},
paginateajax: function paginate() {
 $(document).on('click','#cuspag a',function(e){
    e.preventDefault();
    var url = $(this).attr('href');
     data=[];
   $("input:checkbox[name='sz']:checked").each(function(){
    data.push($(this).val());
    });

     $.get(url, {data: data}, function(res) {
         $(".isotope-grid").imagesLoaded(function() {
            $(".isotope-grid").isotope({
            itemSelector: ".grid-item",
            transitionDuration: "0.7s",
            masonry: {
                columnWidth: ".grid-sizer",
                gutter: ".gutter-sizer"
            }
          });});
           $('.fill-product').html(res);
          });
});
}
};
window.mylib = cart;

})(this.jQuery);