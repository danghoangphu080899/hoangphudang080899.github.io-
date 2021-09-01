

 function RenderCart(data) {
 	$('.shopping').empty();
	$('.shopping').html(data);
 }
	function AddCart(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/AddCart/' + id,
			type: 'GET',
			success:function (data) {
				RenderCart(data);
				alertify.success('Thêm giỏ hàng thành công');
			}

		});
	};

	function RemoveCart(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/DeleteCart/' + id,
			type: 'GET',
			success:function (data) {
				RenderCart(data);
				alertify.success('Xóa giỏ hàng thành công');
			}

		});
	};
  function RenderListCart(data) {
	 $('.list-cart').empty();
	$('.list-cart').html(data);
}
	function RemoveListCart(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/DeleteListCart/' + id,
			type: 'GET',
			success:function (data) {
				RenderListCart(data);
				alertify.success('Xóa giỏ hàng thành công');
			}

		});
};
	function UpdateListCart(id) {
		
		
		$.ajax({
			url: 'https://hoangphu.com/myproject2/UpdateListCart/' + id + '/' + $('#quanty-item-'+id).val(),
			type: 'GET',
			success:function (data) {
				RenderListCart(data);
				alertify.success('Update giỏ hàng thành công');
			}

		});
};	


     
	function AddsCart(id) {

		$.ajax({
			url: 'https://hoangphu.com/myproject2/AddsCart/' + id + '/' + $('#quanty').val(),
			type: 'GET',
			success:function (data) {
				location.reload();
				alertify.success('Update giỏ hàng thành công');

			}

		});
	};
	function AddWishlist(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/add_wishlist/' + id,
			type: 'GET',
			success:function (data) {
				if(data=="login"){	
					alertify.error('Bạn chưa đăng nhập');
				}else if (data=='exist') {
					alertify.warning('Đã có trong yêu thích');
				}else{

					alertify.success('Thêm yêu thích thành công');
				}
				
			}

		});
	};
	function RenderWishlist(data) {
 	$('.wishlist-ajax').empty();
	$('.wishlist-ajax').html(data);
 }
	function RemoveWishlist(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/DeleteWishlist/' + id,
			type: 'GET',
			success:function (data) {
				RenderWishlist(data);
				
				alertify.success('Xóa thành công');
			}

		});
};

	function AddWatched(id) {
		$.ajax({
			url: 'https://hoangphu.com/myproject2/AddWatched/' + id,
			type: 'GET',
			success:function (data) {
				RenderCart(data);
				alertify.success('Thêm giỏ hàng thành công');
			}

		});
	};

// $(document).ready(function () {
// 	$("#addADs").click(function() {
// 		$("#insert").append('<div class="form-group col-md-4 "> <label class="label-bold">Thành phố: <span>*</span></label> <div class="input-group"> <select name="thanhpho" id="thanhpho" class="form-control thanhpho choose" name="idDanhMuc" > <option >----Chọn thành phố----</option> @foreach($tp as $value) <option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option> @endforeach </select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-group col-md-4 "> <label class="label-bold">Quận, huyện: <span>*</span></label> <div class="input-group"> <select name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose" name="idDanhMuc" > <option >----Chọn quận huyện----</option> </select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-group col-md-4 "> <label class="label-bold">Xã, phường, thị trấn: <span>*</span></label> <div class="input-group"> <select  name="xa" id="xa"  class="custom-select " name="idDanhMuc" > <option >----Chọn Xã, phường, thị trấn----</option> </select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div>');	
// 	});
// });
$(document).ready(function () {
 $("#addADs").click(function() {
     document.getElementById('insert').style.display = "flex";
      document.getElementById('addADs').style.display = "none";
      document.getElementById('check_insert').value = '1';
     
 });
});
$(document).ready(function () {
	$("#addADs_checkout").click(function() {
		document.getElementById('insert_checkout').style.display = "flex";
        $('#addADs_checkout').hide();
         $('#giahangcu').hide();
        document.getElementById('check_insert_checkout').value = '1';
	});
});
$(document).ready(function () {
	$('a#del').on('click',function () {
		var rid = $(this).parent().find("input").attr("rid");

		 var idDiaChi = $(this).parent().find("input").attr('idDiaChi');

		 var _token = $("form[name='frmEditProfile']").find("input[name='_token']").val();

		 var url = "https://hoangphu.com/myproject2/delAddress/"

		$.ajax({
			url: url + idDiaChi,
			type: 'POST',
			cache: false,
			data:{ "_token":_token,"idDiaChi":idDiaChi},
			success:function (data) {
				if(data=="ok"){	
					$('#dc'+rid).remove();
					alertify.success('Xóa thành công');
				}else{
					alert('error');

				}
			}

		});
		
	});
});

$(document).ready(function() {
	$("#payment2").click(function() {
		$("#btn_process").hide();
		document.getElementById('paypal-button').style.display = "block";
		
	});
	$("#payment").click(function() {
		$("#btn_process").show();
		document.getElementById('paypal-button').style.display = "none";
		
	});
});

var btnUpload = $("#img"),
	btnOuter = $(".button_outer");

	btnUpload.on("change", function(e){
		if ($("#avatar_new").length) {
			
            
		}
		var ext = btnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Not an Image...')
			
		} else {
			$('.user-avatar').html('<img id="avatar" alt="avatar" src="public/avatar/avatar_default_man.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128" />');
			btnOuter.addClass("file_uploading");
			setTimeout(function(){
				btnOuter.removeClass("file_uploading");
			},2500);
			//btnOuter.removeClass("file_uploading");
			//btnOuter.removeClass("file_uploaded");
			var uploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
$(".user-avatar").html('');
				$(".user-avatar").append('<img alt="avatar" name="avatar_new"  id="avatar_new" src="'+uploadedFile+'" class="rounded-circle img-responsive mt-2" width="128" height="128"/>');
				
			},3500);

		}
	});

// $(document).ready(function () {
// 	$("#shipping_method").click(function() {

// 		// if(document.getElementById("shipping1").checked == true){
// 		// 	console.log($('.subtotal').val());
// 		// 	$subtotal = $(this).parent().parent().parent().find('span').attr('subtotal');
// 		// 	$total = $(this).parent('shipping').find('tr').attr('class');
// 		// 	alert($total);
// 		// }

// 	});

// 	// $(".order-total").ready(function() {
// 	// 	$total = $(this).attr('id');
// 	// 	alert($total);
// 	// })
// });
     function submitform() {   document.getElementById('myform').submit(); } 
     function submitcart() {   document.getElementById('frmEditCart').submit(); } 
	function submitpayment()     {    document.forms["frmpayment"].submit();     }
	function submitform_quickview() {   document.getElementById('myform_quickview').submit(); }
	function submitform_quickview_home() {   document.getElementById('myform_quickview_home').submit(); }
	
	
   $(document).ready(function() {
   		$('#sort').on('change',function() {
   			var url = $(this).val();
   			if (url) {
   				window.location = url;
   			}
   			return false;
   		})
   });

   $('#closemodal').click(function() {
    $('.modal').modal('hide');
});



   function cancelOrder($id) {
   	 if(confirm("Xác nhận thu hồi đơn hàng") == true){
               window.location = "https://hoangphu.com/myproject2/cancel-order/" + $id ;
            }

}
   function delOrder($id) {
     if(confirm("Xác nhận xóa đơn hàng này") == true){
               window.location = "https://hoangphu.com/myproject2/del-order/" + $id ;
            }

}

function review_del($id,$idProduct) {
		if(confirm("Xác nhận xóa đánh giá") == true){

        $.ajax({
            url: 'https://hoangphu.com/myproject2/review_del/' + $id +"/"+ $idProduct,
            type: 'GET',
            success:function (data) {
                $('.del-comment-ajax').empty();
                $('.del-comment-ajax').html(data);
                check_height();
                alertify.success('Xóa thành công');
            }

        });

    }
};

function check_height() {

        if($('#count_review').val()>=3){
        $("#rating-ajax").addClass("hideContent-comment");
        $(".show-more-comment").show();
        $(".rating-comment").addClass('mt-1');
        $("#span").addClass('mt-1');
        $(".comment-review").addClass('mt-70');
        
         
    }else{
        $("#rating-ajax").removeClass("hideContent-comment");
        $(".show-more-comment").hide();
        $(".rating-comment").removeClass('mt-1');
        $("#span").removeClass('mt-1');
         $(".comment-review").removeClass('mt-70');
    }
    
} 
function com_del($id) {
        if(confirm("Xác nhận xóa bình luận của bạn") == true){

        $.ajax({
            url: 'https://hoangphu.com/myproject2/com_del/' + $id ,
            type: 'GET',
            success:function (data) {
                $('#del-reply-ajax').empty();
                $('#del-reply-ajax').html(data);
                check_height2();
                alertify.success('Xóa thành công');
            }

        });

    }
};


function check_height2() {

        if($('#count_comment').val()>=3){
        $("#check_height2").addClass("hideContent-reply");
        $(".show-more-reply").show();

        $(".reply").addClass('mt-70');
        
         
    }else{
        $("#check_height2").removeClass("hideContent-reply");
        $(".show-more-reply").hide();

         $(".reply").removeClass('mt-70');
    }
    
} 
// function review($idProduct) {
//         if(confirm("Xác nhận xóa đánh giá") == true){
            
//         if (!document.getElementById('star5').checked && !document.getElementById('star4').checked
//                  && !document.getElementById('star3').checked && !document.getElementById('star2').checked
//                  && !document.getElementById('star1').checked) {
//                  alert('Vui lòng chọn số sao đánh giá');
//                 return false;
//              }else if (document.getElementById('summernote_comment').value == '') {
//                   alert('Vui lòng nhập nhận xét của bạn');  
//              }
//              else if (document.getElementById('summernote_comment').value.length < 10) {
//                   alert('Vui lòng nhập nhận xét của bạn tối thiểu là 10 kí tự');  
//              }else{
//             $.ajax({
//             url: 'https://hoangphu.com/myproject2/review_ajax/' + $id +"/"+ $idProduct,
//             type: 'GET',
//             success:function (data) {
//                 $('.del-comment-ajax').empty();
//                 $('.del-comment-ajax').html(data);
//                 check_height();
//                 alertify.success('Xóa thành công');
//             }

//         });
//              }

//     }
// };  

  $(document).ready(function() {
    
    $(".form-login").validate({
        

      rules: {

        email: {
          required: true,
          email: true,
          

        },
        password: {
          required: true,
          minlength: 6
        },

      },
      messages: {

        password: {
          required: "Vui lòng nhập mật khẩu",
          minlength: "Chiều dài tối thiểu 6 kí tự",
        },

        email:{
        		email: "Đó không phải là email",
             required: "Vui lòng nhập email",

        } 
        
      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".buton-submit-login").click(function() {
        $(".form-login").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if ((!$('.form-login').valid())) {
            return true;
        }
    });
});


  $(document).ready(function() {
    
    $(".form-register").validate({
        

      rules: {
        name: {
          required: true,
          minlength: 6,
          maxlength: 25
        },
        email: {
          required: true,
          email: true,
          remote: {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: "https://hoangphu.com/myproject2/validate_email",
            type: "get",
            data: {

              _token: function() {
                return "{{csrf_token()}}";
            }
        }
    }
},
        password: {
          required: true,
          minlength: 6
        },
        password2: {
          required: true,
          minlength: 6,
          equalTo: "#password",
        },



      },
      messages: {
        name: {
          required: "Vui lòng nhập họ và tên",
          minlength: "Họ tên của bạn từ 6->25 kí tự",
          maxlength: " Họ tên dài quá 25 kí tự"
        },
        password: {
          required: "Vui lòng nhập mật khẩu",
          minlength: "Chiều dài tối thiểu 6 kí tự",
        },
        password2: {
          required: "Vui lòng nhập lại mật khẩu",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          equalTo: "Mật khẩu không khớp"
        },
        email: {
           required:  "Vui lòng nhập email",
           email: "Không phải là một email",
           remote: "Email đã tồn tại trên hệ thống"
        },
      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-register").click(function() {
        $(".form-register").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if ((!$('.form-register').valid())) {
            return true;
        }
    });
});

 $(document).ready(function() {
    
    $(".form-forgetpass").validate({
        

      rules: {

        email: {
          required: true,
          email: true,
          remote: {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: "https://hoangphu.com/myproject2/validate_email_forget",
            type: "get",
            data: {

              _token: function() {
                return "{{csrf_token()}}";
            }
        }
    }
},




      },
      messages: {

        email: {
           required:  "Vui lòng nhập email",
           email: "Không phải là một email",
           remote: "Email chưa đăng ký trên hệ thống"
        },
      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-forgetpass").click(function() {
        $(".form-forgetpass").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if ((!$('.form-forgetpass').valid())) {
            return true;
        }
    });
});


 $(document).ready(function() {
    
    $(".form-profile").validate({
        

      rules: {

      	PasswordCurrent: {
          required: true,
          minlength: 6
        },
        PasswordNew: {
          required: true,
          minlength: 6
        },
        PasswordNew2: {
          required: true,
          minlength: 6,
          equalTo: "#PasswordNew"
        },





      },
      messages: {
      	 PasswordCurrent: {
          required: "Vui lòng nhập mật khẩu cũ",
          minlength: "Chiều dài tối thiểu 6 kí tự",
        },
         PasswordNew: {
          required: "Vui lòng nhập mật khẩu mới",
          minlength: "Chiều dài tối thiểu 6 kí tự",
        },
         PasswordNew2: {
          required: "Vui lòng nhập lại mật khẩu mới",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          equalTo: "Mật khẩu không trùng khớp"
        },

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-profile").click(function() {
        $(".form-profile").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if ((!$('.form-profile').valid())) {
            return true;
        }
    });
});

 
  $(document).ready(function() {
    
    $(".form-newpass").validate({
        

      rules: {

      	password: {
          required: true,
          minlength: 6
        },

        password2: {
          required: true,
          minlength: 6,
          equalTo: "#password"
        },





      },
      messages: {
      	 password: {
          required: "Vui lòng nhập mật khẩu mới",
          minlength: "Chiều dài tối thiểu 6 kí tự",
        },

         password2: {
          required: "Vui lòng nhập lại mật khẩu mới",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          equalTo: "Mật khẩu không trùng khớp"
        },

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-newpass").click(function() {
        $(".form-newpass").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if ((!$('.form-newpass').valid())) {
            return true;
        }
    });
});

 $(document).ready(function() {
    
    $(".form-comment").validate({
        

      rules: {

         rating:{ 
            required:true 
        },

        message: {
          required: true,
          minlength: 20,
            maxlength: 255,
        },
      },
      messages: {
         rating: {
          required: "Vui lòng nhập mật khẩu mới",
        },

         message: {
          required: "Vui lòng nhập nhận xét của bạn về sản phẩm",
          minlength: "Chiều dài tối thiểu 20 kí tự",
          maxlength: "Chiều dài tối đa 255 kí tự",
        },

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-comment").click(function() {
        $(".form-comment").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if (($('.form-comment').valid())) {
            if (!document.getElementById('star5').checked && !document.getElementById('star4').checked
                 && !document.getElementById('star3').checked && !document.getElementById('star2').checked
                 && !document.getElementById('star1').checked) {
                 alert('Vui lòng chọn số sao đánh giá');
                return false;
             }else{
                return true;
             }
        }
    });
});
  $(document).ready(function() {
    
    $(".form-comment2").validate({
        

      rules: {
        message: {
          required: true,
          minlength: 20,
            maxlength: 200,
        },
      },
      messages: {
         message: {
          required: "Vui lòng nhập bình luận của bạn",
          minlength: "Chiều dài tối thiểu 20 kí tự",
          maxlength: "Chiều dài tối đa 200 kí tự",
        },

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-comment").click(function() {
        $(".form-comment").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if (($('.form-comment').valid())) {

                return true;
             }
        
    });
});
  $(document).ready(function() {
    
    $(".edit_profile").validate({
        

      rules: {
        HoTen: {
          required: true,
          minlength: 6,
          maxlength: 25
        },
        SoDienThoai: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 11
        },
        NgaySinh: {
          required: true,
        },
        




      },
      messages: {
        HoTen: {
          required: 'Vui lòng nhập họ và tên',
          minlength: 'Chiều dài tối thiểu 6 kí tự' ,
          maxlength: 'Chiều dài tối đa 25 kí tự'
        },
        SoDienThoai: {
          required: 'Vui lòng nhập số điện thoại',
          number: 'Vui lòng chỉ nhập số',
          minlength: 'Số điện thoại chỉ từ 10->11 số',
          maxlength: 'Số điện thoại chỉ từ 10->11 số'
        },
        NgaySinh: {
          required: 'Vui lòng nhập ngày sinh',
        },


      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-edit_profile").click(function() {
        $(".edit_profile").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if (($('.edit_profile').valid())) {
            if (document.getElementById('check_insert').value == '1') {
                if (document.getElementById('thanhpho').value == '0') {
                    alert('Vui lòng chọn thành phố');
                    document.getElementById('thanhpho').focus();
                    return false;
                }else if (document.getElementById('quanhuyen').value == '0') {
                    alert('Vui lòng chọn quận huyện');
                    document.getElementById('quanhuyen').focus();
                    return false;
                }
                else if (document.getElementById('xa').value == '0') {
                    alert('Vui lòng chọn xã, phường, thị trấn');
                    document.getElementById('xa').focus();
                    return false;
                }else if (document.getElementById('diachi').value == '') {
                    alert('Vui lòng điền địa chỉ chi tiết');
                    document.getElementById('diachi').focus();
                    return false;
                }else{
                    return true;
                }
                
            }else{
                return true;
            }
        }
    });
});

//  $(document).ready(function() {
    
//     $(".form-comment").validate({
        

//       rules: {

//          rating:{ 
//             required:true 
//         },

//         message: {
//           required: true,
//           minlength: 10
//         },





//       },
//       messages: {
//          rating: {
//           required: "Vui lòng nhập mật khẩu mới",
//         },

//          message: {
//           required: "Vui lòng nhập nhận xét của bạn về sản phẩm",
//           minlength: "Chiều dài tối thiểu 10 kí tự",
//         },

//       },
//       errorClass: 'invalid',
//         errorElement: 'span',
  
//         errorPlacement: function(error, element) {
//             error.insertAfter(element.next('span').children());
//         },
//         highlight: function(element) {
//             $(element).next('span').show();
//         },
//         unhighlight: function(element) {
//             $(element).next('span').hide();
//         }
//     });
//     $(".button-comment").click(function() {
//         $(".form-comment").validate({
//             errorClass: 'invalid',
//             errorElement: 'span',
//             errorPlacement: function(error, element) {
//                 error.insertAfter(element.next('span').children());
//             },
//             highlight: function(element) {
//                 $(element).next('span').show();
//             },
//             unhighlight: function(element) {
//                 $(element).next('span').hide();
//             }
//         });
//         if (($('.form-comment').valid())) {
//             if (!document.getElementById('star5').checked && !document.getElementById('star4').checked
//                 && !document.getElementById('star3').checked && !document.getElementById('star2').checked
//                 && !document.getElementById('star1').checked) {
//                 alert('Vui lòng chọn số sao đánh giá');
//             }else{
//                 $.ajax({
//             url: 'https://hoangphu.com/myproject2/test/' + document.getElementById('summernote_comment').value + "/3",
//             type: 'GET',
//             success:function (data) {
                
                
//                 alertify.success('Xóa thành công');
//             }

//         });
//             }
//            // alert(document.getElementById('star5').checked);
//             //alert(document.getElementById('summernote_comment').value);

   
        

//         }
//     });
// }

$(document).ready(function() {
    $('.choose').on('change',function() {
      
        var action = $(this).attr('id');
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        
        var result = '';
       
        if (action == 'thanhpho') {
            result = 'quanhuyen';
        }else{
            result = 'xa';
        }
        $.ajax({
          url: 'https://hoangphu.com/myproject2/select_delivery',
          type: 'POST',
         
          data: {action: action, matp:matp,_token:_token},
        success:function(data) {
            
            $('#'+result).html(data);
        }
          
        });
        
    });
});

// $(document).ready(function () {
//     $('#addADs').on('click',function () {
        
//         var _token = $('input[name="_token"]').val();
//          var url = "https://hoangphu.com/myproject2/add_address/"

//         $.ajax({
//           url: url,
//           type: 'get',
         
//           data: {_token:_token},
//         success:function(data) {
            
//             $('#insert').append(data);
//         }
          
//         });

        
//     });
// });
  $(document).ready(function() {
    
    $(".form_checkout").validate({
        

      rules: {
        name: {
          required: true,
          minlength: 6,
          maxlength: 25
        },
        number: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 11
        },
        diachigiaohang: {
          required: true,
        },
        




      },
      messages: {
        name: {
          required: 'Vui lòng nhập họ và tên',
          minlength: 'Chiều dài tối thiểu 6 kí tự' ,
          maxlength: 'Chiều dài tối đa 25 kí tự'
        },
        number: {
          required: 'Vui lòng nhập số điện thoại',
          number: 'Vui lòng chỉ nhập số',
          minlength: 'Số điện thoại chỉ từ 10->11 số',
          maxlength: 'Số điện thoại chỉ từ 10->11 số'
        },
        diachigiaohang: {
          required: 'Vui lòng chọn địa chỉ giao hàng',
        },

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('span').children());
        },
        highlight: function(element) {
            $(element).next('span').show();
        },
        unhighlight: function(element) {
            $(element).next('span').hide();
        }
    });
    $(".button-form_checkout").click(function() {
        $(".form_checkout").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.next('span').children());
            },
            highlight: function(element) {
                $(element).next('span').show();
            },
            unhighlight: function(element) {
                $(element).next('span').hide();
            }
        });
        if (($('.form_checkout').valid())) {
            if (document.getElementById('check_insert_checkout').value == '1') {
                if (document.getElementById('thanhpho').value == '0') {
                    alert('Vui lòng chọn thành phố');
                    document.getElementById('thanhpho').focus();
                    return false;
                }else if (document.getElementById('quanhuyen').value == '0') {
                    alert('Vui lòng chọn quận huyện');
                    document.getElementById('quanhuyen').focus();
                    return false;
                }
                else if (document.getElementById('xa').value == '0') {
                    alert('Vui lòng chọn xã, phường, thị trấn');
                    document.getElementById('xa').focus();
                    return false;
                }else if (document.getElementById('diachi').value == '') {
                    alert('Vui lòng điền địa chỉ chi tiết');
                    document.getElementById('diachi').focus();
                    return false;
                }else{
                    return true;
                }
                
            }else{
                if(document.getElementById('diachigiaohang').value == '0'){
                   alert('Vui lòng chọn địa chỉ giao hàng');
                   return false;
                }else{
                    return true;
                }
                
            }
        }
    });
});

 function remove_form_insert() {
         if(confirm("Xác nhận xóa địa chỉ giao hàng mới") == true){
            var form = "#insert_checkout";
             $(form).hide();
              $('#giahangcu').show();
                 document.getElementById('check_insert_checkout').value = '0';
                  $('#addADs_checkout').show();
         } 
     }

  $(document).ready(function() {
    
    $(".check-coupon").validate({
        

      rules: {

        Coupon: {
          required: true,
          minlength: 10,
          maxlength: 50
        },
        



      },
      messages: {

        Coupon: {
          required: "Nhập mã giảm giá",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 50 kí tự'
        },
       

        

      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent().next('span').children());
        },
        highlight: function(element) {
            $(element).parent().next('span').show();
        },
        unhighlight: function(element) {
            $(element).parent().next('span').hide();
        }
    });
   $(".button-check-coupon").click(function() {
        $(".check-coupon").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent().next('span').children());
            },
            highlight: function(element) {
                $(element).parent().next('span').show();
            },
            unhighlight: function(element) {
                $(element).parent().next('span').hide();
            }
        });
        if (!$(".check-coupon").valid()) {
           
                    return true;
                
            
        }
      });
});

  function unset_coupon() {
        $.ajax({
            url: 'https://hoangphu.com/myproject2/unset_coupon/',
            type: 'GET',
            success:function (data) {
                RenderListCart(data);
                alertify.success('Xóa thành công');
            }

        });
    };

$(".show-more a").on("click", function() {

    var $this = $(this); 
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "XEM THÊM"){
        linkText = "Thu gọn";
        $content.switchClass("hideContent", "showContent", 1000);
    } else {
        linkText = "Xem thêm";
        $content.switchClass("showContent", "hideContent", 1000);
    };

    $this.children().text(linkText);
});



$(".show-more-comment a").on("click", function() {

    var $this = $(this); 
    var $content = $this.parent().prev("div.content-comment");
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "XEM THÊM"){
        linkText = "Thu gọn";
        $content.switchClass("hideContent-comment", "showContent-comment", 1000);
    } else {
        linkText = "Xem thêm";
        $content.switchClass("showContent-comment", "hideContent-comment", 1000);
    };

    $this.children().text(linkText);
});
$(".show-more-reply a").on("click", function() {

    var $this = $(this); 
    var $content = $this.parent().prev("div.content-reply");
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "XEM THÊM"){
        linkText = "Thu gọn";
        $content.switchClass("hideContent-reply", "showContent-reply", 1000);
    } else {
        linkText = "Xem thêm";
        $content.switchClass("showContent-reply", "hideContent-reply", 1000);
    };

    $this.children().text(linkText);
});


