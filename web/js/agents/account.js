jQuery(document).ready(function($) {
    $('.insurances').change(function() {
        var insurance_id = $(this).val();
        var insurance_text = $(this).find('option[value=' + insurance_id + ']').html();

        $.get('/agents/add-insurance', {'insurance_id': insurance_id}, function(resp) {
            if (resp.error == 0) {
                var btn_remove = '<div class="glyphicon glyphicon-remove btn-remove"></div>';
                var $insurance = $('<div>').addClass('insurance select-item').html(insurance_text + btn_remove);
                console.log($insurance);
                $insurance.prependTo('.insurances-div');
            }
        }, 'JSON')
        $(this).removeAttr('selected');

    });
    $('.insurances-div').on('click', '.btn-remove', function(e) {
        var $insurance = $(this).closest('.insurance');
        var insurance_id = $insurance.attr('data-id');

        if (typeof (insurance_id) !== 'undefined') {
            $.get('/agents/delete-insurance', {'insurance_id': insurance_id}, function(resp) {
                if (resp.error == 0) {
                    $insurance.remove();
                }
            }, 'JSON')
        } else {
            $insurance.remove();
        }
    })
    $('.companies').change(function() {
        var company_id = $(this).val();
        var company_text = $(this).find('option[value=' + company_id + ']').html();

        $.get('/agents/add-company', {'company_id': company_id}, function(resp) {
            if (resp.error == 0) {
                var btn_remove = '<div class="glyphicon glyphicon-remove btn-remove"></div>';
                var $company = $('<div>').addClass('company select-item').html(company_text + btn_remove);
                console.log($company);
                $company.prependTo('.companies-div');
            }
        }, 'JSON')

    });
    $('.companies-div').on('click', '.btn-remove', function(e) {
        var $company = $(this).closest('.company');
        var company_id = $company.attr('data-id');

        if (typeof (company_id) !== 'undefined') {
            $.get('/agents/delete-company', {'company_id': company_id}, function(resp) {
                if (resp.error == 0) {
                    $company.remove();
                }
            }, 'JSON')
        } else {
            $company.remove();
        }
    })
})