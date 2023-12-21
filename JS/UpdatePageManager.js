 let numGlob=-1;
function showForm(tableName,num){
  document.getElementById('errormssg').innerHTML="";
   
  let form=document.getElementsByClassName('myForm');
  for(let i=0;i<form.length;i++){
      form[i].style.display="none";
  }
    document.getElementById("Legend").innerHTML="Form for updating "+tableName;
    document.getElementById('fieldset').style.display="block";

    let SearchElm=document.getElementsByClassName('SearchForm');
    for(let i=0;i<SearchElm.length;i++){
        SearchElm[i].style.display="none";
    }
    SearchElm[num-1].style.display="block";
    numGlob=num;
    document.getElementById('success_updates').innerHTML ="" ;
  document.getElementById('success_Delete').innerHTML = "" ;
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

 function handleResponse(col1,col2,col3,col4,col5,col6) {
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
    document.getElementById('admin_id').value = col6;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse1(col1,col2,col3,col4,col5,col6,col7,col8) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('student_id1').value = col1;
    document.getElementById('student_name').value = col2;
    document.getElementById('student_address').value = col3;
    document.getElementById('student_email').value = col4;
    document.getElementById('phone_number1').value = col5;
    document.getElementById('school_id1').value = col6;
    document.getElementById('parent_id1').value = col7;
    document.getElementById('admin_id1').value = col8;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse2(col1,col2,col3,col4,col5,col6,col7) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('course_id2').value = col1;
    document.getElementById('course_name').value = col2;
    document.getElementById('student_id2').value = col3;
    document.getElementById('class_id2').value = col4;
    document.getElementById('course_type').value = col5;
    document.getElementById('teacher_id2').value = col6;
    document.getElementById('admin_id2').value = col7;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse3(col1,col2,col3) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('admin_id3').value = col1;
    document.getElementById('admin_name').value = col2;
    document.getElementById('admin_address').value = col3;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse4(col1,col2,col3,col4,col5) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('class_id4').value = col1;
    document.getElementById('class_type').value = col2;
    document.getElementById('student_id4').value = col3;
    document.getElementById('class_name').value = col4;
    document.getElementById('school_id4').value = col5;
    document.getElementById('errormssg').innerHTML="";
    
    
  }

  function handleResponse5(col1,col2,col3) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('school_name').value = col1;
    document.getElementById('school_type').value = col2;
    document.getElementById('school_ID5').value = col3;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse6(col1,col2,col3,col4,col5,col6,col7) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('registration_id6').value = col1;
    document.getElementById('registration_date').value = col2;
    document.getElementById('registration_number').value = col3;
    document.getElementById('course_id6').value = col4;
    document.getElementById('registration_name').value = col5;
    document.getElementById('student_id6').value = col6;
    document.getElementById('registration_type').value = col7;
    document.getElementById('errormssg').innerHTML="";
  }

  function handleResponse7(col1,col2) {
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    form[numGlob-1].style.display="block";
    document.getElementById('parent_id7').value = col1;
    document.getElementById('parent_name').value = col2;
    document.getElementById('errormssg').innerHTML="";
  }

  function  handleErrorResponse(error){
    let form=document.getElementsByClassName('myForm');
    for(let i=0;i<form.length;i++){
        form[i].style.display="none";
    }
    document.getElementById('errormssg').innerHTML=error;

  }
  function handleSuccessUpdateResponse(response){
    document.getElementById('success_updates').innerHTML =response ; 
    

  }
  function handelresponseInDelete(response){
    document.getElementById('success_Delete').innerHTML =response ;
  }
