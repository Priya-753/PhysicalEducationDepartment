function formValidation()
{
var uid = document.registration.userid;
var passid = document.registration.passid;
var cpassid = document.registration.confirm_passid;
var uname = document.registration.username;
var ubloodgroup = document.registration.bloodgroup;
var uclass = document.registration.class1;
if(userid_validation(uid,6,8))
{
if(passid_validation(passid,7,12))
{
  if(cpassid_validation(cpassid,passid))
  {
    if(allLetter(uname))
  {
  if(allbloodgroup(ubloodgroup))
  {
if(classselect(uclass))
{
}
}
}
}
}
}
return false;

}
function userid_validation(uid,mx,my)
{
var uid_len = uid.value.length;
if (uid_len == 0 || uid_len >= my || uid_len < mx)
{
alert("User Id should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
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

function allbloodgroup(ubloodgroup)
{
  var blood = /^(A|B|AB|O)[+-]?$/;
  if(ubloodgroup.value.match(blood))
  {
    return true;
  }
  else {
    {
      alert("Invalid Blood Group");
      ubloodgroup.focus();
      return false;
    }
  }
}

function classselect(uclass)
{
if(uclass.value == "Default")
{
alert('Select your class from the list');
uclass.focus();
return false;
}
else
{
return true;
}
}
