class Query
{
    constructor(selector) {
        if (selector instanceof HTMLElement) {
            this.elements = [selector]
        } else {
            this.elements = document.querySelectorAll(selector) || []
        }
    }

    hide() {
        this.style('display', 'none')

        return this
    }

    show(style = false) {
        this.style('display', style || 'block')

        return this
    }

    style(rule, value) {
        this.elements.forEach((el)=> {
            el.style[rule] = value
        })

        return this
    }

    on(event, callback) {
        this.elements.forEach((el)=> {
            el.addEventListener(event, callback)
        })

        return this
    }

    parent() {
        let elements = []

        this.elements.forEach((el)=> {
            elements.push(el.parentElement)
        })

        this.elements = elements

        return this
    }

    addClass(classname) {
        this.elements.forEach((el)=> {
            let classNames = el.className.split(' ')

            classNames.push(classname)

            el.className = classNames.join(' ')
        })

        return this
    }

    removeClass(classname) {
        this.elements.forEach((el)=> {
            let classNames = el.className.split(' ')

            classNames.forEach((name)=> {
                if (classname == name) {
                    let index = classNames.indexOf(name)

                    if (index > -1) classNames.splice(index, 1)
                }
            })

            el.className = classNames.join(' ')
        })

        return this
    }
}

export default (selector)=> {
    return new Query(selector)
}