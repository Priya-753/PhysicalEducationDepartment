function formValidation()
{
var passid = document.registration.passid;
var cpassid = document.registration.confirm_passid;

if(passid_validation(passid,7,12))
{
  if(cpassid_validation(cpassid,passid))
  {
  }
}
return false;
}

function nameValidation()
{
  var uname = document.registration.username;
  if(allLetter(uname))
  {
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
