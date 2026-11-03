<script>
    $(document).ready(function() {


        let age_relaxation1 = $('input[name="claiming_age_relaxation"]:checked')
            .val();

        if (age_relaxation1 == 'Yes') {

            $("#age_relaxation_div").show();


        } else {

            $("#age_relaxation_div").hide();
            $('input[name="claiming_age_relaxation_type[]"]').prop('checked', false);

        }

        let is_having_aadhar1 = $('input[name="is_having_aadhar_card"]:checked')
                .val();

            if (is_having_aadhar1 == 'Yes') {

                $("#aadhar_card_div").show();
                $("#id_card_div").hide();
                // $("#aadharNo").prop('disabled', false);
                $("#aadharNo").attr('required', 'required');
                $("#id_card_no").removeAttr('required', 'required');
                $("#id_card_type").removeAttr('required', 'required');
                $("#id_card_type").val('');
                $("#id_card_no").val('');


            } else {
                $("#id_card_div").show();

                $("#aadharNo").val('');
                $("#aadhar_card_div").hide();
                $("#aadharNo").removeAttr('required', 'required');
                // $("#aadharNo").prop('disabled', true);
                $("#id_card_no").attr('required', 'required');
                $("#id_card_type").attr('required', 'required');
            }


        $("input[name='pwd']").change(function() {

            let pwd = $('input[name="pwd"]:checked').val();

            if (pwd == 'Yes') {

                $("#type_of_disablity").show();
                $("#type_of_disablity").attr('required', 'required');


            } else {
                $("#type_of_disablity").hide();
                $("#type_of_disablity").removeAttr('required', 'required');

            }


        });

        $("input[name='marital_status']").change(function() {

            let marital_status = $('input[name="marital_status"]:checked').val();

            if (marital_status == 'Divorced') {

                $("#divorced_type_div").show();
                $("#divorced_type").attr('required', 'required');


            } else {
                $("#divorced_type_div").hide();
                $("#divorced_type").removeAttr('required', 'required');

            }


        });


        $("input[name='exsm']").change(function() {

            let exsm = $('input[name="exsm"]:checked').val();

            if (exsm == 'Yes') {

                $("#exsmDiv").show();


            } else {
                $("#exsmDiv").hide();

            }

        });

        $("input[name='ews']").change(function() {

            let ews = $('input[name="ews"]:checked').val();

            if (ews == 'Yes') {

                $("#ewsDiv").show();


            } else {
                $("#ewsDiv").hide();

            }

        });

        $("input[name='computer_skills']").change(function() {

            let computer_skills = $('input[name="computer_skills"]:checked').val();

            if (computer_skills == 'Yes') {

                $("#computerSkillsDiv").show();
                $("#computer_skills_description").attr('required', 'required');


            } else {
                $("#computerSkillsDiv").hide();
                $("#computer_skills_description").removeAttr('required', 'required');


            }


        });

        $("#dipSelect").change(function() {

            let dipSelect = $('#dipSelect').val();

            // Bachelor Diploma
            if (dipSelect == 'Diploma') {

                $("#dipWork").show();
                $(".work_exp_name_and_address").attr('required', 'required');
                $(".work_exp_period_from").attr('required', 'required');
                $(".work_exp_period_to").attr('required', 'required');
                $(".work_exp_name_of_the_post").attr('required', 'required');
                $(".work_exp_nature_of_duties").attr('required', 'required');


            } else {
                $("#dipWork").hide();

                $(".work_exp_name_and_address").removeAttr('required', 'required');
                $(".work_exp_period_from").removeAttr('required', 'required');
                $(".work_exp_period_to").removeAttr('required', 'required');
                $(".work_exp_name_of_the_post").removeAttr('required', 'required');
                $(".work_exp_nature_of_duties").removeAttr('required', 'required');


                $(".work_exp_name_and_address").val('');
                $(".work_exp_period_from").val('');
                $(".work_exp_period_to").val('');
                $(".work_exp_name_of_the_post").val('');
                $(".work_exp_nature_of_duties").val('');

            }


        });

        $("input[name='previous_experiences']").change(function() {

            let previous_experiences = $('input[name="previous_experiences"]:checked').val();

            if (previous_experiences == 'Yes') {

                $("#previousExperiencesDiv").show();

                $(".organisation").attr('required', 'required');
                $(".period_from").attr('required', 'required');
                $(".period_to").attr('required', 'required');
                $(".name_of_post").attr('required', 'required');
                $(".scale_of_pay").attr('required', 'required');
                $(".nature_of_duties").attr('required', 'required');


            } else {
                $("#previousExperiencesDiv").hide();
                removeAllTbodyChild('preex_tbody');

                $(".organisation").removeAttr('required', 'required');
                $(".period_from").removeAttr('required', 'required');
                $(".period_to").removeAttr('required', 'required');
                $(".name_of_post").removeAttr('required', 'required');
                $(".scale_of_pay").removeAttr('required', 'required');
                $(".nature_of_duties").removeAttr('required', 'required');

                $(".organisation").val('');
                $(".period_from").val('');
                $(".period_to").val('');
                $(".name_of_post").val('');
                $(".pay_scale").val('');
                $(".nature_of_duties").val('');

            }



        });

        $("input[name='working_in_icmr_project']").change(function() {

            let icmr_project = $('input[name="working_in_icmr_project"]:checked').val();

            if (icmr_project == 'Yes') {

                $("#icmrsProjectDiv").show();

                $(".icmr_name_of_institute").attr('required', 'required');
                $(".icmr_doj").attr('required', 'required');
                $(".icmr_name_of_project").attr('required', 'required');
                $(".icmr_post_name").attr('required', 'required');
                $(".icmr_nature_of_duties").attr('required', 'required');

            } else {
                $("#icmrsProjectDiv").hide();
                removeAllTbodyChild('icmr_project_tbody');
                $(".icmr_name_of_institute").removeAttr('required', 'required');
                $(".icmr_doj").removeAttr('required', 'required');
                $(".icmr_name_of_project").removeAttr('required', 'required');
                $(".icmr_post_name").removeAttr('required', 'required');
                $(".icmr_nature_of_duties").removeAttr('required', 'required');

                $("#icmr_name_of_institute").val('');
                $(".icmr_doj").val('');
                $(".icmr_name_of_project").val('');
                $(".icmr_post_name").val('');
                $(".icmr_nature_of_duties").val('');
            }


        });

        // $("input[name='additionalInformationCheck']").change(function() {

        //     let additionalInformationCheck = $('input[name="additionalInformationCheck"]:checked')
        //         .val();

        //     if (additionalInformationCheck == 'Yes') {

        //         $("#additionalInformationDiv").show();
        //         $("#computer_skills_description").attr('required', 'required');

        //     } else {
        //         $("#additionalInformationDiv").hide();
        //         $("#computer_skills_description").removeAttr('required', 'required');

        //     }


        // });

        $("input[name='is_five_per_weightage']").change(function() {

            let is_five_per_weightage = $('input[name="is_five_per_weightage"]:checked')
                .val();

            if (is_five_per_weightage == 'Yes') {

                $("#is_five_per_weightage_div").show();

                $(".five_per_weightage_organisation").attr('required', 'required');
                $(".five_per_weightage_period_from").attr('required', 'required');
                $(".five_per_weightage_period_to").attr('required', 'required');
                $(".five_per_weightage_name_of_post").attr('required', 'required');
                $(".five_per_weightage_pay_scale").attr('required', 'required');
                $(".five_per_weightage_nature_of_duties").attr('required', 'required');



            } else {

                $("#is_five_per_weightage_div").hide();

                removeAllTbodyChild('perWei5_tbody');
                $(".five_per_weightage_organisation").removeAttr('required', 'required');
                $(".five_per_weightage_period_from").removeAttr('required', 'required');
                $(".five_per_weightage_period_to").removeAttr('required', 'required');
                $(".five_per_weightage_name_of_post").removeAttr('required', 'required');
                $(".five_per_weightage_pay_scale").removeAttr('required', 'required');
                $(".five_per_weightage_nature_of_duties").removeAttr('required',
                    'required');

                $(".five_per_weightage_organisation").val('');
                $(".five_per_weightage_period_from").val('');
                $(".five_per_weightage_period_to").val('');
                $(".five_per_weightage_name_of_post").val('');
                $(".five_per_weightage_pay_scale").val('');
                $(".five_per_weightage_nature_of_duties").val('');

            }


        });

        $("input[name='claiming_age_relaxation']").change(function() {

            let age_relaxation = $('input[name="claiming_age_relaxation"]:checked')
                .val();

            if (age_relaxation == 'Yes') {

                $("#age_relaxation_div").show();


            } else {

                $("#age_relaxation_div").hide();
                $('input[name="claiming_age_relaxation_type[]"]').prop('checked', false);

            }


        });

        $("input[name='is_having_aadhar_card']").change(function() {

            let is_having_aadhar = $('input[name="is_having_aadhar_card"]:checked')
                .val();

            if (is_having_aadhar == 'Yes') {

                $("#aadhar_card_div").show();
                $("#id_card_div").hide();
                // $("#aadharNo").prop('disabled', false);
                $("#aadharNo").attr('required', 'required');
                $("#id_card_no").removeAttr('required', 'required');
                $("#id_card_type").removeAttr('required', 'required');
                $("#id_card_type").val('');
                $("#id_card_no").val('');


            } else {
                $("#id_card_div").show();

                $("#aadharNo").val('');
                $("#aadhar_card_div").hide();
                $("#aadharNo").removeAttr('required', 'required');
                // $("#aadharNo").prop('disabled', true);
                $("#id_card_no").attr('required', 'required');
                $("#id_card_type").attr('required', 'required');
            }

        });

    });

    function validateAlternateMobileNo(input) {
        const maxLength = 10;
        let value = input.value.trim();

        // Remove any non-digit characters
        value = value.replace(/\D/g, '');

        // Truncate to maximum length
        if (value.length > maxLength) {
            value = value.slice(0, maxLength);
        }

        input.value = value;
        // console.log(input.value);
    }

    function validateAadharNo(input) {
        const maxLength = 12;
        let value = input.value.trim();

        // Remove any non-digit characters
        value = value.replace(/\D/g, '');

        // Truncate to maximum length
        if (value.length > maxLength) {
            value = value.slice(0, maxLength);
        }

        input.value = value;
        // console.log(input.value);
    }

    function getAge(dateString) {

        var yearNow = "2023";
        var monthNow = "07";
        var dateNow = "31";

        var dob = dateString.split('-');

        var yearDob = dob[0];
        var monthDob = dob[1];
        var dateDob = dob[2];
        var age = {};
        var ageString = "";
        var yearString = "";
        var monthString = "";
        var dayString = "";


        yearAge = yearNow - yearDob;

        if (monthNow >= monthDob)
            var monthAge = monthNow - monthDob;
        else {
            yearAge--;
            var monthAge = 12 + (monthNow - monthDob);
        }

        if (dateNow >= dateDob)
            var dateAge = dateNow - dateDob;
        else {
            monthAge--;
            var dateAge = 31 + (dateNow - dateDob);

            if (monthAge < 0) {
                monthAge = 11;
                yearAge--;
            }
        }

        age = {
            years: yearAge,
            months: monthAge,
            days: dateAge
        };

        if (age.years > 1) yearString = " Years";
        else yearString = " Year";
        if (age.months > 1) monthString = " Months";
        else monthString = " Month";
        if (age.days > 1) dayString = " Days";
        else dayString = " Day";


        if ((age.years > 0) && (age.months > 0) && (age.days > 0))
            ageString = age.years + yearString + " " + age.months + monthString + " " + age.days + dayString;
        else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
            ageString = age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
            ageString = age.years + yearString;
        else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
            ageString = age.years + yearString + " " + age.months + monthString;
        else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
            ageString = age.months + monthString + " " + age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
            ageString = age.years + yearString + " " + age.days + dayString;
        else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
            ageString = age.months + monthString;
        else ageString = "";

        $('#present_age').val(ageString);

        var minAge = 18; // Minimum age requirement
        var maxAge = 55; // Maximum age requirement

        // Check if age is within the specified range
        if (age.years >= minAge && age.years <= maxAge) {
            // Age is within the range, allow the user to proceed
            // Place your code here to enable the button or perform any desired action
            // alert("good")
            $('#saveAndNext').prop('disabled', false);

        } else {
            // Age is outside the range, show an alert and prevent the user from proceeding
            $('#saveAndNext').prop('disabled', true);
            $('#present_age').val('');
            // $('#dob').val('');
            // alert('You must be between 18 and 50 years old to proceed.');


        }

    }


    function addMorePreEx() {
        var html =
            '<tr><td><input required class="form-control name_and_address" type="text" name="organisation[]"></td><td><input required class="form-control period_from" type="date" name="period_from[]"></td><td><input required class="form-control period_to" type="date" name="period_to[]"></td><td><input required class="form-control name_of_the_post" type="text" name="name_of_post[]"></td><td><input required class="form-control scale_of_pay" type="text" name="pay_scale[]"></td><td><input required class="form-control nature_of_duties" type="text" name="nature_of_duties[]"></td><td><button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeSingleRow(this);">x</button></td></tr>'

        $("#preex_tbody").append(html);
    }

    function addMore5PerWei() {
        var html =
            '<tr> <td><input required class="form-control five_per_weightage_organisation"type="text" name="five_per_weightage_organisation[]"></td><td><input required class="form-control five_per_weightage_period_from"type="date" name="five_per_weightage_period_from[]"></td><td><input required class="form-control five_per_weightage_period_to"type="date" name="five_per_weightage_period_to[]"></td><td><input required class="form-control five_per_weightage_name_of_post"type="text" name="five_per_weightage_name_of_post[]"></td><td><input required class="form-control five_per_weightage_pay_scale"type="text" name="five_per_weightage_pay_scale[]"></td><td><input required class="form-control five_per_weightage_nature_of_duties"type="text"name="five_per_weightage_nature_of_duties[]"></td> <td><button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeSingleRow(this);">x</button></td></tr>'

        $("#perWei5_tbody").append(html);
    }

    function addMoreIcmr() {

        var html =
            ' <tr><td><input required class="form-control icmr_name_of_institute" type="text" id="icmr_name" name="icmr_name_of_institute[]"></td><td><input required class="form-control icmr_doj" type="date" id="icmr_doj" name="icmr_doj[]"></td><td><input required class="form-control icmr_name_of_project" type="text"id="icmr_name_of_project"name="icmr_name_of_project[]"></td><td><input required class="form-control icmr_post_name" type="text" id="icmr_post_name" name="icmr_post_name[]"></td> <td> <input required class="form-control icmr_nature_of_duties" type="text" id="icmr_nature_of_duties" name="icmr_nature_of_duties[]"></td><td><button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeSingleRow(this);">x</button></td></tr>'

        $("#icmr_project_tbody").append(html);
    }

    function addMoreWorkExp() {

        var html =
            '<tr><td> <input required class="form-control work_exp_organisation" type="text" name="work_exp_organisation[]"> </td><td> <input required class="form-control work_exp_period_from"type="date" name="work_exp_period_from[]"></td><td><input required class="form-control work_exp_period_to" type="date" name="work_exp_period_to[]"> </td> <td> <input required class="form-control work_exp_name_of_the_post"type="text" name="work_exp_name_of_the_post[]"></td><td> <input required class="form-control work_exp_nature_of_duties"type="text" name="work_exp_nature_of_duties[]"> </td> <td><button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeSingleRow(this);">x</button></td></tr>'

        $("#work_exp_tbody").append(html);
    }


    function removeSingleRow(dis) {
        $(dis).parent().parent().remove();
    }

    function removeAllTbodyChild(bodyId) {
        $(`#${bodyId} tr:not(:first-child)`).remove();
    }

    function getCityData(state_id, city_div_id) {

        $.ajax({
            url: '{{ route('getCityName') }}',
            type: 'GET',
            data: {
                'state_id': state_id
            },
            success: function(data) {

                console.log(data);
                $(`#${city_div_id}`).html(data);
            },
            error: function() {

            }
        })
    }

    function calculatePercentage(rowIdentifier) {
        var marksObtained = parseFloat(document.getElementById(rowIdentifier + '_marks').value);
        var maximumMarks = parseFloat(document.getElementById(rowIdentifier + '_outof').value);
        var percentage = (marksObtained / maximumMarks) * 100;

        if (marksObtained < 0) {
            document.getElementById(rowIdentifier + '_marks').value = '';
            marksObtained = '';
        }

        if (maximumMarks < 0) {
            document.getElementById(rowIdentifier + '_outof').value = '';
            maximumMarks = '';
        }

        if (!isNaN(percentage) && percentage >= 0) {
            if (percentage > 100) {

                document.getElementById(rowIdentifier + '_percentage').value = '';
                document.getElementById(rowIdentifier + '_outof').value = '';
                document.getElementById(rowIdentifier + '_marks').value = '';

                alert('Percentage cannot be greater than 100%.');

            } else if (percentage >= 33) {
                document.getElementById(rowIdentifier + '_percentage').value = percentage.toFixed(2);
            } else {
                document.getElementById(rowIdentifier + '_percentage').value = '';
                document.getElementById(rowIdentifier + '_outof').value = '';
                document.getElementById(rowIdentifier + '_marks').value = '';


                alert('Percentage must be greater than or equal to 33%.');
            }
        } else {
            document.getElementById(rowIdentifier + '_percentage').value = '';
        }
    }
</script>
