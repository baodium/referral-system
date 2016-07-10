 var back_url="http://localhost/unah/";
 
 function checkDisable(form_name){
 var conf=window.confirm("Are you sure you want to disable this user?");
 if(!conf)
 return false;
 else
 document.forms[form_name].submit();
 }
 
  function checkDelete(form_name){
 var conf=window.confirm("Are you sure you want to delete this user?");
 if(!conf)
 return false;
 else
 document.forms[form_name].submit();
 }
 
 
  function checkEnable(form_name){
 var conf=window.confirm("Are you sure you want to enable this item?");
 if(!conf)
 return false;
 else
 document.forms[form_name].submit();
 }
 
  function checkApprove(form_name){
 var conf=window.confirm("Are you sure you want to approve this item?");
 if(!conf)
 return false;
 else
 document.forms[form_name].submit();
 }
 
 function checkReject(form_name){
 var conf=window.confirm("Are you sure you want to deny this item?");
 if(!conf)
 return false;
 else
 document.forms[form_name].submit();
 }
 
 function displayPass(){
 alert("here");
 $("#pass_div").innerHTML='Current Password:<input type="password" name="current_password"  />';
 }
 
 function populateLga(stateElementId,lgaElementId){
    var state_id=document.getElementById(stateElementId).value;
    var lgaElement=document.getElementById(lgaElementId)
    //alert(state_id);
       var url=back_url+"outlet/get_lga/"+state_id;
       lgaElement.length=0;
       lgaElement.options[0] = new Option('Select Lga','');
       lgaElement.selectedIndex = 0;
		 //console.log(url);return false;
		 $.post(url,  function(data){
                 if(data!="" && data!=null){
		data=data.split("|");
     
    //alert(data.length);
    for (var i=0; i<data.length-1; i++) {
        lgaElement.options[lgaElement.length] = new Option(data[i],data[i]);
    }
                     }
		});
}


function populateState(stateElementId){

    var stateElement=document.getElementById("states")
    //alert(state_id);
       var url=back_url+"outlet/get_state";
		 //console.log(url);return false;
                 stateElement.options[0] = new Option('Select State','');
                 stateElement.selectedIndex = 0;
                 
                 
		 $.post(url,  function(data){
                 if(data!="" && data!=null){
		data=data.split("|");
  
    //alert(data.length);
    for (var i=0; i<data.length; i++) {
        var val=data[i].split(":");
        stateElement.options[stateElement.length] = new Option(val[1],val[0]);
    }
                     }
		});
}