$(document).ready(function(){
    // false - Keep all tabs open
    // true - Close open tab after clicking another
    let closeOthers = true;
    // Gets each accordion INDIVUDUALLY. So use ONLY the accordion class for all accordions
    $('.accordion').each(function(){
        let currentAccordion = $(this);
        // Hide all content but the buttons
        currentAccordion.children(':not(.accordion__button)').hide();
        currentAccordion.children('.accordion__button').on('click', function(){
            if(!$(this).hasClass('accordion--active')){
                if(currentAccordion.find('.accordion--active').length > 0 && closeOthers){
                    currentAccordion.find('.accordion--active').next().slideUp();
                    currentAccordion.find('.accordion--active').removeClass('accordion--active');
                }
                $(this).addClass('accordion--active');
                $(this).next().slideToggle("slow");
            }
            else{
                $(this).removeClass('accordion--active');
                $(this).next().slideToggle("slow");
            }
        });
    });
});