function eventValidation()
{
var eid = document.event.eventid;
var ename = document.event.eventname;

if(eventid_validation(eid,5,12))
{
  if(allLetter(ename))
      {
      }
    }
return false;
}

function eventid_validation(eid,mx,my)
{
var eid_len = eid.value.length;
if (eid_len == 0 || eid_len >= my || eid_len < mx)
{
alert("Event Id should not be empty / length be between "+mx+" to "+my);
eid.focus();
return false;
}
return true;
}

function allLetter(ename)
{
var letters = /^[A-Za-z\s]+$/;
if(ename.value.match(letters))
{
return true;
}
else
{
alert('Event name must have alphabet characters only');
ename.focus();
return false;
}
}
