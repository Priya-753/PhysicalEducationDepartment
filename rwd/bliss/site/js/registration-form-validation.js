function formValidation()
{
var uname = document.registration.username;
var passid = document.registration.passid;
var cpassid = document.registration.confirm_passid;
var num = document.registration.phno;
if(allLetter(uname))
{
if(passid_validation(passid,7,12))
{
  if(cpassid_validation(cpassid,passid))
  {
    if(allLetter(uname))
  {
    if(allnumeric(num))
    {
    }
}
}
}
}
return false;
}

function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}

function cpassid_validation(cpassid,passid)
{
  var pass=passid.value;
  var cpass=cpassid.value;
  if(pass!=cpass)
  {
    alert("Passwords don't match");
    cpassid.focus();
    return false;
  }
  return true;
}

function allLetter(uname)
{
var letters = /^[A-Za-z\s]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('Username must have alphabet characters only');
uname.focus();
return false;
}
}

function allnumeric(inputtxt)
      {
      var numbers = /^[0-9]/;
      if(inputtxt.value.match(numbers))
      {
      alert('Your Registration number has accepted....');
      document.form1.text1.focus();
      return true;
      }
      else
      {
      alert('Please input numeric characters only');
      document.form1.text1.focus();
      return false;
      }
      }
