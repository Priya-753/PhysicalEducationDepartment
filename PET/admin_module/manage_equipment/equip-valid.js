function equipValidation()
{
var eid = document.equi.equipid;
var type = document.equi.type;
var sport = document.equi.sport;
var stat = document.equi.status;
if(equipid_validation(eid,5,12))
{
  if(sportselect(sport))
  {
    if(typeselect(type))
    {
      if(statusSelect(stat))
      {
      }
    }
  }
}
return false;
}

function equipid_validation(eid,mx,my)
{
var eid_len = eid.value.length;
if (eid_len == 0 || eid_len >= my || eid_len < mx)
{
alert("Equipment Id should not be empty / length be between "+mx+" to "+my);
eid.focus();
return false;
}
return true;
}

function sportselect(sport)
{
if(sport.value == "-1")
{
alert('Select a sport from the list');
sport.focus();
return false;
}
else
{
return true;
}
}

function typeselect(type)
{
if(type.value == "")
{
alert('Select a type from the list');
type.focus();
return false;
}
else
{
return true;
}
}


 function statusSelect(stat)
{
  if(stat.value == "-1")
  {
    alert('Select availabilty');
    type.focus();
    return false;

  }
else
{
  return true;
}
}
