function is_valid_form() {
    
	var ret = true;
	if (!is_valid_name()) var ret = false;
	if (!is_valid_email()) var ret = false;
	if (!is_valid_pass()) var ret = false;
        if (!is_valid_pass2()) var ret = false;
	return ret;
}

// var $mjq for better adaptation and work with other libraries
var $mjq = jQuery.noConflict();
$mjq(function(){
	$mjq(document).ready(function(){
            $mjq("#invite").click(function(){
                var id_stud = $mjq("#id_stud").attr('value');
                var base_url = $("base").attr('href');
                $.ajax({
                    url: base_url+"welcome/to_prak/" + id_stud,
                    type: "post",
                    dataType : "json",
                    success: function(response){
                        alert(response.message);
                    }
                });
            });
            var selfac = $mjq('select#selfac :selected').val();
$mjq('input#fac').val(selfac);

 $mjq('select#selfac').change(function(){
     var fac = $mjq('select#selfac :selected').val();
$mjq('input#fac').val(fac);
 });
 
  var reg = $mjq('select#reg :selected').text();
$mjq('input#region').val(reg);

 $mjq('select#reg').change(function(){
     var facreg = $mjq('select#reg :selected').text();
$mjq('input#region').val(facreg);
alert($mjq('input#region').val())
 });
        var status =  $mjq('select#selwho :selected').text();
        $mjq('input#status').val(status);
         
        $mjq('select#selwho').on('change',function(){
        var newst =$mjq('select#selwho :selected').text() ;
        $mjq('input#status').val(newst);
              
           });
           var status_log =  $mjq('select#logwho :selected').text();
          
        $mjq('input#log_status').val(status_log);
           $mjq('select#logwho').on('change',function(){
              var newst =$mjq('select#logwho :selected').text() ;
              $mjq('input#log_status').val(newst);
              
           });
           ///работа с селектом
//        $mjq(".help-inline").each(function() {
//        $mjq(this).css('display', 'none');
//        });
         
	});
	$mjq("#email").bind('blur', is_valid_email);
	$mjq("#name").bind('blur', is_valid_name);
	$mjq("#pass1").bind('blur', is_valid_pass);
        $mjq("#pass2").bind('blur', is_valid_pass2);
    $mjq('#validForm').bind('submit', function(e) {
        
        if (!is_valid_form())
            return false;

        e.preventDefault();
        $mjq("#result").html('');
        var data = $mjq(this).serialize();
        var base_url ="http://kazatu.portal.dev/";
        $mjq.ajax({
            url: base_url+"welcome/register",
            type: "post",
            dataType : "json",
            data: data,
            success: function(data) {
                
                var alertClass;
                if(data.error === true){
                    alertClass = 'alert-error';
                }else{
                    alertClass = 'alert-success';
                    $mjq('#validForm').closest('form').find("input[type=text], textarea").val("");
                }
                $mjq("#result").html(returnHtml(alertClass, data.message));
                alert(JSON.stringify( data))
            },
            error: function(data) {
                 alert(JSON.stringify( data))
                $mjq("#result").html(returnHtml('alert-error', data));
            }
        });
    });
    $mjq('#formLog').bind('submit',function(e){
         var datato = $mjq(this).serialize();
       var base_url = $("base").attr('href');
        e.preventDefault();
        $mjq("#res").html('');
        $mjq.ajax({
            type: "post",
            url: base_url+"welcome/login",
            data: datato,
            dataType: "json",
            success: function(data){
             var alertClass;
                if(data.error === true){
                    alertClass = 'error';
                }else{
  function func() {
  var redirect_to =base_url+"welcome/"+data.status+"/"+data.id ;
   location.href= redirect_to;
    }
                  //  alertClass = 'success';
                    $mjq('#formLog').closest('form').find("input[type=text], textarea").val("");
                    setTimeout(func, 1000);
                }
               
                $mjq("#res").html(returnHtml(alertClass, data.message));
               //   alert(JSON.stringify(data));
            },
            error: function(data){
                alert(JSON.stringify(data));
            }
            
        });
    })
});

function returnHtml(alertClass, html){
    return '<div class="alert  '+alertClass+'">\n\
'+html+'</div>';
}

// Email validate
function is_valid_email() {
	$this = $mjq("#email");
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	if(pattern.test($this.val())){ // valid
		if ($this.hasClass("error")) 
			$this.removeClass("error");
		//$this.siblings(".help-inline").css("display", "none");
		return true;
	} else { // error
		if (!$this.hasClass("error")) 
			$this.addClass("error");
		//$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
// Name validate
function is_valid_name() {
	$this = $mjq("#name");
	if($this.val().length>0){ // valid
		if ($this.hasClass("error")) 
			$this.removeClass("error");
		//$this.siblings(".help-inline").css("display", "none");
		return true;
	} else { // error
		if (!$this.hasClass("error")) 
			$this.addClass("error");
		//$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
// Comment validate
function is_valid_pass() {
	$this = $mjq("#pass1");
      
	if($this.val().length>6 ){ // valid
		if ($this.hasClass("error")) 
			$this.removeClass("error");
		//$this.siblings(".help-inline").css("display", "none");
		return true;
	} else { // error
		if (!$this.hasClass("error")) 
			$this.addClass("error");
		//$this.siblings(".help-inline").css("display", "block");
		return false;
                 
//                if (!($this.val() === pass )){
//			$this.addClass("error");
//                    }
		//$this.siblings(".help-inline").css("display", "block");
		
	}
}function is_valid_pass2() {
	$this = $mjq("#pass2");
        var pass = $mjq("#pass1").val();
	if($this.val().length>6 ){ // valid
		if ($this.hasClass("error")) 
			$this.removeClass("error");
		//$this.siblings(".help-inline").css("display", "none");
		return true;
	} else { // error
		
                 
                if (!($this.val() == pass )){
			$this.addClass("error");
                    }
		//$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}

// Form validate
