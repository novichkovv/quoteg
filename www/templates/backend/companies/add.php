<h3 class="page-title"> <?php echo isset($_GET['id']) ? 'Edit' : 'Create'; ?> Company
    <small></small>
</h3>
<div class="row">
    <div class="col-md-6">
        <form id="company_form" action="" method="post" class="form-horizontal">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-docs font-dark"></i>
                        <span class="caption-subject bold uppercase"> Company Form</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-group">
                        <label class="control-label col-md-5">Company Name *</label>
                        <div class="col-md-7">
                            <input type="text" name="company[company_name]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $company['company_name']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Address *</label>
                        <div class="col-md-7">
                            <input name="company[address]" class="form-control" value="<?php echo $company['address']; ?>"  data-require="1">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">City *</label>
                        <div class="col-md-7">
                            <input type="text" name="company[city]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $company['city']; ?>">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">State *</label>
                        <div class="col-md-7">
                            <input type="text" name="company[state]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $company['state']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Phone Number </label>
                        <div class="col-md-7">
                            <input type="text" name="company[phone_number]" autocomplete="off" class="form-control" value="<?php echo $company['phone_number']; ?>">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <h3>Contact</h3>
                    <div class="form-group">
                        <label class="control-label col-md-5">First Name </label>
                        <div class="col-md-7">
                            <input type="text" name="contact[first_name]" autocomplete="off" class="form-control" value="<?php echo $contact['first_name']; ?>">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Last Name </label>
                        <div class="col-md-7">
                            <input type="text" name="contact[last_name]" autocomplete="off" class="form-control" value="<?php echo $contact['last_name']; ?>">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Email </label>
                        <div class="col-md-7">
                            <input type="text" name="contact[email]" autocomplete="off" class="form-control" value="<?php echo $contact['email']; ?>">
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="company_id" value="<?php echo $company['id']; ?>">
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" name="save_company_btn" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("#company_form").submit(function() {
            return validate('company_form');
        });
    });
</script>