/*function myFunction() {
    alert("name block should not be blank");
  }*/
  function onsubmit() {
    let name = document.getElementById('name').value;
    let address = document.getElementById('address').value;
    let email = document.getElementById('email').value;
    let date = document.getElementById('date').value;
    let photo = document.getElementById('photo').value;
    let phone = document.getElementById('phone_number').value;
    let gender=document.querySelector('input[name="gender"]:checked');
   

    

    if (name === '' || email === '' || address ==='' || date ==='' || photo===''|| phone_number===''|| gender==='') {
        alert('All fields must be filled out');
        return;
    }

    // You can add more advanced validation logic here if needed
else
    alert('Registration successful!\nname: ' + name + '\nEmail: ' + email+'\naddress:'+address + '\nDOB'+ date + '\nphoto'+ photo+'\nphone number'+phone+'\ngender'+gender.value);
}