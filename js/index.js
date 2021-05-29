function printlogin(){
    const ID=getElementById('ID').value;
    document.getElementById('input_ID').innerText=ID;
    const Ps=document.getElementById('Ps').value
    document.getElementById('input_ID').innerText=ID;
}

function login(){
    const ID=document.getElementById('id').value;
    const Ps=document.getElementById('password').value;
   
}

function newPage(){
    window.location.href = 'login.html';
}

var alterName=function(){
    var realIdPs=login();
    alert(realIdPs);
}



