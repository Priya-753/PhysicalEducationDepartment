function studvalid()
{
var sid = document.attendance.studid;
if(studid_validation(sid,5,12))
{
}
return false;
}

function studid_validation(sid,mx,my)
{
var sid_len = sid.value.length;
if (sid_len == 0 || sid_len >= my || sid_len < mx)
{
alert("Roll Number should not be empty / length be between "+mx+" to "+my);
sid.focus();
return false;
}
return true;
}
