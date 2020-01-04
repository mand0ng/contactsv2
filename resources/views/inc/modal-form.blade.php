<div class="modal fade" id="contact-form" aria-hidden="true" role="dialog" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Link Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Name" >
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label for='email' class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" >
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label for='phone_number' class="col-sm-6 control-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="phone_number" name="phone_number"
                                               placeholder="Phone number" >
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="submit" value="add">Save Contact
                            </button>
                            <input type="hidden" id="contact_id" name="contact_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
