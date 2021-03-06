<h3 class="page-title"> Project types
    <small></small>
</h3>
<div class="row">
    <div class="col-md-12">
        <form id="filter-form" action="" method="post">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-docs font-dark"></i>
                        <span class="caption-subject bold uppercase"> Project types List</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                            <a href="<?php echo SITE_DIR; ?>project_types/add/" class="btn green btn-outline">
                                <i class="fa fa-plus"></i> Add project_type
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($project_types): ?>
                            <?php foreach ($project_types as $project_type): ?>
                                <tr>
                                    <td>
                                        <?php echo $project_type['type_name']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITE_DIR; ?>project_types/add/?id=<?php echo $project_type['id']; ?>" class="btn btn-default btn-icon">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#delete_project_type_modal" class="btn btn-default btn-icon text-warning delete_project_type" data-toggle="modal" data-id="<?php echo $project_type['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="delete_project_type_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete project_type</h4>
            </div>
            <div class="modal-body with-padding">
                Are you sure you want to delete this project_type?
            </div>
            <div class="modal-footer">
                <form method="post" action="">
                    <input type="hidden" name="project_type_id" value="">
                    <button type="submit" name="delete_project_type_btn" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("body").on("click", ".delete_project_type", function () {
            var project_type_id = $(this).attr('data-id');
            $('[name="project_type_id"]').val(project_type_id);
        });
    });
</script>

