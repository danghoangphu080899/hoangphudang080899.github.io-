function hidden_product($id) {
     if(confirm("Xác nhận ẩn sản phẩm") == true){
               window.location = "https://hoangphu.com/myproject2/admin/hidden_product/" + $id ;
            }

}
function show_product($id) {
     if(confirm("Xác nhận hiển thị lại sản phẩm") == true){
               window.location = "https://hoangphu.com/myproject2/admin/show_product/" + $id ;
            }

}
function hidden_user($id) {
     if(confirm("Xác nhận khóa tài khoản này") == true){
               window.location = "https://hoangphu.com/myproject2/admin/hidden_user/" + $id ;
            }

}
function show_user($id) {
     if(confirm("Xác nhận mở khóa tài khoản") == true){
               window.location = "https://hoangphu.com/myproject2/admin/show_user/" + $id ;
            }

}
function hidden_admin($id) {
     if(confirm("Xác nhận khóa tài khoản này") == true){
               window.location = "https://hoangphu.com/myproject2/admin/hidden_admin/" + $id ;
            }

}
function show_admin($id) {
     if(confirm("Xác nhận mở khóa tài khoản") == true){
               window.location = "https://hoangphu.com/myproject2/admin/show_admin/" + $id ;
            }

}
function delete_coupon($id) {
     if(confirm("Xác nhận xóa mã giảm giá") == true){
               window.location = "https://hoangphu.com/myproject2/admin/delete_coupon/" + $id ;
            }

}



$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar_product_new').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            console.log(222);
        }
    } 
    $(".input_avatar_product_new").on('change', function(){
        readURL(this);
    });
});

$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar_product').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            console.log(222);
        }
    } 
    $(".input_avatar_product").on('change', function(){
        readURL(this);
    });
});

 function checkselect_order($id, $order_id) { 
        var value = "select_status_" + $order_id;  
        if($id == 1 ){
            document.getElementById(value).value = "1";
        }else if($id == 2){
            document.getElementById(value).value = "2";
        }else if($id == 3){
            document.getElementById(value).value = "3";
        }else if($id == 4){
            document.getElementById(value).value = "4";
        }else if($id == 5){
        	document.getElementById(value).value = "5";
        }else{
        	document.getElementById(value).value = "6";
        }
} ;


$(document).ready(function () {
	$("#addImgs").click(function() {
		$("#insert").append('<div class="input-group insert"><div class="custom-file"><input type="file" name="HinhAnhChiTiet[]" class="custom-file-input" id="exampleInputFile"><label class="custom-file-label" for="exampleInputFile">Chọn file</label></div></div>');
		
	});
});
$(document).ready(function(){

	$('a#del_icon').on('click',function () {
		var url = 'https://hoangphu.com/myproject2/admin/delImg/';
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr('id');
		var img = $(this).parent().find("img").attr('src');
		var rid = $(this).parent().find("img").attr('rid');
		alert(rid);
		$.ajax({
			url: url + idHinh,
			type: 'POST',
			cache: false,
			//contentType:"application/json; charset=utf-8",
  			//dataType:"json",
			data:{ "_token":_token,"idHinh":idHinh,"urlHinh":img},
			success:function (data) {
				if(data=="ok"){	
					$('#img'+rid).remove();
				}else{
					alert('error');

				}
			}

		});
	})

});
$(document).ready(function(){

	$('a#del').on('click',function () {
		var url = 'https://hoangphu.com/myproject2/admin/delProduct/';

		var _token = $('div[name="csrf-token"]').attr('content');
		
		var idProduct = $(this).parent().parent().find("td").attr('id');
		$.ajax({
			url: url + idProduct,
			type: 'POST',
			cache: false,
			data:{ "_token":_token,"idProduct":idProduct},
			success:function (data) {
				if(data=="ok"){	
					$('#del_ajax'+idProduct).remove();
				}else{
					alert('error');

				}
			}

		});
	})

});

$(document).ready(function(){
	$('#datepicker').daterangepicker({
		 singleDatePicker: true,
    showDropdowns: true,
		 autoApply : true,
		 locale: { format: 'YYYY-MM-DD' }

	});
	$("#datepicker2").daterangepicker({
		singleDatePicker: true,
    showDropdowns: true,
		 autoApply : true,
		 locale: { format: 'YYYY-MM-DD' }
	});

});

$(document).ready(function() {
	chart_30days();

	var chart = new Morris.Bar({
		element: 'bar-chart',
		// lineColors: ['#819C79','#FC8710','#FF6541','#A4ADD3','#766B56'],
        barColors:['#4d79ff', '#ff0066',' #cc9900'],
		parseTime: false,
		hideHover: 'auto',

		xkey: 'period',
		ykeys: ['sales','order','quantity'],
		labels: ['Doanh số','Tổng đơn hàng','Số lượng sản phẩm']

	})


	function chart_30days() {
		var url = 'https://hoangphu.com/myproject2/admin/filter-30day'
		var _token = $('input[name="_token"]').val();
			$.ajax({
			url: url,
			method: 'POST',
			dataType: 'JSON',
			data:{ _token:_token},
			success:function (data) {
				chart.setData(data);
			}

		});
	}

	$('#btn-dashboard').click(function() {
	var url = 'https://hoangphu.com/myproject2/admin/filter-bydate'
	var _token = $('input[name="_token"]').val();
	var from_date = $('#datepicker').val();
	var to_date = $('#datepicker2').val();
	$.ajax({
			url: url,
			method: 'POST',
			dataType: 'JSON',
			data:{ _token:_token,from_date:from_date,to_date:to_date},
			success:function (data) {
				chart.setData(data);
			}

		});
	});

	$('.dashboard-filter').change(function() {
	var url = 'https://hoangphu.com/myproject2/admin/dashboard-filter'
	var _token = $('input[name="_token"]').val();
	var value = $(this).val();
	$.ajax({
			url: url,
			method: 'POST',
			dataType: 'JSON',
			data:{ _token:_token,value:value},
			success:function (data) {
				chart.setData(data);
			}

		});
	});

});
// $(document).ready(function() {


//     var donut = Morris.Donut({
//         element: 'donut',
//         // lineColors: ['#819C79','#FC8710','#FF6541','#A4ADD3','#766B56'],
//         colors:['#4d79ff', '#ff0066',' #cc9900'],
//         resize: true,


//         data:[
//             {label:"123", value:"123"},
//             {label:"123", value:"123"},
//             {label:"123", value:"123"},
//         ]

//     });




// });




function hidden_order($id) {
     if(confirm("Xác nhận ẩn đơn hàng") == true){
               window.location = "https://hoangphu.com/myproject2/admin/delOrder/" + $id ;
            }

}

$(document).ready(function() {
    
    $(".form-add-product").validate({
        

      rules: {

        
        TenSanPham: {
          required: true,
          minlength: 10,
          maxlength: 50
        },
        Gia: {
          required: true,
          number: true,
          min: 1000
        },
        SoLuong: {
          required: true,
          number: true,
          min: 1
        },
        MoTaNgan: {
          required: true,
          minlength: 100,
          maxlength: 400,
        },
        MoTaChiTiet:{
            required: true,
        },

        
       
        HinhAnh: {
          required: true,
          accept:"jpg,png,jpeg,gif"

        },
         manhinh: {
           required: true
        },
        hdh: {
           required: true
        },
        camsau: {
           required: true
        },
        camtruoc: {
           required: true
        },
        chip: {
           required: true
        },
        ram: {
           required: true
        },
        bnt: {
           required: true
        },
        sim: {
           required: true
        },
        pin: {
           required: true
        },
        cpu: {
           required: true
        },
        ocung: {
           required: true
        },
        card: {
           required: true
        },
        cong: {
           required: true
        },
        dacbiet: {
           required: true
        },
        kichthuoc: {
           required: true
        },

        ketnoi: {
           required: true
        },
        mat:{
            required: true
        },
        hang:{
            required: true
        },
        dtsd:{
            required: true
        },
        dkm:{
            required: true
        },
        clmk:{
            required: true
        },
        cld:{
            required: true
        },
        bomay:{
            required: true
        },
        thuonghieu:{
            required: true
        },
        'HinhAnhChiTiet[]': {
            required: true,
          accept:"jpg,png,jpeg,gif" 
          },
          'HinhAnh360[]': {
           
          accept:"jpg,png,jpeg,gif" 
          },
        check: {
          required: true
        }

        



      },
      messages: {

          TenSanPham: {
           required: "Vui lòng nhập tên sản phẩm",
           minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 50 kí tự"
        },
        Gia: {
           required: "Vui lòng nhập giá bán",
           number: "Vui lòng nhập số",
          min: "Giá bán không nhỏ hơn 1000"

        },
        SoLuong: {
           required: "Vui lòng số lượng", 
            number: "Vui lòng nhập số",
          min: "Số lượng không nhỏ hơn 0"

        },
        manhinh: {
           required: "Nhập thông số màn hình",
        },
        hdh: {
           required: "Nhập thông số hệ điều hành",
        },
        camsau: {
           required: "Nhập thông số camera sau",
        },
        camtruoc: {
           required: "Nhập thông số camera trước",
        },
        chip: {
           required: "Nhập thông số chíp xử lí",
        },
        ram: {
           required: "Nhập thông số ram",
        },
        bnt: {
           required: "Nhập thông số bộ nhớ",
        },
        sim: {
           required: "Nhập thông tin sim"
        },
        pin: {
           required: "Nhập thông số pin",
        },
        cpu: {
           required: "Nhập thông số cpu",
        },
        ocung: {
           required: "Nhập thông số ổ cứng",
        },
        card: {
           required: "Nhập thông số card màn hình",
        },
        cong: {
           required: "Nhập thông số cổng",
        },
        dacbiet: {
           required: "Nhập tính năng đặc biệt",
        },
        kichthuoc: {
           required: "Nhập thông số kích thước, trọng lượng",
        },

         ketnoi: {
           required: "Nhập thông tin kết nối",
        },
        mat: {
           required: "Nhập thông mặt đồng hồ",
        },
        hang:{
            required: "Nhập hãng sản xuất",
        },
        dtsd:{
             required: "Nhập đối tượng sử dụng",
        },
        dkm:{
             required: "Nhập đường kính mặt",
        },
        clmk:{
             required: "Nhập chất liệu mặt kính",
        },
        cld:{
             required: "Nhập chất liệu dây",
        },
        bomay:{
             required: "Nhập bộ máy đồng hồ",
        },
        thuonghieu:{
             required: "Nhập thông tin thương hiệu",
        },
        MoTaNgan: {
           required: "Vui lòng nhập mô tả ngắn",
           minlength: "Chiều dài tối thiểu 100 kí tự",
           maxlength: "Chiều dài tối đa 400 kí tự",
        },
        MoTaChiTiet: {
           required: "Vui lòng nhập mô tả ",

        },

        HinhAnh: {
           required: "Vui lòng chọn hình đại diện sản phẩm",
          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },
        'HinhAnhChiTiet[]': {
           required: "Vui lòng chọn hình ảnh chỉ tiết",
          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },
        'HinhAnh360[]': {

          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },

        check:{
          required: "Vui lòng xác nhận"
        }



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


     
});


/* Fundraising Grader
*
* Generic Copyright, yadda yadd yadda
*
* Plug-ins: jQuery Validate, jQuery 
* Easing
*/

$(document).ready(function() {
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".form-add-product").validate({
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
    $(".next3").click(function() {
        $(".form-add-product").validate({
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
        if(document.getElementById('summernote_add_product').value == ''){
                alert('Vui lòng nhập mô tả chi tiết sản phẩm');
                return false;
            }else{
                if ((!$('.form-add-product').valid())) {
            return true;
        }
        }
        
        
        if (animating) return false;
            animating = true;
 
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });


    $(".previous3").click(function() {
        if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
    });




});

$(document).ready(function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {

    var filesInput = document.getElementById("files_detail");
    filesInput.addEventListener("change", function(event) {
        $('#result').empty();
      var files = event.target.files; //FileList object
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        var count =1;
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          
          var div = document.createElement("div");
           div.classList.add('form-group');
           div.classList.add('col-md-4');
          // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
          //   "title='" + picFile.name + "'/>";
           div.innerHTML =" <label class='label-bold' for='exampleInputFile'>Ảnh chi tiết "+ count + ": <span>*</span></label> <div class='input-group'> <img id='img_2'  class='avatar_product_detail' src='" + picFile.result + "'" + "</div> "
          count++;
          output.insertBefore(div, null);

        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
});



function check_attributes() {
    
    var idCatecory = document.getElementById("category_add_product").value;
     
    var id_insert = "#step2_add_product";
     if (idCatecory==1) {
        
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '<div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera sau: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="camsau" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera trước: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="camtruoc" placeholder="Nhập thông số camera trước..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chip: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="chip" placeholder="Nhập thông số chíp xử lí..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ nhớ trong: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="bnt" placeholder="Nhập thông số bộ nhớ trong..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Sim: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="sim" placeholder="Nhập thông tin sim..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Dung lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="pin" placeholder="Nhập thông số dung lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>';
     }); 
     }else if(idCatecory==2){
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '<div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">CPU: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="cpu" placeholder="Nhập thông số CPU..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ổ cứng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="ocung" placeholder="Nhập thông số ổ cứng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="manhinh" placeholder="Nhập thông tin màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Card màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="card" placeholder="Nhập thông tin card màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Cổng kết nối: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="cong" placeholder="Nhập thông tin cổng kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Tính năng đặc biệt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" name="dacbiet" placeholder="Nhập thông tin đặc biệt..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kích thước, trọng lượng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="kichthuoc" placeholder="Nhập thông tin kích thước, trọng lượng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>';
    });
     }else if(idCatecory==3){
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '<div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chip: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="chip" placeholder="Nhập thông số chíp xủ lí..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ nhớ trong: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="bnt" placeholder="Nhập thông số `bộ nhớ trong:..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kết nối: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="ketnoi" placeholder="Nhập thông tin kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera sau: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="camsau" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera trước: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="camtruoc" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Dung lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="pin" placeholder="Nhập thông số dung lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>';
    });
     }else if(idCatecory==4){
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '<div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Thời lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="pin" placeholder="Nhập thông số thời lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kết nối với hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="ketnoi" placeholder="Nhập thông tin kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Mặt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="mat" placeholder="Nhập thông tin mặt đồng hồ..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Tính năng đặc biệt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="dacbiet" placeholder="Nhập tính năng đặc biệt..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hãng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="hang" placeholder="Nhập hãng sản xuất..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>';
    });
     }else if(idCatecory==5){
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '<div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Đối tượng sử dụng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="dtsd" placeholder="Nhập đối tượng sử dụng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Đường kính mặt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="dkm" placeholder="Nhập đường kính mặt đồng hồ..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chất liệu mặt kính: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="clmk" placeholder="Nhập chất liệu mặt kính..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chất liệu dây: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="cld" placeholder="Nhập chất liệu dây..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ máy: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"  name="bomay" placeholder="Nhập thông tin bộ máy..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Thương hiệu: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text"   name="thuonghieu" placeholder="Nhập hãng sản xuất..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>';
    });
     }else if(idCatecory==6){
        $(id_insert).empty();
        $(id_insert).append(function() {

       return '';
    });
     }else{

     }
}



    
function show_imt($id) {

  //Check File API support
  if (window.File && window.FileList && window.FileReader) {
    var id_input = "files_detail_edit" + $id ;
    var filesInput = document.getElementById(id_input);
    var id_result = "result_edit" +$id; 
    var id_result_j = "#result_edit" +$id; 
        $(id_result_j).empty();
      var files = event.target.files; //FileList object
      var output = document.getElementById(id_result);
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        var count =1;
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          
          var div = document.createElement("div");
           div.classList.add('form-group');
           div.classList.add('col-md-4');
          // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
          //   "title='" + picFile.name + "'/>";
           div.innerHTML =" <label class='label-bold' for='exampleInputFile'>Ảnh chi tiết "+ count + ": <span>*</span></label> <div class='input-group'> <img id='img_2'  class='avatar_product_detail' src='" + picFile.result + "'" + "</div> "
          count++;
          output.insertBefore(div, null);

        });
        //Read the image
        picReader.readAsDataURL(file);
      }

  } else {
    console.log("Your browser does not support File API");
  }
}

$(document).ready(function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {

    var filesInput = document.getElementById("avatar_user");
    filesInput.addEventListener("change", function(event) {
      
      var files = event.target.files; //FileList object
      var output = document.getElementById("result_user");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        var count =1;
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          
          var div = document.createElement("div");
           div.classList.add('form-group');
          // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
          //   "title='" + picFile.name + "'/>";
           div.innerHTML =" <label class='label-bold' for='exampleInputFile'>Xem trước ảnh đại diện:</label> <div class='input-group'> <img id='img_2'  class='avatar_product_detail' src='" + picFile.result + "'" + "</div> "
          count++;
          output.insertBefore(div, null);

        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
});
$(document).ready(function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {

    var filesInput = document.getElementById("avatar_post");
    filesInput.addEventListener("change", function(event) {
      
      var files = event.target.files; //FileList object
      var output = document.getElementById("result_post");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        var count =1;
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          
          var div = document.createElement("div");
           div.classList.add('form-group');
          // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
          //   "title='" + picFile.name + "'/>";
           div.innerHTML =" <label class='label-bold' for='exampleInputFile'>Xem trước ảnh đại diện:</label> <div class='input-group'> <img id='img_2'  class='avatar_product_detail' src='" + picFile.result + "'" + "</div> "
          count++;
          output.insertBefore(div, null);

        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
});


//     <script type="text/javascript">

//     const threesixty = new ThreeSixty(document.getElementById('threesixty'), {
   
    
//     image: [<?php print $d ?>],
    


//   count: 36,
//   perRow: 0,
//     width: 800,  // Image width. Default 300
//   height: 600, // Image height. Default 300
//   prev: document.getElementById('prev'),
//   next: document.getElementById('next'),

//   keys: true,         // Rotate image on arrow keys. Default: true
//   draggable: true,    // Rotate image by dragging. Default: true
//   swipeable: true,    // Rotate image by swiping on mobile screens. Default: true
//   dragTolerance: 5,  // Rotation speed when dragging. Default: 10
//   swipeTolerance: 5, // Rotation speed when swiping. Default: 10


//   // Rotation settings
//   speed: 100,     // Rotation speed during 'play' mode. Default: 10
//   inverted: true // Inverts rotation direction
// });



//  $('#play').click(function() {
//      threesixty.toggle();
// });

// </script>

$(document).ready(function() {
    
    $(".form-add-user").validate({
        

      rules: {

        name: {
          required: true,
          minlength: 6,
          maxlength: 30
        },
        phone: {
          required: true,
          minlength: 10,
          maxlength: 12,
          number: true
        },
        thanhpho: {
          required: true,
        },
        quanhuyen: {
          required: true,
        },
        xa: {
          required: true,
        },
        diachi: {
          required: true,
          minlength: 6,
          maxlength: 200
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
        password_add_user: {
          required: true,
          minlength: 6
        },
        repassword: {
          required: true,
          minlength: 6,
          equalTo: "#password_add_user"
        },
        avatar: {
             required: true,
             accept:"jpg,png,jpeg,gif"
        }




      },
      messages: {

        name: {
          required: "Vui lòng nhập họ và tên",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 30 kí tự"
        },
        phone: {
          required: "Vui lòng nhập số điện thoại",
          minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 12 kí tự",
          number: "Vui lòng chỉ nhập số"
        },
        thanhpho: {
          required: "Vui lòng chọn thành phố",
        },
        quanhuyen: {
          required: "Vui lòng chọn quận huyện",
        },
        xa: {
          required: "Vui lòng chọn xã, phường, thị trấn",
        },
        diachi: {
          required: "Vui lòng nhập địa chỉ",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 200 kí tự"
        },
        email: {
          required: "Vui lòng nhập email",
          email: "Đó không phải là một email",
           remote: "Email đã tồn tại trên hệ thống"
        },
        password_add_user:{
          required: "Vui lòng nhập mật khẩu",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          
        },
        repassword: {
           required: "Vui lòng nhập lại mật khẩu",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          equalTo: "Mật khẩu không trùng khớp"
        },
        avatar:{
            required: "Vui lòng chọn hình đại diện",
            accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"
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
   $(".submit-add-user").click(function() {
        $(".form-add-user").validate({
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
        if ((!$('.form-add-user').valid())) {
            return true;
        }
      });
});

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
          url: 'https://hoangphu.com/myproject2/select_delivery_admin',
          type: 'POST',
         
          data: {action: action, matp:matp,_token:_token},
        success:function(data) {
            
            $('#'+result).html(data);
        }
          
        });
        
    });
});


  $(document).ready(function() {
    
    $(".form-add-coupon").validate({
        

      rules: {

        TenGiamGia: {
          required: true,
          minlength: 3,
          maxlength: 150
        },
        MaGiamGia: {
          required: true,
          minlength: 10,
          maxlength: 20
        },
       LoaiGiamGia: {
          required: true,

        },
        SoLuongMa: {
          required: true,
          min: 0,
          number: true
          
        },
        Ngay: {
            required: true,
        },
        GiaTri: {
          required: true,
          min: 0,
          number: true
        },



      },
      messages: {

         TenGiamGia: {
          required: "Nhập tên giảm giá",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 150 kí tự'
        },
        MaGiamGia: {
          required: "Nhập mã giảm giá",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 20 kí tự'
        },
       LoaiGiamGia: {
          required: "Chọn loại giảm giá",

        },
        SoLuongMa: {
          required: "Nhập số lượng mã giảm",
          min: "Số lượng phải lớn hơn 0",
           number: "Vui lòng chỉ nhập số"
          
        },
        Ngay: {
            required: 'Vui lòng chọn ngày giờ bắt đầu và kết thúc',
        },
        GiaTri: {
          required: "Nhập giá trị giảm giá",
          min: "Số lượng phải lớn hơn 0",
          number: "Vui lòng chỉ nhập số"
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
   $(".button-add-coupon").click(function() {
        $(".form-add-coupon").validate({
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
        if ($(".form-add-coupon").valid()) {
            if(document.getElementById('LoaiGiamGia').value == '2')
                if (document.getElementById('GiaTri').value > 100) {
                    alert('Phần trăm giảm giá không thể lớn hơn 100%');
                    document.getElementById('GiaTri').focus();
                    return false;
                }else{
                    return true;
                }
            
        }
      });
});

$(document).ready(function(){
    $('#change_select').on('change',function () {
        var _token = $('input[name="_token"]').val();
        var id = $(this).val();
        if (id != 0) {
        $.ajax({
          url: 'https://hoangphu.com/myproject2/admin/load_send_coupon',
          type: 'POST',
         
          data: {id: id,_token:_token},
        success:function(data) {
            
            $('#insert_send_coupon').html(data);
        }
        });
    }else{
        $('#insert_send_coupon').html('');
    }
    })
});
$(document).ready(function(){
    $('#btn-check-select').on('click',function () {
        var _token = $('input[name="_token"]').val();
        
     
        $.ajax({
          url: 'https://hoangphu.com/myproject2/admin/check_send_coupon',
          type: 'POST',
         
          data: {_token:_token},
        success:function(data) {
           
            if (data.indexOf("tk")<0) {
            var op = document.getElementById("type").getElementsByTagName("option");
            for (var i = 0; i < op.length; i++) {
              
                op[i].disabled = true;
                    
                }
            }else{
                if(data.indexOf("thuong")<0){
                var op = document.getElementById("type").getElementsByTagName("option");
                for (var i = 0; i < op.length; i++) {
                if (op[i].value == 0) {
                op[i].disabled = true;
                    }
                }
            }
             if(data.indexOf("vip")<0){
                var op = document.getElementById("type").getElementsByTagName("option");
                for (var i = 0; i < op.length; i++) {
                if (op[i].value == 1) {
                op[i].disabled = true;
                    }
                }
            }
            }
             
           

          
        }
        });
    
    })
});

  $(document).ready(function() {
    
    $(".form-send-coupon").validate({
        

      rules: {

       
        id: {
            required: true,
        },
        type: {
            required: true,
        },
        



      },
      messages: {

         id: {
          required: "Vui lòng chọn mã giảm giá",
         
        },
        type: {
          required: "Vui lòng chọn chọn kiểu gửi",
         
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
   $(".button-send-coupon").click(function() {
        $(".form-send-coupon").validate({
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
        if ($(".form-send-coupon").valid()) {
           
                
                    return true;
                
            
        }
      });
});
 $(document).ready(function() {
    
    $(".form-add-nsx").validate({
        

      rules: {

        name: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        phone: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 11
        },
       thanhpho: {
          required: true,

        },
        quanhuyen: {
          required: true,

        },
        xa: {
          required: true,

        },
        diachi: {
          required: true,

        },



      },
      messages: {

         name: {
          required: "Nhập tên nhà sản xuất",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 50 kí tự'
        },
        phone: {
          required: "Nhập số điện thoại",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 11 kí tự',
          number: "Chỉ nhập số"
        },
       thanhpho: {
          required: "Chọn thành phố",

        },
        quanhuyen: {
          required: "Chọn quận, huyện",

        },
        xa: {
          required: "Chọn xã, phường, thị trấn",

        },
        diachi: {
          required: "Nhập chi tiết địa chỉ",

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
   $(".button-add-nsx").click(function() {
        $(".form-add-nsx").validate({
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
        if ($(".form-add-nsx").valid()) {
           return true;
                
            
        }
      });
});
 $(document).ready(function () {
    $("#edit_address").click(function() {
        document.getElementById('address_nsx').style.display = "flex";
        document.getElementById('check_nsx').value = '1';
        $('#edit_address').hide();
        
    });
});
function remove_form_insert() {
   
        document.getElementById('address_nsx').style.display = "none";
        $('#edit_address').show();
        document.getElementById('check_nsx').value = '0';
    
}
    
  $(document).ready(function() {
    
    $(".form-add-catepost").validate({
        

      rules: {

         name: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        mota: {
           required: true,
          minlength: 10,
          maxlength: 100
        },



      },
      messages: {

         name: {
          required: "Nhập tên danh mục bài viết",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 50 kí tự'
        },
        mota: {
           required: "Nhập mô tả danh mục bài viết",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 100 kí tự'
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
   $(".button-add-catepost").click(function() {
        $(".form-add-catepost").validate({
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
        if ($(".form-add-catepost").valid()) {
                return true;
            
        }
      });
});

$(document).ready(function() {
    
    $(".form-add-post").validate({
        

      rules: {

        title: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        shortcontent: {
          required: true,
          minlength: 10,
          maxlength: 300,
        },
        status: {
          required: true,
        },
        cate: {
          required: true,
        },
        avatar: {
             required: true,
             accept:"jpg,png,jpeg,gif"
        }




      },
      messages: {

        title: {
          required: "Vui lòng nhập tiêu đề bài viết",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 150 kí tự"
        },
        shortcontent: {
          required: "Vui lòng nhập mô tả ngắn gọn",
          minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 400 kí tự",
        },
        status: {
          required: "Vui lòng chọn thành phố",
        },
        cate: {
          required: "Vui lòng chọn quận huyện",
        },
       
        avatar:{
            required: "Vui lòng chọn hình đại diện",
            accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"
        }
       

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
   $(".submit-add-post").click(function() {
        $(".form-add-post").validate({
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
        if ((!$('.form-add-post').valid())) {
            if(document.getElementById('summernote_add_post').value == ''){
                alert('Vui lòng nhập mô tả chi tiết bài viết');
                return false;
            }else{
               return true; 
            }
            
        }
      });
});