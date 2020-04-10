var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
                    /* the route pointing to the post function */
                    url: '/kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id:this.id, action:'add'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $("#kitchen_total").html(data.msg); 
                    }
                }); 

    <div class="col-sm-8 add-cust-box-pop">
                <img src="assets/img/ic-veg.svg" class="veg-badge mr-1 d-inline"> Bahawalpur Ganne Ka Ras
                <p> Addons that have been added to the dish will come here </p>
              </div>
              <div class="col-sm-4">
                  <div class="input-group d-block float-right">
                               
                                    <button class="btn btn-light btn-sm float-left" id="minus-btn"><img src="assets/img/ic-minus.svg" class="d-inline"></button>
                                
                                <input type="number" id="qty_input" class="add-plus-min float-left" value="0" min="0">
                                
                                    <button class="btn btn-light btn-sm float-left" id="plus-btn"><img src="assets/img/ic-plus.svg" class="d-inline"></button>
                                
                            </div>
              </div>


              