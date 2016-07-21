<h3 class="page-title"> <?php echo isset($_GET['id']) ? 'Edit' : 'Create'; ?> Project Type
    <small></small>
</h3>
<div class="row">
    <div class="col-md-6">
        <form id="project_type_form" action="" method="post" class="form-horizontal">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-docs font-dark"></i>
                        <span class="caption-subject bold uppercase"> Project Type Form</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-group">
                        <label class="control-label col-md-5">Project Type Name *</label>
                        <div class="col-md-7">
                            <input type="text" name="project_type[type_name]" autocomplete="off" class="form-control"  data-require="1" value="<?php echo $project_type['type_name']; ?>">

                            <div class="error-require validate-message">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" name="save_project_type_btn" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("#project_type_form").submit(function() {
            return validate('project_type_form');
        });
    });
</script>