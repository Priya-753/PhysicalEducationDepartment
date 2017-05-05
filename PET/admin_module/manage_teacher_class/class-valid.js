function classValidation()
{
  var tid = document.classes.teachid;
var eclass = document.classes.class1;
if(teachid_validation(tid,5,12))
{
  if(classselect(eclass))
  {
  }
}
return false;
}

function teachid_validation(tid,mx,my)
{
var tid_len = tid.value.length;
if (tid_len == 0 || tid_len >= my || tid_len < mx)
{
alert("Teacher Id should not be empty / length be between "+mx+" to "+my);
tid.focus();
return false;
}
return true;
}

function classselect(eclass)
{
if(eclass.value == "-1")
{
alert('Select a class from the list');
eclass.focus();
return false;
}
else
{
return true;
}
}
