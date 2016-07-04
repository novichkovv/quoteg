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
                                <?php foreach ($templates as $template): ?>
                                    <option value="<?php echo $template['id']; ?>">
                                        <?php echo $template['template_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
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
                            </div>
                        </div>
                    <?php endif; ?>
                    <div id="form_container">
                        <?php require_once(TEMPLATE_DIR. 'generate' . DS . 'forms' . DS . '1.php'); ?>
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
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline btn-icon green" id="add_service"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
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
        $(".date-picker").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });
        $("body").on("change", "#template_select", function () {
            var template_no = $(this).val();
            var params = {
                'action': 'get_quote_form',
                'values': {template_no: template_no},
                'callback': function (msg) {
                    ajax_respond(msg,
                        function (respond) { //success
                            $("#form_container").html(respond.template);
                            $(".date-picker").datepicker({
                                format: 'MM dd, yyyy',
                                autoclose: true
                            });
                        },
                        function (respond) { //fail
                            Notifier.warning('No form for this template', 'Error');
                        }
                    );
                }
            };
            ajax(params);
        });

        $("body").on("change", "#company_select", function () {
            var company_id = $(this).val();
            var params = {
                'action': 'get_company',
                values: {company_id: company_id},
                'callback': function (msg) {
                    var company = JSON.parse(msg);
                    $("[name='quote[address]']").val(company.address + "\n" + company.city + " " + company.state);
                    $("[name='quote[company_name]']").val(company.company_name);
                    $("[name='quote[phone]']").val(company.phone_number);
                }
            };
            ajax(params);
        });
        $("body").on('click', "#add_service", function() {
            if(validate("service_field")) {
                var service_id = $('#service_id').val();
//                var service_name = $("#service_id option[value='" + service_id + "']").html();
//                var qty = $("#service_qty").val();
                var count = $(".service").length;
                var params = {
                    'action': 'get_service_field',
                    'values': {service_id: service_id, 'count': count},
                    'callback': function (msg) {
                        ajax_respond(msg,
                            function (respond) { //success
                                $("#services").append(respond.template);
                                $("#service_qty").val('');
                            },
                            function (respond) { //fail
                            }
                        );
                    }
                };
                ajax(params);
                $("#services").append(

                );

            }
        })
    });
</script>
