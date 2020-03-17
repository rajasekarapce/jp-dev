(function ($) {
    "use strict";


    $(document).on('change', '.country_to_state', function(e){
        e.preventDefault();

        var country_id = $(this).val();
        $.ajax({
            type : 'POST',
            url : page_data.routes.get_state_option_by_country,
            data : {country_id : country_id, _token : page_data.csrf_token},
            success: function(data){
                $('.state_options').html(data.state_options);
            }
        });
    });

	//qualification
		$('.degree').hide();
	    $(document).on('change', '#qualification', function(e){
        e.preventDefault();

        var qualification = $(this).val();
        $.ajax({
            type : 'POST',
            url : page_data.routes.get_degree_option_by_qualification,
            data : {qualification : qualification, _token : page_data.csrf_token},
            success: function(data){
				
                $('.degree_options').html(data.degree_options);
				$('.degree').show();
            }
        });
    });
	
    $(document).on('change', '.qualification', function(e){
        e.preventDefault();

        var qualifications_id = $(this).val();

            //alert(qualifications_id);
        $.ajax({
            type : 'POST',
            url : page_data.routes.get_branch_option_by_qualification,
            data : {qualifications_id : qualifications_id, _token : page_data.csrf_token},
            success: function(data){
                $('.branch_options').html(data.branch_options);
            }
        });
    });

	$(document).on('change', '.state', function(e){
        e.preventDefault();

        var state_id = $(this).val();

            //alert(state_id);
        $.ajax({
            type : 'POST',
            url : page_data.routes.get_institution_option_by_state,
            data : {state_id : state_id, _token : page_data.csrf_token},
            success: function(data){
                $('.institution_options').html(data.institution_options);
            }
        });
    });
	
	$(document).on('change', '.state', function(e){
        e.preventDefault();

        var state_id = $(this).val();

            //alert(state_id);
        $.ajax({
            type : 'POST',
            url : page_data.routes.get_university_option_by_state,
            data : {state_id : state_id, _token : page_data.csrf_token},
            success: function(data){
                $('.university_options').html(data.university_options);
            }
        });
    });
    if (page_data.jobModalOpen){
        $('#applyJobModal').modal('show');
    }
    if (page_data.flag_job_validation_fails){
        $('#jobFlagModal').modal('show');
    }
    if (page_data.share_job_validation_fails){
        $('#shareByEMail').modal('show');
    }


    $(document).on('click', '.employer-follow-button', function(e){
        e.preventDefault();

        var $that = $(this);
        var employer_id = $that.attr('data-employer-id');

        $.ajax({
            type : 'POST',
            url : page_data.routes.follow_unfollow,
            data : {employer_id : employer_id, _token : page_data.csrf_token},
            beforeSend: function () {
                $that.addClass('updating-btn');
            },
            success: function(data){
                if (data.success){
                    if(typeof data.btn_text !== 'undefined'){
                        $that.html(data.btn_text);
                    }
                }else{
                    if(typeof data.login_url !== 'undefined'){
                        location.href = data.login_url;
                    }
                }
            },
            complete:function () {
                $that.removeClass('updating-btn');
            }
        });
    });

    //updating-btn

	$('#apply').click(function(){
			alert("123");
		var job_id = $('#id').val();
		var name = $('#name1').val();
		var email = $('#email1').val();
		var phone = $('#phone').val();
		
			//alert("123");
			$('#job_id').val(job_id);
			$('#name').val(name);
			$('#email').val(email);
			$('#phone_number').val(phone);
			
			
			
			//alert(job_id);
			
	});
	
	
})( jQuery );