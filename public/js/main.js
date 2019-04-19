$(document).ready(function(){

    // Login Form
    $("#loginform").validate({
        rules:      {
            email:      {
                required: true,
                email: true
            },
            password:      "required"
        },

        messages:   {

        }
    });


    // Request form
    $("#captcha").hide()
    $("#emailform").validate({
        rules:      {
            fullname:   "required",
            email:      "required",
            phone:      "required",
            comment:    "required"
        },

        messages:   {

        }
    });
    $("#emailform").submit(function(event){
        var verified = grecaptcha.getResponse();
        if(verified.length===0){
            $("#captcha").show();
            event.preventDefault();
        }
    });

    // Email Client
    var states_json_link = $("#statejson").val();
    var options_states;
    $.getJSON(states_json_link, function(result){
        $.each(result, function(i, state){
            options_states+="<option value='"+state.name+"'>"+state.name+"</option>"
        })
        $("#state").html(options_states);
    });
    $("#emailclient").validate({
        rules:      {
            name:           "required",
            companyname:    "required",
            address:        "required",
            city:           "required",
            code:           "required",
            email:          "required",
            phone:          "required",
            fax:            "required",
        },

        messages:   {

        }
    });
    $("#emailclient").submit(function(event){
        var verified = grecaptcha.getResponse();
        if(verified.length===0){
            $("#captcha").show();
            event.preventDefault();
        }
    });


    // Request form
    $("#captcha").hide()
    $("#emailform").validate({
        rules:      {
            fullname:   "required",
            email:      "required",
            phone:      "required",
            comment:    "required"
        },

        messages:   {

        }
    });
    $("#emailform").submit(function(event){
        var verified = grecaptcha.getResponse();
        if(verified.length===0){
            $("#captcha").show();
            event.preventDefault();
        }
    });

    // Appraisal Form
    var states_json_link = $("#statejson").val();
    var options_states_appraisal = "<option default>-Select-</option>";
    $.getJSON(states_json_link, function(result){
        $.each(result, function(i, state){
            options_states_appraisal+="<option value='"+i+"'>"+state.name+"</option>"
        })
        $("#state").html(options_states_appraisal);
        $("#apstate").html(options_states_appraisal);
        $("#ap-pa-state").html(options_states_appraisal);
        $("#ap-select-state").html(options_states_appraisal);
    });

    var countries;
    var index_state;
    $("#ap-select-state").change(function(){
        index_state = $("#ap-select-state").val();
        $.getJSON(states_json_link, function(result){
            var selectedstate = result[index_state];
            countries = "";
            $.each(selectedstate.countries, function(i, country){
                countries+="<option value='"+i+"'>" + country + "</option>";
            });
            $("#ap-select-countries").html(countries);
        });
    });

    var selected_countries = "";
    var countries_tray = new Array();
    $("#ap-select-countries").click(function(){
        index_state = $("#ap-select-state").val();
        var index_country = $("#ap-select-countries").val();
        $.getJSON(states_json_link, function(result){
            var selectcountry = result[index_state]['countries'][index_country];
            var new_id = index_state+""+index_country;
            if(!countries_tray.includes(new_id)){
                countries_tray.push(new_id);
                selected_countries+="<option value='"+new_id+"'>"+selectcountry+"</option>";
            }
            
            $("#ap-countries-covered").html(selected_countries);
            $("select#ap-select-countries option").prop("selected", false);
            $("select#ap-countries-covered option").prop("selected", true);
        });
    });

    $("#ap-countries-covered").click(function(){
        var index_area = $("#ap-countries-covered").val();
        var i = countries_tray.indexOf(index_area);
        countries_tray.splice(i, 1);
        $('option[value="'+index_area+'"]', this).remove();
        selected_countries = $("#ap-countries-covered").html();
        $("select#ap-countries-covered option").prop("selected", true);
    });
    
    $("#appraisalform").validate({
        rules:      {
            firstname:          "required",
            lastname:           "required",
            email:              "required",
            phone:              "required",
            company:            "required",
            street:             "required",
            city:               "required",
            state:              "required",
            code:               "required",
            countriescovered:   "required"
        },

        messages:   {

        }
    });
    $("#appraisalform").submit(function(event){
        var verified = grecaptcha.getResponse();
        if(verified.length===0){
            $("#captcha").show();
            event.preventDefault();
        }
    });

});