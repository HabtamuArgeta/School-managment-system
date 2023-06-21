function showForm(tableName,num){
    document.getElementById("Legend").innerHTML="Form for inserting in to "+tableName;
    document.getElementById('fieldset').style.display="block";
    let element=document.getElementsByClassName('myForm');
    for(let i=0;i<element.length;i++){
        element[i].style.display="none";
    }
    element[num-1].style.display="block";
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
