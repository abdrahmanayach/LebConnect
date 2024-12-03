function showPassword() {
    const pass=document.getElementById("pass");
    const eye=document.getElementsByName("eye");
    if(pass.type == "password")
      pass.type="text";
    else pass.type="password"
    
}

function showConfirmPassword() {
    const cpass=document.getElementById("cpass");
    if(cpass.type == "text")  cpass.type="password";
    else cpass.type="text"
}


document.querySelector('form').addEventListener('submit', (e) => {
  const password=document.getElementById("pass").value;
  const cpassword=document.getElementById("cpass").value;
  const error = document.getElementById('passwordError');
 
  if(password !== cpassword)
 {
   error.textContent = "Passwords do not match";
   e.preventDefault();
 }else{
    error.textContent="";
 }
});