<h3 class="page-title"> Generate Quote
    <small></small>
</h3>
<div class="row">
    <div class="col-md-8">
        <form id="filter-form" action="" method="post" target="_blank">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-list font-dark"></i>
                        <span class="caption-subject bold uppercase"> Quote Form</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                            <select class="form-control" id="template_select">
                                <option value="1">Template 1</option>
                                <option value="2">Template 2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="portlet-body" id="form_container">
                    <?php if ($companies): ?>
                        <div class="row form-horizontal">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                        Company
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="company_select">
                                            <?php foreach ($companies as $company): ?>
                                                <option value="<?php echo $company['id']; ?>">
                                                    <?php echo $company['company_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
<!--                                <div class="form-group" id="contact_field">-->
<!--                                    --><?php //if ($contacts): ?>
<!--                                        <label class="control-label col-md-3">-->
<!--                                            Company-->
<!--                                        </label>-->
<!--                                        <div class="col-md-9">-->
<!--                                            <select class="form-control" id="company_select">-->
<!--                                                --><?php //foreach ($contacts as $contact): ?>
<!--                                                    <option value="--><?php //echo $contact['id']; ?><!--">-->
<!--                                                        --><?php //echo $contact['first_name']; ?><!-- --><?php //echo $contact['last_name']; ?>
<!--                                                    </option>-->
<!--                                                --><?php //endforeach; ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php require_once(TEMPLATE_DIR. 'generate' . DS . 'forms' . DS . '1.php'); ?>
                    <div class="row">
                        <div class="col-md-offset-3">
                            <button type="submit" class="btn btn-outline btn-lg blue" name="generate_btn">
                                <i class="fa fa-file-pdf-o"></i> Generate
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("body").on("change", "#template_select", function () {
            var template_no = $(this).val();
            var params = {
                'action': 'get_quote_form',
                'values': {template_no: template_no},
                'callback': function (msg) {
                    ajax_respond(msg,
                        function (respond) { //success
                            $("#form_container").html(respond.template)
                        },
                        function (respond) { //fail
                            Notifier.warning('No form for this template', 'Error');
                        }
                    );
                }
            };
            ajax(params);
        });
    });
</script>