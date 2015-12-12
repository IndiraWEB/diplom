/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    var region =$("select#com_reg :selected").text();
    $("input#comp_region").val(region);
    alert($("input#comp_region").val());
    $("select#com_reg").on("change", function(){
        var reg =$("select#com_reg :selected").text();
        $("input#comp_region").val(reg);
    alert($("input#comp_region").val());
    });
    
})