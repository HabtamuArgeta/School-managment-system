 let numGlob=-1;
function showForm(tableName,num){
    document.getElementById("Legend").innerHTML="Form for updating "+tableName;
    document.getElementById('fieldset').style.display="block";

    let SearchElm=document.getElementsByClassName('SearchForm');
    for(let i=0;i<SearchElm.length;i++){
        SearchElm[i].style.display="none";
    }
    SearchElm[num-1].style.display="block";
    numGlob=num;
 }
 
 let form=document.getElementsByClassName('myForm');
 for(let j=0;j<form.length;j++){
form[j].addEventListener('submit', function(event) {
// Add an event listener to the iframe's load event
var iframe = document.getElementById('myFrame');
iframe.addEventListener('load', function() {
var textField=document.getElementsByClassName("clear");
for(let i=0;i<textField.length;i++){
 textField[i].value="";
}
});
});
 }

 function handleResponse(col1,col2,col3,col4,col5) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('teacher_id').value = col1;
    document.getElementById('teacher_name').value = col2;
    document.getElementById('phone_number').value = col3;
    document.getElementById('age').value = col4;
    document.getElementById('teacher_address').value = col5;
    document.getElementById('error').value="";
  }
  function  handleErrorResponse(error){
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    document.getElementById('teacher_id').value = "";
    document.getElementById('teacher_name').value = "";
    document.getElementById('phone_number').value = "";
    document.getElementById('age').value = "";
    document.getElementById('teacher_address').value = "";
    document.getElementById('error').value=error;

  }
  function handleSuccessUpdateResponse(response){
    document.getElementById('success_updates').innerHTML =response ; 
    

  }
  function handelresponseInDelete(response){
    document.getElementById('success_Delete').innerHTML =response ;
  }
