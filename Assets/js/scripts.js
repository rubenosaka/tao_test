/*
    NOTE: I made this part with JS Vanilly cause in the instructions says: "The homework has to be done in JavaScript (no TypeScript or other languages)."
    
    It would probably be more efficient to use some JS framework    

*/

function getOutput(type, id = null, url = "src/users/user-ajax.php", event) {

  event.preventDefault();
  var container = document.getElementById('tao-users-cards');
  url = url+'?type='+type;
  if(id){
    url = url+'&id='+id;
  }
  //Loader/Spinner until retrieve the user list
  container.innerHTML = '<div class="text-center mt-5"><div class="spinner-border" style="width: 5rem; height: 5rem;" role="status"><span class="sr-only">Loading...</span></div></div>';
  getRequest(
       url, // URL for the PHP file
       drawOutput,  // Everything goes right
       drawError    // Something goes wrong
  );
  return false;
}  
// error message
function drawError() {
    var container = document.getElementById('tao-users-cards');
    container.innerHTML = '<div class="alert alert-danger  mt-5" role="alert">Something goes wrong!</div>';
}
// print html
function drawOutput(responseText) {
    var container = document.getElementById('tao-users-cards');
    container.innerHTML = responseText;
}
// manage old browser
function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            return req.status === 200 ? 
                success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}