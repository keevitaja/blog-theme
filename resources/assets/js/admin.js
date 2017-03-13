import $ from './utils/query.js'

$('.tabs .tab-selector').on('click', (ev)=> {
    $('.tabs li').removeClass('is-active')
    $(ev.target).parent().addClass('is-active')

    $('.tabs-content div').removeClass('is-active')
    $('#tab-' + ev.target.id).addClass('is-active')
})

$('.container.messages button.delete').on('click', (ev)=> {
    $(ev.target).parent().parent().hide();
})