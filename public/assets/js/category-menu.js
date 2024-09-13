(function () {
    // if (screen.width <= 991) {
        var categoryDropdown = document.querySelectorAll('.categories-dropdowns');
        var categoryMenu = document.querySelectorAll('.main-dropdown');

        categoryDropdown.forEach(function (ele) {

            ele.addEventListener('click', function () {
                categoryMenu.forEach(function (ele1){
                    ele1.classList.add('active');
                })
            });
        });

        var categoryDropdownItem = document.querySelectorAll('.main-dropdown .categories-dropdowns__item');
        
        categoryDropdownItem.forEach(function (ele2) {
            ele2.onclick=()=>{
                categoryDropdownItem.forEach((res)=>{
                    if(res.children[0].innerHTML != ele2.children[0].innerHTML){
                        res.classList.remove("is-expanded")
                    }
                })
                ele2.classList.toggle("is-expanded")
                
            }
        });
    // }
    
})();

function toggleDropdown(ele3) {
    // console.log(screen.width);
    var dropDown = document.getElementById('dropdown-toggle');
    if (dropDown.style.display == 'block') {
        dropDown.style.display = 'none';
    }
    else {
        dropDown.style.display = 'block';
    }
}

document.querySelector(".main-content").onclick = ()=>{
    var dropDown = document.getElementById('dropdown-toggle');
    if (dropDown.style.display == 'block') {
        dropDown.style.display = 'none';
    }
}


