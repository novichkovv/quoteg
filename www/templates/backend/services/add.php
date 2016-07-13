<h3 class="page-title"> <?php echo isset($_GET['id']) ? 'Edit' : 'Create'; ?> Service
    <small></small>
</h3>
<div class="row">
    <div class="col-md-6">
        <form id="service_form" action="" method="post" class="form-horizontal">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-docs font-dark"></i>
                        <span class="caption-subject bold uppercase"> Service Form</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-group">
                        <label class="control-label col-md-5">Service Name *</label>
                        <div class="col-md-7">
                            <input type="text" name="service[service_name]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $service['service_name']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Service Description *</label>
                        <div class="col-md-7">
                            <textarea name="service[description]" class="form-control"  data-require="1"><?php echo $service['description']; ?></textarea>
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Default Unit *</label>
                        <div class="col-md-7">
                            <select name="service[default_unit]" class="form-control"  data-require="1">
                            <?php foreach ($units as $unit): ?>
                                <option value="<?php echo $unit['id']; ?>"
                                    <?php if ($unit['id'] == $service['default_unit']): ?>
                                        selected
                                    <?php endif; ?>>
                                    <?php echo $unit['unit_name']; ?>
                                    </option>
                            <?php endforeach; ?>
                            </select>
                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Service Rate *</label>
                        <div class="col-md-7">
                            <input type="text" name="service[rate]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $service['rate']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">Scope </label>
                        <div class="col-md-7">
                            <input type="text" name="service[scope]" autocomplete="off" class="form-control" value="<?php echo $service['scope']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" name="save_service_btn" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("#service_form").submit(function() {
            return validate('service_form');
        });
    });
</script>