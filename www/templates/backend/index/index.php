<h3 class="page-title"> Quotes
    <small></small>
</h3>
<br>
<div class="row">
    <div class="col-md-12">
        <form id="filter-form" action="" method="post">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-list font-dark"></i>
                        <span class="caption-subject bold uppercase"> Quotes Table</span>
                    </div>
                    <div class="actions">
<!--                            <div class="btn-group btn-group-devided">-->
<!--                                <button class="btn green btn-outline btn-circle" type="button">-->
<!--                                    <i class="fa fa-plus"></i>-->
<!--                                </button>-->
<!--                                <a class="btn red btn-outline btn-circle delete_phrases" href="#delete_modal" data-toggle="modal">-->
<!--                                    <i class="fa fa-trash-o"></i>-->
<!--                                </a>-->
<!--                            </div>-->
                    </div>
                </div>
                <div class="portlet-body custom-datatable">
                    <table class="table table-bordered" id="get_quotes">
                        <thead>
                        <tr>
                            <td>
                                <input type="text" class="form-control filter-field" data-sign="=" name="q.id" placeholder="search">
                            </td>
                            <td>
                                <select class="filter-field filter-select form-control" data-sign="=" name="q.status_id">
                                    <option value="">All</option>
                                    <?php foreach ($statuses as $status): ?>
                                        <option value="<?php echo $status['id']; ?>">
                                            <?php echo $status['status_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control filter-field datepicker" data-sign="=" name="DATE(q.create_date)" placeholder="search">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Quote #</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="status_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" id="status_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body with-padding">
                    <div class="form-group">
                        <label>Select Status</label>
                        <select class="form-control" name="status[status_id]">
                            <?php foreach ($statuses as $status): ?>
                                <option value="<?php echo $status['id']; ?>">
                                    <?php echo $status['status_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="status[id]" id="status_quote_id">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete Phrase</h4>
                </div>
                <div class="modal-body with-padding">
                    Are You Sure?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="phrases_to_delete" value="">
                    <button type="submit" class="btn btn-primary" name="delete_phrase_btn">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        ajax_datatable('get_quotes');
        $("body").on("click", ".change_status", function () {
            var id = $(this).attr('data-id');
            $("#status_quote_id").val(id);
        });

        $("#status_form").submit(function() {
            var params = {
                'action': 'change_status',
                'get_from_form': 'status_form',
                'callback': function (msg) {
                    ajax_respond(msg,
                        function (respond) { //success
                            Notifier.success('Status has been changed');
                            ajax_datatable('get_quotes');
                            $("#status_modal").modal('hide');
                        },
                        function (respond) { //fail
                        }
                    );
                }
            };
            ajax(params);
            return false;
        })
    });
</script>
