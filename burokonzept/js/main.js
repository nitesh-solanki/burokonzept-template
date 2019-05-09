jQuery('#showroomcarousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: true,
    items:1,
});


jQuery('#stimmencagrousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: true,
    items:1,
});


/*========= brands_logo============= */

jQuery('#partner_carousel').owlCarousel({
		loop:true,
		dots: true,
		margin:13,
		// nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:6
			}
		}
})
/*========= brands_logo============= */

/*========= geschichte============= */

jQuery('#geschichte_carousel').owlCarousel({
	loop:true,
	dots: true,
	margin:13,
	nav:true,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:3
		}
	}
})
/*========= geschichte============= x

/*========= Multifunktionssysteme_accordion ============= */

jQuery(document).ready(function(){
	// Add minus icon for collapse element which is open by default
	jQuery(".collapse.in").each(function(){
		jQuery(this).siblings(".multi_heading").find(".fa").addClass("fa-arrow-down").removeClass("fa-arrow-right");
	});
	
	// Toggle plus minus icon on show hide of collapse element
	jQuery(".collapse").on('show.bs.collapse', function(){
		jQuery(this).parent().find(".fa").removeClass("fa-arrow-right").addClass("fa-arrow-down");
	}).on('hide.bs.collapse', function(){
		jQuery(this).parent().find(".fa").removeClass("fa-arrow-down").addClass("fa-arrow-right");
	});
	});
/*========= Multifunktionssysteme_accordion ============= */


/*========= mega menu slide ============= */
jQuery(document).ready(function(){
jQuery("li.dropdown").hover(            
    function() {
        jQuery('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("300");
        jQuery(this).toggleClass('open');        
    },
    function() {
        jQuery('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("300");
        jQuery(this).toggleClass('open');
    }
);
});


/*========= mega menu slide ============= */


/*========= Tab Slider Menu ============= */
    class StickyNavigation {
  
  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    let self = this;
    jQuery('.et-hero-tab').click(function() { 
      self.onTabClick(event, jQuery(this)); 
    });
    jQuery(window).scroll(() => { this.onScroll(); });
    jQuery(window).resize(() => { this.onResize(); });
  }
  
  onTabClick(event, element) {
    event.preventDefault();
    let scrollTop = jQuery(element.attr('href')).offset().top - this.tabContainerHeight + 1;
    jQuery('html, body').animate({ scrollTop: scrollTop }, 600);
  }
  
  onScroll() {
    this.checkTabContainerPosition();
    this.findCurrentTabSelector();
  }
  
  onResize() {
    if(this.currentId) {
      this.setSliderCss();
    }
  }
  
  checkTabContainerPosition() {
    let offset = jQuery('.et-hero-tabs').offset().top + jQuery('.et-hero-tabs').height() - this.tabContainerHeight;
    if(jQuery(window).scrollTop() > offset) {
      jQuery('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
    } 
    else {
      jQuery('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
    }
  }
  
  findCurrentTabSelector(element) {
    let newCurrentId;
    let newCurrentTab;
    let self = this;
    jQuery('.et-hero-tab').each(function() {
      let id = jQuery(this).attr('href');
      let offsetTop = jQuery(id).offset().top - self.tabContainerHeight;
      let offsetBottom = jQuery(id).offset().top + jQuery(id).height() - self.tabContainerHeight;
      if(jQuery(window).scrollTop() > offsetTop && jQuery(window).scrollTop() < offsetBottom) {
        newCurrentId = id;
        newCurrentTab = jQuery(this);
      }
    });
    if(this.currentId != newCurrentId || this.currentId === null) {
      this.currentId = newCurrentId;
      this.currentTab = newCurrentTab;
      this.setSliderCss();
    }
  }
  
  setSliderCss() {
    let width = 0;
    let left = 0;
    if(this.currentTab) {
      width = this.currentTab.css('width');
      left = this.currentTab.offset().left;
    }
    jQuery('.et-hero-tab-slider').css('width', width);
    jQuery('.et-hero-tab-slider').css('left', left);
  }
  
}

new StickyNavigation();
/*========= Tab Slider Menu ============= */

	