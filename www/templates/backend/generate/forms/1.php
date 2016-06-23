<div class="row form-horizontal">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label col-md-3">

            </label>
            <div class="col-md-9">

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Date *
            </label>
            <div class="col-md-9">
                <input type="text" data-require="1" name="quote[date]" class="form-control date-picker" value="<?php echo date('F d, Y'); ?>">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Phone
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[phone]" class="form-control" value="<?php echo $comp['phone_number']; ?>">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Fax
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[fax]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Mobile
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[mobile]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Attn
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[attn]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Client Job #
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[client_job_no]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Project Name
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[project_name]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Expiration Date
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[expiration_date]" class="form-control date-picker" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                PO #
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[po_no]" class="form-control" value="">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div>
            <h3 class="text-center">Services</h3>
            <div id="services"></div>
            <div class="form-group" id="service_field">
                <label class="control-label col-md-3">
                    Service
                </label>
                <div class="col-md-6">
                    <select class="form-control" id="service_id" data-require="1">
                        <?php foreach ($services as $service): ?>
                            <option value="<?php echo $service['id']; ?>">
                                <?php echo $service['service_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="error-require validate-message">Required Field</div>
                </div>
                <div class="col-md-2">
                    <input type="text" data-require="1" id="service_qty" class="form-control" placeholder="Qty">
                    <div class="error-require validate-message">Required Field</div>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline btn-icon green" id="add_service"><i class="fa fa-plus"></i> </button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Company Name
            </label>
            <div class="col-md-9">
                <input type="text" id="company_name" name="quote[company_name]" class="form-control" value="<?php echo $comp['company_name']; ?>">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="template_no" value="1">
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $(".date-picker").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#add_service").click(function() {
            if(validate("service_field")) {
                var service_id = $('#service_id').val();
                var service_name = $("#service_id option[value='" + service_id + "']").html();
                var qty = $("#service_qty").val();
                var count = $(".service").length;
                $("#services").append(
                    '<div class="service row">' +
                    '   <div class="col-md-6 col-md-offset-3">' +
                            service_name +
                    '       <input type="hidden" name="quote[services][' + count + '][id]" value="' + service_id + '">' +
                    '   </div>' +
                    '   <div class="col-md-2">' +
                    '       <input type="text" data-require="1" name="quote[services][' + count + '][qty]" class="form-control" placeholder="Qty" value="' + qty + '">' +
                    '       <div class="error-require validate-message">Required Field</div>' +
                    '   </div>' +
                    '   <div class="col-md-1">' +
                    '       <button type="button" class="btn btn-outline red btn-icon remove_service"><i class="fa fa-trash"></i></button>' +
                    '   </div>' +
                    '</div><br>'
                );
                $("#service_qty").val('');
            }
        })
    });
</script>
