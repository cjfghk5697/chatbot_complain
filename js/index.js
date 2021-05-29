function printlogin(){
    const ID=getElementById('ID').value;
    document.getElementById('input_ID').innerText=ID;
    const Ps=document.getElementById('Ps').value
    document.getElementById('input_ID').innerText=ID;
}

function login(){
    const ID=document.getElementById('ID').value;
    const Ps=document.getElementById('Ps').value;
    return ID + Ps;
}

var alterName=function(){
    var realIdPs=login();
    alert(realIdPs);
}

