const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons= document.querySelectorAll('[data-close-button]')


openModalButtons.forEach( button =>{
    button.addEventListener('Click',()=>{
        const modal= document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
}

)
function openModal(modal){
    if (modal==null) return
    modal.classList.add('active')
}
function closeModal(modal){
    if (modal==null) return
    modal.classList.remove('active')
}