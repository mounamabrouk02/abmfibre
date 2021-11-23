var classNames = [
    "fab fa-500px",
    "fab fa-accessible-icon",
    "fab fa-accusoft",
    "fab fa-acquisitions-incorporated",
    "fas fa-ad",
    "far fa-address-book",
    "fas fa-address-book",
    "far fa-address-card",
    "fas fa-address-card",
    "fas fa-adjust",
    "fab fa-adn",
    "fab fa-adobe",
    "fab fa-adversal",
    "fab fa-affiliatetheme",
    "fas fa-air-freshener",
    "fab fa-airbnb",
    "fab fa-algolia",
    "fas fa-align-center"
]


function renderIcons(container,active=null){
    const parentContainer = document.querySelector(container)
    if(!parentContainer)
        throw new Error("Please provide with existing container.")

    parentContainer.innerHtml=null
    parentContainer.classList.add("row")
    parentContainer.classList.add("icons-list-container")


    function iconClickListener(className){
        renderIcons(container,className)
    }

    classNames.forEach(el=>{
        const div = document.createElement("div")
        const i = document.createElement("i")

        if(el === active)
        {
            div.classList.add("active")
        }

        i.className = el

        div.appendChild(i)
        parentContainer.appendChild(div)

        div.addEventListener("click",function(){
            iconClickListener(el)
        })
    })
}
