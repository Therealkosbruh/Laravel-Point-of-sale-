document.addEventListener("DOMContentLoaded", function(){
// alert('work');

    let filter_icon = document.querySelector("#filters");
    let filter_container = document.querySelector(".filters");
    let filter_close_icon = document.querySelector("#close-cart");

    filter_icon.onclick = () =>{
        filter_container.classList.add("active");
    };

    filter_close_icon.onclick = () => {
        filter_container.classList.remove("active");
    };
});
