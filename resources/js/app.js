const toggleLabels = (display)=> {
    document.querySelectorAll('div.app > header nav span.label').forEach((el)=> {
        el.style.display = display
    })
}

document.querySelector('.toggler').addEventListener('click', (ev)=> {
    ev.preventDefault()

    let header = document.querySelector('div.app > header')

    if (header.offsetWidth == 240) {
        toggleLabels('none')
        header.style.width = '50px'
        header.style.minWidth = '50px'
    } else {
        header.style.width = '240px'
        header.style.minWidth = '240px'
        toggleLabels('block')
    }
})

baguetteBox.run('.images-container > div');