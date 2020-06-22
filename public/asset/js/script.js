var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){
    	total_page = data.last_page;
    	current_page = data.current_page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,

	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
			        	 getPageData();
                }
	        }
	    });

	    manageRow(data.data);
	    is_ajax_fire = 1;
    });
}


$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
})

function getPageData(){
	$.ajax({
		dataType : 'json',
		url : url,
		data : {page:page}
	}).done(function(data){
		manageRow(data.data)
	});
}

function manageRow(data){
	var	rows = '';
	var i = 1;
	$.each( data, function( key, value) {
		rows = rows + '<tr>';
		rows = rows + '<td>'+ i++ +'</td>';
	  	rows = rows + '<td>'+value.cashier.name +'</td>';
	  	rows = rows + '<td>'+value.name +'</td>';
	  	rows = rows + '<td>'+value.category.name +'</td>';
	  	rows = rows + '<td>'+value.price +'</td>';
	  	rows = rows + '<td data-id="'+value.id+'"  data-name='+value.name+'>';
	  	rows = rows + '<button class="mr-2 btn edit-item" data-toggle="modal" data-target="#edit-item" ><img src="./asset/image/edit.svg" width="20px"></button>';
      	rows = rows + '<button class="btn remove-item"><img src="./asset/image/bin.svg" width="20px"></button>';
      	rows = rows + '</td>';
	  	rows = rows + '</tr>';
	})
$("tbody").html(rows);
}

$(".crud-submit").click(function(e){
	e.preventDefault();
	var form_action = $("#create-item").find("form").attr("action");
	var barang = $("#create-item").find("input[name='barang']").val();
	var harga = $("#create-item").find("input[name='harga']").val();
	var cashier = $("#create-item").find("select[name='cashier']").val();
	var category = $("#create-item").find("select[name='category']").val();
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url :form_action,
		data : {name:barang,price:harga,cashier_id:cashier,category_id:category}
	}).done(function(data){
		getPageData();
		$(".modal").modal("hide");
		toastr.success('POST created successfully','Success alert',{timeout:5000});
	});
});

$("body").on("click",".remove-item",function(){
	var id  = $(this).parent("td").data("id");
	var name = $(this).parent("td").data("name");
	var c_obj = $(this).parents("tr");
	var result = confirm("Seriously to delete");

	if (result) {
		$.ajax({
			dataType : 'json',
			type : 'delete',
			url : url + '/' + id
		}).done(function(data){
			c_obj.remove();
			$("#delete-popup").modal("show");
			$("#name-deleted").html(name);
			$("#id-deleted").html(id);
			getPageData();
		})
	}
})

$("body").on("click",".edit-item",function(){
	var id  = $(this).parent("td").data("id");
	$.ajax({
		dataType : 'json',
		type : 'get',
		url : url + '/' + id
	}).done(function(data){
		$("#edit-item").find("input[name='harga']").val(data.price)
		$("#edit-item").find("input[name='barang']").val(data.name)
		$("#edit-item").find("input[name='id']").val(data.id)
		$("div.select-cashier select").val(data.cashier.id);
		$("div.select-category select").val(data.category.id);
		console.log(data.cashier.id);
	})
})

$(".crud-submit-edit").click(function(e){
    e.preventDefault();

	var form_action = $("#edit-item").find("form").attr("action");
	var barang = $("#edit-item").find("input[name='barang']").val();
	var id = $("#edit-item").find("input[name='id']").val();
	var harga = $("#edit-item").find("input[name='harga']").val();
	var cashier = $("#edit-item").find("select[name='cashier']").val();
	var category = $("#edit-item").find("select[name='category']").val();
	console.log(form_action);
	$.ajax({
		dataType: 'json',
		type: 'PUT',
		url :form_action + "/" +id,
		data : {name:barang,price:harga,cashier_id:cashier,category_id:category}
	}).done(function(data){
		getPageData();
		$(".modal").modal("hide");
		toastr.success('Update created successfully','Success alert',{timeout:5000});
	});
});
