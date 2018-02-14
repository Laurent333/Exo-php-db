
function hideProcessMessage(){
        document.getElementById("processMessage").classList.add('hide');
}

document.getElementById("processMessage").onclick = function(){
    hideProcessMessage();
};
setInterval(function(){ hideProcessMessage(); }, 10000);
