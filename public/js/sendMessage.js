const container = document.querySelector(".prompt");
const overlay = document.querySelector(".overlay");
const icnWa = document.querySelector(".detail-laundry__cost-estimation-cn");
const icnExit = document.querySelector(".prompt__icn-close-cn");

function togglePrompt(e) {
    if (e.type === "scroll" && container.classList.contains("hidden")) return;
    container.classList.toggle("hidden");
    overlay.classList.toggle("hidden");
}
icnWa.addEventListener("click", togglePrompt);
overlay.addEventListener("click", togglePrompt);
icnExit.addEventListener("click", togglePrompt);
document.addEventListener("scroll", togglePrompt);
