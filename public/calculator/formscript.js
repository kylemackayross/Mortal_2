var sum = 0;
var rates = 0;
rates = $(".form-select").val();
$( document ).ready(function() {
    alert("Please select the rates first from the dropdown and then start the calculations.")

    // Getting the currency symbol before the amount
    $(".Gtotal, .DPtotal, .DBtotal, .Addtotal").before("<span class='rand'>R</span>");

    // Change of value
    const element = document.querySelector('[aria-label="rates"]');

    $(".form-select").on("change", function () {
        alert("New rates changed to: R" + $(this).val());
        rates = $(this).val();
    });

// Calculations for Global elements ----------------------------------------------- 
    $(".Ghours").on("change", function () {
        var h = $(this).val();
        var total = rate(h);
        //var total = $(".form-select").val() * h;
        $(this).parent().next().children('.Gtotal').val(total);
    });

// Calculations for pages ----------------------------------------------- 
    $(".DPhours").on("change", function () {
        var h = $(this).val();
        var total = rate(h);
        $(this).parent().next().children('.DPtotal').val(total);
    });

    $(".DBhours").on("change", function () {
        var h = $(this).val();
        var total = rate(h);
        $(this).parent().next().children('.DBtotal').val(total);
    });

// Calculations for additional fields ----------------------------------------------- 
    $('body').on( 'change', '.Addhours', function () { 
        var h = $(this).val();
        var total = rate(h);
        var sum = document.getElementById('totalsum').innerHTML;
        $(this).parent().next().children('.Addtotal').val(total);
    });

    function rate(h){
        var total = h * rates;
        return total;
    }

// Function when hour changed
    $(document).on('change','.DPhours,.Ghours,.DBhours, .Addhours', function () {
        alltotalsum();
        alltotalhours();

        $(".pam").val(sum * .2);
        $(".qa").val(sum * .1);
        
        grandtotal();
    });
    

// Add fields button --------------------------------------------------------------------------- 
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.btn-success'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row new_field"><div class="col-6 col-sm-6 pb-2"><input type="Text" placeholder="Name" value="" class="form-control"/></div><div class="col-6 col-sm-2 pb-2"><input type="number" placeholder="Hours" value=""  class="form-control Addhours"/></div><div class="col-6 col-sm-2 pb-2"><input type="number" placeholder="Total" value=""  class="form-control Addtotal" disabled/></div><div class="col-6 col-sm-2 pb-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">-</a></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
//Once add button is clicked ------------------------------------------------------------------ 
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
        // Getting the currency symbol before the amount
        $(".Gtotal, .DPtotal").before("<span class='rand'>R</span>");
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest('.new_field').remove()
        //$(this).parent().parent('.new_field').remove(); //Remove field html
        x--; //Decrement field counter
        alltotalhours();
        alltotalsum();
        grandtotal();
    });


});

function alltotalsum(){
    var DPinputs, DPindex, DPsum=0, DBinputs, DBindex, DBsum=0, Ginputs, Gindex, Gsum=0, Addinputs, Addindex, Addsum=0;
        DPinputs = document.getElementsByClassName('DPtotal');
        DBinputs = document.getElementsByClassName('DBtotal');
        Ginputs = document.getElementsByClassName('Gtotal');
        Addinputs = document.getElementsByClassName('Addtotal');
        //console.log(Addinputs.length);
        
        for (DPindex = 0; DPindex < DPinputs.length; ++DPindex) {
            DPsum = DPsum + Number(DPinputs[DPindex].value);
        }
        for (DBindex = 0; DBindex < DBinputs.length; ++DBindex) {
            DBsum = DBsum + Number(DBinputs[DBindex].value);
        }
        for (Gindex = 0; Gindex < Ginputs.length; ++Gindex) {
            Gsum = Gsum + Number(Ginputs[Gindex].value);
        }
        for (Addindex = 0; Addindex < Addinputs.length; ++Addindex) {
            Addsum = Addsum + Number(Addinputs[Addindex].value);
        }
        
        sum = DPsum + DBsum + Gsum + Addsum;
        totalsum(sum);
}

function alltotalhours(){
    var DPhours, DPindex1, DPtothours=0, Ghours, Gindex1, Gtothours=0, DBhours, DBindex1, DBtothours=0, Addhours, Addindex1, Addtothours=0;
        DPhours = document.getElementsByClassName('DPhours');
        for (DPindex1 = 0; DPindex1 < DPhours.length; ++DPindex1) {
            DPtothours = DPtothours + Number(DPhours[DPindex1].value);
        }
        Ghours = document.getElementsByClassName('Ghours');
        for (Gindex1 = 0; Gindex1 < Ghours.length; ++Gindex1) {
            Gtothours = Gtothours + Number(Ghours[Gindex1].value);
        }
        DBhours = document.getElementsByClassName('DBhours');
        for (DBindex1 = 0; DBindex1 < DBhours.length; ++DBindex1) {
            DBtothours = DBtothours + Number(DBhours[DBindex1].value);
        }
        Addhours = document.getElementsByClassName('Addhours');
        for (Addindex1 = 0; Addindex1 < Addhours.length; ++Addindex1) {
            Addtothours = Addtothours + Number(Addhours[Addindex1].value);
        }
        toth = DPtothours + Gtothours + DBtothours + Addtothours ;
        totalhours(toth);
}

function totalsum(topsum){
    var fortopsum = addCommas(topsum);
    $(".totalsum").text(fortopsum);
}
function totalhours(toth){
    $(".totalhours").text(toth);
}
function grandtotal(){
    var gtotal = (sum * .1) + (sum * .2) + sum; 
    var forgtotal = addCommas(gtotal);
    $(".Grandtotal").text(forgtotal);
}


// Function to add 1000 seprator ---------------------------------------------------------------- 
    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    };