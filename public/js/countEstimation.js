document
.querySelector(".detail-laundry__input-estimasi")
.addEventListener("input", function(){
    const estimation = +this.value;
    const pricePerKg =+[...document
    .querySelector(".detail-laundry__harga")
    .textContent]
    .filter(char =>{
        return parseInt(char) || parseInt(char)===0;
    })
    .join("");
    
    document
    .querySelector(".detail-laundry__total-cost-estimation")
    .textContent = `Rp.${estimation * pricePerKg}`;
})