<div class="service row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Name</label>
            <input type="text" data-require="1" name="quote[services][<?php echo $count; ?>][service_name]" class="form-control" placeholder="Name" value="<?php echo $service['service_name']; ?>">
            <div class="error-require validate-message">Required Field</div>
            <!--        <b>--><?php //echo $service['service_name']; ?><!--</b>-->
            <input type="hidden" name="quote[services][<?php echo $count; ?>][id]" value="<?php echo $service['id']; ?>">
        </div>
        <div class="form-group">
            <label>Unit</label>
            <select data-require="1" name="quote[services][<?php echo $count; ?>][unit]" class="form-control" data-placeholder="Unit">
                <?php foreach ($units as $unit): ?>
                    <option value="<?php echo $unit['unit_name']; ?>"
                        <?php if ($unit['id'] == $service['default_unit']): ?>
                            selected
                        <?php endif; ?>>
                        <?php echo $unit['unit_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="error-require validate-message">Required Field</div>
        </div>
    </div>
    <div class="col-md-6">
        <label>Description</label>
        <textarea rows="5" name="quote[services][<?php echo $count; ?>][description]" class="form-control"><?php echo $service['description']; ?></textarea>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Qty</label>
            <input type="text" data-require="1" name="quote[services][<?php echo $count; ?>][qty]" class="form-control" placeholder="Qty" value="<?php echo $service['qty']; ?>">
            <div class="error-require validate-message">Required Field</div>
        </div>
        <div class="form-group">
            <label>Rate</label>
            <input type="text" data-require="1" name="quote[services][<?php echo $count; ?>][rate]" class="form-control" placeholder="Rate" value="<?php echo $service['rate']; ?>">
            <div class="error-require validate-message">Required Field</div>
        </div>
    </div>
    <div class="col-md-1">
        <br>
        <button type="button" class="btn btn-outline red btn-icon remove_service"><i class="fa fa-trash"></i></button>
        </div>
    </div>
<br>