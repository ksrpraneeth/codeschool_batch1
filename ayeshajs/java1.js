const form=document.getElementById('form');
const partyaccount=document.getElementById('partyaccount');
const cpartyaccount=document.getElementById('cpartyaccount');
const partyname=document.getElementById('partyname');
//Show input error message

function showError(input,message){
    const formControl=input.parentElement;
    formControl.className='input-control error';
    const small=formControl.querySelector('small');
    small.innerText=message;
}

function showSuccess(input){
    const formControl=input.parentElement;
    formControl.className='input-control success';
    }
    
    form.addEventListener('submit',function(e){
        e.preventDefault();
    
        if(partyaccount.value===''){
            showError(partyaccount,'Username is required');
        }
        else{
            showSuccess(partyaccount);
        }
    });