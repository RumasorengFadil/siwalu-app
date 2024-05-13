const container =  document.querySelector('.cn');
const overlay = document.querySelector('.overlay');
const icnWa = document.querySelector('.detail-laundry__cost-estimation-cn');
const icnExit = document.querySelector('.cn__icn-exit')

function closeFormMessage(){
    container.classList.add('hidden');
    overlay.classList.add('hidden');
}

icnWa.addEventListener("click",function(e){
    container.classList.remove('hidden');
    overlay.classList.remove('hidden');
})

overlay.addEventListener("click",closeFormMessage);
icnExit.addEventListener("click",closeFormMessage);