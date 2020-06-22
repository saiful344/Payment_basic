
<!-- Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="roundedd modal-content">
      <div class="modal-header border-none">
        <h5 class="modal-title" id="exampleModalCenterTitle"><b>EDIT</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      	<form action="posts" method="PUT">
          <input type="hidden" name="id" value="">
      	<div class="col-10 m-auto">
      <div class="select-cashier">
	    <select class="form-point cashier " id="exampleFormControlSelect1" name="cashier">
	    	@foreach($cashier as $n)
	    	<option value="{{$n->id}}">{{$n->name}}</option>
	    	@endforeach
	    </select>
      </div>
      <div class="select-category">
	   	<select class="form-point category" id="exampleFormControlSelect1" name="category">
	    	@foreach($category as $n)
	    	<option value="{{$n->id}}">{{$n->name}}</option>
	    	@endforeach
	    </select>
    </div>
		  <div class="form-group row">
		    <div class="col-sm-12">
		      <input type="text" class="form-point barang"  placeholder="Barang" name="barang">
		      <input type="text" class="form-point harga"  placeholder="Harga" name="harga">
		    </div>
		  </div>
      	</div>
      </form>
      </div>
      <div class="modal-footer border-none">
        <button type="submit" class="btn btn-ark shadow pl-4 pr-4 text-white crud-submit-edit">EDIT</button>
      </div>
    </div>
  </div>
</div>
