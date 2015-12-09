/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    function is_valid_formResume() {
    
	var ret = true;
	if (!is_valid_FrFam()) var ret = false;
	if (!is_valid_FrName()) var ret = false;
	if (!is_valid_FmFathname()) var ret = false;
        if (!is_valid_FrDate()) var ret = false;
        if (!is_valid_FrOpyt()) var ret = false;
        if (!is_valid_FrNav()) var ret = false;
	return ret;
}
   
 var lvl =$("select#lvl :selected").val();
 $("input#level").val(lvl);
 $("select#lvl").change(function(){
     var level =$("select#lvl :selected").val();
 $("input#level").val(level);
 }); 
 var region =  $('select#FrRegion :selected').text();
 $("input#Region").val(region);
 var prof =$("select#FmProf :selected").text();
 $("input#Prof").val(prof);
 $('select#FrRegion').change(function(){
     var regioni =  $('select#FrRegion :selected').text();
 $("input#Region").val(regioni);
 alert(regioni);
});
$("select#FmProf").on("change",function(){
var profi =$("select#FmProf :selected").text();
 $("input#Prof").val(profi);
 alert(profi)
});

$("#FrFam").bind('blur', is_valid_FrFam);
$("#FrName").bind('blur', is_valid_FrName);
$("#FmFathname").bind('blur', is_valid_FmFathname);
$("#FrDate").bind('blur', is_valid_FrDate);
$("#FrOpyt").bind("blur",is_valid_FrOpyt);
$("#FrNav").bind("blur",is_valid_FrNav);

        
   $('#formResume').bind("submit", function(e) {
        e.preventDefault();
        var base_url = $("base").attr('href');
        if(!is_valid_formResume())
            return false;
        $.ajax({
            type:"post",
            url: base_url + "welcome/change/student/"
        });
        
    });
    function is_valid_FrFam(){
        $this = $("#FrFam");
      
	if($this.val().length>1 ){ // valid
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
    function is_valid_FrName(){
       $this = $("#FrName");
      
	if($this.val().length>1 ){ // valid
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
    function is_valid_FmFathname(){
        $this = $("#FmFathname");
      
	if($this.val().length>1 ){ // valid
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
    function is_valid_FrDate(){
        $this=$("#FrDate");
   
    var pattern = new RegExp(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i);
      
        
      
	
	if(pattern.test($this.val())){ // valid
		if ($this.hasClass("error")) 
			$this.removeClass("error");
		
		return true;
	} else { // error
		if (!$this.hasClass("error")) 
			$this.addClass("error");
		
		return false;
	}
 }
 function is_valid_FrNav(){
        $this = $("#FrNav");
      
	if($this.val().length>10 ){ // valid
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
    function is_valid_FrOpyt(){
        $this = $("#FrOpyt");
      
	if($this.val().length>10 ){ // valid
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

});


