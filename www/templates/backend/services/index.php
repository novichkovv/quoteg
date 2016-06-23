<h3 class="page-title"> Services
    <small></small>
</h3>
<div class="row">
    <div class="col-md-12">
        <form id="filter-form" action="" method="post">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-docs font-dark"></i>
                        <span class="caption-subject bold uppercase"> Services List</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                            <a href="<?php echo SITE_DIR; ?>services/add/" class="btn green btn-outline">
                                <i class="fa fa-plus"></i> Add service
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Rate</th>
                            <th>Scope</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($services): ?>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td>
                                        <?php echo $service['service_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $service['description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $service['rate']; ?>
                                    </td>
                                    <td>
                                        <?php echo $service['scope']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITE_DIR; ?>services/add/?id=<?php echo $service['id']; ?>" class="btn btn-default btn-icon">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#delete_service_modal" class="btn btn-default btn-icon text-warning delete_service" data-toggle="modal" data-id="<?php echo $service['id']; ?>">
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
<div class="modal fade" id="delete_service_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete service</h4>
            </div>
            <div class="modal-body with-padding">
                Are you sure you want to delete this service?
            </div>
            <div class="modal-footer">
                <form method="post" action="">
                    <input type="hidden" name="service_id" value="">
                    <button type="submit" name="delete_service_btn" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("body").on("click", ".delete_service", function () {
            var service_id = $(this).attr('data-id');
            $('[name="service_id"]').val(service_id);
        });
    });
</script>

