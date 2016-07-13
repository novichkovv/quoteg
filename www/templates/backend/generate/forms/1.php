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
                Company Name *
            </label>
            <div class="col-md-9">
                <input type="text" id="company_name" name="quote[company_name]" class="form-control" value="<?php echo $comp['company_name']; ?>" data-require="1">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Address *
            </label>
            <div class="col-md-9">
                <textarea data-require="1" name="quote[address]" class="form-control"><?php echo $comp['address']; ?></textarea>
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                City *
            </label>
            <div class="col-md-9">
                <input type="text" data-require="1" name="quote[city]" class="form-control" value="<?php echo $comp['city']; ?>">
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                State *
            </label>
            <div class="col-md-9">
                <input type="text" data-require="1" name="quote[state]" class="form-control" value="<?php echo $comp['state']; ?>">
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
                Project Type
            </label>
            <div class="col-md-7">
                <select class="form-control" name="quote[project_type]">
                    <?php if ($types): ?>
                        <?php foreach ($types as $type): ?>
                            <option value="<?php echo addslashes($type['type_name']); ?>"><?php echo $type['type_name']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <div class="error-require validate-message">Required Field</div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-default btn-icon" data-toggle="modal" href="#type_modal"><i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">
                Expiration Date
            </label>
            <div class="col-md-9">
                <input type="text" name="quote[expiration_date]" class="form-control date-picker" value="<?php echo date('F d, Y', strtotime(date('Y-m-d') . ' + 30 day')); ?>">
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
        <div class="form-group">
            <label class="control-label col-md-3" style="padding-top: 0 !important;">
                Hourly Basis term
            </label>
            <div class="col-md-9">
                <input type="checkbox" name="quote[hourly_basis]" class="form-control" value="1" checked>
                <div class="error-require validate-message">Required Field</div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="template_no" value="1">

