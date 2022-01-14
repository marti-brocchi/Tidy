//Gestione menù dinamico
var checkbox = document.getElementById("nav-check");
var menu = document.getElementsByTagName("nav");

checkbox.addEventListener('change', function (event) 
{
    for(let i=0; i<menu.length; i++) 
    {
        if (checkbox.checked)
            menu[i].setAttribute("class", "nav");

        else
            menu[i].setAttribute("class", "nav hide");
    }
});

//Nascondere menù quando un link viene cliccato
var link = document.getElementsByTagName("a");
for (let i=0; i<link.length; i++) {
    
    link[i].addEventListener('click', function(event) {
        for(let i=0; i<menu.length; i++)
            menu[i].setAttribute("class", "nav hide");
        checkbox.checked = false;
    });
}

//Gestione searchbar
var search = document.getElementById("search-icon");
var searchbarForm = document.getElementById("searchbar-form");

search.addEventListener('click', function(event) {
    if (searchbarForm.className==='hide')
        searchbarForm.className='show';
    else
        searchbarForm.className='hide';
});